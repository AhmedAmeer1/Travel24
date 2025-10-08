<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New Order Email</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
    }

    .email-container {
      width: 85%;
      margin: 0 auto;
      background-color: #fbfbfb;
      padding-bottom: 30px;
    }

    .logo-margin {
      margin: 15px 0;
    }

    .logo-margin img {
      max-width: 200px;
      height: auto;
    }

    .blue-box {
      background-color: #094a6c;
      padding: 15px 20px;
      text-align: center;
    }

    .blue-box h1 {
      margin: 0;
      color: #fff;
      font-size: 22px;
    }

    .content {
      padding: 20px;
    }

    .content p {
      font-size: 14px;
      color: #333;
    }

    .order-details-title {
      color: #5a5ac1;
      font-size: 20px;
      margin: 30px 0 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    table th,
    table td {
      border: 1px solid #d2d2d2;
      padding: 12px 10px;
      text-align: left;
      background-color: #fff;
    }

    table th {
      background-color: #f1f1f1;
      font-size: 16px;
    }

    table td.bold {
      font-weight: bold;
    }

    .social-links {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }

    .social-links a {
      margin: 0 6px;
    }

    .social-links img {
      width: 24px;
      height: 24px;
    }

    .contact-info {
      text-align: right;
      margin: 20px 0;
    }

    .contact-info h2 {
      font-size: 16px;
      font-weight: normal;
      margin: 0;
      line-height: 1.6;
    }

    .website-link {
      text-align: left;
      margin: 20px 0;
    }

    .website-link a {
      color: #094a6c;
      text-decoration: none;
      font-weight: bold;
      font-size: 15px;
    }
    .website-link h2 {
      font-size: 15px;
    
    }


    @media (max-width: 768px) {
      .email-container {
        width: 95%;
      }

      .contact-info {
        text-align: center;
      }
      .website-link {
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <div class="email-container">
    <!-- Logo -->
    <div class="logo-margin">
      <a href="<?php echo base_url() ?>">
        <img src="https://travel24taxi.com/assets/images/travel24/travel24Logo.jpg" alt="Travel24 Taxi Logo" />
      </a>
    </div>

    <!-- Blue Header -->
    <div class="blue-box">
      <h1>New Order #<?php echo $booking_id; ?></h1>
    </div>

    <!-- Content -->
    <div class="content">
      <p>
        Hi, you have received the following order from -
        <strong><?php echo $first_name . ' ' . $last_name; ?></strong>
      </p>
      <p><strong>[Order #<?php echo $booking_id; ?>] (<?php echo $travel_date; ?>)</strong></p>

      <!-- Order Details -->
      <h2 class="order-details-title">Order Details</h2>
      <table>
        <tr>
          <th colspan="2">Product</th>
          <th>Price</th>
        </tr>

        <tr>
          <td colspan="2" class="bold">Vehicle Name</td>
          <td class="bold"><?php echo $vehicle; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Sub Total</td>
          <td class="bold">£<?php echo $sub_total; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">PromoCode Discount</td>
          <td class="bold">£<?php echo $promocode_discount; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Grand Total</td>
          <td class="bold">£<?php echo $total; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Payment Method</td>
          <td><?php echo $type; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Customer Name</td>
          <td><?php echo $first_name . ' ' . $last_name; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Pickup Date and Time</td>
          <td><?php echo $travel_date; ?> - <?php echo $travel_time; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Phone Number</td>
          <td><?php echo $phone; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Email Address</td>
          <td><?php echo $email; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Flight Number</td>
          <td><?php echo $flight_no; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Route Locations</td>
          <td></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Pickup Point</td>
          <td>
            <?php echo $source; ?>
            <?php if ($way_point_1 != '') { ?><br><div><?php echo $way_point_1; ?></div><?php } ?>
            <?php if ($way_point_2 != '') { ?><br><div><?php echo $way_point_2; ?></div><?php } ?>
            <?php if ($way_point_3 != '') { ?><br><div><?php echo $way_point_3; ?></div><?php } ?>
          </td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Dropoff Point</td>
          <td><?php echo $destination; ?></td>
        </tr>

        <tr>
          <td colspan="2" class="bold">Pickup Door Name / Home Number</td>
          <td><?php echo $pick_up; ?></td>
        </tr>
      </table>

      <!-- Social Media -->
      <div class="social-links">
        <a href="https://twitter.com/nolimit_cars" target="_blank">
          <img src="https://travel24taxi.com/assets/images/travel24/email/x_logo.jpg" alt="Twitter" />
        </a>
        <a href="https://www.instagram.com/nolimitcars8/" target="_blank">
          <img src="https://travel24taxi.com/assets/images/travel24/email/instagram.jpg" alt="Instagram" />
        </a>
        <a href="https://www.facebook.com/nolimitcarsltd/" target="_blank">
          <img src="https://travel24taxi.com/assets/images/travel24/email/facebook.jpg" alt="Facebook" />
        </a>
      </div>

      <!-- Contact Info -->
      <div class="contact-info">
        <h2>
          For any changes, contact<br />
          Tel: <a href="tel:02039822911">02039822911</a><br />
          Email: <a href="mailto:bookings@travel24taxi.com">bookings@travel24taxi.com</a>
        </h2>
      </div>

      <!-- Website Link -->
      <div class="website-link">
        <h2>
          View Website:
          <a href="https://travel24taxi.com/" target="_blank">https://travel24taxi.com/</a>
        </h2>
      </div>
    </div>
  </div>
</body>

</html>
