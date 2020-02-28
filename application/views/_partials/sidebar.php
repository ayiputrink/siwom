<aside id="leftmenu">
<?php if($user->status == 'active') : ?>
                <div id="leftmenu-wrap">
                    <div class="panel-group slim-scroll" role="tablist">
                        <div class="panel panel-default">
                            <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <!--  NAVIGATION Content -->
                                    <ul id="navigation">
                                        <li>
                                            <a href="index.html">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="material.html">
                                                <i class="fa fa-arrow-right"></i>
                                                <span>Pemberitahuan</span>
                                            </a>
                                        </li>
                                        <li class="active open">
                                            <a role="button" tabindex="0">
                                                <i class="fa fa-list"></i>
                                                <span>Jobdesk</span>
                                            </a>
                                            <ul>
                                                <li class="active">
                                                    <a href="form-wizard.html">
                                                        <i class="fa fa-angle-right"></i> Jobdesk Masuk
                                                        <span class="badge br-10 badge-success">13</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="form-wizard.html">
                                                        <i class="fa fa-angle-right"></i> Jobdesk Selesai
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        
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
                <?php endif; ?>
            </aside>
