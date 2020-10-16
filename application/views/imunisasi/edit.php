 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>
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



                        <form role="form" data-parsley-validate="" class="form-horizontal form-label-left" action="<?php echo base_url() ?>master/edit_process_imunisasi" method="post">
                       
                            <input type="hidden" name="id_imunisasi" value="<?=$detail['id_imunisasi']?>">
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Nama / No RM <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_bayi" class="select2_single form-control" required="required">
                                      <option></option>
                                      <?php foreach ($bayi as $b) : ?>
                                        <option value="<?= $b['id_bayi']; ?>"><?= $b['no_rm']; ?> - <?= $b['nama']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Berat Badan <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="berat_badan" val name="berat_badan" class="form-control col-md-7 col-xs-12" value="<?= $detail['berat_badan'] ?>">
                                </div>
                            </div> 

                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tinggi Badan <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="tinggi_badan" val name="tinggi_badan" class="form-control col-md-7 col-xs-12" value="<?= $detail['tinggi_badan'] ?>">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Suhu Badan <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="suhu_badan" val name="suhu_badan" class="form-control col-md-7 col-xs-12" value="<?= $detail['suhu_badan'] ?>">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Jenis Imunisasi <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="jenis_imunisasi" val name="jenis_imunisasi" class="form-control col-md-7 col-xs-12" value="<?= $detail['jenis_imunisasi'] ?>">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tanggal Imunisasi <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="tanggal_imunisasi" val name="tanggal_imunisasi" class="form-control col-md-7 col-xs-12" value="<?= $detail['tanggal_imunisasi'] ?>">
                                </div>
                            </div> 

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Simpan</button>
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



<!-- <script type="text/javascript">
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            document.getElementById("submit").disabled = false;
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            document.getElementById("submit").disabled = true;
        }
    });
</script> -->