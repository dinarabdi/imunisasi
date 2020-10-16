
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>

 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

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



                        <form role="form" data-parsley-validate="" class="form-horizontal form-label-left" action="<?php echo base_url() ?>master/add_process_imunisasi" method="post" enctype="multipart/form-data">


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
                                    <input type="number" min="0" id="berat_badan" val name="berat_badan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 

                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tinggi Badan <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="tinggi_badan" val name="tinggi_badan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Suhu Badan <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="suhu_badan" val name="suhu_badan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Jenis Imunisasi <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="jenis_imunisasi" val name="jenis_imunisasi" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tanggal Imunisasi <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="tanggal_imunisasi" val name="tanggal_imunisasi" class="form-control col-md-7 col-xs-12">
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



<script type="text/javascript">
function fileValidation(){
    var fileInput = document.getElementById('foto');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>