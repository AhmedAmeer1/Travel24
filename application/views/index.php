<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $result->meta_keyword; ?>" />
    <meta name="description" content="Book reliable taxi services with Travel24Taxi. Affordable, fast, and safe rides 24/7. Your trusted partner for airport transfers, city rides, and tours." />
    <title> Travel24 | Reliable UK Airport Transfers & Local Taxi Services</title>
    <meta property="og:title" content=" Travel24 | Reliable UK Airport Transfers & Local Taxi Services ">
    <meta property="og:description" content=" Book reliable taxi services with Travel24Taxi. Affordable, fast, and safe rides 24/7. Your trusted partner for airport transfers, city rides, and tours. ">
    <meta property="og:image" content=" https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content=" https://travel24taxi.com">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=7')?>" rel="stylesheet" />
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
                            <div class="head">
                                <span>BOOK NOW</span>
                                <!-- <a href="<?php echo base_url('Payment/create_payment'); ?>" class="btn btn-primary">Pay with PayPal Test </a> -->
                                <img src="assets/images/travel24/online_cards.svg" class="img-fluid image-width"alt="Payement">
                            </div>
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
                                        <div class="way-points">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label>DESTINATION</label>
                                                <button style="float:right" class=" multi-root"><i
                                                        class="fa fa-plus-circle  "></i> Multi Route</button>
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
                          <span >Your Destination is our goal</span>

                            <p>
                                Airport transfers & chauffeur services connecting all UK airports
                            </p>
                            <p class="promoCode">Use <span class="code">LUTH24</span> to get 10% off.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('common_components/howToBookTaxi'); ?>
        <div class="text-container ">
            <p>
                For reliable and professional airport transfers, Travel24 has you covered. We offer 24/7 minicab
                services to all UK airports for individuals and groups, with clear, upfront pricing.
            </p>
            <p class="mt-4">
                For a hassle-free quote, fill out our online form or call us at <a href="tel:02039822911"> 02039 822
                    911.</a> Travel comfortably from
                Brighton to Heathrow, Gatwick, and beyond with us.
            </p>
        </div>
        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h2>OUR FLEET</h2>
                <div class="row mt-2 no-gutter-responsive">
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/SaloonCar.png" class="img-fluid w-100 py-4"
                                    alt="sedan-style car">
                            </div>
                            <div class="text_card">
                                <h3>SALOON CAR (X)</h3>
                                <p>Up to 3 passengers plus 2 suitcases or 4 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;3&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;2&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/EstateCar.png" class="img-fluid w-100 py-4"
                                    alt="station wagon (estate car)">
                            </div>
                            <div class="text_card">
                                <h3>ESTATE CAR (Comfort)</h3>
                                <p>Up to 4 passengers plus 3 suitcases.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;4&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;3&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/PeopleCarrier.png" class="img-fluid w-100 py-3"
                                    alt="3. people carrier (MPV or minivan)">
                            </div>
                            <div class="text_card">
                                <h3>PEOPLE CARRIER (XL)</h3>
                                <p>Up to 5 passengers plus 4 suitcases or 6 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;5&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;4&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/ExecutiveCar.png" class="img-fluid w-100 py-4"
                                    alt="executive car">
                            </div>
                            <div class="text_card">
                                <h3>EXECUTIVE CAR (Executive)</h3>
                                <p>Up to 3 passengers plus 2 suitcases or 4 passengers plus hand luggage</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;3&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;2&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/8SeaterMiniBus.png" class="img-fluid w-100 "
                                    alt="8 Seater minibus">
                            </div>
                            <div class="text_card">
                                <h3>8 SEATER MINIBUS (Van)</h3>
                                <p>8 passengers plus up to 7 suitcases </p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;8&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;7&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/ExecutivePeopleCarrier.png"
                                    class="img-fluid w-100 py-2" alt="Executive People Carrier">
                            </div>
                            <div class="text_card">
                                <h3>EXECUTIVE PEOPLE CARRIER (Luxury)</h3>
                                <p>Up to 5 passengers plus 4 suitcases or 6 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;5&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;4&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/travel24/fleet/MobilityVehicle.png" class="img-fluid w-100 py-4"
                                    alt="Mobility Vehicle">
                            </div>
                            <div class="text_card">
                                <h3>MOBILITY VEHICLE ( <img src="assets/images/travel24/fleet/disability.png"
                                        class="disability_img" alt="disability"> Vehicle)</h3>
                                <p>Exclusive to wheelchairs and passengers with disabilities. Any mobility scooter and
                                    wheelchair. Up to 4 passengers along with a 1 wheelchair passenger and luggages
                                    .</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="passangers">
                                        <span>&nbsp;4&nbsp;Passengers</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="Suitcases">
                                        <span>&nbsp;1&nbsp;Suitcases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
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
<script type="text/javascript">
var chnaged_id = "pickPoint";

$("#createCustomerForm").delegate('input', "keyup", function() {
    chnaged_id = $(this).attr('id');
    find_locations(chnaged_id)

})

function find_locations(chnaged_id) {

    var options = {
        // types: ['(cities)'],
        componentRestrictions: {
            country: "uk"
        }
    };
    var places = new google.maps.places.Autocomplete(document.getElementById(chnaged_id), options);
    //console.log('places',places.getPlace())
    google.maps.event.addListener(places, 'place_changed', function() {
        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        var mesg = "Address: " + address;
        mesg += "\nLatitude: " + latitude;
        mesg += "\nLongitude: " + longitude;
        // alert(mesg)
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