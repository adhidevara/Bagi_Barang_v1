<?php $this->load->view('dash_donatur/head_foot_Bank/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Virtual Account
                    <small>Taken from <a href="#">Bagi Barang.com</a></small>
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_validation" method="POST" action="<?= base_url() ?>pengelola/C_kelola_user/addPengelola" enctype="multipart/form-data">
                                <table style="width: 100%" >
                                    <tr>
                                        <td align="right">
                                            <div class="form-group form-float">
                                            <label class="form-label">No Rekening</label>
                                        </td>
                                        <td>
                                            <div class="" style="margin-left: 25px; width: 50%">
                                            <input type="text" class="form-control" name="rekening" required>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <div class="form-group form-float">
                                            <label class="form-label">Nominal </label>  
                                        </td>
                                        <td>
                                            <div class="" style="margin-left: 25px; width: 30%">
                                            <input placeholder="Rp." type="number" class="form-control" name="noVirtual" required>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <div class="form-group form-float">
                                            <label class="form-label">Berita</label>  
                                        </td>
                                        <td>
                                            <div class="" style="margin-left: 25px; width: 50%">
                                            <input type="text" class="form-control" name="noVirtual" required>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <div class="form-group form-float">
                                            <label class="form-label">PIN</label>  
                                        </td>
                                        <td>
                                            <div class="" style="margin-left: 25px; width: 50%">
                                            <input type="text" class="form-control" name="pin" required>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <br><div class="form-group">
                                            <input type="checkbox" id="checkbox" required>
                                            <label for="checkbox">I have read and accept the terms</label>
                                            </div>
                                            <button class="btn btn-primary waves-effect" type="submit">DAFTAR</button>
                                        </td>
                                    </tr>
                                </table>
                                
                                
                                <!-- <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Alamat Lengkap</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Upload Foto Profil</label>
                                    <div class="" style="margin-left: 25px;">
                                        <input type="file" name="foto" required>
                                    </div>
                                </div> -->
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>
<?php $this->load->view('dash_donatur/head_foot_Bank/footer'); ?>

