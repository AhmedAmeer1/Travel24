<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Set up an affordable business taxi account with Travel24. Enjoy reliable corporate travel, easy invoicing, priority service, and great low rates for your company." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title> Business Taxi Accounts – Affordable Corporate Travel</title>
    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description"
        content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://travel24taxi.com/businessAccount" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/services.css?v=12') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact-info.css?v=10') ?>">
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

<body>

    <?php $this->load->view('common_components/header'); ?>

    <section id="content">
        <div class="services-container services-section">
            <div class="row">

                <!-- LEFT SIDE : CONTACT FORM -->
                <div class="col-md-6">
                    <form action="<?= base_url('businessAccount/send_email'); ?>" method="post">

                        <?php
                        if ($this->session->flashdata('success_message')) {
                            echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                        } elseif ($this->session->flashdata('error_message')) {
                            echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                        }
                        ?>

                        <div class="heading">
                            <h1>Book Your Business Account</h1>
                            <p>Request your quote now.</p>
                        </div>

                        <?php $this->load->view('common_components/Services/contactInfoInputFields'); ?>

                        <button class="btnsubmit mt-3">Submit</button>
                    </form>
                </div>

                <!-- RIGHT SIDE : CONTACT DETAILS -->
                <?php $this->load->view('common_components/Services/contactInfo'); ?>

            </div>
        </div>
    </section>

    <section>
        <div class="services-container services-content">

            <h1>Business Account</h1>
            <h3>Corporate Travel Made Easy</h3>

            <p>
                At Travel24, we understand that efficient ground transport is essential for busy professionals,
                corporate teams, and frequent travellers. That’s why our Travel24 Business Account is designed
                to streamline your booking process, reduce admin time, and give your organisation priority
                access to reliable airport transfers, chauffeur services, and daily transportation solutions.
                Whether you’re arranging executive travel, airport pickups, or local transfers for your team,
                a Travel24 Business Account gives you trusted service, preferred rates, and dedicated support —
                all in one place.
            </p>

            <div class="mt-5">
                <h2>Why Choose a Travel24 Business Account?</h2>

                <p>
                    Unlock a suite of corporate travel benefits built for productivity, convenience, and
                    cost-effectiveness:
                </p>

                <div>
                    <h3><i class="fa-solid fa-check"></i> Priority Booking & Dedicated Support</h3>
                    <p>
                        Business clients benefit from priority handling and personalised service from our travel
                        experts — even during peak times.
                    </p>
                </div>

                <div>
                    <h3><i class="fa-solid fa-check"></i> Flexible Corporate Billing</h3>
                    <p>
                        Choose from easy payment options including account billing or online card payments. Get
                        consolidated invoices tailored to your business needs with clear itemisation for every trip.
                    </p>
                </div>

                <div>
                    <h3><i class="fa-solid fa-check"></i> Transparent Pricing, No Surprises</h3>
                    <p>
                        Enjoy upfront pricing with no hidden fees — you see exactly what you pay for every journey.
                        Clear, fair rates help streamline corporate travel budgets and forecasting.

                    </p>
                </div>

                <div>
                    <h3><i class="fa-solid fa-check"></i> Fast Online Booking & Management</h3>
                    <p>
                        Access Travel24’s simple online booking platform to schedule rides quickly — from airport
                        transfers to chauffeur-led city travel — on desktop or mobile. Save time and manage multiple
                        bookings with ease.

                    </p>
                </div>
            </div>

            <div class="mt-5">
                <h2>Perfect for Every Corporate Transport Need</h2>
                <p>Our Business Account is ideal for:</p>

                <ul class="services-list">
                    <li><b>Executive Travel & VIP Transfers</b> — Dependable, comfortable transport for C-suite
                        executives.
                    </li>
                    <li><b>Airport & Intercity Transfers</b> — Timely pickups and drop-offs with flight monitoring.
                    </li>
                    <li><b>Team Travel Coordination</b> — Easy management of multiple bookings for staff.
                    </li>
                    <li><b>Events & Conferences</b> — Reliable group transport plans with top-tier vehicles.</li>
                </ul>

                <p class="mt-5">
                    Travel24’s extensive fleet of modern cars and professional drivers ensures each journey is safe,
                    comfortable, and punctual — helping your business travel more efficiently every time.
                </p>
            </div>

            <div class="mt-5">
                <h2>How to Get Started</h2>

                <ul class="services-list">
                    <li><b>Apply Online –</b> Complete your Business Account application quickly on our website</li>
                    <li><b>Account Approval –</b> Our team reviews and activates your account.</li>
                    <li><b>Start Booking –</b>Once approved, enjoy fast bookings, priority service, and custom
                        invoicing.
                    </li>
                </ul>
            </div>

            <div class="mt-5">
                <h2>Grow with Travel24</h2>
                <p>
                    Joining the Travel24 Business Account means more than access to premium transportation — it
                    means partnership, efficiency, and peace of mind for all your corporate travel arrangements. Let
                    us handle the logistics while you focus on what matters most — running your business.
                </p>
            </div>

        </div>
    </section>

    <?php $this->load->view('common_components/footer'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

</body>

</html>