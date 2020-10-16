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

                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#newMenuModal"> Tambah Menu Baru</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit-data-<?php echo $m['id'] ?>" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#newEditModal">
                                                <li class="fa fa-pencil"> Ubah</li>
                                            </a>
                                            <a onclick="deleteConfirm(' <?= base_url(); ?>menu/hapus/<?= $m['id'] ?>')" href="#!" class="btn btn-danger btn-xs">
                                                <li class="fa fa-trash"> Hapus</li>
                                            </a>
                                        </td>


                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="edit-data-<?php echo $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newEditModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newEditModalLabel">Ubah Menu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('menu/ubah'); ?>" method="post">
                                                        <div class="modal-body">
                                                            <input name="id" type="hidden" value="<?= $m['id']; ?>">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu" value="<?= $m['menu']; ?>">
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

                                        <!-- Modal add-->
                                        <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('menu/tambah'); ?>" method="post">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="Submit" class="btn btn-primary">Tambah </button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
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