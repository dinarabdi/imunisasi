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
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-xs-12">
                                    <div class="left col-xs-7">
                                        <h2><?= $user['name']; ?></h2>
                                        <p><strong></p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-user"></i> <?= $user['username']; ?> </li>
                                            <li><i class="fa fa-calendar"></i> <?= $user['date_created']; ?> </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="<?php echo base_url(); ?>uploads/users/<?= $user['image'] ?>" onerror="this.src='<?= base_url('assets/image/profile/default.png'); ?>';" alt="Missing Image" class="img-circle img-responsive" width="100px" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>