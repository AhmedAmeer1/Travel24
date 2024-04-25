<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>



<body
    style="@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');font-family: 'Roboto', sans-serif;">
    <div style="      width: fit-content;
    margin: 0 auto;
    background-color: #fbfbfb;">
    <a class="mt-2" href="<?php echo base_url()?>"><img style="width: fit-content"
                src="https://travel24taxi.com/assets/images/travel24/travel24Logo.jpg" alt=""></a>
        <div style="background-color:#094a6c;
    padding: 15px 20px;
    display: flex;
    align-items: center;">

            <h1 style="    text-align: center;
    margin: 0 auto;
    color: #fff;">Thanks for your Order</h1>
        </div>
        <div style="padding: 20px; ">
            <div>
            

                <p>Hi <?php echo $first_name.' '.$last_name;?>,</p>
                <p>Just to let you know — we've received your order #<b><?php echo $booking_id;?></b>, and it is now
                    being processed:</p>
                <?php /*?><?php if(isset($type) && $type=="Cash"){?>
                <p>Pay with cash upon Journey Time.</p>
                <?php }?><?php */?>
                <strong>[Order #<?php echo $booking_id;?>] (<?php echo $travel_date;?>)</strong>
            </div>
            <div>
                <h1 style="    color: #5a5ac1;
    font-size: 24px;
    margin-block-start: 30px;
    margin-block-end: 5px;">Order Details</h1>
                <table style="inline-size: 100%; font-size: 14px;">
                    <tr style="background-color: #f1f1f1;">
                        <th style="    padding: 15px; border: 1px solid #d2d2d2; font-size: 16px;">Product</th>
                        <th style="border: 1px solid #d2d2d2; font-size: 16px;">Qty</th>
                        <th style="border: 1px solid #d2d2d2; font-size: 16px;">Price</th>
                    </tr>

                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Vehicle Name</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $vehicle;?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"> </td>
                    </tr>

                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Travel Type</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $travel_type?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;">£<?php echo $sub_total?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Passengers</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $passenger?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Suitcase</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $suitcase?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;">‎</td>
                    </tr>

                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Hand Lagguage</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $hand_lagguage?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;">‎</td>
                    </tr>

                    <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">ChildSeat</td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $child_seat?>

                        </td>
                        <td style="border: 1px solid #d2d2d2; background-color: #fff;">£ <?php echo $child_seat_cost;?>
                        </td>
                    </tr>
                    <!-- <?php if($greet_status == 1){?>
                        <tr style="text-align: center;">
                        <td style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">MEET AND GREET & DROP OFF - YES, PLEASE MEET ME IN ARRIVALS</td>
                
                <td style="border: 1px solid #d2d2d2; background-color: #fff;"><?php echo $greet_status?>   
                <td style="border: 1px solid #d2d2d2; background-color: #fff;">£ <?php echo $greeting_cost;?></td>
                    </tr>
                    <?php }?> -->


                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Drop Off </td>
                        <td style="border: 1px solid #d2d2d2; font-weight: bolder; background-color: #fff;">‎£
                            <?php echo $dropoff_cost; ?></td>

                    </tr>


                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Meet and greet </td>
                        <td style="border: 1px solid #d2d2d2; font-weight: bolder; background-color: #fff;">‎£
                            <?php echo $greeting_cost; ?></td>








                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">PromoCode Discount
                        </td>
                        <td style="border: 1px solid #d2d2d2; font-weight: bolder; background-color: #fff;">‎£
                            <?php echo $promocode_discount; ?></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">‎Grand Total:</td>
                        <td style="border: 1px solid #d2d2d2; font-weight: bolder; background-color: #fff;">‎£
                            <?php echo $total; ?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">‎Payment Method</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $type?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">‎Customer Name</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $first_name.' '.$last_name;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">‎Pickup date and
                            time</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $travel_date; ?> - <?php echo $travel_time; ?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">‎Phone Number</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $phone;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Email Address</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $email;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Flight Number</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $flight_no;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">
                            <h1 style="font-size: 16px; margin-block-start: 25px;">Route Locations</h1>
                        </td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;"></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Pickup Point</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $source;?>
                            <?php if($way_point_1 != ''){?> <br>
                            <div style="padding-block-start: 10px;"><?php echo $way_point_1;?></div><?php }?>
                            <?php if($way_point_2 != ''){?><br>
                            <div style="padding-block-start: 10px;"><?php echo $way_point_2;?></div><?php }?>
                            <?php if($way_point_3 != ''){?><br>
                            <div style="padding-block-start: 10px;"><?php echo $way_point_3;?></div><?php }?>
                        </td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Dropoff Point</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $destination;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">Pickup Door Name /
                            Home Number</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $pick_up;?></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2" style="border: 1px solid #d2d2d2;    text-align: start;
    border: 1px solid #f5f5f5;
    padding: 15px 10px;     background-color: #fff; font-weight: bold; border: 1px solid #d2d2d2;">COMMENTS OR SPECIAL
                            INSTRUCTIONS</td>
                        <td style="border: 1px solid #d2d2d2; padding-block-start: 20px; background-color: #fff;">
                            <?php echo $scomments_special_inst;?></td>
                    </tr>

                </table>
            </div>
            <br />
            <div style="display: flex; justify-content: space-between;">
                <div style="flex: 1; text-align: center;     margin-bottom: auto;
                     margin-top: auto; ">
                    <a href="https://twitter.com/nolimit_cars" style="margin-left: 4px;" target="_blank">
                        <img src="https://travel24taxi.com/assets/images/travel24/email/x_logo.jpg" alt="icon"
                            style="width: 24px;"></a>

                    <a href="https://www.instagram.com/nolimitcars8/" style="margin-left: 4px;" target="_blank"><img
                            src="https://travel24taxi.com/assets/images/travel24/email/instagram.jpg" alt="icon"
                            style="width: 24px;"></a>

                    <a href="https://www.facebook.com/nolimitcarsltd/" style="margin-left: 4px;" target="_blank"><img
                            src="https://travel24taxi.com/assets/images/travel24/email/facebook.jpg" alt="icon"
                            style="width: 24px;"></a>
                </div>
                <div style="flex: 1; text-align: right; margin-left: 20px;">
                    <div class="col-md-6 text-right">
                        <h2 style="font:size 20px !important;"> For any inquiries, contact
                            Tel : <a href="tel:02039822911" class="">02039822911</a>
                            Email Us: <a href="mailto:bookings@travel24taxi.com">bookings@travel24taxi.com</a>
                        </h2>
                    </div>
                </div>
            </div>

            <div style="text-align: left;">
                <h2>
                    View Website: <a href="https://travel24taxi.com/" target="_blank">https://travel24taxi.com/</a>
                </h2>
            </div>


        </div>
    </div>
</body>

</html>