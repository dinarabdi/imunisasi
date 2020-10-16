<style type="text/css" media="print">
     body {visibility:hidden;}
    .print {visibility:visible;}
    .hiddenprint {visibility:hidden;}
  }
</style>
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
                <div class="x_panel print">
                    <div class="x_content" >
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
                        <a  class="btn btn-primary btn-sm hiddenprint" href="<?php echo base_url() . 'master/add_vitamin/' ?>" title="Add"><i class="fa fa-plus"></i> Tambah Data Vitamin</a>

                          <div class="row">
                              <div class="col-md-2 offset-2">
                                <?php echo $this->session->flashdata('notif') ?>
                                <form method="POST" action="<?php echo base_url();?>master/search_process_vitamin/">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Search</label>
                                     <input type="text" class="form-control" name="nama" placeholder="No RM/Nama Bayi" value="<?=$nama?>">
                                  </div>
                                 <button type="submit" class="btn btn-sm btn-warning" value="show" name="submit"><i class="fa fa-search"></i> Search</button> 
                                 <button type="submit" class="btn btn-sm btn-danger" value="reset" name="submit"><i class="fa fa-dot-circle-o"></i> Reset</button>
                                 <a onclick="window.print();return false;" type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> print</a>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th >#Nomor</th>
                                    <th>No RM</th>
                                    <th>Nama Bayi</th>
                                    <th>Jenis Vitamin</th>
                                    <th>tanggal imunisasi</th>
                                    <th>Petugas</th>
                                    <th class="hiddenprint">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($vitamin as $v) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $v['no_rm']; ?></td>
                                        <td><?= $v['nama']; ?></td>
                                        <td><?= $v['jenis_vitamin']; ?></td>
                                        <td><?= $v['tanggal']; ?></td>
                                        <td><?= $v['name']; ?></td>
                                        <td class="hiddenprint">
                                            <a type="button" class="btn btn-warning btn-xs hiddenprint" href="<?= base_url('master/edit_vitamin/') . $v['id_vitamin']; ?>" title="Edit">
                                                <i class="fa fa-pencil"> Ubah</i>
                                            </a>
                                            <a onclick="deleteConfirm(' <?= base_url(); ?>master/delete_vitamin/<?= $v['id_vitamin'] ?>')" href="#!" class="btn btn-danger btn-xs hiddenprint">
                                                <li class="fa fa-trash"> Hapus</li>
                                            </a>
                                        </td>
                                        <?php $i++; ?>
                                    </tr> <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                   <?= $this->pagination->create_links(); ?>
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

<script type="text/javascript">
    function PrintElem()
    {
        var mywindow = window.open('', 'PRINT', 'height=700,width=900');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById("cetak_laporan").innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
    
    }
</script>