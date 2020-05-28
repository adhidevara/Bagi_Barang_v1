<?php $this->load->view('dash_volunteer/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php if ($this->session->userdata('foto') == "") { ?>
                                    <img src="<<?php echo base_url().$this->session->userdata('foto'); ?>" alt="AdminBSB - Profile Image" />
                                <?php } else { ?>
                                    <img src="<?php echo base_url().$this->session->userdata('foto'); ?>" alt="AdminBSB - Profile Image" style="width: 150px; height: 150px" />
                                <?php } ?>
                            </div>
                            <div class="content-area">
                                <h3><?php echo $this->session->userdata('nama'); ?></h3>
                                <p><?php echo $this->session->userdata('id_volunteer'); ?></p>
                                <p>VOLUNTEER</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php if ($data[0]->status == 1) { ?>
                                        <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <?php } else { ?>
                                        <li role="presentation" class="active"><a href="" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                        <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                    <?php } ?>
                                </ul>

                                <div class="tab-content">
                                    <?php if ($data[0]->status == 1) { ?>
                                        <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>penerima/C_penerima/prosesIsiData" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Name Surname" value="<?php echo $this->session->userdata('nama'); ?>" required disabled>
                                                        <input type="hidden" name="nama" id="nama" value="<?php echo $this->session->userdata('nama'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>" required disabled>
                                                        <input type="hidden" name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text" class="col-sm-2 control-label">Nomor KTP</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="noKtp" name="noKtp" placeholder="Masukkan Nomor KTP">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="text" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <input type="radio" name="gender" id="male" class="with-gap" value="laki - laki ">
                                                <label for="male">Laki - laki</label>

                                                <input type="radio" name="gender" id="female" class="with-gap" value="perempuan">
                                                <label for="female" class="m-l-20">Perempuan</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="text" class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text" class="col-sm-2 control-label">No Telepon</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="noTlp" name="noTlp" placeholder="0821333491843">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="file" class="col-sm-2 control-label">Foto</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                        <input type="file" class="btn btn-danger waves-effect" name="foto" placeholder="masukkan foto">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } else {?>
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="<?php echo $this->session->userdata('foto'); ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#"><?php echo $this->session->userdata('email'); ?></a>
                                                        </h4>
                                                        Shared publicly - 26 Oct 2018
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <img src="<?php echo base_url(); ?>assets/dashAssets/images/profile-post-image.jpg" class="img-responsive" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>12 Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>5 Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="<?php echo base_url(); ?>assets/dashAssets/images/user-lg.jpg" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#"><?php echo $this->session->userdata('nama'); ?></a>
                                                        </h4>
                                                        Shared publicly - 01 Oct 2018
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                    <div class="post-content">
                                                        <iframe width="100%" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>125 Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">comment</i>
                                                            <span>8 Comments</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form id="1" class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>penerima/C_penerima/ubahBiodata">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Name Surname" value="<?php echo $this->session->userdata('nama'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Alamat</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">No KTP</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" id="noKtp" name="noKtp" placeholder="No KTP">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text" class="col-sm-2 control-label">Jenis Kelamin</label>

                                                <div class="col-sm-10" style="padding-top: 5px">
                                                <input type="radio" name="gender" id="male" class="with-gap" value="laki - laki ">
                                                <label for="male">Laki - laki</label>

                                                <input type="radio" name="gender" id="female" class="with-gap" value="perempuan">
                                                <label for="female" class="m-l-20">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">No Telepon</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" id="noTlp" name="noTlp" placeholder="0821235290788">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Foto</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form id="2" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>penerima/C_penerima/ubahPassword">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('dash_volunteer/head_foot/footer'); ?>