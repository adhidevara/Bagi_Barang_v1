<?php $this->load->view('dash_pengelola/head_foot/header'); ?>    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BERBAGI BARANG</h2>
            </div>
            <!-- Custom Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CAMPAIGN DETAIL
                                <!-- <small>With a bit of extra markup, it's possible to add any kind of HTML content like headings, paragraphs, or buttons into thumbnails.</small> -->
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?=base_url().$data[0]->gambar?>">
                                        <div class="caption">
                                            <h3><?=$data[0]->judul_campaign?></h3>
                                            <p>
                                                <?=$data[0]->deskripsi_campaign?>
                                            </p>
                                            <p>
                                                <a href="<?=base_url()?>pengelola/C_pengelola/listBarang?id_campaign=<?=$data[0]->id_campaign?>" class="btn btn-success waves-effect" role="button">VIEW BARANG DONASI</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                <b>Information</b>
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1">
                                                        Tanggal Campaign Di Buat
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_1">
                                                <div class="panel-body">
                                                    <?=$data[0]->tanggal_campaign?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading" role="tab" id="headingTwo_1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
                                                       aria-controls="collapseTwo_1">
                                                        Batas Campaign Berakhir
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                                                <div class="panel-body">
                                                    <?=$data[0]->batas_campaign?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-warning">
                                            <div class="panel-heading" role="tab" id="headingThree_1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false"
                                                       aria-controls="collapseThree_1">
                                                        Kategori Campaign
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
                                                <div class="panel-body">
                                                    <?=$data[0]->kategori_campaign?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                <b style="color: white;">Information</b>
                                    <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-success">
                                            <div class="panel-heading" role="tab" id="headingOne_2">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseOne_2" aria-expanded="false" aria-controls="collapseOne_1">
                                                        Ajakan Campaign
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_2">
                                                <div class="panel-body">
                                                    <?=$data[0]->ajakan_campaign?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-warning">
                                            <div class="panel-heading" role="tab" id="headingTwo_2">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseTwo_2" aria-expanded="false"
                                                       aria-controls="collapseTwo_2">
                                                        Keterangan Campaign
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_2">
                                                <div class="panel-body">
                                                    <?=$data[0]->keterangan?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading" role="tab" id="headingThree_2">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseThree_2" aria-expanded="false"
                                                       aria-controls="collapseThree_2">
                                                        Campaign Creator
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_2">
                                                <div class="panel-body">
                                                    <?=$data[0]->id_volunteer?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Custom Content -->
        </div>
    </section>

    <?php $this->load->view('dash_pengelola/head_foot/footer'); ?>