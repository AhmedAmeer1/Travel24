<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .col-md-6 {
        flex: 1;
        margin-bottom: 15px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    img {
        width: 100%;
        max-width: 100%;
    }

    table {
        width: 100%;
        font-size: 14px;
    }

    th,
    td {
        padding: 15px;
        border: 1px solid #d2d2d2;
        font-size: 16px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
        }
    }
    </style>
</head>

<body
    style="@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');font-family: 'Roboto', sans-serif;">



    <div style="width: fit-content; margin: 0 auto; background-color: #fbfbfb;">
    <a class="mt-2" href="<?php echo base_url()?>"><img style="width: fit-content"
                src="https://travel24taxi.com/assets/images/travel24/travel24Logo.jpg" alt=""></a>
        <div style="background-color:#094a6c; padding: 15px 20px; display: flex; align-items: center;">
            <h1 style="text-align: center; margin: 0 auto; color: #fff;">Thanks for your Order</h1>
        </div>

        <div style="padding: 20px;">
            <div>
              

                <p>Hi <?php echo $first_name.' '.$last_name;?>,</p>
                <p>Just to let you know — we've received your order #<b><?php echo $booking_id;?></b>, and it is now
                    being processed:</p>
                <strong>[Order #<?php echo $booking_id;?>] (<?php echo $travel_date;?>)</strong>
            </div>

            <div>
                <h1 style="color: #5a5ac1; font-size: 24px; margin-top: 30px; margin-bottom: 5px;">Order Details</h1>
                <table>
                    <tr style="background-color: #f1f1f1;">
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>Vehicle Name</td>
                        <td><?php echo $vehicle; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Travel Type</td>
                        <td><?php echo $travel_type; ?></td>
                        <td>£<?php echo $sub_total; ?></td>
                    </tr>
                    <tr>
                        <td>Passengers</td>
                        <td><?php echo $passenger; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Suitcase</td>
                        <td><?php echo $suitcase; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hand Lagguage</td>
                        <td><?php echo $hand_lagguage; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ChildSeat</td>
                        <td><?php echo $child_seat; ?></td>
                        <td>£<?php echo $child_seat_cost; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Drop Off</td>
                        <td>£<?php echo $dropoff_cost; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Meet and greet</td>
                        <td>£<?php echo $greeting_cost; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PromoCode Discount</td>
                        <td>£<?php echo $promocode_discount; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Grand Total:</td>
                        <td>£<?php echo $total; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Method</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Customer Name</td>
                        <td><?php echo $first_name.' '.$last_name; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Pickup date and time</td>
                        <td><?php echo $travel_date; ?> - <?php echo $travel_time; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Phone Number</td>
                        <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Email Address</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Flight Number</td>
                        <td><?php echo $flight_no; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h1 style="font-size: 16px; margin-top: 25px;">Route Locations</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Pickup Point</td>
                        <td><?php echo $source; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Dropoff Point</td>
                        <td><?php echo $destination; ?></td>
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