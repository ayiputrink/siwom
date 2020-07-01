<div id="header">
            <header class="clearfix">
                <!-- Branding -->
                <div class="branding">
                    <a class="brand" href="<?= base_url() ?>">
                        <span>SIWOM</span>
                    </a>
                    <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <!-- Branding end -->

                <!-- Left-side navigation -->
                <ul class="nav-left pull-left list-unstyled list-inline">
                    <li class="leftmenu-collapse">
                        <a role="button" tabindex="0" class="collapse-leftmenu">
                            <i class="fa fa-outdent"></i>
                        </a>
                    </li>
                   
                </ul>
                <!-- Left-side navigation end -->
                <!-- <div class="search" id="main-search">
                    <input type="text" class="form-control underline-input" placeholder="Explore Falcon...">
                </div> -->
                <!-- Search end -->

                <!-- Right-side navigation -->
                <ul class="nav-right pull-right list-inline">
                   
                    <?php if($this->session->userdata('user')->hak_akses != 'admin') { ?>
                    <li class="<?php if(isset($this->session->userdata('user')->id_jabatan)){echo 'cekNotifikasi';} else {echo 'cekNotifikasiAdmin';} ?> dropdown notifications">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <div class="notify">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu pull-right panel panel-default">
                            <ul class="list-notifikasi list-group">
                                
                                <li class="list-group-item">
                                    <a role="button" tabindex="0" class="media">
                                        <span class="pull-left media-object media-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                        <div class="media-body">
                                            <span class="block">Tidak ada Pemberitahuan Baru</span>
                                            <!-- <small class="text-muted">8 texts</small> -->
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="panel-footer">
                                <a href="<?= base_url('notifikasi') ?>" role="button" tabindex="0">Lihat Semua Pemberitahuan
                                    <i class="fa fa-angle-right pull-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php } ?>

                    <li class="dropdown nav-profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            
                            <img src="<?= base_url() ?>assets/images/user-white.png" alt="" class="0 size-30x30"> </a>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name"><?= $this->session->userdata('user')->nama ?></div>
                                    <div class="user-position online">Available</div>
                                </div>
                            </li>
                           
                            <!-- <li>
                                <a role="button" tabindex="0">
                                    <span class="label label-info pull-right">new</span>
                                    <i class="fa fa-check"></i>Tasks</a>
                            </li>
                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-cog"></i>Settings</a>
                            </li> -->
                            <li class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>login/aksi_logout" role="button" tabindex="0">
                                    <i class="fa fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="toggle-right-leftmenu">
                        <a role="button" tabindex="0">
                            <i class="fa fa-align-left"></i>
                        </a>
                    </li> -->
                </ul>
                <!-- Right-side navigation end -->
            </header>
        </div>