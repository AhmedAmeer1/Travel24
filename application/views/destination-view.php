<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo (isset($blog['title']) && $blog['title'] === 'Heathrow Airport Transfer') ? 'Taxis, Private-hire cars, Transport, Minicabs, Heathrow airport taxi, Taxi to Heathrow airport, Taxi from Heathrow airport, London airport taxi, Minibuses, Transfer, Heathrow airport cab, Minicab, Pre-book, Affordable prices, Credit card payment, Airport taxi to Heathrow, London Heathrow airport taxi service, Airport taxi service, Stansted airport drop off, Heathrow taxis quotes' : ($result->meta_keyword ?? ''); ?>" />
    <meta name="description" content="<?php echo $blog['metaDescription'] ?? ''; ?>" />
    <meta name="og:title" content="<?php echo $blog['ogTitle'] ?? ''; ?>" />
    <meta name="og:description" content="<?php echo $blog['ogDescription'] ?? ''; ?>" />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <meta name="og:url" content="<?php echo $blog['canonicalLink'] ?? ''; ?>" />
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg">
    <meta property="og:type" content="website">
    <title>
        <?php echo (isset($blog['title']) && $blog['title'] === 'Heathrow Airport Transfer') ? 'Heathrow Airport Transfer | London Heathrow Airport Transfers' : ($blog['title'] ?? 'TRAVEL 24'); ?>
    </title>
    <?php if (isset($blog['title']) && $blog['title'] === 'Heathrow Airport Transfer'): ?>
    <meta property="og:locale" content="en_UK">
    <meta property="og:site_name" content="travel 24 taxi">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo $blog['canonicalLink'] ?? 'https://travel24taxi.com/popularDestinations/view/heathrow-airport-transfer'; ?>" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?> ">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=9')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/destination-view.css?v=6')?>" rel="stylesheet" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
    <?php 
$seoFile = APPPATH . 'views/assets/js/seo/popularDestination/' . $blog['title'] . '.php';
if (file_exists($seoFile)) {
    $this->load->view('assets/js/seo/popularDestination/' . $blog['title']);
}
?>
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
                                    <form id="createCustomerForm" role="form" action="<?= base_url($redirectUrl) ?>"
                                        method="post" class="validate" data-parsley-validate=""
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="mt-4">PICKUP LOCATION</label>
                                            <div id="search_car">
                                                <input type="text" class="form-control autocompleteDoc" name="source"
                                                    required id="pickPoint" placeholder="Enter a location">
                                                <input type="hidden" class="lat_perfect" id="sourceLat"
                                                    name="sourceLat">
                                                <input type="hidden" class="lon_perfect" id="sourceLon"
                                                    name="sourceLon">
                                                <input type="hidden" id="total_way_points" name="total_way_points">
                                            </div>
                                        </div>
                                        <div class="way-points"></div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label>DESTINATION</label>
                                                <button style="float:right" class=" multi-root"><i
                                                        class="fa fa-plus-circle"></i> Multi Route</button>
                                            </div>
                                            <input type="text" class="form-control autocompleteDoc" name="destination"
                                                required id="dropPoint" placeholder="Enter a location">
                                            <input type="hidden" class="lat_perfect" id="destLat" name="destLat">
                                            <input type="hidden" class="lon_perfect" id="destLong" name="destLong">
                                        </div>
                                        <button id="createCustomerSubmit" type="submit" class="submit-btn">GET A
                                            QUOTE</button>
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
                                    <span class="check-square-icon mr-2"><i class="fa fa-check"></i></span>
                                    <span>Airport Pickup & Drop-off Charges Included</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2"><i class="fa fa-check"></i></span>
                                    <span>10% Off Every Journey - Use Code : <span class="code">LUTH25</span></span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2"><i class="fa fa-check"></i></span>
                                    <span>Easy Online Booking Process</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2"><i class="fa fa-check"></i></span>
                                    <span>Book Now, Pay Later Option Available</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <span class="check-square-icon mr-2"><i class="fa fa-check"></i></span>
                                    <span>No Surge Pricing</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-details container-fluid">
            <?php if (isset($blog)): ?>
            <div class="row justify-content-center my-5">
                <div class="col-lg-10 col-md-12">
                    <h1 class="text-left display-4 font-weight-bold">
                        <?= $blog['heading'] ?? '' ?>
                    </h1>
                    <div class="text-left">
                        <span><?= $blog['subHeading'] ?? '' ?></span>
                        <p class="mt-4"><?= $blog['content1'] ?? '' ?></p>
                        <p><?= $blog['content2'] ?? '' ?></p>
                        <p><?= $blog['content3'] ?? '' ?></p>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <p>No blog details available.</p>
            <?php endif; ?>
        </section>
        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h2 class="pt-2">OUR FLEET</h2>
                <div class="row mt-2 no-gutter-responsive">
                    <?php foreach($fleet as $vh){ ?>
                    <div class="col-md-2">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <h3><?= $vh['title'] ?? '' ?></h3>
                                <img src="<?= base_url('assets/images/travel24/fleet/' . ($vh['vehicle_image'] ?? '')) ?>" class="img-fluid w-100 py-2" alt="car">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <img src="<?= base_url('assets/images/travel24/passangers.svg')?>" class="img-fluid passangers" alt="passengers">
                                        <span
                                            class="my-auto">&nbsp;<?= $vh['noOfPassengers'] ?? '' ?>&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <img src="<?= base_url('assets/images/travel24/Suitcases.svg')?>" class="img-fluid suitcases" alt="suitcases">
                                        <span
                                            class="my-auto">&nbsp;<?= $vh['noOfSuitcases'] ?? '' ?>&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php if (($blog['slug'] ?? '') === 'heathrow-airport-transfer'): ?>
        <section class="airport-transfer-heading text-center my-5">
            <?php $this->load->view('common_components/heathrow-airport-transfer'); ?>
        </section>
        <?php endif; ?>
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
    src="https://maps.googleapis.com/maps/api/js?key=<?= $result->google_api_key ?? '' ?>&sensor=false&libraries=places">
</script>
<script type="text/javascript">
var chnaged_id = "pickPoint";
$("#createCustomerForm").delegate('input', "keyup", function() {
    chnaged_id = $(this).attr('id');
    find_locations(chnaged_id)
})

function find_locations(chnaged_id) {
    var options = {
        componentRestrictions: {
            country: "uk"
        }
    };
    var places = new google.maps.places.Autocomplete(document.getElementById(chnaged_id), options);
    google.maps.event.addListener(places, 'place_changed', function() {
        var place = places.getPlace();
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        if (chnaged_id == "pickPoint") {
            $("#sourceLat").val(latitude);
            $("#sourceLon").val(longitude);
        } else if (chnaged_id == "dropPoint") {
            $("#destLat").val(latitude);
            $("#destLong").val(longitude);
        }
    });
}
$("#createCustomerForm").delegate('.multi-root', "click", function() {
    var total_way_points = $('.multi-btn').length;
    var next_way_point = parseInt(total_way_points) + 1;
    $("#total_way_points").val(next_way_point);
    if (next_way_point > 3) {
        $("#total_way_points").val('3');
        alert("OOPS !!! way Points limited to 3");
        return;
    }
    var html = '<div id="way-points-div-' + next_way_point +
        '" class="form-group"><div class="d-flex justify-content-between"><label>WAY POINT</label> <span class="chbs-location-remove chbs-meta-icon-minus remove-multi-root"></span> <button style="float:right" class="multi-btn" ><i class="fa fa-plus-circle multi-root " ></i> Multi Route</button><button style="float:right"><i class="fa fa-minus-circle remove-multi-root" data-index = ' +
        next_way_point +
        ' ></i> </button></div><input type="text" class="form-control autocompleteDoc" name="wayPoint-' +
        next_way_point + '" required id="wayPoint-' + next_way_point +
        '" placeholder="Enter a location"><input type="hidden" class="lat_perfect" id="lat_doc" name="destLat"><input type="hidden" class="lon_perfect" id="lon_doc" name="destLong">';
    if ($('.way-points').hasClass('hide')) {
        $('.way-points').removeClass('hide')
    }
    $('.way-points').append(html)
});
$("#createCustomerForm").delegate('.remove-multi-root', "click", function() {
    var id = $(this).attr('data-index')
    $("#way-points-div-" + id).remove();
})
</script>

</html>