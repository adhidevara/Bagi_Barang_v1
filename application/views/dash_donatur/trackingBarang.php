<?php $this->load->view('homepage/header'); ?>
<br>
<body style="background-color: lightgrey">
    <div class="col-md-8 col-md-offset-2 text-left " style="background-color: white; width: 70%;"> <br>
        <h3>Tracking Barang</h3>

        <?php if (count($data)== 0) { ?>
            <table style="width: 100%" border="1">
                <tr style="color: black;background-color: lightgrey;text-align: center">
                    <td>No Resi</td>
                    <td>No Pengiriman </td>
                    <td>Tanggal Pengiriman </td>
                    <td>Asal</td>
                    <td>Tujuan</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="5">Data Tidak Ditemukan</td>
                </tr>
            </table>
            <br><br>
            <a href="<?php echo base_url(); ?>donatur/C_donatur/donasiSaya" class="btn btn-primary btn-sm">Kembali</a>
            <br><br>
        <?php }else{ ?>

        Kurir : <?php echo $data[0]->nama_kurir ?>
        <table style="width: 100%" border="1">
            <tr style="color: black;background-color: lightgrey;text-align: center">
                <td>No Resi</td>
                <td>No Pengiriman </td>
                <td>Tanggal Pengiriman </td>
                <td>Asal</td>
                <td>Tujuan</td>
            </tr>
            <tr style="text-align: center;">
                <td> <?php echo $data[0]->no_resi ?></td>
                <td> <?php echo $data[0]->id_paket ?></td>
                <td> <?php echo $data[0]->tanggal_pengiriman ?></td>
                <td> <?php echo $data[0]->asal ?></td>
                <td> <?php echo $data[0]->tujuan ?></td>
            </tr>
        </table>
        <br>

        <table border="1" style="width: 100%">
            <tr style="background-color: lightgrey;">
                <th colspan="2" style="color: black; padding-left: 100px">History</td>
            </tr>
            <tr style="text-align: center;">
                <td><?php echo $data[0]->tanggal_sortir ?></td>
                <td><?php if($data[0]->tanggal_sortir != null){ echo "Pengiriman diterima oleh ".$data[0]->nama_kurir." counter officer di [".$data[0]->asal."]"; }else{ echo '&nbsp;';} ?></td>
            </tr>

            <tr style="text-align: center;">
                <td><?php echo $data[0]->tanggal_sortir ?></td>
                <td><?php if($data[0]->tanggal_sortir != null){ echo "Pengiriman diambil oleh kurir ".$data[0]->nama_kurir." [".$data[0]->asal."]"; }else{ echo '&nbsp;';} ?></td>
            </tr>
            <tr style="text-align: center;">
                <td><?php echo $data[0]->tanggal_pengiriman ?></td>
                <td><?php if($data[0]->tanggal_pengiriman != null){ echo "Barang sedang dikirim oleh kurir ".$data[0]->nama_kurir." ke penerima [".$data[0]->tujuan."]"; }else{ echo '&nbsp;';} ?></td>
            </tr>

            <tr style="text-align: center;">
                <td><?php echo $data[0]->tanggal_diterima ?></td>
                <td><?php if($data[0]->tanggal_diterima != null){ echo "Barang telah sampai tujuan [".$data[0]->tujuan."]"; }else{ echo '&nbsp;';} ?></td>
            </tr>

        </table>
            <br><hr><br>

            <h3>Laporan Penerimaan Barang</h3>
            <table border="0" style="width: 100%">
                <tr>
                    <td>Id Laporan &nbsp;</td>
                    <td> : &nbsp;</td>
                    <td><?php echo $data2[0]->id_laporan ?></td>
                    <td rowspan="3"><img src="<?php echo base_url().$data2[0]->foto; ?>" alt="AdminBSB - Profile Image" style="width: 250px; height: 200px; border-top-left-radius: 50px;border-bottom-right-radius: 50px  " /></td>
                </tr>
                <tr>
                    <td>Tanggal Barang Di Terima &nbsp;</td>
                    <td> : &nbsp;</td>
                    <td><?php echo $data2[0]->tanggal_diacc ?></td>
                </tr>
                <tr>
                    <td>Link Video &nbsp;</td>
                    <td> : &nbsp;</td>
                    <td><?php echo $data2[0]->link_video ?></td>
                </tr>
            </table>

            <br><br><br>
            <a href="<?php echo base_url(); ?>donatur/C_donatur/donasiSaya" class="btn btn-primary btn-sm">Kembali</a>
            <br><br>
        <?php } ?>
    </div><br>



          
        <!-- fh5co-content-section -->
        <div id="fh5co-services-section">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </div>

        <!-- END What we do -->


        
        <!-- fh5co-blog-section -->
        <footer >
            <div id="footer" style="background-color: black">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <p class="fh5co-social-icons">
                                <a href="#"><i class="icon-twitter2"></i></a>
                                <a href="#"><i class="icon-facebook2"></i></a>
                                <a href="#"><i class="icon-instagram"></i></a>
                                <a href="#"><i class="icon-dribbble2"></i></a>
                                <a href="#"><i class="icon-youtube"></i></a>
                            </p>
                            <p>Copyright 2016 Free Html5 <a href="#">Charity</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    

    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <?php $this->load->view('homepage/footer'); ?>

    </body>
</html>



