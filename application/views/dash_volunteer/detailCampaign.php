<?php $this->load->view('dash_volunteer/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Detail Campaign</h2>
            </div>
            <div class="row clearfix">
                <!-- Basic Examples -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?=$data_camp[0]->judul_campaign?>
                                <small><?=$data_camp[0]->deskripsi_campaign?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                                <li><img src="<?= base_url().$data_camp[0]->gambar?>" style="width: 500px; height: 400px"></li>
                                <?php foreach ($data_don as $don) { ?>
                                <li class="list-group-item"><?=$don->id_donatur?></li>
                                <li class="list-group-item"><?=$don->kategori_barang?></li>
                                <li class="list-group-item"><?=$don->nama_barang?></li>
                                <li class="list-group-item"><?=$don->jumlah_barang?></li>
                            </ul>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Examples -->
        </div>
    </section>

<?php $this->load->view('dash_volunteer/head_foot/footer'); ?>