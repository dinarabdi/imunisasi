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
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <?= $this->session->flashdata('message'); ?>
                        <h5>Role : <?= $role['role']; ?></h5>
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                            </div>
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