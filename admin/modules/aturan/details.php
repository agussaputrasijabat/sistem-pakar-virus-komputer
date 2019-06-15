<?php
include '../../include/dbconfig.php';

$kd_virus = $_GET['kd_virus'];
$virus = $conn->query("SELECT * FROM tbl_virus WHERE kd_virus='$kd_virus'")->fetch_object();
$results_gejala = $conn->query("SELECT * FROM tbl_gejala");
$results_kaidah = array();
$kaidah_rows = $conn->query("SELECT * FROM tbl_kaidah WHERE kd_virus='$kd_virus'");

if ($kaidah_rows->num_rows > 0)
{
    while($kaidah = $kaidah_rows->fetch_assoc()){
        array_push($results_kaidah, $kaidah);
    }
}


function is_gejala_checked($kd_gejala, $arr)
{
    if (!empty($arr)) {
        foreach ($arr as $kaidah) {
            if ($kaidah['kd_gejala'] == $kd_gejala) {
                return true;
            }
        }
    }
    return false;
}
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Gejala-Gejala untuk virus #<?= $kd_virus ?> (<?= $virus->nama_virus ?>)</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>
                        <label class="customcheckbox m-b-20">
                            <input type="checkbox" id="mainCheckbox">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th scope="col" style="width:120px;">Kode Gejala</th>
                    <th scope="col">Nama Gejala</th>
                </tr>
            </thead>
            <tbody class="customtable">
                <?php while ($gejala = $results_gejala->fetch_object()) : ?>
                    <tr>
                        <th>
                            <label class="customcheckbox">
                                <input type="checkbox" class="listCheckbox" data-id="<?= $gejala->kd_gejala ?>" <?php if (is_gejala_checked($gejala->kd_gejala, $results_kaidah)) echo "checked" ?>>
                                <span class="checkmark"> </span>
                            </label>
                        </th>
                        <td> <?= $gejala->kd_gejala ?></td>
                        <td><?= $gejala->nama_gejala ?></td>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>

        <br />
    </div>
</div>

<script>
    var kd_virus = '<?= $kd_virus ?>';

    $("#detail-gejala #mainCheckbox").on('change', function() {
        if (this.checked) {
            $('#detail-gejala .listCheckbox').prop('checked', true);
        } else {
            $('#detail-gejala .listCheckbox').prop('checked', false);
        }

        $('#detail-gejala .listCheckbox').trigger('change');
    });

    $('#detail-gejala .listCheckbox').on('change', function() {
        var kd_gejala = $(this).data('id');
        var action = (this.checked ? 'add' : 'delete');

        $.post('modules/aturan/crud.php', {
            kd_virus: kd_virus,
            kd_gejala: kd_gejala,
            action: action
        }, function() {

        });
    });
</script>