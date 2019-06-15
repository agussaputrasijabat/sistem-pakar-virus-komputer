<section id="subintro">

    <div class="container">
        <div class="row">
            <div class="span4">
                <h3>Konsultasi <strong>Virus Komputer</strong></h3>
            </div>
            <div class="span8">
                <ul class="breadcrumb notop">
                    <li><a href="./">Home</a><span class="divider">/</span></li>
                    <li class="active">Konsultasi</li>
                </ul>
            </div>
        </div>

</section>

<section id="maincontent">
    <div class="container">
        <?php if (!$is_logged_in) : ?>
            <p class="lead">
                Sebelum memulai, silahkan masukkan nama Anda terlebih dahulu.
            </p>

            <br />

            <form id="login-form" class="form-horizontal" action="modules/konsultasi/session_login.php">
                <div class="control-group">
                    <label class="control-label" for="name">Nama</label>
                    <div class="controls">
                        <input type="text" id="name" name='name' placeholder="Nama">
                        <button type="submit" class="btn">Masuk</button>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div id="content_pertanyaan">
                <h4>Jawablah pertanyaan berikut untuk melakukan konsultasi:</h4>
                <dl id="list_pertanyaan">
                    <dt>Gejala sedang dimuat...</dt>
                </dl>
            </div>
            <div id="content_hasil" class="hidden">
                <h4>Hasil Analisa: <span id="percentage_analysis"></span></h4>
                <dl id="hasil_analisa" class="dl-horizontal">

                </dl>

                <button type="submit" class="btn btn-primary" onclick="konsultasi_ulang();">Konsultasi Ulang</button>
                <button type="submit" class="btn btn-success" onclick="location = 'modules/konsultasi/session_logout.php'">Selesai</button>
            </div>
        <?php endif; ?>
        <br /><br />
    </div>
</section>

<script src="https://cdn.statically.io/gh/akopachov/mini-linq-js/9e8be7b8/dist/mini-linq.full.min.js"></script>
<script>
    var tbl_kb = {},
        selected_gejala = [],
        viruses = [],
        virus = null,
        jum_gejala = 0,
        tmp_viruses = [];

    document.title = `Konsultasi - ${document.title}`;

    $('#login-form').submit(function(e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function(res) {
            if (res.success) {
                location.reload();
            } else {
                alert('Terjadi kesalahan. Silahkan coba lagi.');
            }
        })
    });

    var is_logged_in = <?php if ($is_logged_in) echo 'true';
                        else echo 'false'; ?>;
    if (is_logged_in) {
        $.get('modules/konsultasi/get_gejala.php', function(res) {
            tbl_kb = res;

            $('#list_pertanyaan').html('');
            $(tbl_kb.gejala.orderBy(x => x.kd_gejala)).each(function(idx, item) {
                var template = `
                <div class="gejala_${item.kd_gejala} gejala_${idx} hidden" data-index="${idx}">
                    <dt>[${item.kd_gejala}] ${item.pertanyaan}</dt>
                    <dd>
                        <label class="radio inline">
                            <input type="radio" name="gejala_${item.kd_gejala}" value="ya" required>
                            YA
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="gejala_${item.kd_gejala}" value="tidak" checked required>
                            TIDAK
                        </label>
                        <br><br/>
                        <button type="button" class="btn btn-lanjut" data-gejala="${item.kd_gejala}" data-index="${idx}">Lanjut</button>
                    </dd><br/>
                </div>
                `;

                $('#list_pertanyaan').append(template);
            });

            $('.gejala_0').removeClass('hidden');
        });

        $('body').on('click', '.btn-lanjut', function() {
            var index = parseInt($(this).data('index'));
            var kd_gejala = $(this).data('gejala');
            var jawaban = $(`input[name=gejala_${kd_gejala}]:checked`).val();

            if (jawaban == undefined) {
                alert("Jawaban belum dipilih!");
                return;
            }



            $(`.gejala_${kd_gejala}`).addClass('answered hidden');
            $(`.gejala_${index + 1}`).removeClass('hidden');

            if (jawaban == 'ya') {
                selected_gejala.push(kd_gejala);

                $(tbl_kb.kaidah).each(function(idx, kaidah) {
                    if (selected_gejala.contains(kaidah.kd_gejala)) {
                        tmp_viruses.push(kaidah.kd_virus);
                    }
                });
            }

            // Jika sudah di akhir pertanyaan gejala
            if ((index + 1) == tbl_kb.gejala.length) {
                console.log(selected_gejala);

                $(tbl_kb.kaidah).each(function(idx, kaidah) {
                    if (selected_gejala.contains(kaidah.kd_gejala)) {
                        viruses.push(kaidah.kd_virus);
                    }
                });

                viruses = viruses.groupBy(x => x);
                console.log(viruses);

                if (viruses.any()) {
                    $(viruses).each(function(idx, _virus) {
                        if (_virus.values.length > jum_gejala) {
                            jum_gejala = _virus.values.length;
                            virus = tbl_kb.virus.firstOrDefault(x => x.kd_virus == _virus.group);
                        }
                    });

                    if (virus != null) {
                        console.log(`Virus: ${virus.nama_virus}`);
                        var template = `
                            <dt>Kode Virus</dt>
                            <dd>${virus.kd_virus}</dd>
                            <br/>
                            <dt>Nama Virus</dt>
                            <dd>${virus.nama_virus}</dd>
                            <br/>
                            <dt>Keterangan</dt>
                            <dd>${virus.keterangan}</dd>
                            <br/>
                            <dt>Solusi</dt>
                            <dd>${virus.solusi}</dd>
                        `;

                        $("#hasil_analisa").html(template);
                        $("#content_hasil").removeClass('hidden');
                        $('#content_pertanyaan').addClass('hidden');

                        var gejala_on_virus = tbl_kb.kaidah.where(x => x.kd_virus == virus.kd_virus).length;
                        var persentasi_analisa = percentage(selected_gejala.length, gejala_on_virus);
                        $("#percentage_analysis").text(`Ketepatan ${Math.round(persentasi_analisa)}%`);

                        $.post("modules/konsultasi/analysis_result.php", {
                            kd_virus: virus.kd_virus,
                            name: '<?= $session_name ?>',
                            kd_sesi: '<?= $session_kd_sesi ?>'
                        }, function(res) {
                            console.log(res);
                        });
                    }
                } else {
                    console.log("Virus tidak dikenal")
                }
            }
        });
    }

    function konsultasi_ulang() {
        var name = '<?= $session_name ?>';
        $.get('modules/konsultasi/session_logout.php', function() {
            $.post('modules/konsultasi/session_login.php', {
                name: name
            }, function() {
                location.reload();
            });
        });
    }

    function percentage(partialValue, totalValue) {
        return ((100 * partialValue) / totalValue).toFixed(2);
    }
</script>