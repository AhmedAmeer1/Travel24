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
            max-width: 800px;
            background: white;
            padding: 30px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
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

        a {
            color: #007bff;
            text-decoration: none;
        }

        .address {
            text-align: center;
            margin-top: 10px;
        }

        @media print {
            .container, #invoice {
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
            <label>Booking ID</label>
            <input type="text" id="bookingId" placeholder="Enter Booking ID" required>

            <label>Full Name</label>
            <input type="text" id="fullName" required>

            <label>Email</label>
            <input type="email" id="email" required>

            <label>Phone Number</label>
            <input type="text" id="phone" required>

            <label>Pickup Location</label>
            <input type="text" id="pickup" required>

            <label>Drop Location</label>
            <input type="text" id="drop" required>

            <label>Date & Time</label>
            <input type="text" id="dateTimeInput" placeholder="Enter Date and Time (e.g., 2025-04-28 03:30 PM)" required>

            <label>Taxi Fare (£)</label>
            <input type="text" id="fare" placeholder="Enter Fare Manually" required>

            <label>Payment Type</label>
            <select id="paymentType" required>
                <option value="Cash">Cash</option>
                <option value="Card">Card</option>
                <option value="PayPal">PayPal</option>
            </select>

            <button type="submit" class="btn">Download PDF Invoice</button>
        </form>
    </div>

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
                    <td>
                    <strong>Drop:</strong> <span id="c-drop"></span>
                  
                
                
                </td>
                    <td class="text-right"><strong>Email:</strong> <span id="c-email"></span></td>
                </tr>
                <tr>
                    <td><strong>Pickup:</strong> <span id="c-pickup"></span></td>
                    <td class="text-right">
                        
                    <strong>Payment Type:</strong> <span id="c-payment"></span>
              
                
                
                
                </td>
                </tr>
            </table>

            <table style="width:100%; border-collapse:collapse;" border="1" cellpadding="10">
                <thead style="background:#f0f0f0;">
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Taxi Fare</td>
                        <td id="amount-fare"></td>
                    </tr>
                    <tr>
                        <td class="text-left"><strong>Total</strong></td>
                        <td id="total"></td>
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
            event.preventDefault(); // Prevent form submit

            const form = document.getElementById('invoiceForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const bookingId = document.getElementById('bookingId').value;
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const pickup = document.getElementById('pickup').value;
            const drop = document.getElementById('drop').value;
            const dateTimeInput = document.getElementById('dateTimeInput').value;
            const fare = document.getElementById('fare').value;
            const paymentType = document.getElementById('paymentType').value;

            document.getElementById('booking-id').textContent = bookingId;
            document.getElementById('c-name').textContent = fullName;
            document.getElementById('c-email').textContent = email;
            document.getElementById('c-phone').textContent = phone;
            document.getElementById('c-pickup').textContent = pickup;
            document.getElementById('c-drop').textContent = drop;
            document.getElementById('date').textContent = dateTimeInput;
            document.getElementById('c-payment').textContent = paymentType;
            document.getElementById('amount-fare').textContent = `£${fare}`;
            document.getElementById('total').textContent = `£${fare}`;

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
