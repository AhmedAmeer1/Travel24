<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get in touch with Travel24 Taxi – contact us via online form, call 02039 822 911 or email info@travel24taxi.com. Fast quotes & 24/7 support." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>University Student Transfer</title>
    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description"
        content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://travel24taxi.com/contactUs" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/services.css?v=17') ?>">
    <link href="<?php echo base_url('assets/css/custom.css?v=20')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=21')?>" rel="stylesheet" />
    <!-- Google tag (gtag.js) -->
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
                            ?'Index/Search'.$customer_id
                            :'Index/Search';
                            if($this->session->flashdata('message')) { 
                                $flashdata = $this->session->flashdata('message'); ?>
                            <div class="alert alert-<?= $flashdata['class'] ?>">
                                <?= $flashdata['message'] ?>
                            </div>
                            <?php } ?>
                            <div class="content">
                                <div class="form-inner">
                                    <p class="form-heading">Quick & Easy Booking</p>
                                    <form id="createCustomerForm" role="form" action="<?=base_url($redirectUrl)?>"
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
        <section>
            <div class="services-container services-content">
                <h1>University Student Transfer
                </h1>
                <h3>Reliable University Student Transfer Services Across the UK

                </h3>
                <p>
                    Travel24 provides safe, affordable and reliable university student transfer services across the
                    UK. Whether you’re travelling to or from university accommodation, student halls, private
                    housing, airports or train stations, our professional drivers ensure a smooth and stress-free
                    journey.
                </p>
                <p>
                    We understand student travel needs — punctual pickups, fair pricing and dependable service —
                    making Travel24 a trusted choice for students and parents alike.
                </p>
                <div class="mt-5">
                    <h2>Student Transfers for Every Journey</h2>
                    <p>Our university student transfer service is ideal for:</p>
                    <ul class="services-list">
                        <li>Airport transfers for students arriving in or departing from the UK</li>
                        <li>University move-in and move-out days</li>
                        <li>Term-time travel between home and campus</li>
                        <li>Transfers to student halls or private accommodation</li>
                        <li>Early morning or late-night journeys with safe, private transport
                        </li>
                    </ul>
                </div>


                <div class="mt-5">
                    <h2>Universities We Serve Across the UK</h2>
                    <p>Travel24 provides student transfer services to and from leading universities across the UK,
                        including:</p>
                        
                    <div class="mt-5">
                        <h4>London Universities</h4>
                        <ul class="services-list">
                            <li>Airport transfers for students arriving in or departing from the UK</li>
                            <li>University move-in and move-out days</li>
                            <li>Term-time travel between home and campus</li>
                            <li>Transfers to student halls or private accommodation</li>
                            <li>Early morning or late-night journeys with safe, private transport
                            </li>
                        </ul>
                    </div>


                </div>



                <div class="mt-5">
                    <h2>Airport Minicab Transfers</h2>
                    <p>
                        Travel24 provides dependable airport minicab transfers to and from all major UK airports.
                        Whether you’re travelling for business or leisure, our pre-booked minicabs ensure timely pickups
                        and comfortable transfers. Enjoy stress-free airport transfers with active flight monitoring and
                        automatic pick-up time adjustments for delays or early arrivals.
                    </p>
                    <div class="mt-5">
                        <h4>Airport transfer benefits:</h4>
                        <ul class="services-list">
                            <li>Pre-booked for peace of mind</li>
                            <li>Meet & greet options available</li>
                            <li>Flight-friendly pickup times</li>
                            <li>Fixed and competitive pricing</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <h2>Minicabs for Business & Corporate Travel</h2>
                    <p>
                        Our corporate minicab services are designed for professionals who value punctuality and
                        comfort. From client pickups to staff transport, Travel24 delivers reliable solutions for
                        business
                        travel needs
                    </p>
                    <div class="mt-5">
                        <ul class="services-list">
                            <li>Executive and business travel</li>
                            <li>Office-to-office transfers</li>
                            <li>Client and guest transport</li>
                            <li>Regular corporate bookings</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <h2>Our Vehicles</h2>
                    <p>
                        Travel24 operates a fleet of clean, modern, and well-maintained vehicles suitable for different
                        travel needs. Whether you’re travelling alone or with a group, our vehicles offer comfort,
                        safety,
                        and ample luggage space.

                    </p>
                </div>

                <div class="mt-5">
                    <h2>Professional & Licensed Drivers</h2>
                    <p>
                        All Travel24 minicab journeys are completed by trained, experienced, and licensed drivers. Our
                        drivers prioritise customer safety, punctuality, and courteous service on every trip.

                    </p>
                </div>
                <div class="row gx-0 mt-md-5 ">
                    <div class="col-md-6 " style="padding-left:0px;">
                        <h3>Easy Minicab Booking</h3>
                        <p>Booking a minicab with Travel24 is quick and simple:</p>
                        <ul class=" services-list">
                            <li>Online booking available
                            </li>
                            <li>Phone bookings accepted</li>
                            <li>Advance and same-day bookings
                            </li>
                            <li>Clear pricing with no hidden fees</li>
                        </ul>
                    </div>
                    <div class="col-md-6 " style="padding-left:0px;">
                        <h3>Why Choose Travel24 Minicab Services?</h3>
                        <ul class=" services-list">
                            <li>Trusted UK minicab provider</li>
                            <li>Local and nationwide coverage</li>
                            <li>Airport and long-distance transfers</li>
                            <li>Professional, reliable drivers</li>
                            <li>Competitive and transparent pricing</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <h2>Book Your Minicab Today</h2>
                    <p>
                        Looking for a dependable UK minicab service? Travel24 is ready to help. Book your minicab today
                        for comfortable, reliable, and affordable travel across the UK.
                    </p>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd6AQCrQBjsP5I9KMXGVUVWhJJeQet3C4&sensor=false&libraries=places">
</script>
<script src="<?php echo base_url('assets/js/homepage.js?v=6'); ?>">
</script>

<script>





</script>



</html>