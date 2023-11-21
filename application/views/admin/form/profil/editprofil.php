  <!-- page content -->
  <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Management Profil Admin</h3>
                        </div> 

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Edit Profil</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" method="post" action="<?php echo site_url('admin/edit');?>" novalidate>
                                    <?php foreach($admin as $val){ ?>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> Username <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="username" value="<?php echo $val->username;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> Email Aktif <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="emailaktif" value="<?php echo $val->emailaktif;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> passsword <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="admin_password" value="<?php echo $val->admin_password;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> Nama Lengkap <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="admin_namalengkap"  value="<?php echo $val->admin_namalengkap;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> Tanggal Lahir <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="date" class="form-control" placeholder="" name="tgllhr"  value="<?php echo $val->tgllhr;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> Alamat <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="alamat"  value="<?php echo $val->alamat;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"> No Telephone <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" placeholder="" name="notlp"  value="<?php echo $val->notlp;?>" required="required" data-validation-required-message="Please enter your username" />
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->