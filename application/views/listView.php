<?php /* list_and_book.php (merged) */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $setting->meta_keyword; ?>" />
    <meta name="description" content="<?php echo $setting->v_list_meta_desc; ?>" />
    <meta name="language" content="ES">
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Travel24</title>

    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css?v=19')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/listView.css?v=11')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/details.css?v=3')?>" rel="stylesheet" />

    <!-- jQuery (single include) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS (single include) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Moment (used by old code) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <!-- jQuery UI + Timepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <!-- Icons -->
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>

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
    .hidden {
        display: none !important;
    }

    .pointer {
        cursor: pointer;
    }

    /* Form is now always visible */
    .details-forms-wrapper {
        display: block;
    }

    .slide-anchor-spacer {
        height: 10px;
    }

    .list-box .card-footer h6 {
        font-weight: 700;
    }

    .info-icon {
        height: 20px;
    }

    .promo-text .code {
        font-weight: 700;
    }

    .selected-card {
        background-color: #004c78 !important;
        color: #fff;
    }
    </style>
</head>

<body>
    <?php $this->load->view('common_components/header'); ?>

    <main class="home">
        <!-- ===== VEHICLE LIST / FIRST SECTION ===== -->
        <section class="list-main-wrapper" id="vehicle-list-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="list-wrapper">
                            <!-- Pickup / Drop / Waypoints summary -->
                            <div class="row address-wrapper">
                                <div class="col-md-6 mt-2">
                                    <h2>PICK UP - POINT:</h2>
                                    <p id="src_text"><?php echo $post_data['source']; ?></p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <h2>DROP - POINT:</h2>
                                    <p id="dst_text"><?php echo $post_data['destination']; ?></p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <?php if(count($way_points) > 0){ ?>
                                    <h2 class="mt-2">WAY POINT - POINTS:</h2>
                                    <?php foreach ($way_points as $v) { ?>
                                    <p class="wp-item"><?php echo $v; ?></p>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- Vehicle cards -->
                            <div class="row mt-5">
                                <?php foreach ($vehicle as $vh) { ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4">
                                    <div class="card h-100 list-box text-center"
                                        data-vehicle="<?php echo $vh->vehicle_id ?>"
                                        data-vehicle-title="<?php echo htmlspecialchars($vh->title, ENT_QUOTES); ?>"
                                        data-suitcases="<?php echo (int)$vh->noOfSuitcases; ?>"
                                        data-passengers="<?php echo (int)$vh->noOfPassengers; ?>"
                                        id="vehicle<?php echo $vh->vehicle_id ?>">

                                        <img src="<?php echo base_url($vh->vehicle_image) ?>" class="card-img-top p-2"
                                            alt="Car">

                                        <div class="card-body px-1 pt-1">
                                            <h5 class="card-title"><?php echo $vh->title; ?></h5>

                                            <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url("assets/images/travel24/passangers.svg") ?>"
                                                        class="passanger_img" alt="Passengers"
                                                        style="height: 20px; margin-right: 6px;">
                                                    <span
                                                        class="passangers-text"><?php echo $vh->noOfPassengers; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg") ?>"
                                                        class="suitcases_img" alt="Suitcases"
                                                        style="height: 20px; margin-right: 6px;">
                                                    <span
                                                        class="suitcases-text"><?php echo $vh->noOfSuitcases; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer border-top-0" style="margin-top: -1.5rem !important;">
                                            <div class="d-flex justify-content-around amount-div"
                                                data-per-km="<?php echo $vh->perKm; ?>"
                                                data-per-km-return="<?php echo $vh->perKmReturn; ?>"
                                                data-vehicle-id="<?php echo $vh->vehicle_id; ?>">
                                                <div class="text-center">
                                                    <h6>£<span id="single-amount-<?php echo $vh->vehicle_id ?>"></span>
                                                    </h6>
                                                    <button class="btn btn-sm btn-slct-taxi"
                                                        style="background-color: white; color: #00517c; border: none; font-weight: 600;"
                                                        data-travel-type="1">
                                                        Book Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                            </div><!-- row -->
                        </div><!-- list-wrapper -->
                    </div>
                </div>
            </div>
        </section>

        <div class="slide-anchor-spacer" id="form-anchor"></div>

        <!-- ===== BOOKING FORM / SECOND SECTION (hidden initially) ===== -->
        <section class="details-forms-wrapper" id="booking-form-section">
            <div class="container">
                <!-- Selected Trip + Vehicle summary -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="details-box">
                            <!-- <button type="button" id="success_modal" class="btn btn-info btn-lg" style="display:none"
                                data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                            <div class="row">
                                <div class="col-md-12 no-gutter">
                                    <div class="trip-d">


                                        <div class="bottom">

                                            <div class="">

                                                <div class="info-item">
                                                    <h4 class="mb-3 text-right amount-text">Total Amount £<span
                                                            id="total_fare">0.00</span></h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- trip-d -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & Payment Form -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-from">
                            <div class="row">
                                <div class="col-md-12 brdr-b">
                                    <div class="form-group">
                                        <input type="text" id="first_name" class="formcontrol" name="first_name"
                                            placeholder="FULL NAME*" required>
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <input type="email" id="email_id" class="formcontrol"
                                            placeholder="E-MAIL ADDRESS*">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <input type="number" id="phone_no" name="phone_no" class="formcontrol"
                                            placeholder="PHONE NUMBER">
                                    </div>
                                </div>

                                <input type="hidden" id="exceed_time" value="0">

                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <input type="text" id="pick_up" class="formcontrol"
                                            placeholder="PICKUP DOOR NAME / HOME NUMBER">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <input type="text" id="flight_no" class="formcontrol"
                                            placeholder="FLIGHT NUMBER(IF APPLICABLE)">
                                    </div>
                                </div>

                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <p class="picker mb-2"><input onChange="checkDate()" required type="text"
                                                id="datepicker" class="w-100 custom-placeholder" autocomplete="off"
                                                placeholder="PICKUP DATE "></p>
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <p class="picker mb-2"><input type="text" class="w-100 custom-placeholder"
                                                id="timepicker" autocomplete="off" placeholder="PICKUP TIME "></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="promotion-btn paycash-btn promo-code mt-4"
                                        onclick="apply_promo_code()">Apply Promocode</button>
                                    <span class="promo-text">Enter <span class="code">LUTH25</span> to get 10 %
                                        off.</span>
                                </div>
                            </div>
                        </div>

                        <div class="bottom-buttons mb-3">
                            <div class="user-pay-type d-flex justify-content-end" style="gap: 3px;">
                                <?php foreach($payment_types as $pt){?>
                                <button class="paynow-btn payment-method" id="pay_btn_<?php echo $pt->method; ?>"
                                    data-method="<?php echo $pt->method; ?>">
                                    <a id="pay_now_a_<?php echo $pt->method; ?>"><?php echo $pt->title; ?>
                                        <span class="hidden spinner" id="loading_<?php echo $pt->method; ?>"></span>
                                    </a>
                                </button>
                                <?php } ?>
                                <span id="loading" class="hidden">
                                    <span id="hiddenBtn">
                                        <span class="spinner"></span>
                                    </span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- container -->
        </section>
    </main>

    <?php $this->load->view('common_components/footer'); ?>

    <!-- Your site JS (load once) -->
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>

    <!-- Google Maps (distance/fare calc) -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $setting->google_api_key; ?>&v=3.exp&callback=initMap">
    </script>

    <script>
    /* ===========================
   Shared Data From PHP
=========================== */
    var all_points = <?php echo json_encode($all_points); ?>; // list of points in order
    var total_way_point = "<?php echo $post_data['total_way_points']; ?>";
    var destination = "<?php echo $post_data['destination']; ?>";
    var source = "<?php echo $post_data['source']; ?>";

    /* ===========================
       Fare Calculation (unchanged logic)
    =========================== */
    var mile_array = [];
    var selected_vehicle_id = 0;
    var selected_travel_type = 0;
    var total_fare = 0;
    var directionsService = new google.maps.DirectionsService();
    var mile_total = 0;
    var subTotal = 0;
    var promoDiscountAmount = 0;
    var duration_total_minutes = 0;






    mile_array = [];
    mile_total = 0;
    duration_total_minutes = 0;

    for (var j = 0; j < all_points.length; j++) {
        var k = j + 1;
        if (all_points[k] !== undefined) {
            var request = {
                origin: all_points[j],
                destination: all_points[k],
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    var kil = response.routes[0].legs[0].distance.value / 1000;
                    var durationInSeconds = response.routes[0].legs[0].duration.value;
                    var durationInMinutes = durationInSeconds / 60;

                    mile_total += parseFloat(kil * 0.621371);
                    duration_total_minutes += durationInMinutes;
                    mile_array.push(kil);

                    if (mile_array.length === all_points.length - 1) {
                        // When all legs processed, request server prices for each vehicle row
                        $('.amount-div').each(function() {
                            var vehicle_id = $(this).attr('data-vehicle-id');
                            var special_location = '';

                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url('index/get_per_mile_charge')?>',
                                data: {
                                    vehicle_id: vehicle_id,
                                    total_mile: mile_total,
                                    special_location: special_location,
                                    durationInMinutes: duration_total_minutes,
                                    destination: destination,
                                    source: source
                                },
                                success: function(data) {
                                    var obj = jQuery.parseJSON(data);
                                    var total_amount_single = obj['single'];
                                    var total_amount_return = obj['retn'];

                                    if (total_amount_single == 0 ||
                                        total_amount_return == 0) {
                                        $("#vehicle" + vehicle_id).hide();
                                    }

                                    $("#single-amount-" + vehicle_id).text(parseFloat(
                                        total_amount_single).toFixed(2));
                                    $("#single-amount-" + vehicle_id).attr('data-fare',
                                        parseFloat(total_amount_single).toFixed(2));
                                    // (return amount UI removed on purpose—only single displayed)
                                }
                            });
                        });
                    }
                }
            });
        }
    }


    /* ===========================
       Book Now -> reveal form & fill values
    =========================== */
    // Make the whole card clickable instead of just Book Now button
    function handleVehicleSelection($box, travelType = "1") {
        // remove selection state
        $('.list-box').removeClass('selected-card');

        // add selection state to clicked card
        $box.addClass('selected-card');
        $(".promo-code").show();

        // capture selected vehicle
        selected_vehicle_id = $box.data('vehicle');
        selected_travel_type = travelType;

        // fare value from span
        total_fare = $("#single-amount-" + selected_vehicle_id).attr('data-fare') || "0.00";

        // vehicle info
        var vhTitle = $box.data('vehicle-title') || '';
        var vhPassengers = $box.data('passengers') || 0;
        var vhSuitcases = $box.data('suitcases') || 0;

        // fill the booking summary
        $("#bk-vehicle-title").text(vhTitle);
        $("#bk-passengers").text(vhPassengers);
        $("#bk-suitcases").text(vhSuitcases);
        $("#total_fare").text(parseFloat(total_fare).toFixed(2));
        subTotal = total_fare;

        // reveal form with slide and scroll
        var $section = $("#booking-form-section");
        if ($section.is(":hidden")) {
            $section.slideDown(250, function() {
                $('html, body').animate({
                    scrollTop: $("#form-anchor").offset().top - 10
                }, 350);
            });
        } else {
            $('html, body').animate({
                scrollTop: $("#form-anchor").offset().top - 10
            }, 350);
        }
    }

    // 📌 Click anywhere on the card
    $(document).on('click', '.list-box', function(e) {
        // skip if clicking directly on Book Now button (let its handler run)
        if ($(e.target).closest('.btn-slct-taxi').length) {
            return;
        }
        handleVehicleSelection($(this));
    });

    // 📌 Click Book Now button
    $(document).on('click', '.btn-slct-taxi', function(e) {
        e.stopPropagation(); // prevent triggering parent card click again
        var $box = $(this).closest('.list-box');
        var travelType = $(this).attr('data-travel-type') || "1";
        handleVehicleSelection($box, travelType);
    });



    /* ===========================
       Promo code modal flow (kept)
    =========================== */
    window.apply_promo_code = function() {
        var email_id = document.getElementById("email_id").value;
        $.confirm({
            title: 'Promo Code!',
            content: '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Do you have a discount code? Enter it here</label>' +
                '<input type="text" placeholder="Promocode" class="name form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var promo_code = this.$content.find('.name').val();
                        if (!promo_code) {
                            $.alert('Provide a valid Promocode');
                            return false;
                        }
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('index/check_promo_code') ?>",
                            data: {
                                promo_code: promo_code,
                                email_id: email_id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if (obj.msg === "success") {
                                    $.alert("You will get " + obj.result['discount'] +
                                        "% discount for this booking");
                                    var fare = parseFloat($("#total_fare").text() || "0");
                                    var discount_amt = (fare * obj.result['discount'] /
                                        100);
                                    promoDiscountAmount = discount_amt;
                                    subTotal = fare;
                                    var after_dscnt = (fare - discount_amt);
                                    $("#total_fare").text(after_dscnt.toFixed(2));
                                    $(".promo-code").hide();
                                } else {
                                    $.alert(obj.msg);
                                }
                            }
                        });
                    }
                },
                cancel: function() {}
            },
            onContentReady: function() {
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click');
                });
            }
        });
    };

    /* ===========================
       Date/Time picker + validations
    =========================== */
    function calculateTimeDifference(dateInput, timeInput) {
        const [day, month, year] = (dateInput || "").split("/");
        if (!day || !month || !year) {
            return {
                timeDifferenceMilliseconds: -Infinity,
                threeHoursInMilliseconds: 3 * 60 * 60 * 1000
            };
        }

        const [time, modifier] = (timeInput || "").split(" ");
        if (!time || !modifier) {
            return {
                timeDifferenceMilliseconds: -Infinity,
                threeHoursInMilliseconds: 3 * 60 * 60 * 1000
            };
        }

        let [hours, minutes] = time.split(":");
        if (modifier === "PM" && hours !== "12") {
            hours = parseInt(hours, 10) + 12;
        } else if (modifier === "AM" && hours === "12") {
            hours = "00";
        } else {
            hours = hours.toString().padStart(2, "0");
        }

        minutes = (parseInt(minutes || "0", 10)).toString().padStart(2, "0");

        const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}:00`;
        const enteredDateTime = new Date(formattedDateTime);
        const currentDateTime = new Date();

        const timeDifferenceMilliseconds = enteredDateTime - currentDateTime;
        const threeHoursInMilliseconds = 3 * 60 * 60 * 1000;
        return {
            timeDifferenceMilliseconds,
            threeHoursInMilliseconds
        };
    }

    function validatePhone(phoneno) {
        return /^\d{10}/.test(phoneno || "");
    }

    function ValidateEmail(mail) {
        return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail || "");
    }

    $(function() {


        // initial timepicker (in case date pre-selected later)
        $('#timepicker').timepicker({
            timeFormat: 'hh:mm p',
            interval: 15,
            minTime: '12:00am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });



    var min1 = new Date();

    var minUk = min1.toLocaleString('en-GB', {
        timeZone: 'Europe/London'
    });
    var ukdatetime = minUk.split(" ");
    console.log(ukdatetime)
    var uktime = ukdatetime[1];
    var ukdates = ukdatetime[0].split(",");
    var ukdate = ukdates[0];
    var ukhourminute = uktime.split(":");
    var ukhour = ukhourminute[0];
    var ukminute = ukhourminute[1];


    var min = new Date();

    strMin = $.datepicker.formatDate("dd/mm/yy", min);
    console.log('india', strMin)
    console.log('uk', ukdate)
    // min.setHours(min.getHours() + 0.5);
    // min.setMinutes(min.getMinutes() + (15 - min.getMinutes() % 15))
    min.setHours(ukhour);
    min.setMinutes(ukminute)
    console.log('uk-min', min)
    $('#datepicker').datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
        onSelect: function(v) {
            $("#timepicker").val('')
            console.log("v", v)
            console.log("strMin", strMin)
            $('#timepicker').timepicker('option', 'minTime', v == ukdate ? min : '12:00am');
            //  $('#timepicker').timepicker('option', 'minTime', v == strMin ? min : '12:00am');
        }
    });

    /* ===========================
       Payment submit (merged)
    =========================== */
    $('.payment-method').click(function() {
        if (selected_vehicle_id == 0) {
            alert("Please select a vehicle before proceeding with payment.");
            return;
        }

        // check total fare before anything else
        var totalFareValue = parseFloat($("#total_fare").text() || "0");
        if (isNaN(totalFareValue) || totalFareValue <= 0) {
            alert("Something went wrong. Please refresh the page and try again.");
            return;
        }

        // basic validation
        var valid_phone = validatePhone($("#phone_no").val());
        var valid_email = ValidateEmail($("#email_id").val());

        const dateInputValue = $("#datepicker").val();
        const timeInputValue = $("#timepicker").val();
        const {
            timeDifferenceMilliseconds,
            threeHoursInMilliseconds
        } = calculateTimeDifference(dateInputValue, timeInputValue);



        if ($("#exceed_time").val() == "1") {
            alert("You should book 3 hour prior to your journey");
            return;
        } else if ($("#datepicker").val() == '' || $("#timepicker").val() == '') {
            alert("Please fill Journey details to proceed");
            return;
        } else if ($("#first_name").val() == '' || $("#email_id").val() == '' || $("#phone_no").val() == '') {
            alert("Please fill all mandatory contact details to proceed");
            return;
        } else if (valid_phone == false) {
            alert("Please enter a valid phone number");
            return;
        } else if (valid_email == false) {
            alert("You have entered an invalid email address!");
            return;
        }
        if (timeDifferenceMilliseconds < threeHoursInMilliseconds) {
            alert(
                "The entered date and time is less than 3 hours. Please book at least 3 hours in advance or call us."
            );
            return;
        }

        var jouney_date = $("#datepicker").val();
        var journey_time = $("#timepicker").val();
        var first_name = $("#first_name").val();
        var last_name = '';
        var email = $("#email_id").val();
        var phone = $("#phone_no").val();
        var pick_up = $("#pick_up").val();
        var flight_no = $("#flight_no").val();

        // optional extras (kept the variables even if not present in UI)
        var no_of_passenger = 0;
        var no_of_suitcase = 0;
        var hand_lagguage = 0;
        var child_seat = 0;
        var meet_and_greet = 0;
        var drop_off = 0;
        var scomments_special_inst = '';

        var methodAttr = $(this).attr('data-method');
        var payment_method = (methodAttr === "pay_now_p") ? "paypal" : (methodAttr === "pay_now_l") ? "lloyds" :
            "cash";
        var selected_vehicle_name = $(".list-box.selected-card").data("vehicle-title") || "";

            // Ensure promoDiscountAmount is formatted to 2 decimals
            promoDiscountAmount = parseFloat(promoDiscountAmount || 0).toFixed(2);

        // Persist selection like original flow expected
        // (server can read from session or request—here we send as part of init)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index/booking_init') ?>",
            data: {
                payment_method: payment_method,
                jouney_date: jouney_date,
                journey_time: journey_time,
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                pick_up: pick_up,
                flight_no: flight_no,
                no_of_passenger: no_of_passenger,
                no_of_suitcase: no_of_suitcase,
                hand_lagguage: hand_lagguage,
                child_seat: child_seat,
                meet_and_greet: meet_and_greet,
                drop_off: drop_off,
                scomments_special_inst: scomments_special_inst,
                selected_vehicle_id: selected_vehicle_id,
                selected_vehicle_name: selected_vehicle_name,
                selected_travel_type: selected_travel_type,
                subTotal: subTotal,
                promoDiscountAmount: promoDiscountAmount,
                total_fare: $("#total_fare").text(),

            },
            success: function(data) {
                // visual loading feedback
                $('.payment-method').addClass('hide');
                var obj = {};
                try {
                    obj = jQuery.parseJSON(data);
                } catch (e) {}

                if (payment_method === "cash") {
                    // 👉 As requested: redirect to thank-you page (no modal)
                    // var obj = jQuery.parseJSON(data);

                    // if (obj.result['booking_id'] != "") {
                    //     $("#book_id").text(obj.result['booking_id']);
                    //     get_book_details(obj.result['booking_id'])
                    //     $("#success_modal").trigger('click')

                    // }
                    alert(
                        "Thank you for your booking! We have sent you a email for the confirmation ."
                    );
                    window.location.replace('<?php echo base_url('/')?>');
                } else if (payment_method === "lloyds") {
                    // keep original IPG behaviour (bank page in new tab/window)
                    window.open('<?php echo base_url('index/ipg')?>');
                     
                } else {
                    // PayPal flow (server handles redirect)
                    window.location.replace('<?php echo base_url('payment/create_payment')?>');
                    //   alert(
                    //     "Thank you for your booking! We have sent you a email for the confirmation ."
                    // );
                }
            }
        });

        // button/loader feedback
        var button = this;
        var loading = $("#loading");
        var hiddenBtn = $("#hiddenBtn");
        $(button).prop('disabled', true);
        hiddenBtn.prop('disabled', true);
        loading.show();
        setTimeout(function() {
            $(button).prop('disabled', false);
            loading.hide();
        }, 6000);
    });

    /* ===========================
       Helper to keep original checkDate hook (no-op safe)
    =========================== */
    function checkDate() {
        /* reserved for any custom logic you had before */
    }
    </script>

    <!-- jQuery Confirm (used in promo) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</body>

</html>