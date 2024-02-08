<!doctype html>
<html>
<style>


</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="language" content="ES">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css/header.css')?>" rel="stylesheet" />
</head>

<body>
    <header class="limits-header-wrapper  d-md-block d-none ">

        <nav class="navbar navbar-expand-md">
            <div class=" row container-fluid pa-50">


            <div class="col-md-6">
                    <a class="" href="<?php echo base_url()?>"><img
                            src="<?php echo base_url('assets/images/travel24/Logo.svg')?>" alt=""></a>

                </div>


                <div class="col-md-6">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url()?>">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url()?>faq">Faq </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url()?>customerReviews">reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="tel:02039822911"><img src="<?php echo base_url('assets/images/call.png')?>"
                                        alt="">
                                    02039822911</a>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
        </nav>


    </header>

    <!-- responsive menu -->
    <header class="res-side-menu d-md-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo base_url('assets/images/travel24/Logo.svg')?>" class="img-fluid" alt="Logo">
                    <ul class="sub-header-res-new">
                        <!-- <li>
                            <a href="mailto:info@nolimitcars.co.uk"><img src="<?php echo base_url('assets/images/mail.png')?>" alt=""></a>
                        </li> -->
                        <li>
                            <a href="tel:02039822911"><img src="<?php echo base_url('assets/images/call.png')?>" alt="">
                                02039822911</a>
                        </li>
                    </ul>
                    <!-- <a href="<?php echo base_url('BookingForm')?>" class="res-head-btn">Book Online</a> -->
                </div>
            </div>
            <!-- <button id="menu-btn" class="brgn-btn">X</button> -->
            <button id="menu-btn" class="navbar-toggler brgn-btn collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
    </header>



    <div class="menu-side-wrapper d-md-none d-block">
        <ul>
            <li>
                <a href="<?php echo base_url()?>">Home</a>
            </li>
            <!-- <li>
                <a href="<?php echo base_url()?>aboutus">About Us</a>
            </li> -->
            <li>
                <a href="<?php echo base_url()?>faq">Faq </a>
            </li>
            <li>
                <a href="<?php echo base_url()?>customerReviews">reviews</a>
            </li>
            <!-- <li>
                <a  href="<?php echo base_url()?>contactUs">contact</a>
            </li> -->
        </ul>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>


</html>