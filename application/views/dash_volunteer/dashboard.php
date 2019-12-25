<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Campaign selesai </div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Campaign berjalan</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Total barang donasi</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Donatur</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fh5co-blog-section" class="fh5co-section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                        <h3>Campaign yang Sedang Berjalan</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-bottom-padded-md">
                        <?php foreach ($data2 as $da) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="fh5co-blog animate-box">
                                <a href=""><img class="img-responsive" src="<?=base_url().$da->gambar?>" style="width: 100%; height: 250px"></a>
                                <div class="blog-text">
                                    <div class="prod-title">
                                        <h3><a href="" style="color: black;"><?=$da->judul_campaign?></a></h3>
                                        <span class="comment"><small>Sisa Hari</small></span><br>
                                        
                                        <font style="color: orange; size: 5px"><?=$da->sisa?> Hari</font> 
                                            <div class="progress" style="background-color: lightgrey">

                                               <div class="progress-bar bg-orange progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                    style=" width: <?=$da->hsl?>%; background-color: orange">
                                                    <small style="color: white;margin-bottom: 5px;"><?=$da->hsl?>%&nbsp;(Sisa&nbsp;<?php echo $da->sisa; ?>&nbsp;Hari)</small>
                                               </div>
                                               
                                           </div>

                                        <p style="text-align: center;">
                                            <a href="<?=base_url()?>penerima/C_penerima/detailCampaign?id_campaign=<?=$da->id_campaign?>" class="btn btn-primary btn-sm">Detail Campaign</a>
                                        </p>
                                    </div>
                                </div> 
                            </div>
                        </div>              
                    <div class="clearfix visible-md-block"></div>
                    <?php } ?>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center animate-box">
                        <a href="#" class="btn btn-primary btn-lg">Lebih Banyak</a>
                    </div>
                </div> -->
            </div>
        </div>
        </div>
    </section>
<?php $this->load->view('dash_volunteer/head_foot/footer'); ?>