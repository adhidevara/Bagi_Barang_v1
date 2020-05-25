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
            <section class="content">
                <div class="container-fluid">
                <?php foreach ($data2 as $da) { ?>
                        <div class="row">
                        <div class="text-center">
                            <h3>List Campaign Selesai</h3>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="header bg-red">
                                    <h3><a href="<?=base_url()?>penerima/C_penerima/VdetailCampaign?id_campaign=<?=$da->id_campaign?>" style="color: black;"><?=$da->judul_campaign?></a></h3>
                                </div>
                                <div class="body">
                                    <a href="<?=base_url()?>penerima/C_penerima/VdetailCampaign?id_campaign=<?=$da->id_campaign?>"><img class="img-responsive" src="<?=base_url().$da->gambar?>" style="width: 100%; height: 250px"></a>
                                        <p><?=$da->ajakan_campaign?></p>
                                        <p style="text-align: center;">
                                            <a href="<?=base_url()?>penerima/C_penerima/VdetailCampaign?id_campaign=<?=$da->id_campaign?>" class="btn btn-primary btn-sm">Detail Campaign</a>
                                        </p>
                                </div>
                            </div>
                            <br><div class="row"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </section>
    
<?php $this->load->view('dash_volunteer/head_foot/footer'); ?>