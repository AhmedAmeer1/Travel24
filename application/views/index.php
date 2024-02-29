<!doctype html>
<html>
<style>


</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="keywords" content="<?php echo $result->meta_keyword; ?>" />
    <meta name="description"
        content="Experience top-notch airport transfer services with Travel24. Catering to Gatwick, Heathrow, and Luton, we specialize in providing reliable, professional, and affordable travel solutions for both individuals and groups. Book now for a smooth and stress-free journey!" />
    <meta name="title"
        content="Travel24: Premier Airport Transfers | Gatwick, Heathrow, Luton, Hove, Southampton, Bristol" />
    <meta name="language" content="ES">
    <meta property="og:image" content="<?php echo base_url('assets/images/travel24.jpg')?>">
    <title>TRAVEL 24 </title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/travel24.jpg')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/index.css')?>" rel="stylesheet" />

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
                    <div class="col-md-6 banner-details">
                        <div class="mx-auto">
                            <h1>Your Destination is our goal</h1>
                            <p>
                                Airport transfers & chauffeur services connecting all UK airports
                            </p>

                        </div>
                    </div>


                    <div class="col-md-6 box-padding">
                        <div class="book-form-box">
                            <div class="head">
                                <h1>BOOK NOW</h1>
                                <img src="assets/images/pay-options.png" class="img-fluid image-width" alt="Payement">
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

                                                <button style="float:right"><i
                                                        class="fa fa-plus-circle multi-root "></i> Multi Route</button>
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

                </div>
            </div>
        </section>



        <div class="text-container ">
            <p>
                For reliable and professional airport transfers, NoLimitCars has you covered. We offer 24/7 minicab
                services to all UK airports for individuals and groups, with clear, upfront pricing.
            </p>
            <p class="mt-4">
                For a hassle-free quote, fill out our online form or call us at <a href="tel:02039822911"> 02039 822 911.</a> Travel comfortably from
                Brighton to Heathrow, Gatwick, and beyond with us.
            </p>
        </div>


        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h1>OUR FLEET</h1>
                <div class="row mt-2 no-gutter-responsive">
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-1.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>SALOON CAR</h2>
                                <p>Up to 3 passengers plus 3 suitcases (20kg max) or 4 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-2.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>ESTATE CAR</h2>
                                <p>Up to 4 passengers plus 4 suitcases (20kg max).</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;4&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;4&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-3.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>PEOPLE CARRIER</h2>
                                <p>Up to 5 passengers plus 5 suitcases (20kg max) or 6 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;5&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;5&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-4.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>EXECUTIVE CAR</h2>
                                <p>Up to 3 passengers plus 3 suitcases (20kg max) or 4 passengers plus hand luggage</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-6.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>8 SEATER MINIBUS</h2>
                                <p>8 passengers plus up to 8 suitcases (20kg max)</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;8&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;8&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-5.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>EXECUTIVE PEOPLE CARRIER</h2>
                                <p>Up to 5 passengers plus 5 suitcases (20kg max) or 6 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;5&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;5&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-8.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>MOBILITY VEHICLE</h2>
                                <p>Exclusive to wheelchairs and passengers with disabilities. Any mobility scooter and
                                    wheelchair. Up to 4 passengers along with a 1 wheelchair passenger and luggages
                                    (20kg
                                    max).</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;4&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;1&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-9.png" class="img-fluid w-100 mt-4" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>VIP</h2>
                                <p>Up to 2 passengers plus 2 suitcases (20kg max) or 3 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;2&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;2&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-10.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>SUV</h2>
                                <p>Up to 3 passengers plus 3 suitcases (20kg max) or 4 passengers plus hand luggage.</p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;3&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="car-box">
                            <div class="w-100 image_card">
                                <img src="assets/images/fleet-7.png" class="img-fluid w-100" alt="car">
                            </div>
                            <div class="text_card">
                                <h2>16 SEATER MINIBUS</h2>
                                <p>12 passengers plus up to 12 suitcases (20kg max) or 16 passengers with hand luggage.
                                </p>
                                <div class="d-flex justify-content-between ">
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/passangers.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;12&nbsp;Passengers</h3>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <img src="assets/images/travel24/Suitcases.svg" class="img-fluid " alt="car">
                                        <h3>&nbsp;12&nbsp;Suitcases</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>








                    <div class="col-md-8">
                        <div class="list-details-box">
                            <div class="d-flex justify-content-between flag-div">
                                <h4>Your destination is our goal</h4>
                                <img src="assets/images/travel24/england.svg" class="img-fluid " alt="car">

                            </div>

                            <p>
                            When you choose us for your travel needs, we're committed to delivering a seamless experience from start to finish. Our diverse fleet, 
                            ranging from professional minicabs to executive chauffeurs and minibuses, is tailored to fit your specific passenger and luggage needs.
                            </p>
                            <p>
                            Our drivers are hand-picked for their exceptional customer service and in-depth local knowledge, ensuring a smooth and pleasant journey.
                            </p>


                            <p>
                            Plus, we're inclusive to all travelers with specially
                             designed wheelchair-accessible vehicles. Come take a look at our extensive fleet and find the perfect ride for you.
                            </p>

                            <p>
                            We offer a selection of wheelchair-accessible vehicles, ensuring comfortable travel for passengers with disabilities.
                             Take a glimpse at our extensive fleet tailored to meet diverse needs.
                            </p>

                          


                        </div>
                    </div>
                </div>

            </div>
        </section>





        <div class="image-container">
            <img src="assets/images/travel24/offer_image.svg" class="img-fluid offer-banner-img" alt="offer">
            <div class="text-overlay">
                <h1> GET 10% OFF</h1>
                <p>
                    Here's your coupon code
                </p>
                <h3>LUTH24</h3>
            </div>
        </div>







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