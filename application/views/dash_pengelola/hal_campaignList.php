<?php $this->load->view('dash_pengelola/head_foot/header'); ?>    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Campaign List</h2>
            </div>
            <div class="block-header">
                <div class="row clearfix">
                    <div class="form-line col-lg-4 col-md-4 col-sm-6 col-xs-12" style="width: 300px;">
                        <input type="text" id="cariCampaign" class="form-control" placeholder="Cari Campaign" style="width: 300px; background-color: #e9e9e9;" />
                    </div>
                    <div class="form-line col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <button class="btn bg-blue waves-effect" id="btnCari"><i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <!-- Basic Example -->
            <div class="row clearfix" id="campaignAll">
                <?php $no = 1; foreach ($campaign as $cp) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $cp->judul_campaign ?><small><?= $cp->kategori_campaign." - ".$cp->id_campaign ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>pengelola/C_pengelola/detailCampaign?id_campaign=<?=$cp->id_campaign?>">Detail</a></li>
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
                                        <img src="<?=base_url().$cp->gambar?>" />
                                        <div class="carousel-caption">
                                            <h3><?=$cp->judul_campaign?></h3>
                                            <?php
                                            $string = strip_tags($cp->ajakan_campaign);
                                            if (strlen($string) > 150) {

                                                // truncate string
                                                $stringCut = substr($string, 0, 150);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '... <a href="'.base_url().'pengelola/C_pengelola/detailCampaign?id_campaign='.$cp->id_campaign.'">Read More</a>';
                                            }
                                            ?>
                                            <p><?=$string?></p>
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
        <!-- <div class="pagging text-center"></div> -->
        <?=$pagination?>
    </section>

    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#btnCari").click(function(){
                if ($("#cariCampaign").val() !== "") {
                    $(this).html("<i class='material-icons'>search</i>Mencari...").attr("disabled", "disabled");
                    $(".pagging").hide();
                
                    $.ajax({
                        url: '<?=base_url()?>pengelola/C_campaign/cariCampaign',
                        type: 'POST',
                        data: {cariCampaign: $("#cariCampaign").val()},
                        dataType: "json",
                        beforeSend: function(e) {
                            if(e && e.overrideMimeType) {
                                e.overrideMimeType("application/json;charset=UTF-8");
                            }
                        },
                        success: function(response){ // Ketika proses pengiriman berhasil
                            $("#btnCari").html("<i class='material-icons'>search</i>").removeAttr("disabled");
                            $("#campaignAll").html(response.hasil);
                        },
                        error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                            alert(xhr.responseText);
                        }
                    });
                }
                else{
                   console.log("No Search Item") ;
                }
            });

        });
    </script>

    <?php $this->load->view('dash_pengelola/head_foot/footer'); ?>

    </body>

</html>

