<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .email-container {
        width: 80%;
        margin: 20px auto;
        background-color: #fbfbfb;
        border: 1px solid #e0e0e0;
    }

    .header {
        background-color: #094a6c;
        padding: 15px 20px;
        text-align: center;
    }

    .header h1 {
        margin: 0;
        color: #fff;
    }

    .content {
        padding: 20px;
    }

    .content h1 {
        color: #5a5ac1;
        font-size: 24px;
        margin: 30px 0 5px;
    }

    .table-container {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        margin-top: 10px;
    }

    .table-container th,
    .table-container td {
        border: 1px solid #d2d2d2;
        padding: 15px 10px;
        background-color: #fff;
    }

    .table-container th {
        background-color: #f1f1f1;
        font-size: 16px;
        text-align: left;
    }

    .table-container td {
        font-weight: bold;
    }

    /* ---- Footer Section ---- */
    .footer-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 30px;
        flex-wrap: wrap;
        border-top: 1px solid #e0e0e0;
        padding-top: 20px;
    }

    .footer-left {
        flex: 1;
        min-width: 250px;
    }

    .footer-left .social-links {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 10px;
    }

    .footer-left .social-links a {
        margin-right: 8px;
    }

    .footer-left .social-links img {
        width: 28px;
        height: 28px;
        transition: transform 0.2s;
    }

    .footer-left .social-links img:hover {
        transform: scale(1.1);
    }

    .footer-left .website-link {
        text-align: left;
        margin: 10px 0;
    }

    .footer-left .website-link a {
        color: #094a6c;
        text-decoration: none;
        font-weight: bold;
        font-size: 15px;
    }

    .footer-left .website-link h2 {
        font-size: 15px;
        margin: 0;
    }

    /* Contact Section (Moved to Left) */
    .footer-left .contact-info {
        margin-top: 15px;
        text-align: left;
    }

    .footer-left .contact-info h2 {
        font-size: 15px;
        font-weight: normal;
        margin: 0;
        line-height: 1.6;
        color: #333;
    }

    .footer-left .contact-info a {
        color: #1a2cc9ff;
        text-decoration: none;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .email-container {
            width: 95%;
        }

        .footer-section {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-left {
            text-align: center;
        }

        .footer-left .social-links {
            justify-content: center;
        }

        .footer-left .contact-info {
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Logo -->
        <div style="text-align: center; padding: 10px;">
            <a href="<?php echo base_url() ?>">
                <img src="https://travel24taxi.com/assets/images/travel24/travel24Logo.jpg" alt="Travel24 Logo"
                    style="max-width: 200px;">
            </a>
        </div>

        <!-- Header -->
        <div class="header">
            <h1>Thanks for your Order</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Hi <?php echo $first_name . ' ' . $last_name; ?>,</p>
            <p>
                Just to let you know — we've received your order
                <b>#<?php echo $booking_id; ?></b>, and it is now being processed:
            </p>
            <strong>[Order #<?php echo $booking_id; ?>] (<?php echo $travel_date; ?>)</strong>

            <!-- Order Details -->
            <h1>Order Details</h1>
            <table class="table-container">
                <!-- <tr>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                </tr> -->

                <tr>
                    <td colspan="2">Vehicle Name</td>
                    <td><?php echo $vehicle; ?></td>
                </tr>

                <tr>
                    <td colspan="2">Sub Total</td>
                    <td>£<?php echo $sub_total ?></td>
                </tr>

                <tr>
                    <td colspan="2">PromoCode Discount</td>
                    <td>£<?php echo $promocode_discount; ?></td>
                </tr>

                <tr>
                    <td colspan="2">Grand Total</td>
                    <td>£<?php echo $total; ?></td>
                </tr>

                <tr>
                    <td colspan="2">Payment Method</td>
                    <td><?php echo $type ?></td>
                </tr>

                <tr>
                    <td colspan="2">Customer Name</td>
                    <td><?php echo $first_name . ' ' . $last_name; ?></td>
                </tr>

                <tr>
                    <td colspan="2">Pickup Date and Time</td>
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
                    <td colspan="2">
                        <h2 style="font-size: 16px; margin: 0;">Route Locations</h2>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Pickup Point</td>
                    <td>
                        <?php echo $source; ?>
                        <?php if ($way_point_1 != '') { ?><br>
                        <div><?php echo $way_point_1; ?></div><?php } ?>
                        <?php if ($way_point_2 != '') { ?><br>
                        <div><?php echo $way_point_2; ?></div><?php } ?>
                        <?php if ($way_point_3 != '') { ?><br>
                        <div><?php echo $way_point_3; ?></div><?php } ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Dropoff Point</td>
                    <td><?php echo $destination; ?></td>
                </tr>

                <tr>
                    <td colspan="2">Pickup Door Name / Home Number</td>
                    <td><?php echo $pick_up; ?></td>
                </tr>
            </table>

            <!-- Footer Section -->
            <div class="footer-section">
                <div class="footer-left">
                    <!-- Social Media -->
                    <div class="social-links">
                        <a href="https://twitter.com/nolimit_cars" target="_blank">
                            <img src="https://travel24taxi.com/assets/images/travel24/email/x_logo.jpg" alt="Twitter">
                        </a>
                        <a href="https://www.instagram.com/nolimitcars8/" target="_blank">
                            <img src="https://travel24taxi.com/assets/images/travel24/email/instagram.jpg"
                                alt="Instagram">
                        </a>
                        <a href="https://www.facebook.com/nolimitcarsltd/" target="_blank">
                            <img src="https://travel24taxi.com/assets/images/travel24/email/facebook.jpg"
                                alt="Facebook">
                        </a>
                    </div>

                    <!-- Website -->
                    <div class="website-link">
                        <h2>
                            View Website:
                            <a href="https://travel24taxi.com/" target="_blank">https://travel24taxi.com/</a>
                        </h2>
                    </div>

                    <!-- Contact Info (Now Left) -->
                    <div class="contact-info">
                        <h2>
                            For any changes, contact<br>
                            Tel: <a href="tel:02039822911">02039822911</a><br>
                            Email: <a href="mailto:bookings@travel24taxi.com">bookings@travel24taxi.com</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>