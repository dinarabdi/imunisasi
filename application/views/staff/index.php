<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message'); ?>
                        <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>

                        <?= $this->session->flashdata('message'); ?>
                        <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url() . 'staff/add/' ?>" title="Edit"><i class="fa fa-plus"></i> Tambah Users Baru</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Gambar</th>
                                    <th>Status Aktif</th>
                                    <th>Role</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($staff as $s) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $s['name']; ?></td>
                                        <td><?= $s['username']; ?></td>
                                        <td><img src="<?php echo base_url(); ?>uploads/users/<?= $s['image'] ?>" onerror="this.src='<?= base_url('assets/image/profile/default.png'); ?>';" alt="Missing Image" class="img-square img-responsive" width="100px" /></td>
                                        <td>
                                            <?php if ($s['is_active'] == '1') { ?>
                                                <label class="label label-primary">Aktif</label>
                                            <?php } else { ?>
                                                <label class="label label-warning">Tidak Aktif</label>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($s['role_id'] == '1') { ?>
                                                <label class="label label-danger">Admin</label>
                                            <?php } else { ?>
                                                <label class="label label-primary">User</label>
                                            <?php } ?>
                                        </td>
                                        <td><?= $s['date_created']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-xs" href="<?= base_url('staff/edit/') . $s['id']; ?>" title="Edit">
                                                <i class="fa fa-pencil"> Ubah</i>
                                            </a>
                                            <a onclick="deleteConfirm(' <?= base_url(); ?>staff/delete/<?= $s['id'] ?>')" href="#!" class="btn btn-danger btn-xs">
                                                <li class="fa fa-trash"> Hapus</li>
                                            </a>

                                        </td>
                                        <?php $i++; ?>
                                    </tr> <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /top tiles -->
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">Data yang dihapus tidak dapat dikembalikan?</div>
            <div class="modal-footer">
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>