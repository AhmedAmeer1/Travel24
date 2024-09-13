<!doctype html>
<html>
 <!-- Add custom styles if needed -->
 <style>
        .blog-details h1 {
            font-size: 2.5rem;
            /* Adjust the size as needed */
            font-weight: bold;
            margin-bottom: 20px;
        }

        .blog-details p {
            font-size: 1.5srem;
            /* Standard paragraph size */
            margin-bottom: 15px;
            line-height: 25px;
        }

        @media (max-width: 768px) {
            .blog-details h1 {
                font-size: 2rem;
                /* Slightly smaller on tablets */
            }
        }

        @media (max-width: 576px) {
            .blog-details h1 {
                font-size: 1.75rem;
                /* Smaller on mobile */
            }

            .blog-details p {
                font-size: 0.9rem;
                line-height: 22px;
                /* Adjust paragraph size on mobile */
            }
        }
        </style>


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">


    <meta name="keywords" content="
        <?php 
        if (isset($blog['title'])) {
            if ($blog['title'] === 'Heathorw Airport Transfer') {
                echo 'Taxis, Private-hire cars, Transport, Minicabs, Heathrow airport taxi, Taxi to Heathrow airport, Taxi from Heathrow airport, London airport taxi, Minibuses, Transfer, Heathrow airport cab, Minicab, Pre-book, Affordable prices, Credit card payment, Airport taxi to Heathrow, London Heathrow airport taxi service, Airport taxi service, Stansted airport drop off, Heathrow taxis quotes'; // Custom keywords for "Heathorw Airport Transfer"
            } else {
                echo $result->meta_keyword; // Use default or dynamic keywords from $result
            }
        } else {
            echo $result->meta_keyword; // Default keywords if $blog['title'] is not set
        }
        ?>" />



    <meta name="description" content="
        <?php 
        if (isset($blog['title'])) {
            if ($blog['title'] === 'Heathorw Airport Transfer') {
                echo 'Reliable Heathrow Airport taxi transfers. Pre-book your ride for fixed fares, 24/7 service, and stress-free travel to and from any Heathrow terminal in London'; // Custom description
            } else {
                echo 'Experience top-notch airport transfer services with Travel24. Catering to Gatwick, Heathrow, and Luton, we specialize in providing reliable, professional, and affordable travel solutions for both individuals and groups. Book now for a smooth and stress-free journey!';
            }
        } else {
            echo 'Experience top-notch airport transfer services with Travel24. Catering to Gatwick, Heathrow, and Luton, we specialize in providing reliable, professional, and affordable travel solutions for both individuals and groups. Book now for a smooth and stress-free journey!'; // Default description
        }
        ?>" />


    <meta name="title"
        content="Travel24: Premier Airport Transfers | Gatwick, Heathrow, Luton, Hove, Southampton, Bristol" />
    <meta name="language" content="ES">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24.jpg">



    <title>
        <?php 
        if (isset($blog['title'])) {
            if ($blog['title'] === 'Heathorw Airport Transfer') {
                echo 'Heathrow Airport Taxi Transfers | Quick, Reliable Heathrow Cabs & Instant Quotes'; // Set to "ahmed test" if title matches "Heathorw Airport Transfer"
            } else {
                echo $blog['title']; // Otherwise, use the blog title
            }
        } else {
            echo 'TRAVEL 24'; // Default title if $blog['title'] is not set
        }
        ?>
    </title>





    <link rel="icon" type="img/png" sizes="32x32" href="https://travel24taxi.com/assets/images/travel24.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css?v=1')?>" rel="stylesheet" />



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-230246454-1');
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
                                <h1>BOOK NOW</h1>
                                <img src="../../assets/images/travel24/online_cards.svg" class="img-fluid image-width"
                                    alt="Payement">
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
                            <h1>Your Destination is our goal</h1>
                            <p>
                                Airport transfers & chauffeur services connecting all UK airports
                            </p>
                            <p class="promoCode">Use <span class="code">LUTH24</span> to get 10% off.</p>

                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section class="blog-details container-fluid">
            <?php if (isset($blog)): ?>


            <!-- Check if the title is "Heathrow Airport Transfer" -->
            <?php if ($blog['title'] === 'Heathorw Airport Transfer'): ?>
            <div class="row justify-content-center my-5">
                <div class="col-lg-10 col-md-12">
                    <h1 class="text-center display-4 font-weight-bold mb-4">Heathrow airport transfers and minicabs</h1>
                    <div class="text-left">
                        <p>Book a chauffeur/private-hire vehicle from Heathrow to elsewhere in the UK through our
                            Heathrow
                            airport transfer services. Our fleet includes 8 Seater Minibus (Van), Mobility Vehicle (car
                            Vehicle)
                            etc., to serve the purpose of the passengers.</p>
                        <p>Our airport transfer service to and from Heathrow Airport offers an affordable and
                            top-quality
                            private-hire experience. We are reliable, experienced, and committed to delivering quality
                            travel
                            solutions in Heathrow at the best prices. We understand that passengers often worry about
                            reaching the
                            airport and other destinations on time, so we work hard to ensure you arrive safely and
                            punctually.</p>

                        <p>Our services extend from Heathrow to London and other popular locations, offering convenient
                            travel
                            options. We are well-equipped with a variety of cars/cabs and experienced drivers. Services
                            are tailored
                            to meet the needs of the number of passengers and luggage requirements.</p>

                        <p>You can book your ride through our online booking system by simply entering your details and
                            getting your
                            transfer quote instantly on our website.</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php else: ?>
            <p>No blog details available.</p>
            <?php endif; ?>
        </section>

       



        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h1>OUR FLEET</h1>
                <div class="row mt-2 no-gutter-responsive">
                    <?php
                         foreach($fleet as $vh){?>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="../../assets/images/travel24/fleet/<?php echo $vh['vehicle_image']; ?>"
                                    class="img-fluid w-100 py-4" alt="car">
                            </div>
                            <div class="text_card">
                                <h2><?php echo $vh['title']; ?></h2>
                                <p> <?php echo $vh['description']; ?></p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="../../assets/images/travel24/passangers.svg" class="img-fluid "
                                            alt="car">
                                        <h3><?php echo $vh['noOfPassengers']; ?>&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="../../assets/images/travel24/Suitcases.svg" class="img-fluid "
                                            alt="car">
                                        <h3><?php echo $vh['noOfSuitcases']; ?>&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </section </main>

        <?php $this->load->view('common_components/footer'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
        <script src="https://use.fontawesome.com/1e36072efd.js"></script>
        <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
<!-- AIzaSyBn6hOlr6YHcZAmbptlsmbhvH5iQllWflE -->
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