<?php $this->load->view('dash_volunteer/head_foot/header'); ?>
 
<section class="content">
        <div class="container-fluid">
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Detail Campaign <?php echo $data1[0]->judul_campaign; ?>
                            </h2>
                        </div>
                        <div class="body">
                            <section>
                                <fieldset>
                                    <div class="panel-body">
                                        <div class="post">
                                            <div class="post-content">
                                                <p style="font-size: 20px;padding-left: 50px;padding-right: 50px"><?php echo $data1[0]->deskripsi_campaign; ?></p>
                                                <br>
                                                <center>
                                                    <img src="<?php echo base_url().$data1[0]->gambar; ?>" class="img-responsive" style="width: 80%; height: auto; border-radius: 50px" />
                                                </center>
                                                <br><br><br>
                                                    <p style="font-size: 20px;padding-left: 50px;padding-right: 50px"><?php echo $data1[0]->ajakan_campaign; ?></p>
                                                <br><br><br>
                                                <h2 style="margin-left: 5%">Barang Yang Dibutuhkan</h2>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </section>

                            <div class="body"> 
                                <p style="font-size: 20px; margin-left: 5%">Berikut adalah list Barang yang dibutuhkan : </p> 
                                    <table class="table" style="width: 90%; margin-left: 5%; border-radius: 5%">
                                        <tr style="background-color: lightgrey">
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                        </tr> 
                                        <?php foreach ($data2 as $data2) { ?>
                                        <tr>
                                            <td><?php echo $data2->nama_barang; ?></td>
                                            <td><?php echo $data2->kategori_barang; ?></td>
                                            <td><?php echo $data2->jumlah; ?></td>
                                            <td><?php echo $data2->satuan_barang; ?></td>
                                        </tr>                       
                                        <?php } ?>
                                    </table>
                                <br><br>
                            </div>
                            
                            <h2 style="margin-left: 5%">Barang Yang Terkumpul</h2> 
                            
                            <div class="body"> 
                                <p style="font-size: 20px; margin-left: 5%">Berikut adalah list Barang yang telah terkumpul : </p> 
                                    <table class="table" style="width: 90%; margin-left: 5%; border-radius: 5%">
                                        <tr style="background-color: lightgrey">
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                        </tr>                           
                                        <?php foreach ($data3 as $dt3) { ?>
                                        <tr>
                                            <td><?php echo $dt3->nama_barang; ?></td>
                                            <td><?php echo $dt3->kategori_barang; ?></td>
                                            <td><?php echo $dt3->jumlah_barang; ?></td>
                                            <td><?php echo $dt3->satuan_barang; ?></td>
                                        </tr>           
                                        <?php } ?>
                                        <?php foreach ($data4 as $dt4) { ?>
                                        <tr style="background-color: lightgrey">
                                            <th></th>
                                            <th>Total</th>
                                            <td><?php echo $dt4->Total; ?></td>
                                            <th></th>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Example -->
        </div>
    </section>
   
  
<?php $this->load->view('dash_volunteer/head_foot/footer'); ?>