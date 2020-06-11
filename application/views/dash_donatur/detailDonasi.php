<?php $this->load->view('homepage/header'); ?>
<br>
<body style="background-color: lightgrey">
    <div class="col-md-8 col-md-offset-2 text-left " style="background-color: white; width: 70%;"> <br>
        <h3>Detail Pendonasian</h3>
        
        <table style="width: 100%">
            <tr>
                <td style="color: black">Id Campaign</td>
                <td colspan="3"> : <?php echo $data[0]->id_campaign ?></td>
                <td align="Right" style="color: black">Id Barang :</td>
                <td align="Right"><?php echo $data[0]->id_barang ?></td>
            </tr>
            <tr>
                <td style="color: black">Id Donatur</td>
                <td colspan="5"> : <?php echo $this->session->userdata('id_donatur'); ?></td>
            </tr>
        </table>
        <br>
        <table border="1" style="width: 100%">
            <tr style="background-color: lightgrey;">
                <th align="center" style="text-align: center;color: black">Kategori Barang</td>
                <th style="text-align: center; color: black">Nama Barang</th>
                <th style="text-align: center; color: black">Jumlah Barang</th>
                <th style="text-align: center; color: black">Satuan Barang</th>
                <th style="text-align: center; color: black">Catatan</th>
                <th style="padding: 10px;text-align: center; color: black">Resi</th>
                <th style="color: black;text-align: center;">Aksi</th>
            </tr>
            <tr style="text-align: center;">
                <td style="padding: 5px;"><?php echo $data[0]->nama_kategori_barang ?></td>
                <td><?php echo $data[0]->nama_barang ?></td>
                <td><?php echo $data[0]->jumlah_barang ?></td>
                <td><?php echo $data[0]->satuan_barang ?></td>
                <td><?php echo $data[0]->catatan_barang ?></td>
                <td><?php if($data[0]->resi == null){ echo 'Inputkan nomor resi'; }else{ echo $data[0]->resi; } ?></td>
                <td> 
                    <?php if ($data[0]->resi == null) {
                        echo ' - ';
                    }else{?>
                    <?php if ($data[0]->status == "Di Terima (Warehouse)") { ?>
                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/trackingBarang">
                        <input type="hidden" name="id_campaign" value="<?php echo $data[0]->id_campaign; ?>">
                        <input type="submit" name="submit" value="Lacak" class="btn btn-warning btn-xs">
                    </form>
                    <?php } else { ?>
                    <input type="submit" name="submit" value="Lacak" class="btn btn-warning btn-xs" disabled>
                    <?php } ?>
                <?php } ?>
            </tr>
        </table>
        <br>
        <small>Catatan : <br> Jika tombol lacak belum muncul / tidak dapat di akses pada kolom aksi, barang yang anda kirim belum sampai ke pengelola & pengelola belum mengirimkan barang ke penerima donasi.</small> <br> <br>
        <br>
        <a href="<?php echo base_url(); ?>donatur/C_donatur/donasiSaya" class="btn btn-primary btn-sm">Kembali</a>
        <br><br>
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
                            <p><b>@ 2020 Bagi Barang</b><br><small>BagiBarang adalah merek dagang dari PT Bagi Barang yang sudah terdaftar di Republik Indonesia.</small></p>
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



