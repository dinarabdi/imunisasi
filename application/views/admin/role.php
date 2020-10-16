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
            <div class=" col-md-5 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#newRoleModal"> Tambah Role Baru</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-success btn-xs">
                                                <li class="fa fa-pencil"> Akses</li>
                                            </a>
                                            <a data-toggle="modal" data-target="#edit-data-<?php echo $r['id'] ?>" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#newEditModal">
                                                <li class="fa fa-pencil"> Ubah</li>
                                            </a>
                                            <a onclick="deleteConfirm(' <?= base_url(); ?>admin/deleteDataRole/<?= $r['id'] ?>')" href="#!" class="btn btn-danger btn-xs">
                                                <li class="fa fa-trash"> Hapus</li>
                                        </td>


                                        <!-- Modal -->
                                        <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('admin/addRole'); ?>" method="post">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="Submit" class="btn btn-primary">Tambah </button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan?</div>
                                                    <div class="modal-footer">
                                                        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="edit-data-<?php echo $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newEditModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newEditModalLabel">Ubah Role</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('admin/updateDataRole'); ?>" method="post">
                                                        <div class="modal-body">
                                                            <input name="id" type="hidden" value="<?= $r['id']; ?>">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="role" name="role" placeholder="Role" value="<?= $r['role']; ?>">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="Submit" class="btn btn-primary">Ubah </button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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




<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>