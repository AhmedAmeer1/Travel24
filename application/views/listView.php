<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $setting->meta_keyword; ?>" />
    <meta name="description" content="<?php echo $setting->v_list_meta_desc; ?>" />
    <meta name="language" content="ES">
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Travel24</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?> ">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/listView.css?v=10')?>" rel="stylesheet" />
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
    <style>
    .hide {
        display: none;
    }

    .circle {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: white;
        border-radius: 50%;
        margin-left: 5px;
    }

    .card-title {
        font-size: 12px;
        font-weight: 600;
        margin: 10px 0;
    }

    .card-footer .btn {
        font-size: 12px;
        padding: 4px 10px;
    }
.passangers-text{
    font-size: 11px;
}
.suitcases-text{
    font-size: 11px;
}
    .amount-div h6 {
        margin-bottom: 5px;
        font-weight: bold;
         font-size: 12px;
    }
.bg-graycolor{
        background-color: rgb(191 198 201) !important;
    }

    .list-box {
        border: 1px solid #004C78;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .list-box:hover {
        transform: scale(1.05);
    }

    .list-box .card-body {
        padding: 10px;
}
    .circle {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: white;
        border-radius: 50%;
        margin-left: 5px;
        border: 1px solid #004C78;
    }

    .card .img-fluid {
        height: 150px;
        object-fit: cover;
    }

    .disability_img {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <main class="home">
        <!-- <div class="inner-header-wrapper ">
            <div class="col-12 text-center  booking-form">
                <h1>Booking Form </h1>
                <p>Passengers & Luggages</p>
            </div>
        </div> -->
        <div class="way-points-option" style="display:none"><input type="checkbox" name="way_points[]" checked="true"
                class="way_points" value="<?php echo $post_data['source']; ?>"> <?php echo $post_data['source'];?></div>
        <?php
             foreach ($way_points as $k => $v) {
        ?>
        <div class="way-points-option" style="display:none"><input type="checkbox" name="way_points[]" checked="true"
                class="way_points" value="<?php echo $v; ?>"> <?php echo $v;?></div>
        <?php
        }
    ?>
        <div class="way-points-option" style="display:none"><input type="checkbox" name="way_points[]" checked="true"
                class="way_points" value="<?php echo $post_data['destination']; ?>">
            <?php echo $post_data['destination'];?></div>
        <section class="list-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-3 col-sm-12">
                        <div class="side-wrapper">
                            <h1>Summary</h1>
                            <h2>PICK UP - POINT:</h2>
                            <p><?php echo $post_data['source'] ?></p>
                            <?php 
                               // $total_wayPoints = count($way_points)-2;
                               if(count($way_points)> 0){?>
                            <h2>WAY POINT - POINTS:</h2>
                            <?php }
                                 foreach ($way_points as $k => $v) {
                                    //  if($k !=0 && $k!=(count($way_points)-1)){?>

                            <p><?php echo $v ?></p>
                            <?php }?>
                            <h2>DROP - POINT:</h2>
                            <p><?php echo $post_data['destination'] ?></p>
                        </div>
                        <div id="map-layer" style="margin: 20px 0px; max-width: 100%; min-height: 400;">Loading</div>
                    </div> -->
                    <div class="col-lg-12 col-sm-12">
                        <div class="list-wrapper">
                            <!-- <div class="choose-heading">Choose an option. (All card charges included)</div> -->


                            <div class="row address-wrapper">
                                <div class="col-md-6 mt-2">
                                    <h2>PICK UP - POINT:</h2>
                                    <p><?php echo $post_data['source'] ?></p>

                                </div>


                                <div class="col-md-6  mt-2">
                                    <h2>DROP - POINT:</h2>
                                    <p><?php echo $post_data['destination'] ?></p>
                                </div>
                                <div class="col-md-6  mt-2">
                                    <?php 
                               // $total_wayPoints = count($way_points)-2;
                                    if(count($way_points)> 0){?>
                                    <h2 class="mt-2 ">WAY POINT - POINTS:</h2>
                                    <?php }
                                        foreach ($way_points as $k => $v) {
                                    //  if($k !=0 && $k!=(count($way_points)-1)){?>

                                    <p><?php echo $v ?></p>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="filter-wrapper hide">
                                <input type="hidden" id="special_location" value="<?php echo $special_location;?>">
                                <h3>PASSENGERS AND LUGGAGE</h3>
                                <div class="row">
                                    <div class="col-md-4 no-gutter">
                                        <div class="filter-box brdr-right">
                                            <h4>NUMBER OF PASSENGERS</h4>
                                            <select id="passenger_count" class="formcontrol filter-result">
                                                <?php for($i=1;$i<=$max_passenger;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 no-gutter">
                                        <div class="filter-box brdr-right">
                                            <h4>NUMBER OF SUITCASES</h4>
                                            <select id="suitcase_count" class="formcontrol filter-result">
                                                <?php for($j=1;$j<=$max_suit_case;$j++){?>
                                                <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                                <?php }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4 no-gutter">
                                        <div class="filter-box">
                                            <h4>VEHICLE TYPE</h4>
                                            <select id="vehicle_type" class="formcontrol filter-result">
                                                <option value="0">- All Vehicles -</option>
                                                <?php foreach($vehicle_type as $vt){?>

                                                <option value="<?php echo $vt->id; ?>"><?php echo $vt->type; ?></option>
                                                <?php }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5">
                                <?php foreach ($vehicle as $vh) { ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100 list-box text-center bg-graycolor"
                                        data-vehicle="<?php echo $vh->vehicle_id ?>"
                                        id="vehicle<?php echo $vh->vehicle_id ?>">
                                        <!-- Vehicle Image -->
                                        <img src="<?php echo base_url($vh->vehicle_image) ?>"
                                            class="card-img-top p-2" alt="Car">

                                        <div class="card-body px-1 pt-1  ">
                                            <!-- Vehicle Title -->
                                            <h5 class="card-title">
                                                <?php if ($vh->title == "MOBILITY VEHICLE") { ?>
                                                <?php echo $vh->title ?>
                                                <img src="<?php echo base_url("assets/images/travel24/fleet/blue-disability.png") ?>"
                                                    class="disability_img" alt="disability"
                                                    style="height: 20px; margin-left: 5px;">
                                                <?php } else { ?>
                                                <?php echo $vh->title ?>
                                                <?php } ?>
                                            </h5>


                                            <!-- Passenger & Suitcase Info -->
                                            <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                                                <!-- Passengers -->
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url("assets/images/travel24/passangers.svg") ?>"
                                                        class="passanger_img" alt="Passengers"
                                                        style="height: 20px; margin-right: 6px;">
                                                    <span class="passangers-text"><?php echo $vh->noOfPassengers; ?> </span>
                                                </div>

                                                <!-- Suitcases -->
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg") ?>"
                                                        class="suitcases_img" alt="Suitcases"
                                                        style="height: 20px; margin-right: 6px;">
                                                    <span class="suitcases-text"><?php echo $vh->noOfSuitcases; ?> </span>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Fare Info -->
                            <div class="card-footer border-top-0 bg-graycolor" style="margin-top: -1.5rem !important;">

                                            <div class="d-flex justify-content-around amount-div"
                                                data-per-km="<?php echo $vh->perKm; ?>"
                                                data-per-km-return="<?php echo $vh->perKmReturn; ?>"
                                                data-vehicle-id="<?php echo $vh->vehicle_id; ?>">
                                                <div class="text-center ">
                                                    <h6>£<span id="single-amount-<?php echo $vh->vehicle_id ?>"></span>
                                                    </h6>
                                                    <button class="btn btn-outline-primary btn-sm btn-slct-taxi"
                                                        data-travel-type="1">
                                                        Single
                                                        <span class="circle"></span>
                                                    </button>
                                                </div>
                                                <!-- <div class="text-center">
                                                    <h6>£<span id="return-amount-<?php echo $vh->vehicle_id ?>"></span>
                                                    </h6>
                                                    <button class="btn btn-outline-primary btn-sm btn-slct-taxi"
                                                        data-travel-type="2">
                                                        Return
                                                        <span class="circle"></span>
                                                    </button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script>
    var map;
    var waypoints

    function initMap() {
        var mapLayer = document.getElementById("map-layer");
        var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
        var defaultOptions = {
            center: centerCoordinates,
            zoom: 4
        }
        map = new google.maps.Map(mapLayer, defaultOptions);
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);

        // $("#go").on("click",function() {
        waypoints = Array();
        $('.way_points:checked').each(function() {
            waypoints.push({
                location: $(this).val(),
                stopover: true
            });
        });
        var locationCount = waypoints.length;
        if (locationCount > 0) {
            var start = waypoints[0].location;
            var end = waypoints[locationCount - 1].location;

            drawPath(directionsService, directionsDisplay, start, end);
        }
        // });

    }

    function drawPath(directionsService, directionsDisplay, start, end) {
        directionsService.route({
            origin: start,
            destination: end,
            waypoints: waypoints,
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Problem in showing direction due to ' + status);
            }
        });
    }
    </script>
    <!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnCzDk6ec1OJFcW5FYgxP3LWVHMNumGDM&callback=initMap">
    </script> -->

    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $setting->google_api_key; ?>&v=3.exp&callback=initMap">
    </script>
    <script>
    var mile_array = new Array();


    // function test(a,b){

    //         var request = {
    //   origin      : a, // a city, full address, landmark etc
    //   destination : b,
    //   travelMode  : google.maps.DirectionsTravelMode.DRIVING
    //     };
    //     directionsService.route(request, function(response, status) {
    //         if ( status == google.maps.DirectionsStatus.OK ) {

    //             var kil =   response.routes[0].legs[0].distance.value/1000;
    //              var total_mile = parseFloat( kil * 0.621371);
    //              final_mile = final_mile+total_mile;
    //              alert("tes"+total_mile)
    //              mile_array.push(total_mile);




    //         }
    //     })

    // }
    var selected_vehicle_id = 0;
    var selected_travel_type = 0;
    var total_fare = 0;

    var directionsService = new google.maps.DirectionsService();
    //   
    var total_way_point = "<?php echo $post_data['total_way_points'] ?>";
    var destination = "<?php echo $post_data['destination'] ?>";
    var source = "<?php echo $post_data['source'] ?>";
    var loop_count = parseInt(total_way_point) + 2;
    var res;
    var all_points = <?php echo json_encode($all_points); ?>;
    var mile_total = 0;
    for (var j = 0; j < all_points.length; j++) {
        var k = j + 1;

        if (all_points[k] != undefined) {
            // res=  test(all_points[j],all_points[k])
            var request = {
                origin: all_points[j], // a city, full address, landmark etc
                destination: all_points[k],
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {

                    var kil = response.routes[0].legs[0].distance.value / 1000;

                    var minutes = response.routes[0].legs[0].duration.value / 60;
                    var durationInSeconds = response.routes[0].legs[0].duration.value;
                    var durationInMinutes = durationInSeconds / 60;
                    var durationInHours = durationInMinutes / 60;




                    var total_mile = parseFloat(kil * 0.621371);
                    mile_total += total_mile;
                    mile_array.push(total_mile);
                    console.log('mile_array.length', mile_array.length)
                    console.log('all_points.lengt', all_points.length - 1)
                    if (mile_array.length == all_points.length - 1) {
                        console.log('mile_array', mile_array)
                        console.log('mile_total', mile_total)
                        //
                        $('.amount-div').each(function(index) {
                            let km_per_hour = $(this).attr('data-per-km');
                            let vehicle_id = $(this).attr('data-vehicle-id');
                            let special_location = $("#special_location").val();

                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('index/get_per_mile_charge')?>',
                                data: {
                                    vehicle_id: vehicle_id,
                                    total_mile: mile_total,
                                    special_location: special_location,
                                    durationInMinutes: durationInMinutes,
                                    destination: destination,
                                    source: source

                                },
                                success: function(data) {
                                    var obj = jQuery.parseJSON(data);

                                    // var total_amount_single = obj['single']*total_mile;
                                    // var total_amount_return = obj['retn']*total_mile;
                                    var total_amount_single = obj['single'];
                                    var total_amount_return = obj['retn']
                                    if (obj['single'] == 0 || obj['retn'] == 0) {
                                        $("#vehicle" + vehicle_id).hide();
                                    }

                                    console.log("AIRPORT AMOUNT CHECK---------", obj)

                                    if (total_amount_single == 0 || total_amount_return ==
                                        0) {
                                        $("#vehicle" + vehicle_id).hide();
                                    }

                                    $("#single-amount-" + vehicle_id).text(
                                        total_amount_single.toFixed(2));
                                    $("#single-amount-" + vehicle_id).attr('data-fare',
                                        total_amount_single.toFixed(2));
                                    $("#return-amount-" + vehicle_id).text((
                                        total_amount_return).toFixed(2));
                                    $("#return-amount-" + vehicle_id).attr('data-fare', (
                                        total_amount_return).toFixed(2));
                                    // $("#return-amount-"+vehicle_id).text((total_amount_return*2).toFixed(2));
                                    // $("#return-amount-"+vehicle_id).attr('data-fare',(total_amount_return*2).toFixed(2));
                                }
                            })

                            // var total_amount = km_per_hour*kil;

                        });


                        //
                    }




                }
            })

        }


    }




    //


    // var request = {
    //   origin      : "<?php echo $post_data['source'] ?>", // a city, full address, landmark etc
    //   destination : "<?php echo $post_data['destination'] ?>",
    //   travelMode  : google.maps.DirectionsTravelMode.DRIVING
    // };

    // directionsService.route(request, function(response, status) {
    //     console.log('response',response)
    //   if ( status == google.maps.DirectionsStatus.OK ) {
    //       $("#total_kilometer").val(response.routes[0].legs[0].distance.value/1000);
    //         var kil =   response.routes[0].legs[0].distance.value/1000;
    //         var total_mile = parseFloat( kil * 0.621371);
    //         //i km = 0.621371 mile
    //         $('.amount-div').each(function( index ) {
    //         let km_per_hour =  $(this).attr('data-per-km');
    //         let vehicle_id =$(this).attr('data-vehicle-id');
    //         let special_location =$("#special_location").val();

    //         $.ajax({
    //                 type: "POST",
    //                 url: '<?php echo base_url('index/get_per_mile_charge')?>',
    //                 data: {vehicle_id:vehicle_id,total_mile:total_mile,special_location:special_location},
    //                 success: function(data)
    //                 {
    //                     var obj = jQuery.parseJSON(data);

    //                     // var total_amount_single = obj['single']*total_mile;
    //                     // var total_amount_return = obj['retn']*total_mile;
    //                     var total_amount_single = obj['single'];
    //                     var total_amount_return = obj['retn'];
    //                     if(obj['single'] == 0 || obj['retn'] == 0){
    //                         $("#vehicle"+vehicle_id).hide();
    //                     }
    //                     if(total_amount_single == 0 || total_amount_return == 0){
    //                         $("#vehicle"+vehicle_id).hide();
    //                     }

    //         $("#single-amount-"+vehicle_id).text(total_amount_single.toFixed(2));
    //         $("#single-amount-"+vehicle_id).attr('data-fare',total_amount_single.toFixed(2));
    //         $("#return-amount-"+vehicle_id).text((total_amount_return).toFixed(2));
    //         $("#return-amount-"+vehicle_id).attr('data-fare',(total_amount_return).toFixed(2));
    //         // $("#return-amount-"+vehicle_id).text((total_amount_return*2).toFixed(2));
    //         // $("#return-amount-"+vehicle_id).attr('data-fare',(total_amount_return*2).toFixed(2));
    //                 }
    //         })

    //         // var total_amount = km_per_hour*kil;

    //         });
    //   }
    //   else {
    //     // oops, there's no route between these two locations
    //     // every time this happens, a kitten dies
    //     // so please, ensure your address is formatted properly
    //   }
    //});

    $('.filter-result').change(function() {
        let no_of_passenger = $("#passenger_count").val();
        let no_of_suitcase = $("#suitcase_count").val();
        let vehicle_type = $("#vehicle_type").val();
        var url = "<?php echo base_url('index/filter_result')?>";
        var vehicles = new Array();
        var filter_vehicles = new Array();
        $('.list-box').each(function() {
            vehicles.push($(this).attr('data-vehicle'));
        })

        if (no_of_passenger != 1 || no_of_suitcase != 1 || vehicle_type != 0) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    no_of_passenger: no_of_passenger,
                    no_of_suitcase: no_of_suitcase,
                    vehicle_type: vehicle_type
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    var res = obj.result;
                    $.each(res, function(index, value) {
                        filter_vehicles.push(value.vehicle_id);
                    });
                    // var first = [ 1, 2, 3, 4, 5 ];
                    // var second = [ 4, 5, 6 ];

                    var difference = vehicles.filter(x => filter_vehicles.indexOf(x) === -1);
                    console.log(difference);
                    $('.list-box').removeClass('hide')
                    $.each(difference, function(index, value) {
                        $("#vehicle" + value).addClass('hide')

                    });


                },

            });
        }
    })
    $('.btn-slct-taxi').click(function() {
        $('.btn-slct-taxi').removeClass('fa fa-check');
        $(this).addClass('fa fa-check');
        selected_vehicle_id = $(this).closest('div.list-box').attr('data-vehicle');
        selected_travel_type = $(this).attr('data-travel-type');
        if (selected_travel_type == "1") {
            total_fare = $("#single-amount-" + selected_vehicle_id).attr('data-fare')
        } else {
            total_fare = $("#return-amount-" + selected_vehicle_id).attr('data-fare')
        }
        var url = "<?php echo base_url('index/journey_details')?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                selected_vehicle_id: selected_vehicle_id,
                selected_travel_type: selected_travel_type,
                total_fare: total_fare
            },
            success: function(data) {
                window.location.replace('<?php echo base_url('index/journey_data')?>');
            }
        })

    })
    $('#contact_details').click(function() {
        var url = "<?php echo base_url('index/journey_details')?>";
        if (selected_vehicle_id == 0) {
            alert("Please choose vehicle to proceed")
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    selected_vehicle_id: selected_vehicle_id,
                    selected_travel_type: selected_travel_type,
                    total_fare: total_fare
                },
                success: function(data) {
                    window.location.replace('<?php echo base_url('index/journey_data')?>');
                }
            })


        }

    })
    </script>