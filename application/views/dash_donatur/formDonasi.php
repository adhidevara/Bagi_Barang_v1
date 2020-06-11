<?php $this->load->view('homepage/header'); ?>
<br>
<body style="background-color: lightgrey">
    <div class="col-md-8 col-md-offset-2 text-left " style="background-color: white; width: 40%;margin-left: 10%; border-radius: 5px"> <br>
        <h3 style="margin-left: 10%;">Formulir Penonasian</h3>
        <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/prosesFormDonasi/<?php echo $id_campaign ?>">
            <div class="row clearfix" style="width: 100%; padding-left: 10%;padding-right: 5%">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            Nama Lengkap<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Email<input type="text" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Kategori Barang <small style="color: red">*</small>
                            <select class="form-control" name="kategori_barang" required="">
                                <option value="0">--- Pilih Kategori Barang ---</option>
                                <?php foreach ($kategori as $kt) { ?>
                                    <option value="<?php echo $kt->id_kategori_barang ?>"><?php echo $kt->nama_kategori_barang;  ?></option>
                                <?php } ?>
                                <!-- <option value="sembako">Sembako</option>
                                <option value="Obat-obatan">Obat-obatan</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="sembako">Sembako</option>
                                <option value="sembako">Lainnya</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Nama Barang <small style="color: red">*</small>
                            <input type="text" class="form-control" name="nama_barang" placeholder="contoh : Pakaian" required="" />

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Jumlah Barang <small style="color: red">*</small>
                            <input type="number" class="form-control" name="jumlah_barang" placeholder="contoh : 100 " required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Satuan Barang <small style="color: red">*</small>
                            <input type="text" class="form-control" name="satuan_barang" placeholder="contoh : pcs, pack, box dll" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Catatan<textarea class="form-control" placeholder="contoh : 10 Pcs (6 Pakaian Dewasa, 4 pakaian anak2)" name="catatan_barang"></textarea>
                        </div>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Donasi" style="float: right;"> &nbsp;
                    </form>
                
                        <?php 
                            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
                        ?>
                        <a href="<?=$url?>" class="btn btn-primary btn-sm" style="float:right; margin-right: 10px">Kembali</a>

                </div>
            </div><br><br>


    </div>
    <div class="col-md-8 col-md-offset-2 text-left " style="background-color: white; width: 40%; margin-left: 2%; height: auto; border-radius: 5px"> <br>
        <center> <h3><?php echo $data[0]->judul_campaign ?></h3></center>
        <img class="img-responsive" src="<?php echo base_url().$data[0]->gambar; ?>" style="width: 100%; height: auto; border-radius: 10px"> <br>
        <?php echo $data[0]->deskripsi_campaign; ?>
       <br> <br>
       <h4>Barang yang dibutuhkan :  </h4>
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
        <p>Jangan lupa untuk SHARE / SEBARKAN informasi ini
           kepada saudara , rekan dan teman teman anda di sosial media atau di sekitar rumah anda, semoga amal baik anda terus mengalir dan di terima Alloh swt . Aamiin</p>
    </div>
          
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



