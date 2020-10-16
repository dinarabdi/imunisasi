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
                        <a href="" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#newSubMenuModal"> Tambah Submenu baru</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Menu</th>
                                    <th>Link Url</th>
                                    <th>Icon</th>
                                    <th>Status Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td>
                                            <?php if ($sm['is_active'] == '1') { ?>
                                                <label class="label label-primary">Aktif</label>
                                            <?php } else { ?>
                                                <label class="label label-danger">Tidak Aktif</label>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit-data-<?php echo $sm['id'] ?>" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#newEditModal">
                                                <li class=" fa fa-pencil"> Ubah</li>
                                            </a>
                                            <a onclick="deleteConfirm(' <?= base_url(); ?>menu/hapusSubMenu/<?= $sm['id'] ?>')" href="#!" class="btn btn-danger btn-xs">
                                                <li class="fa fa-trash"> Hapus</li>
                                            </a>
                                        </td>


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
                                        <div class="modal fade" id="edit-data-<?php echo $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newEditModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newEditModalLabel">Ubah SubMenu</h5>
                                                    </div>
                                                    <form action="<?= base_url('menu/ubahSubMenu'); ?>" method="post">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <input name="id" type="hidden" value="<?= $sm['id']; ?>">
                                                                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title" value="<?= $sm['title']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="menu_id" id="menu_id" class="form-control">
                                                                    <?php foreach ($menu as $m) : ?>
                                                                        <option value="<?= $m['id']; ?>"
                                                                            <?php if ($sm['menu_id'] == $m['id']) {
                                                                                echo "selected";
                                                                                } ?>><?= $m['menu']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url" value="<?= $sm['url']; ?>">
                                                            </div>
                                                            <div class=" form-group">
                                                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon" value="<?= $sm['icon']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" value="1" name="is_active" id="is_active" checked>Aktif?</label>
                                                                </div>
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

                                        <!-- Modal add-->
                                        <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Submenu Baru</h5>
                                                    </div>
                                                    <form action="<?= base_url('menu/tambahSubMenu'); ?>" method="post">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="title" name="title" placeholder="Nama Submenu">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="menu_id" id="menu_id" class="form-control">
                                                                    <option value="">Select Menu</option>
                                                                    <?php foreach ($menu as $m) : ?>
                                                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" value="1" name="is_active" id="is_active" checked>Aktif?</label>
                                                                </div>
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

                                        <?php $i++; ?>
                                    </tr> <?php endforeach; ?>
                            </tbody>
                        </table>


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