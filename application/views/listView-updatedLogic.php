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
    <link href="<?php echo base_url('assets/css/listView.css?v=9')?>" rel="stylesheet" />
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

    .list-box {
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .list-box:hover {
        border-color: #007bff;
        /* Bootstrap primary blue */
        background-color: #e6f0ff;
        /* Light blue background */
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }
    </style>
</head>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <main class="home">

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

                    <div class="col-lg-12 col-sm-12">
                        <div class="list-wrapper">


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

                            </div>


                            <!-- 
testing start ---------------- -->




                            <!-- Selected Vehicle Summary (Initially Hidden) -->
                            <div id="selected-vehicle-summary"
                                class="mb-4 p-3 border rounded shadow-sm bg-light d-none">
                                <h4 class="text-primary">Selected Vehicle</h4>
                                <p><strong>Vehicle:</strong> <span id="sel-vehicle-title"></span></p>
                                <p><strong>Passengers:</strong> <span id="sel-passengers"></span></p>
                                <p><strong>Suitcases:</strong> <span id="sel-suitcases"></span></p>
                                <p><strong>Fare:</strong> £<span id="sel-fare"></span></p>
                            </div>

                            <!-- Car Grid -->
                            <div class="row" id="car-grid">
                                <?php foreach($vehicle as $vh): ?>
                                <div class="col-md-3 mb-4">
                                    <div class="list-box text-center p-3 h-100 car-card"
                                        data-vehicle-id="<?php echo $vh->vehicle_id ?>"
                                        data-vehicle-title="<?php echo $vh->title ?>"
                                        data-passengers="<?php echo $vh->noOfPassengers ?>"
                                        data-suitcases="<?php echo $vh->noOfSuitcases ?>"
                                        id="vehicle<?php echo $vh->vehicle_id ?>">

                                        <!-- Car Image -->
                                        <img src="<?php echo base_url($vh->vehicle_image) ?>" class="img-fluid mb-3"
                                            alt="Car">

                                        <!-- Vehicle Title -->
                                        <h5 class="vehicle-title mt-2">
                                            <?php if($vh->title == "MOBILITY VEHICLE"): ?>
                                            <?php echo $vh->title ?>
                                            <img src="<?php echo base_url("assets/images/travel24/fleet/blue-disability.png") ?>"
                                                alt="disability" style="height: 20px;">
                                            <?php else: ?>
                                            <?php echo $vh->title ?>
                                            <?php endif; ?>
                                        </h5>

                                        <!-- Passengers and Suitcases -->
                                        <div class="d-flex justify-content-between gap-1 mb-3">
                                            <div class="d-flex">
                                                <img src="<?php echo base_url("assets/images/travel24/passangers.svg") ?>"
                                                    alt="Passengers" style="height: 20px;">
                                                <span class="ms-1"><?php echo $vh->noOfPassengers; ?></span>
                                            </div>
                                            <div class="d-flex">
                                                <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg") ?>"
                                                    alt="Suitcases" style="height: 20px;">
                                                <span class="ms-1"><?php echo $vh->noOfSuitcases; ?></span>
                                            </div>
                                        </div>

                                        <!-- Fare -->
                                        <div class="amount-div" data-vehicle-id="<?php echo $vh->vehicle_id ?>">
                                            <h5 class="single-amount">£<span
                                                    id="single-amount-<?php echo $vh->vehicle_id ?>"></span></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- 
testing end ---------------- -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script>
    var map;
    var waypoints
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $setting->google_api_key; ?>&v=3.exp&callback=initMap">
    </script>
    <script>
    var mile_array = new Array();


    $(document).ready(function() {
        $('.car-card').on('click', function() {
            $('.car-card').removeClass('selected');
            $(this).addClass('selected');

            const title = $(this).data('vehicle-title');
            const passengers = $(this).data('passengers');
            const suitcases = $(this).data('suitcases');
            const vehicleId = $(this).data('vehicle-id');
            const fare = $('#single-amount-' + vehicleId).text();

            $('#sel-vehicle-title').text(title);
            $('#sel-passengers').text(passengers);
            $('#sel-suitcases').text(suitcases);
            $('#sel-fare').text(fare);

            $('#selected-vehicle-summary').removeClass('d-none');
        });
    });




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

                                }
                            })
                        });
                    }
                }
            })
        }
    }





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