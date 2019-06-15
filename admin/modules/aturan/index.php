<?php
$results_virus = $conn->query('SELECT * FROM tbl_virus');
$results_gejala = $conn->query("SELECT * FROM tbl_gejala");

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Aturan</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Daftar Virus</h4>
                </div>
                <div class="comment-widgets scrollable">

                    <?php while ($virus = $results_virus->fetch_object()) : ?>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0 item-virus" data-id="<?= $virus->kd_virus ?>" style="cursor: pointer;">
                            <div class="comment-text w-100">
                                <h6 class="font-medium"><?= $virus->kd_virus ?></h6>
                                <span class="d-block"><?= $virus->nama_virus ?> </span>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="detail-gejala">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0"></h5>
                </div>
                <h4 align="center" style="height:300px;valign:center;">
                    Pilih salah satu virus untuk mengubah aturan gejala.
                </h4>
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
                <form id="form-tambah" class="form-horizontal">
                    <div class="card-body">
                        <input type="hidden" name="action" value="add" />
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kode Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kd_gejala" name="kd_gejala" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Gejala</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Pertanyaan ?</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="pertanyaan" name="pertanyaan"></textarea>
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


<script>
    $(document).ready(function() {
        if ($('body .item-virus').length > 0) {
            $('body .item-virus:first').trigger('click');
        }
    });

    $(document).on('click', '.item-virus', function(e) {
        e.preventDefault();
        var kd_virus = $(this).attr('data-id');
        $('body .item-virus').removeClass('active');
        $(this).addClass('active');
        $('#detail-gejala').unbind();
        $('#detail-gejala').html('');
        $.get('modules/aturan/details.php?kd_virus=' + kd_virus, function(res) {
            $('#detail-gejala').unbind();
            $('#detail-gejala').html(res);
        });
    });
</script>