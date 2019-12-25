<?php $this->load->view('homepage/header'); ?>
<br>
<body style="background-color: lightgrey">
    <div class="col-md-8 col-md-offset-2 text-left " style="background-color: white; width: 70%;"> <br>
        <h3>Formulir Penonasian</h3>
        <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/prosesFormDonasi/<?php echo $id_campaign ?>">
            <div class="row clearfix" style="width: 70%; padding-left: 30%">
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
                            <select class="form-control" name="kategori_barang">
                                <option value="0">--- Pilih Kategori Barang ---</option>
                                <option value="sembako">Sembako</option>
                                <option value="Obat-obatan">Obat-obatan</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="sembako">Sembako</option>
                                <option value="sembako">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Nama Barang <small style="color: red">*</small>
                            <input type="text" class="form-control" name="nama_barang" placeholder="contoh : Pakaian" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Jumlah Barang <small style="color: red">*</small>
                            <input type="number" class="form-control" name="jumlah_barang" placeholder="contoh : 100 "  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Satuan Barang <small style="color: red">*</small>
                            <input type="text" class="form-control" name="satuan_barang" placeholder="contoh : pcs, pack, box dll" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            Catatan<textarea class="form-control" placeholder="contoh : 10 Pcs (6 Pakaian Dewasa, 4 pakaian anak2)" name="catatan_barang"></textarea>
                        </div>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Simpan" style="float: right;"> &nbsp;
                    </form>
                
                        <?php 
                            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
                        ?>
                        <a href="<?=$url?>" class="btn btn-primary btn-sm" style="float:right; margin-right: 10px">Kembali</a>

                </div>
            </div><br><br>
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



