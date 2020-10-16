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
                        <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $error; ?>
                            </div>
                        <?php }
                        $success = $this->session->flashdata('success');
                        if ($success) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $success; ?>
                            </div>
                        <?php } ?>



                        <form role="form" data-parsley-validate="" class="form-horizontal form-label-left" action="<?php echo base_url() ?>user/edit_process" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="username" val name="username" class="form-control col-md-7 col-xs-12" value="<?= $user['username']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" value="<?= $user['name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Gambar <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url(); ?>uploads/users/<?= $user['image'] ?>" onerror="this.src='<?= base_url('assets/image/profile/default.png'); ?>';" alt="Missing Image" width="100px" />
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 style="color: red" class="">*Kosongkan password jika tidak ingin diganti</h5>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="password" name="password" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Ulangi Password <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="confirm_password" name="confirm_password" class="form-control col-md-7 col-xs-12">
                                </div>
                                <span id='message'></span>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md ">
                                        <li class="fa fa-paper-plane"> Simpan</li>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /top tiles -->
</div>

<script type="text/javascript">
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            document.getElementById("submit").disabled = false;
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            document.getElementById("submit").disabled = true;
        }
    });
</script>