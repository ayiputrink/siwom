<aside id="leftmenu">
                <div id="leftmenu-wrap">
                    <div class="panel-group slim-scroll" role="tablist">
                        <div class="panel panel-default">
                            <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <!--  NAVIGATION Content -->
                                    <ul id="navigation">
                                        <li class="<?php echo ( $this->uri->segment('1') == 'home' || $this->uri->segment('2') == 'dashboard') ? 'active' : '' ?>">
                                            <a href="<?= base_url('home') ?>">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('notifikasi') ?>">
                                                <i class="fa fa-arrow-right"></i>
                                                <span>Pemberitahuan</span>
                                            </a>
                                        </li>

                                        <?php if(($this->session->userdata('user')->hak_akses == 'Manajer') || ($this->session->userdata('user')->hak_akses == 'Karyawan')) : ?>
                                        <li class="dropdown <?= ($this->uri->segment('1') == 'jobdesk' && $this->uri->segment('2') == 'karyawan' ? 'active open':'') ?>">
                                            <a role="button" tabindex="0">
                                                <i class="fa fa-list"></i>
                                                <span>Jobdesk</span>
                                            </a>
                                            <ul>
                                                <?php if($this->session->userdata('user')->hak_akses == 'Karyawan') { ?>
                                                <li>
                                                    <a href="<?= base_url('jobdesk/masuk') ?>">
                                                        <i class="fa fa-angle-right"></i> Jobdesk Masuk
                                                        <span class="badge br-10 badge-success">13</span>
                                                    </a>
                                                </li>
                                                <?php } else if($this->session->userdata('user')->hak_akses == 'Manajer') { ?>
                                                <li class="<?= ($this->uri->segment('1') == 'jobdesk' && $this->uri->segment('2') == 'karyawan' ? 'active':'') ?>">
                                                
                                                    <a href="<?= base_url('jobdesk/karyawan') ?>">
                                                        <i class="fa fa-angle-right"></i> Jobdesk Karyawan
                                                    </a>
                                                </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="<?= base_url('jobdesk/selesai') ?>">
                                                        <i class="fa fa-angle-right"></i> Jobdesk Selesai
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php endif; ?>

                                        <?php if($this->session->userdata('user')->hak_akses == 'admin' ) : ?>
                                        <li class="<?= ($this->uri->segment('2') == 'kelola_user') ? 'active open' : 'dropdown' ?>">
                                            <a role="button" tabindex="0">
                                                <i class="fa fa-list"></i>
                                                <span>Menu Admin</span>
                                            </a>
                                            <ul>
                                                <li class="<?= ($this->uri->segment('1') == 'admin' && $this->uri->segment('2') == 'kelola_user') ? 'active' : '' ?>">
                                                    <a href="<?= base_url('admin/kelola_user') ?>">
                                                        <i class="fa fa-angle-right"></i> Kelola User
                                                        <!-- <span class="badge br-10 badge-success">13</span> -->
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php endif; ?>
                                        
                                        
                                    </ul>
                                    <!--/ NAVIGATION Content -->
                                </div>
                            </div>
                        </div>
                        <div class="panel settings panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#leftmenuControls">Jobdesk sedang dikerjakan
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h4>
                            </div>

                            <div class="milestone-sidbar">
                                <div class="text-center-folded">
                                    <span class="pull-right pull-none-folded">60%</span>
                                    <span class="hidden-folded">Milestone</span>
                                </div>
                                <div class="progress progress-xxs m-t-sm dk">
                                    <div class="progress-bar progress-bar-info" style="width: 60%;"> </div>
                                </div>
                                <div class="text-center-folded">
                                    <span class="pull-right pull-none-folded">35%</span>
                                    <span class="hidden-folded">Release</span>
                                </div>
                                <div class="progress progress-xxs m-t-sm dk">
                                    <div class="progress-bar progress-bar-primary" style="width: 35%;"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
