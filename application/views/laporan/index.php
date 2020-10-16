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
                <div class="x_panel">
                    <div class="x_content print">
                         <div class="row">
                              <div class="col-md-2 offset-2">
                                <?php echo $this->session->flashdata('notif') ?>                                
                                 <a onclick="window.print();return false;" type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> print</a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                               <tr><th rowspan="2">No</th>
                                 <th rowspan="2">Bulan</th>
                                 <th rowspan="2">Sasaran Bayi</th>
                                 <th colspan="2">BCG</th>
                                 <th colspan="2">DPT-HB-Hib-1</th>
                                 <th colspan="2">Polio 2</th>
                                 <th colspan="2">Polio 3</th>
                                 <th colspan="2">Campak</th>
                                </tr>
                                <tr>
                                    <th>n</th>
                                    <th>%</th>  
                                    <th>n</th>
                                    <th>%</th>  
                                    <th>n</th>
                                    <th>%</th>  
                                    <th>n</th>
                                    <th>%</th>  
                                    <th>n</th>
                                    <th>%</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                     <td>1</td>
                                     <td>Januari</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>2</td>
                                     <td>Februari</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>3</td>
                                     <td>Maret</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>4</td>
                                     <td>April</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>5</td>
                                     <td>Mei</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>6</td>
                                     <td>Juni</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>7</td>
                                     <td>Juli</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>8</td>
                                     <td>Agustus</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>9</td>
                                     <td>September</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>10</td>
                                     <td>Oktober</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>11</td>
                                     <td>November</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                                <tr>
                                     <td>12</td>
                                     <td>Desember</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /top tiles -->
</div>

