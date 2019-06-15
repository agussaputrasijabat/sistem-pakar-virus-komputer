<?php
$sql = 'SELECT * FROM tbl_gejala ORDER BY CAST(kd_gejala as unsigned)';
$results = $conn->query($sql);
$next_kd_gejala = $conn->query('SELECT COUNT(*) FROM tbl_gejala')->fetch_row()[0] + 1;

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Gejala</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Daftar Gejala</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah"><i class=" fas fa-plus"></i> Tambah Gejala</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width:120px">Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Pertanyaan</th>
                            <th style="width:120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($result = $results->fetch_object()):?>
                        <tr>
                            <td><?= $result->kd_gejala ?></td>
                            <td><?= $result->nama_gejala ?></td>
                            <td><?= $result->pertanyaan ?></td>
                            <td>
                                <button type="button" class="btn btn-secondary" onclick='edit(<?= json_encode($result) ?>)'>Ubah</button>
                                <button type="button" class="btn btn-danger" onclick="hapus('<?= $result->kd_gejala ?>')">Hapus</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" class="form-horizontal" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="action" value="add" />
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kode Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kd_gejala" name="kd_gejala" value="G<?= $next_kd_gejala ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required>Apakah </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body float-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="$('#form-tambah').trigger('reset');$('#modal-tambah').modal('hide');">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" class="form-horizontal" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="action" value="edit" />
                        <div class="form-group row d-none">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kode Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kd_gejala" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_gejala" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="pertanyaan" rows="4" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body float-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="$('#modal-edit').modal('hide');">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.data-table').DataTable();

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();

        $.post('modules/gejala/crud.php', $(this).serialize(), function(res) {
            if (res.success) {
                $('#modal-tambah').modal('hide');
                $('#form-tambah').trigger('reset');
                location.reload();
            } else {
                alert('Tidak dapat menyimpan gejala');
            }
        });
    });

    $('#form-edit').on('submit', function(e) {
        e.preventDefault();

        $.post('modules/gejala/crud.php', $(this).serialize(), function(res) {
            if (res.success) {
                $('#modal-edit').modal('hide');
                $('#form-edit').trigger('reset');
                location.reload();
            } else {
                alert('Tidak dapat menyimpan gejala.');
            }
        });
    });

    function edit(gejala){
        var form = $('#form-edit');
        form.find('input[name=kd_gejala]').val(gejala.kd_gejala);
        form.find('input[name=nama_gejala]').val(gejala.nama_gejala);
        form.find('textarea[name=pertanyaan]').val(gejala.pertanyaan);
        $('#modal-edit .modal-title').text(`Ubah Gejala #${gejala.kd_gejala}`);
        $('#modal-edit').modal('show');
    }

    function hapus(kd_gejala) {
        var c = confirm(`Apakah Anda yakin ingin menghapus gejala "${kd_gejala}"?`);
        if (c) {
            $.post('modules/gejala/crud.php', {
                action: 'delete',
                kd_gejala: kd_gejala
            }, function(res) {
                if (res.success) {
                    location.reload();
                } else {
                    alert('Tidak dapat menghapus gejala');
                }
            });
        }
    }
</script>