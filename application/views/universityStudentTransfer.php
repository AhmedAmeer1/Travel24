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
                        including:
                    </p>
                    <h4>London Universities</h4>
                    <div class="row gx-0  ">
                        <div class="col-md-6 " style="padding-left:0px;">
                            <ul class=" services-list">
                                <li>University College London (UCL) </li>
                                <li>King’s College London</li>
                                <li>Imperial College London</li>
                                <li>London School of Economics (LSE)</li>
                            </ul>
                        </div>
                        <div class="col-md-6 " style="padding-left:0px;">
                            <ul class=" services-list">
                                <li>Queen Mary University of London</li>
                                <li>University of Westminster</li>
                                <li>University of Greenwich</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4>England</h4>
                        <div class="row gx-0  ">
                            <div class="col-md-6 " style="padding-left:0px;">
                                <ul class=" services-list">
                                    <li>University of Oxford</li>
                                    <li>University of Cambridg</li>
                                    <li>University of Manchester</li>
                                    <li>University of Birmingham</li>
                                    <li>University of Leeds</li>
                                    <li>University of Nottingham</li>
                                </ul>
                            </div>
                            <div class="col-md-6 " style="padding-left:0px;">
                                <ul class=" services-list">
                                    <li>University of Bristol</li>
                                    <li>University of Sheffield</li>
                                    <li>University of Leicester</li>
                                    <li>Coventry University</li>
                                    <li>University of Warwick</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="row gx-0  ">
                            <div class="col-md-6 " style="padding-left:0px;">
                                <h4>Scotland</h4>
                                <ul class=" services-list">
                                    <li>University of Edinburgh
                                    </li>
                                    <li>University of Glasgow</li>
                                    <li>University of St Andrews
                                    </li>
                                    <li>Heriot-Watt University</li>
                                </ul>
                            </div>
                            <div class="col-md-6 " style="padding-left:0px;">
                                <h4>Wales</h4>
                                <ul class=" services-list">
                                    <li>Cardiff University</li>
                                    <li>Swansea University</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4>Northern Ireland</h4>
                        <ul class=" services-list">
                            <li>Queen’s University Belfast</li>
                            <li>Ulster University</li>
                        </ul>
                        <p class="mt-5">We also provide student transfers to many other universities and colleges across
                            the UK. If
                            your
                            university is not listed, Travel24 can still support your journey.</p>
                    </div>
                </div>
                <div class="mt-5">
                    <h2>Why Choose Travel24 for Student Transfers
                    </h2>
                    <div>
                        <h4>Safe & Professional Drivers</h4>
                        <p>
                            All Travel24 drivers are fully licensed, vetted and trained to deliver safe and respectful
                            service
                            on every journey.
                        </p>
                    </div>
                    <div class="mt-5">
                        <h4>Affordable & Transparent Pricing</h4>
                        <p>
                            Student-friendly pricing with fixed fares and no hidden charges, helping you manage your
                            budget with confidence.
                        </p>
                    </div>
                    <div class="mt-5">
                        <h4>Door-to-Door Convenience</h4>
                        <p>
                            Private, direct transfers with no sharing and no waiting — ideal for students travelling
                            with
                            luggage.
                        </p>
                    </div>
                    <div class="mt-5">
                        <h4>Spacious Vehicles for Luggage</h4>
                        <p>
                            Our vehicles accommodate suitcases, backpacks and study essentials, perfect for airport and
                            move-in transfers.
                        </p>
                    </div>
                    <div class="mt-5">
                        <h4>UK-Wide Coverage</h4>
                        <p>
                            From major cities to university towns, Travel24 operates nationwide across the UK.
                        </p>
                    </div>
                </div>
                <div class="mt-5">
                    <h2>Student Airport Transfers</h2>
                    <p>We offer student airport transfers from all major UK airports, including:</p>
                    <div class="row gx-0  ">
                        <div class="col-md-6 " style="padding-left:0px;">
                            <ul class=" services-list">
                                <li>Heathrow Airport</li>
                                <li>Gatwick Airport</li>
                                <li>Stansted Airport</li>
                                <li>Luton Airport</li>
                            </ul>
                        </div>
                        <div class="col-md-6 " style="padding-left:0px;">
                            <ul class=" services-list">
                                <li>London City Airport</li>
                                <li>Manchester Airport</li>
                                <li>Birmingham Airport</li>
                            </ul>
                        </div>
                    </div>
                    <p>Ideal for both international and domestic students, ensuring smooth arrivals and departures.</p>
                </div>
                <div class="mt-5">
                    <h2>A Hassle-Free Airport Welcome for International Students</h2>
                    <p>
                        For international students visiting the UK for the first time, we offer a smooth and stress-free
                        airport transfer to your hotel or accommodation. Our team actively monitors your flight,
                        whether it arrives early or is delayed, ensuring your driver is there right on time. You’ll be
                        welcomed with a professional meet-and-greet service at the airport, making your arrival easy
                        and comfortable. Enjoy complimentary onboard Wi-Fi so you can stay connected with your
                        family and let them know you’ve arrived safely
                    </p>
                </div>
                <div class="mt-5">
                    <h2>Perfect for International & Domestic Students</h2>
                    <p>
                        Whether you’re an international student arriving in the UK for the first time or a UK student
                        travelling between home and university, Travel24 provides dependable transport you can trust.
                        Parents can book with confidence knowing students are travelling safely.
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