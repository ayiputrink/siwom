<!doctype html>
<html class="no-js " lang="en">
<head>
    <?php $this->load->view('_partials/head'); ?>
</head>

<body id="falcon" class="main_Wrapper">
    <div id="wrap" class="animsition">
        <!-- HEADER Content -->
        <?php $this->load->view('_partials/navbar',array('user' => $user)); ?>
        <!--/ HEADER Content  -->
        <!-- CONTROLS Content  -->
        <div id="controls">
            <!--SIDEBAR Content -->
            <?php $this->load->view('_partials/sidebar',array('user' => $user)); ?>
            <!--/ SIDEBAR Content -->

            <!--RIGHTBAR Content -->
            <?php $this->load->view('_partials/rightbar'); ?>
            <!--/ RIGHTBAR Content -->
        </div>
        <!--/ CONTROLS Content -->
        <?php $this->load->view($konten); ?>
        </div>
    <!--/ Application Content -->
    <!--Vendor JavaScripts  -->
    <?php $this->load->view('_partials/js'); ?>    
    <!--/ vendor javascripts -->

    


</body>
</html>