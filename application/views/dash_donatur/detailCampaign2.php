<?php $this->load->view('homepage/header'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/dashAssets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body> <br>
    <section class="">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo base_url().$data[0]->foto; ?>" alt="AdminBSB - Profile Image" style="width: 150px; height: 150px" />
                            </div>
                            <div class="content-area">
                                <h4><?php echo $data[0]->nama; ?></h4>
                                <!-- <p>Web Software Developer</p> -->
                                <p> <font size="2">Volunteer</font></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Jenis Kelamin</span>
                                    <span><font size="2"><?php echo $data[0]->jenis_kelamin; ?></font></span>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <span><font size="2"><?php echo $data[0]->email; ?></font></span>
                                </li>
                                <!-- <li>
                                    <span>Alamat</span>
                                    <span><font size="2"><?php echo $data[0]->alamat; ?></font></span>
                                </li> -->
                            </ul>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h2 style="margin-left: 5%">Cerita</h2> 
                                                <section>
                                                    <fieldset>
                                                        <div class="panel-body">
                                                            <div class="post">
                                                                <div class="post-heading">
                                                                </div>
                                                                <div class="post-content">
                                                                    <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->deskripsi_campaign; ?></p>
                                                                    <br>
                                                                    <center>
                                                                    <img src="<?php echo base_url().$data[0]->gambar; ?>" class="img-responsive" style="width: 80%; height: auto; border-radius: 50px" />
                                                                            </center>
                                                                            <br>
                                                                    <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->ajakan_campaign; ?></p>
                                                                    <br><br><br>

                                                                    <h2 style="margin-left: 5%">Barang Yang Dibutuhkan</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </section>
                                    
                                        <div class="body"> 
                                            <p style="margin-left: 5%">Berikut adalah list Barang yang dibutuhkan : </p> 
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
                                                            <td><?php echo $data2->nama_kategori_barang; ?></td>
                                                            <td><?php echo $data2->jumlah; ?></td>
                                                            <td><?php echo $data2->satuan_barang; ?></td>
                                                        </tr>
                                                   
                                                <?php } ?>
                                                    </table>
                                            <br><br>

                                            <h2 style="margin-left: 5%">Barang Yang Terkumpul</h2>
                                            <p style="margin-left: 5%">Berikut adalah list Barang yang sudah terkumpul : </p> 
                                                <table class="table" style="width: 90%; margin-left: 5%; border-radius: 5%">
                                                       <tr style="background-color: lightgrey">
                                                           <th>Nama Barang</th>
                                                           <th>Kategori Barang</th>
                                                           <th>Jumlah</th>
                                                           <th>Satuan</th>
                                                       </tr> 
                                                <?php foreach ($data3 as $data3) { ?>
                                                        <tr>
                                                            <td><?php echo $data3->nama_barang; ?></td>
                                                            <td><?php echo $data3->nama_kategori_barang; ?></td>
                                                            <td><?php echo $data3->jml; ?></td>
                                                            <td><?php echo $data3->satuan_barang; ?></td>
                                                        </tr>
                                                   
                                                <?php } ?>
                                                    </table>
                                            <br><br>

											<br><br>

											<!-- <h2 style="margin-left: 5%">Blockchain Transaction List</h2>
											<p style="margin-left: 5%">Berikut adalah list transaksi donasi : </p>
											<table class="table" style="width: 90%; margin-left: 5%; border-radius: 5%">
												<tr style="background-color: lightgrey">
													<th>ID Donasi</th>
													<th>Tanggal Donasi</th>
													<th>Message</th>
													<th>Timestamp</th>
													<th>Sender</th>
													<th>Recipient</th>
													<th>Namespace</th>
													<th>Mosaic</th>
													<th>Quantity</th>
													<th>Transaction Hash</th>
												</tr>
												<?php foreach ($dataBC as $dataBC) { ?>
													<tr>
														<td><?=$dataBC->id_donasi?></td>
														<td><?=$dataBC->tanggal_donasi?></td>
														<td><?=$dataBC->message?></td>
														<td><?=$dataBC->timeStamp?></td>
														<td><a target="_blank" href="https://testnet-explorer.nemtool.com/#/s_account?account=<?=$dataBC->sender?>"><?=substr($dataBC->sender, 0, 15)."..."?></a></td>
														<td><a target="_blank" href="https://testnet-explorer.nemtool.com/#/s_account?account=<?=$dataBC->recipient?>"><?=substr($dataBC->recipient, 0, 15)."..."?></a></td>
														<td><?=$dataBC->namespaceId?></td>
														<td><?=$dataBC->mosaicName?></td>
														<td><?=$dataBC->quantity?></td>
														<td><a target="_blank" href="https://testnet-explorer.nemtool.com/#/s_tx?hash=<?=$dataBC->txHash?>"><?=substr($dataBC->txHash, 0, 15)."..."?></a></td>
													</tr>
												<?php } ?>
											</table>
											<br><br> -->

                                            <p style="margin-left: 5%">
                                                <b style="color: black">
                                                Untuk Donasi, silahkan ikuti langkah berikut : <br>
                                                <br>
                                                1. Klik tombol "DONASI SEKARANG" <br>
                                                2. Masukkan data form dengan benar <br>
                                                3. Kemudian Klik Tombol "Donasi" <br></b>
                                                <br>
                                                Jangan lupa untuk <b style="color: black"> SHARE / SEBARKAN </b> informasi ini <br>
                                                kepada saudara , rekan dan teman teman anda di sosial media atau di sekitar rumah anda, semoga amal baik anda terus mengalir dan di terima Alloh swt . Aamiin
                                            </p>
                                        </div>
                                    
                                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/formDonasi/<?php echo $data[0]->id_campaign; ?>">
                                        <input type="hidden" name="id_campaign" value="<?php echo $data[0]->id_campaign; ?>">
                                        <input type="submit" name="submit" value="DONASI SEKARANG" class="btn btn" style="float: right; background-color: #ff5722; color: white">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    FORM WIZARD
                    <small>Taken from <a href="https://github.com/rstaib/jquery-steps" target="_blank">github.com/rstaib/jquery-steps</a> & <a href="https://jqueryvalidation.org/" target="_blank">jqueryvalidation.org</a></small>
                </h2> -->
            </div>
            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/examples/profile.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

    <!-- Sweetalert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>
<!-- <?php $this->load->view('homepage/footer'); ?> -->
