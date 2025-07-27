<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Taxi Invoice Generator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      padding: 20px;
    }

    .container {
      max-width: 900px;
      background: white;
      padding: 30px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .form-group {
      flex: 1 1 calc(50% - 20px);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      box-sizing: border-box;
    }

    textarea#description {
      font-family: monospace;
    }

    .btn {
      display: block;
      margin: 30px auto 0;
      padding: 12px 25px;
      background: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #0056b3;
    }

    .text-right {
      text-align: right;
    }

    .address {
      text-align: center;
      margin-top: 10px;
    }

    @media print {
      .container,
      #invoice {
        page-break-inside: avoid;
      }

      .footer {
        page-break-inside: avoid;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Travel24 Taxi Invoice Generator</h2>

    <form id="invoiceForm" onsubmit="generateInvoice(event)">
      <div class="form-group">
        <label>Booking ID</label>
        <input type="text" id="bookingId" required>
      </div>

      <div class="form-group">
        <label>Full Name</label>
        <input type="text" id="fullName" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" id="email" required>
      </div>

      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" id="phone" required>
      </div>

      <div class="form-group">
        <label>Date & Time</label>
        <input type="text" id="dateTimeInput" placeholder="e.g. 2025-04-28 03:30 PM" required>
      </div>

      <div class="form-group">
        <label>Customer Address (Optional)</label>
        <input type="text" id="customerAddress" placeholder="Enter address (optional)">
      </div>

      <div class="form-group" style="flex: 1 1 100%;">
        <label>Description</label>
        <textarea id="description" rows="4" placeholder="car from uk to london           300" required></textarea>
      </div>

      <div class="form-group">
        <label>Payment Type</label>
        <select id="paymentType" required>
          <option value="Cash">Cash</option>
          <option value="Card">Card</option>
          <option value="PayPal">PayPal</option>
        </select>
      </div>

      <div style="flex: 1 1 100%; text-align: center;">
        <button type="submit" class="btn">Download PDF Invoice</button>
      </div>
    </form>
  </div>

  <!-- Invoice Preview -->
  <div id="invoice-preview" style="display:none;">
    <div id="invoice" style="padding:30px; font-family:Arial;">
      <div style="text-align:center; margin-bottom:20px;">
        <img src="<?php echo base_url('assets/images/travel24/Logo.svg')?>" alt="Travel24 Logo" style="max-width:180px;">
      </div>

      <h1 style="text-align:center;">Travel24 Taxi Invoice</h1>

      <table style="width:100%; margin-bottom:20px;">
        <tr>
          <td><strong>Booking ID:</strong> <span id="booking-id"></span></td>
          <td class="text-right"><strong>Date & Time:</strong> <span id="date"></span></td>
        </tr>
        <tr>
          <td><strong>Customer:</strong> <span id="c-name"></span></td>
          <td class="text-right"><strong>Phone:</strong> <span id="c-phone"></span></td>
        </tr>
        <tr>
          <td><strong>Email:</strong> <span id="c-email"></span></td>
          <td class="text-right"><strong>Payment Type:</strong> <span id="c-payment"></span></td>
        </tr>
        <tr id="address-row" style="display:none;">
          <td colspan="2"><strong>Customer Address:</strong> <span id="c-address"></span></td>
        </tr>
      </table>

      <table style="width:100%; border-collapse:collapse;" border="1" cellpadding="10">
        <thead style="background:#f0f0f0;">
          <tr>
            <th>Description</th>
           
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="invoice-description" style="white-space:pre-wrap; font-family:monospace;"></td>
          
          </tr>
        </tbody>
      </table>

      <p style="text-align:center; margin-top:30px;">Thank you for riding with us!</p>

      <div style="text-align:center; margin-top:20px;" class="footer">
        <p><strong>Any inquiries please contact us</strong><br><br>
          Tel: 02039822911 &nbsp;&nbsp;|&nbsp;&nbsp;
          Email: <a href="mailto:info@travel24taxi.com">info@travel24taxi.com</a>
        </p>

        <p class="address">
          <strong>Address:</strong> Regus Maidenhead, Concorde Park. Concorde Road, Maidenhead, Berkshire, SL6 4FJ
        </p>

        <p style="margin-top:20px;"><strong>Stay in touch</strong></p>

        <p>
          <a href="https://facebook.com/travel24taxi" target="_blank" style="margin-right:10px;">
            <img src="<?php echo base_url('assets/images/travel24/facebook.svg')?>" width="24" alt="Facebook">
          </a>
          <a href="https://twitter.com/travel24taxi" target="_blank" style="margin-right:10px;">
            <img src="<?php echo base_url('assets/images/travel24/x_logo.svg')?>" width="24" alt="Twitter">
          </a>
          <a href="https://instagram.com/travel24taxi" target="_blank">
            <img src="<?php echo base_url('assets/images/travel24/instagram.jpg')?>" width="24" alt="Instagram">
          </a>
        </p>

        <p style="margin-top:10px;">
          View Website: <a href="https://travel24taxi.com/" target="_blank">https://travel24taxi.com/</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

  <script>
    function generateInvoice(event) {
      event.preventDefault();

      const bookingId = document.getElementById('bookingId').value;
      const fullName = document.getElementById('fullName').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      const description = document.getElementById('description').value;
      const dateTimeInput = document.getElementById('dateTimeInput').value;
      const paymentType = document.getElementById('paymentType').value;
      const customerAddress = document.getElementById('customerAddress').value.trim();

      document.getElementById('booking-id').innerText = bookingId;
      document.getElementById('c-name').innerText = fullName;
      document.getElementById('c-email').innerText = email;
      document.getElementById('c-phone').innerText = phone;
      document.getElementById('date').innerText = dateTimeInput;
      document.getElementById('c-payment').innerText = paymentType;

      document.getElementById('invoice-description').innerText = description;

      // Extract last number from last line as fare
  

  
      // Show address if filled
      const addressRow = document.getElementById('address-row');
      if (customerAddress) {
        document.getElementById('c-address').innerText = customerAddress;
        addressRow.style.display = "table-row";
      } else {
        addressRow.style.display = "none";
      }

      const element = document.getElementById('invoice');
      html2pdf().set({
        margin: 0,
        filename: 'taxi-invoice.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
      }).from(element).save();
    }
  </script>

</body>

</html>
