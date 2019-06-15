<?php
$sql = 'SELECT * FROM tbl_virus';
$results = $conn->query($sql);
$next_kd_virus = $conn->query('SELECT COUNT(*) FROM tbl_virus')->fetch_row()[0] + 1;

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Virus</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Daftar Virus</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah"><i class=" fas fa-plus"></i> Tambah Virus</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width:120px">Kode Virus</th>
                            <th>Nama Virus</th>
                            <th style="min-width:300px">Keterangan</th>
                            <th>Solusi</th>
                            <th style="width:120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($result = $results->fetch_object()) : ?>
                            <tr>
                                <td><?= $result->kd_virus ?></td>
                                <td><?= $result->nama_virus ?></td>
                                <td><?= $result->keterangan ?></td>
                                <td><?= $result->solusi ?></td>
                                <td>
                                    <button type="button" class="btn btn-secondary" onclick='edit(<?= json_encode($result) ?>)'>Ubah</button>
                                    <button type="button" class="btn btn-danger" onclick="hapus('<?= $result->kd_virus ?>')">Hapus</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width:120px">Kode Virus</th>
                            <th>Nama Virus</th>
                            <th>Keterangan</th>
                            <th>Solusi</th>
                            <th style="width:120px">Aksi</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Virus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" class="form-horizontal" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="action" value="add" />
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kode Virus</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kd_virus" name="kd_virus" value="V<?= $next_kd_virus ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Virus</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_virus" name="nama_virus" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Solusi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="solusi" name="solusi" rows="5" required></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah Virus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" class="form-horizontal" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="action" value="edit" />
                        <div class="form-group row d-none">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kode Virus</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kd_virus" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Virus</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_virus" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Solusi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="solusi" rows="5" required></textarea>
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

        $.post('modules/virus/crud.php', $(this).serialize(), function(res) {
            if (res.success) {
                $('#modal-tambah').modal('hide');
                $('#form-tambah').trigger('reset');
                location.reload();
            } else {
                alert('Tidak dapat menyimpan virus.');
            }
        });
    });

    $('#form-edit').on('submit', function(e) {
        e.preventDefault();

        $.post('modules/virus/crud.php', $(this).serialize(), function(res) {
            if (res.success) {
                $('#modal-edit').modal('hide');
                $('#form-edit').trigger('reset');
                location.reload();
            } else {
                alert('Tidak dapat menyimpan virus.');
            }
        });
    });

    function edit(virus) {
        var form = $('#form-edit');
        form.find('input[name=kd_virus]').val(virus.kd_virus);
        form.find('input[name=nama_virus]').val(virus.nama_virus);
        form.find('textarea[name=keterangan]').val(virus.keterangan);
        form.find('textarea[name=solusi]').val(virus.solusi);
        $('#modal-edit .modal-title').text(`Ubah Virus #${virus.kd_virus}`);
        $('#modal-edit').modal('show');
    }

    function hapus(kd_virus) {
        var c = confirm(`Apakah Anda yakin ingin menghapus virus "${kd_virus}"?`);
        if (c) {
            $.post('modules/virus/crud.php', {
                action: 'delete',
                kd_virus: kd_virus
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