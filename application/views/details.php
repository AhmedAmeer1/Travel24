<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $setting->meta_keyword; ?>" />
    <meta name="description" content="<?php echo $setting->journey_meta_desc; ?>" />
    <meta name="language" content="ES">
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Travel24</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css?v=19')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/details.css?v=19')?>" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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
<style>
.info-container {
    display: flex;
    align-items: center;
}

.info-item {
    padding: 0 15px;
    position: relative;
    text-align: center;
}

.info-item:not(:first-child)::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10%;
    height: 80%;
    width: 1px;
    background-color: black;
}

.info-item h4 {
    margin: 0;
}



.info-icon {
    width: 20px !important;
    height: auto;

}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <main class="home">
        <!-- <div class="inner-header-wrapper ">
            <div class="col-12 text-center  booking-form">
                <h1>Booking Form </h1>
                <p>Please check journey details and select date and time</p>
            </div>
        </div> -->
        <section class="details-main-wrapper">
            <div class="container">
                <!-- <p class="formHeading">Please check journey details</p> -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- <h1>Please check journey details and select date and time</h1> -->
                        <div class="details-box">
                            <!-- <h2>JOURNEY DETAILS</h2> -->
                            <button type="button" id="success_modal" class="btn btn-info btn-lg" style="display:none"
                                data-toggle="modal" data-target="#myModal">Open Modal</button>
                            <div class="row">

                                <div class="col-md-12 no-gutter">
                                    <div class="trip-d">

                                        <?php  if($vechicle_data->title == "MOBILITY VEHICLE"){?>

                                        <h1><?php echo $vechicle_data->title;?>(
                                            <img src="<?php echo base_url("assets/images/travel24/fleet/blue-disability.png")?> "
                                                class="disability_img" alt="disability icon">
                                            Vehicle),

                                            <?php }  else { ?>
                                            <!-- <h1><?php echo $vechicle_data->title;?>,
                                                <?php }  ?>
                                                <span><?php echo ($_SESSION["journey_type"] =="1"?"Single":"Return") ?>
                                                    TRIP</span>
                                            </h1> -->
                                            <!-- <p><?php echo $vechicle_data->vehicle_description?></p> -->

                                            <div class="destination-details">
                                                <div class="row">
                                                    <div class="col-md-6 " style="margin-left: -14px;">
                                                        <h3>PICK UP - POINT:</h3>
                                                        <p><?php echo $_SESSION["source"];?></p>
                                                    </div>
                                                    <?php 
                                                if($_SESSION["total_way_points"] > 0){?>
                                                    <div class="col-md-6" style="margin-left: -14px;">
                                                        <h3>WAY POINTS</h3>
                                                        <?php
                                                    foreach ($_SESSION["way_points"] as $k => $v) {
                                                    // if($k !=0 && $k!=(count($_SESSION["way_points"])-1)){?>
                                                        <p><?php echo $v;?></p>
                                                        <?php }
                                                    ?>
                                                    </div>
                                                    <?php }
                                                ?>
                                                    <div class="col-md-6" style="margin-left: -14px;">
                                                        <h3>DROP - POINT:</h3>
                                                        <p><?php echo $_SESSION["destination"];?></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- <div class="d-flex justify-content-between mt-2">
                                                <div class="d-flex justify-content-between ">
                                                    <img src="<?php echo base_url("assets/images/travel24/passangers.svg")?>"
                                                        class="img-fluid " alt="passangers">
                                                    <h3 class="mt-2">
                                                        &nbsp;<?php echo $vechicle_data->noOfPassengers?>&nbsp;Passengers
                                                    </h3>
                                                </div>
                                                <div class="d-flex justify-content-between ">
                                                    <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg")?>"
                                                        class="img-fluid " alt="Suitcases">
                                                    <h3 class="mt-2 fs-2">
                                                        &nbsp;<?php echo $vechicle_data->noOfSuitcases?>&nbsp;Suitcases
                                                    </h3>
                                                </div>
                                            </div> -->

                                            <div class="bottom">
                                                <!-- <img src="<?php echo base_url($vechicle_data->vehicle_image)?>"
                                                    alt="Car"> -->
                                                <h4 class="mt-2"><?php echo $vechicle_data->title;?></h4>

                                                <div class="info-container">
                                                    <div class="info-item d-flex justify-content-between">
                                                        <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg")?>"
                                                            class="info-icon" alt="Suitcases">
                                                        <h4 class="my-auto">
                                                            &nbsp;<span><?php echo $vechicle_data->noOfSuitcases; ?></span>
                                                        </h4>
                                                    </div>
                                                    <div class="info-item d-flex justify-content-between">
                                                        <img src="<?php echo base_url("assets/images/travel24/passangers.svg")?>"
                                                            class=" info-icon" alt="passangers">
                                                        <h4 class="my-auto">
                                                            &nbsp;
                                                            <span><?php echo $vechicle_data->noOfPassengers; ?></span>
                                                        </h4>
                                                    </div>
                                                    <div class="info-item">
                                                        <h4 class="my-auto">
                                                            £<span id="total_fare">
                                                                <?php echo ($_SESSION["total_fare"]==0 ? $_SESSION["base_fare"] : $_SESSION["total_fare"]); ?>
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
        <section class="details-forms-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <h1 class="d-head">New Users please complete details below</h1> -->


                        <div class="user-from">
                            <!-- <h2>CONTACT DETAILS</h2> -->
                            <div class="row">
                                <div class="col-md-12 brdr-b">
                                    <div class="form-group">
                                        <!-- <label>Full NAME*</label> -->

                                        <input type="text" id="first_name" class="formcontrol" name="first_name"
                                            placeholder="FULL NAME*" required>
                                    </div>
                                </div>
                                <script></script>

                                </script>
                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <!-- <label>E-MAIL ADDRESS*</label> -->
                                        <input type="email" id="email_id" class="formcontrol"
                                            placeholder="E-MAIL ADDRESS*">

                                    </div>
                                </div>

                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <!-- <label>PHONE NUMBER</label> -->
                                        <input type="number" id="phone_no" name="phone_no" class="formcontrol"
                                            placeholder="PHONE NUMBER">
                                    </div>
                                </div>

                                <input type="hidden" id="exceed_time" value="0">
                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <!-- <label>PICKUP DOOR NAME / HOME NUMBER</label> -->
                                        <input type="text" id="pick_up" class="formcontrol"
                                            placeholder="PICKUP DOOR NAME / HOME NUMBER">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <!-- <label>FLIGHT NUMBER(IF APPLICABLE)</label> -->
                                        <input type="text" id="flight_no" class="formcontrol"
                                            placeholder="FLIGHT NUMBER(IF APPLICABLE)">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b-r ">
                                    <div class="form-group">
                                        <div class="picker-head">

                                            <!-- <label>Pickup Date</label> -->
                                        </div>
                                        <p class="picker mb-2"><input onChange="checkDate()" required type="text"
                                                id="datepicker" class="w-100 custom-placeholder" autocomplete="off"
                                                placeholder="PICKUP DATE "></p>


                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b ">
                                    <div class="form-group">
                                        <div class="picker-head h-5">

                                            <!-- <label>Pickup Time</label> -->
                                        </div>
                                        <p class="picker mb-2"><input type="text" class="w-100 custom-placeholder"
                                                id="timepicker" autocomplete="off" placeholder="PICKUP TIME ">
                                        </p>
                                    </div>

                                </div>









                                <div class="col-md-12  ">
                                    <button class=" promotion-btn  paycash-btn promo-code mt-4"
                                        onclick="apply_promo_code()">Apply Promocode</button> <span
                                        class="promo-text">Enter <span class="code">LUTH25</span> to get 10 % off.
                                    </span>

                                </div>
                            </div>


                        </div>
                        <!------------------------------------------ OLD PAYMENT CODE START ---------------------------------------- -->

                        <div class="bottom-buttons mb-3">
                            <div class="user-pay-type d-flex justify-content-end" style="gap: 3px;">
                                <?php foreach($payment_types as $pt){?>
                                <button class="paynow-btn payment-method" id="myButton"
                                    data-method=<?php echo $pt->method ?>><a id="pay_now_a"><?php echo $pt->title ?>
                                        <span class=" hidden spinner" id="loading"></span></a></button>
                                <?php }?>

                                <span id="loading" class="hidden">
                                    <span id="hiddenBtn">
                                        <span class="spinner">
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>


                        <!------------------------------------------ OLD PAYMENT CODE END ---------------------------------------- -->



                    </div>
                </div>

        </section>
    </main>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Your Booking has been successfully completed</h4>
                </div>
                <div class="modal-body">
                    <strong>Booking-ID : <span id="book_id"></span></strong><br />
                    <span>Amount:</span>: £ <span id="book_amount"></span><br />
                    <span>Date</span>: <span id="book_date"></span><br />

                    <!-- <span>Time</span>: <span id="book_time"></span><br/> -->

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
    $(document).ready(function() {

        var payment_status = '<?php echo $payment_status;?>';

        var book_id = '<?php echo $booking_id;?>';

        if (payment_status == "done" && book_id != 0) {


            get_book_details(book_id)
            $('.payment-method').addClass('hide')
            $("#book_id").text('<?php echo $booking_id;?>');
            $("#success_modal").trigger('click')

        }

    })
    window.get_book_details = function(book_id) {
        var url = "<?php echo base_url('index/get_book_data') ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                book_id: book_id
            },
            success: function(result) {

                var obj = jQuery.parseJSON(result);



                $("#book_date").text(obj.result['travel_date'])
                $("#book_amount").text(obj.result['amount'])


            }
        })

    };
    window.apply_promo_code = function(email_id) {
        var email_id = document.getElementById("email_id").value;
        //alert(mail_id);
        $.confirm({
            title: 'Promo Code!',
            content: '' +
                '<form action="" class="formName">' +
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
                            $.alert('provide a valid Promocode');
                            return false;
                        }
                        var url = "<?php echo base_url('index/check_promo_code') ?>"

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                promo_code: promo_code,
                                email_id: email_id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                // alert(obj.msg);
                                if (obj.msg == "success") {

                                    $.alert("You will get &nbsp;" + obj.result['discount'] +
                                        "% discount for this booking")

                                    let fare = $("#total_fare").text();





                                    let discount_amt = (fare * obj.result['discount'] / 100)
                                        .toFixed(2);

                                    let after_dscnt = (fare - discount_amt)


                                    $("#total_fare").text(after_dscnt.toFixed(2));
                                    $(".promo-code").hide();
                                } else {
                                    $.alert(obj.msg)
                                }


                            }
                        })
                    }
                },
                cancel: function() {

                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }
    $('#timepicker').timepicker({
        timeFormat: 'h:mm p', // Display format with AM/PM
        interval: 5, // Time intervals in minutes
        scrollbar: true, // Show scrollbar for longer lists
        showMeridian: true // Show AM/PM
    });

    function calculateTimeDifference(dateInput, timeInput) {
        // Split the string into day, month, and year
        const [day, month, year] = dateInput.split("/");
        // Create a new Date object
        const date = new Date(`${year}-${month}-${day}`);
        // Format the date using toString() method
        const formattedDate = date.toString();

        // Parse the time string
        const [time, modifier] = timeInput.split(" ");
        let [hours, minutes] = time.split(":");

        // Convert to 24-hour format
        if (modifier === "PM" && hours !== "12") {
            hours = parseInt(hours, 10) + 12;
        } else if (modifier === "AM" && hours === "12") {
            hours = "00";
        } else {
            hours = hours.padStart(2, "0");
        }

        // Increment the minutes by 1
        minutes = (parseInt(minutes, 10) + 1).toString().padStart(2, "0");

        // Format the time
        const formattedTime = `${hours}:${minutes}`;

        // Create the date-time string and Date object
        const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}:00`;
        const enteredDateTime = new Date(formattedDateTime);
        const currentDateTime = new Date();

        // Calculate time differences
        const timeDifferenceMilliseconds = enteredDateTime - currentDateTime;
        const threeHoursInMilliseconds = 3 * 60 * 60 * 1000;

        return {
            timeDifferenceMilliseconds,
            threeHoursInMilliseconds
        };
    }



    $('.payment-method').click(function() {

        var valid_phone = validatePhone($("#phone_no").val())
        var valid_email = ValidateEmail($("#email_id").val())


        const dateInputValue = $("#datepicker").val();
        const timeInputValue = $("#timepicker").val();
        const {
            timeDifferenceMilliseconds,
            threeHoursInMilliseconds
        } = calculateTimeDifference(dateInputValue, timeInputValue);

        const hoursDifference = Math.floor(timeDifferenceMilliseconds / (1000 * 60 * 60));
        const minutesDifference = Math.floor((timeDifferenceMilliseconds % (1000 * 60 * 60)) / (1000 * 60));

        if (timeDifferenceMilliseconds < threeHoursInMilliseconds) {
            alert(
                ` The entered date and time is less than 3 hours .\nPlease give us 3 hours in advance for the booking or call us.`
            );
            return;
        }


        if ($("#exceed_time").val() == "1") {

            alert("You should book 3 hour prior to your journey");
            return;
        } else if ($("#datepicker").val() == '' || $("#timepicker").val() == '') {
            alert("Please fill Journey  details to proceed")
        } else if ($("#first_name").val() == '' || $("#email_id").val() == '' ||
            $("#phone_no").val() == '' || $("#pickup").val() == '') {
            alert("Please fill all mandatory contact   details to proceed")
        } else if (valid_phone == false) {
            alert("Please fill valid phone no")
        } else if (valid_email == false) {
            alert("You have entered an invalid email address!")
        } else {
            var jouney_date = $("#datepicker").val();
            var journey_time = $("#timepicker").val();
            var first_name = $("#first_name").val();
            var last_name = '';
            var email = $("#email_id").val();
            var phone = $("#phone_no").val();
            var pick_up = $("#pick_up").val();
            var flight_no = $("#flight_no").val();
            var no_of_passenger = 0;
            var no_of_suitcase = 0;
            var hand_lagguage = 0;
            var child_seat = 0;
            var chk_Greet = 0;
            var chk_DropOff = 0;
            var scomments_special_inst = '';
            if ($(this).attr('data-method') == "pay_now_p") {
                var payment_method = "paypal";

            }
            if ($(this).attr('data-method') == "pay_now_l") {
                var payment_method = "lloyds";

            }
            if ($(this).attr('data-method') == "pay_cash") {
                var payment_method = "cash";

            }


            if (chk_Greet.checked) {
                var meet_and_greet = 1;
            } else {
                var meet_and_greet = 0;
            }

            if (chk_DropOff.checked) {
                var drop_off = 1;
            } else {
                var drop_off = 0;
            }



            var url = "<?php echo base_url('index/booking_init') ?>"
            $.ajax({
                type: "POST",
                url: url,
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
                    scomments_special_inst: scomments_special_inst
                },
                success: function(data) {
                    $('.payment-method').addClass('hide')
                    if (payment_method == "cash") {
                        var obj = jQuery.parseJSON(data);

                        if (obj.result['booking_id'] != "") {
                            $("#book_id").text(obj.result['booking_id']);
                            get_book_details(obj.result['booking_id'])
                            $("#success_modal").trigger('click')

                        }
                    } else if (payment_method == "lloyds") {

                        <?php /*?>window.location.replace('<?php echo base_url('index/ipg')?>');
                        <?php */?>
                        window.open('<?php echo base_url('index/ipg')?>');
                        //   $("#chargetotal").val(Math.round($("#total_fare").text()));
                        //   // $("#lloyds_submit").click();

                    } else {

                        window.location.replace('<?php echo base_url('payment/create_payment')?>');
                    }

                }
            })


            $('.payment-method').removeClass('fa fa-check');
            // $(this).addClass('fa fa-check');
            var button = document.getElementById("myButton");
            var loading = document.getElementById("loading");
            var hiddenBtn = document.getElementById("hiddenBtn");
            // Disable the button
            button.disabled = true;
            hiddenBtn.disabled = true;
            //  button.style.display ="none"
            // Show the loading spinner
            loading.style.display = "block";

            // Simulate a delay (replace with your actual processing)
            setTimeout(function() {
                // Re-enable the button
                button.disabled = false;

                // Hide the loading spinner
                loading.style.display = "none";
            }, 6000);

        }


    })
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
    var valid = "true";
    $('.cost-add-on').change(function(e) {
        var fare = '<?php echo $_SESSION["base_fare"];?>';
        if ($(this).val() != 0) {
            let no_of_chile_seat = $(this).val();
            let child_seat_cost = no_of_chile_seat * $(this).attr('data-cost-per-child-seat');
            $("#total_fare").text(parseFloat(child_seat_cost) + parseFloat(fare))
            $("#child_seat_amt").text("(£" + $(this).attr('data-cost-per-child-seat') + "/Seat)")

        } else {
            $("#total_fare").text(parseFloat(fare))
        }
    })






    $('.close').click(function() {
        window.location.replace('<?php echo base_url('index')?>');
    })

    $('input#create_acnt[type="checkbox"]').click(function() {
        if ($(this).prop("checked") == true) {
            $("#create_acnt_div").removeClass('hide');

        } else {
            $("#create_acnt_div").addClass('hide');

        }
    })
    // Wait for the DOM to be ready
    </script>
    <script>
    function checkDate() {
        var selectedText = document.getElementById('datepicker').value;
        var selectedDate = new Date(selectedText);
        var now = new Date();
        var time = $("#timepicker").val();
        var today = new Date();
        var hour = today.getHours();
        var minute = today.getMinutes();
        current_time = hour + ":" + minute;
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        today = mm + '/' + dd + '/' + yyyy;
        if (selectedDate < now && selectedText != today) {
            alert("Date must be in the future");
        }
        if (selectedText == today) {
            alert("select today")

        }
    }

    function Converttimeformat(time) {

        var hrs = Number(time.match(/^(\d+)/)[1]);
        var mnts = Number(time.match(/:(\d+)/)[1]);
        var format = time.match(/\s(.*)$/)[1];

        if (format == "PM" && hrs < 12) hrs = hrs + 12;
        if (format == "AM" && hrs == 12) hrs = hrs - 12;

        // Adjust the time difference to 5 minutes instead of 30
        var timeDifference = 5;
        var totalMinutes = hrs * 60 + mnts;
        totalMinutes += timeDifference;
        hrs = Math.floor(totalMinutes / 60) % 24;
        mnts = totalMinutes % 60;

        var hours = hrs.toString();
        var minutes = mnts.toString();




        if (hrs < 10) hours = "0" + hours;
        if (mnts < 10) minutes = "0" + minutes;

        return hours + ":" + minutes;
    }







    $("#timepicker").click(function() {

        checkTime()

    })

    function checkTime() {
        var selectedText = document.getElementById('datepicker').value;
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 3;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = mm + '/' + dd + '/' + yyyy;


        var time = $("#timepicker").val();


        var d = new Date();
        var hour = d.getHours();
        var minute = d.getMinutes();
        current_time = hour + ":" + minute;
        if (selectedText == today) {

            if (time != "") {
                var select_time = Converttimeformat(time);
                var valuestart = current_time;
                var valuestop = select_time;
                var timeStart = new Date(today + " " + valuestart).getHours();
                var timeEnd = new Date(today + " " + valuestop).getHours();
                var hourDiff = timeEnd - timeStart;

                if (hourDiff < 3) {
                    alert("You should book 3 hour prior to your journey");
                    //$("#exceed_time").val("1");
                }
            }

        }
    }

    function validatePhone(phoneno) {
        if (phoneno.match(/^\d{10}/)) {
            return true;
        }

        return false;
    }

    function ValidateEmail(mail) {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail)) {
            return (true)
        }

        return (false)
    }
    //
    var min1 = new Date();

    var minUk = min1.toLocaleString('en-GB', {
        timeZone: 'Europe/London'
    });
    var ukdatetime = minUk.split(" ");

    var uktime = ukdatetime[1];
    var ukdates = ukdatetime[0].split(",");
    var ukdate = ukdates[0];
    var ukhourminute = uktime.split(":");
    var ukhour = ukhourminute[0];
    var ukminute = ukhourminute[1];


    var min = new Date();

    strMin = $.datepicker.formatDate("dd/mm/yy", min);

    // min.setHours(min.getHours() + 0.5);
    // min.setMinutes(min.getMinutes() + (15 - min.getMinutes() % 15))
    min.setHours(ukhour);
    min.setMinutes(ukminute)

    $('#datepicker').datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
        onSelect: function(v) {
            $("#timepicker").val('')


            $('#timepicker').timepicker('option', 'minTime', v == ukdate ? min : '12:00am');
            //  $('#timepicker').timepicker('option', 'minTime', v == strMin ? min : '12:00am');
        }
    });
    </script>

</body>

</html>