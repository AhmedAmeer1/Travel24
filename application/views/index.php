<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $result->meta_keyword; ?>" />
    <meta name="description" content="Book reliable taxi services with Travel24Taxi. Affordable, fast, and safe rides 24/7. Your trusted partner for airport transfers, city rides, and tours." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title> Travel24 | Reliable UK Airport Transfers & Local Taxi Services</title>
    <meta property="og:title" content=" Travel24 | Reliable UK Airport Transfers & Local Taxi Services ">
    <meta property="og:description" content=" Book reliable taxi services with Travel24Taxi. Affordable, fast, and safe rides 24/7. Your trusted partner for airport transfers, city rides, and tours. ">
    <meta property="og:image" content=" https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content=" https://travel24taxi.com">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?> ">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"  rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css?v=19')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=9')?>" rel="stylesheet" />
    <?php $this->load->view('assets/js/seo/home'); ?>
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
                                    <form id="createCustomerForm" role="form" action="<?=base_url($redirectUrl)?>"
                                        method="post" class="validate" data-parsley-validate=""
                                        enctype="multipart/form-data">
                                        <div class="form-group">

                                            <div id="search_car">
                                                <input type="text" class="form-control autocompleteDoc pickupLocation"
                                                    name="source" required id="pickPoint" placeholder="Pickup Location">
                                                <input type="hidden" class="lat_perfect" id="sourceLat"
                                                    name="sourceLat">
                                                <input type="hidden" class="lon_perfect" id="sourceLon"
                                                    name="sourceLon">
                                                <input type="hidden" id="total_way_points" name="total_way_points">
                                            </div>
                                        </div>
                                        <div class="way-points">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label>&nbsp;</label>
                                                <button style="float:right" class=" multi-root"><i
                                                        class="fa fa-plus-circle  "></i> Multi Route</button>
                                            </div>
                                            <input type="text" class="form-control autocompleteDoc destination"
                                                name="destination" required id="dropPoint" placeholder="Destination">
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
                        <div class="mx-auto">
                            <span>Your Destination is our goal</span>
                            <p>
                                Airport transfers & chauffeur services connecting all UK airports
                            </p>
                            <ul class="features-list mt-2" style="list-style: none; padding-left: 0;">
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>Airport Pickup & Drop-off Charges Included </span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>10% Off Every Journey - Use Code : <span class="code">LUTH25</span></span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>Easy Online Booking Process</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>Book Now, Pay Later Option Available</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>No Surge Pricing</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('common_components/howToBookTaxi'); ?>
        <div class="text-container ">
            <p>
                For reliable and professional airport transfers, Travel24 has you covered. We offer 24/7 minicab
                services to all UK airports for individuals and groups, <strong>&#10003; with clear, upfront
                    pricing.</strong>
            </p>
        </div>
        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h2 class=" pt-2">OUR FLEET</h2>
                <div class="row mt-2 no-gutter-responsive">
                    <?php foreach ($fleet_data as $fleet): ?>
                    <div class="col-md-3">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <h3><?= $fleet['title']; ?></h3>
                                <img src="<?php echo base_url('assets/images/travel24/fleet/' . $fleet['vehicle_image'] . '?v=19'); ?>" class="fleet-img py-2" alt="car">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <img src="<?php echo base_url('assets/images/travel24/passangers.svg')?>" class="img-fluid passangers" alt="passengers">
                                        <span
                                            class="my-auto">&nbsp;<?= $fleet['noOfPassengers']; ?>&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <img src="<?php echo base_url('assets/images/travel24/Suitcases.svg')?>" class="img-fluid suitcases" alt="suitcases">
                                        <span
                                            class="my-auto">&nbsp;<?= $fleet['noOfSuitcases']; ?>&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-md-12 mt-3">
                        <div class="list-details-box">
                            <div class="d-flex justify-content-between flag-div">
                                <h1 class="text-uppercase">Your journey is our mission </h1>
                                <img src="assets/images/travel24/england.svg" class="img-fluid " alt="flag of the United Kingdom">
                            </div>
                            <p>
                                When you choose us for your travel needs, we're committed to delivering a seamless
                                experience from start to finish. Our diverse fleet,
                                ranging from professional minicabs to executive chauffeurs and minibuses, is tailored to
                                fit your specific passenger and luggage needs.
                            </p>
                            <p>
                                Our drivers are hand-picked for their exceptional customer service and in-depth local
                                knowledge, ensuring a smooth and pleasant journey.
                            </p>
                            <p>
                                Plus, we're inclusive to all travelers with specially
                                designed wheelchair-accessible vehicles. Come take a look at our extensive fleet and
                                find the perfect ride for you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('common_components/customerReview.php',array('CustomerReviewData' => $CustomerReviewData)); ?>
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
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $result->google_api_key; ?>&sensor=false&libraries=places">
</script>
<script src="<?php echo base_url('assets/js/homepage.js'); ?>">
</script>

</script>

</html>