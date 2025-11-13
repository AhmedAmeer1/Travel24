<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Heathrow Airport - Travel24</title>

    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?> ">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/terms">
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=10')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/heathrow-airport?v=11')?>" rel="stylesheet" />



    <!-- Google Tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-XK1KGHX0F7');
    </script>
</head>

<body>
    <?php $this->load->view('common_components/header'); ?>


    <main class="home">


        <div class="responsive-header-image mt-2"></div>

        <section class="limits-banner">
            <div class="banner_container ">
                <div class="row ">
                    <div class="col-md-6 box-padding">
                        <div class="book-form-box">
                            <?php 
                            $redirectUrl = (isset($customer_id) && !empty($customer_id)) 
                                ? 'Index/Search'.$customer_id 
                                : 'Index/Search';
                            if($this->session->flashdata('message')) { 
                                $flashdata = $this->session->flashdata('message'); ?>
                            <div class="alert alert-<?= $flashdata['class'] ?>">
                                <?= $flashdata['message'] ?>
                            </div>
                            <?php } ?>
                            <div class="content">
                                <div class="form-inner">
                                    <p class="form-heading">Quick & Easy Booking</p>
                                    <form id="createCustomerForm" role="form" action="<?= base_url($redirectUrl) ?>"
                                        method="post" class="validate" data-parsley-validate=""
                                        enctype="multipart/form-data">
                                        <div class="form-group position-relative">
                                            <div id="">
                                                <input type="text" class="form-control autocompleteDoc pickupLocation"
                                                    name="source" required id="pickPoint" placeholder="Pickup Location">
                                                <div class="custom-dropdown" id="dropdown-pickPoint"></div>

                                                <input type="hidden" class="lat_perfect" id="sourceLat"
                                                    name="sourceLat">
                                                <input type="hidden" class="lon_perfect" id="sourceLon"
                                                    name="sourceLon">
                                                <input type="hidden" id="total_way_points" name="total_way_points">
                                            </div>
                                        </div>
                                        <div class="way-points">
                                        </div>
                                        <div class="form-group position-relative">
                                            <div class="d-flex justify-content-between">
                                                <label>&nbsp;</label>
                                                <button type="button" style="float:right" class="multi-root"><i
                                                        class="fa fa-plus-circle"></i> Multi Route</button>
                                            </div>
                                            <input type="text" class="form-control autocompleteDoc destination"
                                                name="destination" required id="dropPoint" placeholder="Destination">

                                            <div class="custom-dropdown" id="dropdown-dropPoint"></div>
                                            <input type="hidden" class="lat_perfect" id="destLat" name="destLat">
                                            <input type="hidden" class="lon_perfect" id="destLong" name="destLong">
                                        </div>
                                        <button id="createCustomerSubmit" type="submit" class="submit-btn">GET A
                                            QUOTE & BOOK NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 banner-details">
                        <!-- Banner Features Section -->
                        <?php $this->load->view('common_components/Home/banner_features'); ?>

                    </div>
                </div>
            </div>





















        </section>



        <div class="heathrow-container">
            <div class="heathrow-guide-section">
                <div class=" ">
                    <div class="">
                        <h1 class="text-left display-4 font-weight-bold">
                            Complete Guide to Heathrow Airport (LHR): Terminals, Facilities & Travel Info
                        </h1>
                        <div class="text-left">
                            <span>Heathrow Airport information</span>
                            <p class="mt-4">
                                London Heathrow Airport is one of the largest and busiest airline hubs in the world,
                                which
                                is located approximately 23 kilometres away to the west of Central London, covering an
                                area
                                of 12.3 square kilometres. Millions of travellers around UK and across the world arrive
                                at
                                and depart from this airport every year. Nearly 1,300 flights operate at Heathrow per
                                day,
                                in which six hundred and fifty flights land, whereas another 650 takes-off according to
                                (Heathrow Airport operations
                                https://www.heathrow.com/company/local-community/noise/operations/departure-flight-paths?utm_source=chatgpt.com).
                                Whether traveling for business purposes, setting off for a holiday or traveling on a
                                connecting journey, Heathrow becomes the number one choice due to its vast capacity of
                                serving countless visitors with essential amenities each year since 1946.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <section class="heathrow-terminals-section">
                <div class="">
                    <div class="row align-items-center">
                        <!-- ===== LEFT SIDE: Text ===== -->
                        <div class="col-lg-6 col-md-12">
                            <h2>Heathrow Airport Terminals</h2>
                            <p>
                                Heathrow Airport consists of four main passenger terminals — Terminals 2, 3, 4, and 5 —
                                each designed to handle specific airlines and destinations.
                                Terminal 2, known as “The Queen’s Terminal,” primarily serves Star Alliance members.
                                Terminal 3 handles long-haul flights, Terminal 4 is used by SkyTeam airlines,
                                and Terminal 5 is the exclusive home of British Airways and Iberia.
                            </p>
                            <p>
                                Each terminal is equipped with lounges, shopping areas, restaurants, and essential
                                amenities
                                ensuring convenience and comfort for every traveler.
                            </p>
                        </div>

                        <!-- ===== RIGHT SIDE: Image ===== -->
                        <div class="col-lg-6 col-md-12 text-center">
                            <img src="<?php echo base_url('assets/images/travel24/destination-view/airport-terminal.jpg') ?>"
                                alt="Heathrow Airport Terminals" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </section>

        </div>







    </main>




    <?php $this->load->view('common_components/footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</body>

</html>