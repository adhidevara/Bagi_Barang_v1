<?php $this->load->view('dash_pengelola/head_foot/header'); ?>    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Campaign List</h2>
            </div>
            <div class="block-header">
                <!-- <div class="form-group"> -->
                    <div class="form-line" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Cari Campaign" style="width: 300px; background-color: #e9e9e9;" />
                    </div>
                <!-- </div> -->
            </div>
            <!-- Basic Example -->
            <div class="row clearfix">
                <?php $no = 1; foreach ($campaign as $cp) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $cp->judul_campaign ?><small><?= $cp->kategori_campaign ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Detail</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" style="height: 330px;">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <!-- <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="2"></li> -->
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <!-- <div class="item active">
                                        <img src="<?=base_url()?>assets/dashAssets/images/image-gallery/10.jpg" />
                                        <div class="carousel-caption">
                                            <h3><?=$cp->judul_campaign?></h3>
                                            <p><?=$cp->ajakan_campaign?></p>
                                        </div>
                                    </div> -->
                                    <!-- <div class="item">
                                        <img src="<?=base_url()?>assets/dashAssets/images/image-gallery/12.jpg" />
                                        <div class="carousel-caption">
                                            <h3><?=$cp->judul_campaign?></h3>
                                            <p><?=$cp->ajakan_campaign?></p>
                                        </div>
                                    </div> -->
                                    <div class="item active">
                                        <img src="<?=base_url()?>assets/dashAssets/images/image-gallery/19.jpg" />
                                        <div class="carousel-caption">
                                            <h3><?=$cp->judul_campaign?></h3>
                                            <p><?=$cp->ajakan_campaign?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- #END# Basic Example -->
        </div>
    </section>

    <?php $this->load->view('dash_pengelola/head_foot/footer'); ?>

    </body>

</html>