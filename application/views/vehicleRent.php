<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Get in touch with Travel24 Taxi – contact us via online form, call 02039 822 911 or email info@travel24taxi.com. Fast quotes & 24/7 support.">

    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y">
    <meta name="yandex-verification" content="5c20865ffae8f446">

    <?php $this->load->view('assets/js/metaPixel'); ?>

    <title>Vehicle Rent</title>

    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description"
        content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">

    <link rel="canonical" href="https://travel24taxi.com/contactUs">

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
                    <form action="<?= base_url('vehicleRent/send_email'); ?>" method="post">

                        <?php
                    if ($this->session->flashdata('success_message')) {
                        echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                    } elseif ($this->session->flashdata('error_message')) {
                        echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                    }
                    ?>

                        <div class="heading">
                            <h1>Book Your Vehicle Rent</h1>
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

            <h1>Vehicle Rent Services</h1>
            <h3>Affordable Vehicle Rental Solutions Across the UK</h3>

            <p>
                Travel24 offers flexible and reliable vehicle rent services across the UK, designed for individuals,
                families and businesses needing comfortable transport for short or long durations. Whether you
                require a vehicle for a few hours, a full day or multiple days, our vehicle rental service provides
                a convenient, stress-free travel solution.
            </p>

            <p>
                From city travel to airport transfers and special occasions, Travel24 delivers professional
                service with modern vehicles and experienced drivers.
            </p>

            <div class="mt-5">
                <h2>Our Vehicle Rent Services</h2>

                <div>
                    <h3>Short-Term Vehicle Rent</h3>
                    <p>
                        Ideal for errands, meetings, shopping trips or local travel, our short-term vehicle rental
                        offers flexibility and convenience without long-term commitments.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Daily & Multi-Day Vehicle Hire</h3>
                    <p>
                        Need transport for a full day or longer? Our daily and multi-day vehicle hire services are
                        perfect for business travel, sightseeing, events and personal use.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Vehicle Rent for Events & Special Occasions</h3>
                    <p>
                        We provide vehicle rental for weddings, parties, corporate events and private functions,
                        ensuring reliable and stylish transport for your occasion.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Business & Corporate Vehicle Rent</h3>
                    <p>
                        Our vehicle rent service supports corporate travel needs, offering professional drivers,
                        punctual service and transparent billing.
                    </p>
                </div>
            </div>

            <div class="mt-5">
                <h2>Why Choose Travel24 Vehicle Rent</h2>

                <div>
                    <h3>Modern & Well-Maintained Vehicles</h3>
                    <p>
                        Travel24 operates a fleet of clean, comfortable and regularly serviced vehicles to ensure a
                        smooth and safe journey.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Professional & Licensed Drivers</h3>
                    <p>
                        All vehicles are driven by fully licensed and experienced drivers, delivering safe,
                        courteous and reliable service.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Flexible Rental Options</h3>
                    <p>
                        Choose hourly, daily or multi-day vehicle rent options tailored to your schedule and travel
                        needs.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>Transparent Pricing</h3>
                    <p>
                        Enjoy clear, upfront pricing with no hidden fees, helping you plan your travel costs
                        confidently.
                    </p>
                </div>

                <div class="mt-5">
                    <h3>UK-Wide Coverage</h3>
                    <p>
                        Travel24 provides vehicle rent services across London and the UK, covering cities, towns and
                        surrounding areas.
                    </p>
                </div>
            </div>

            <div class="mt-5">
                <h2>Ideal for a Wide Range of Travel Needs</h2>
                <h3>Our vehicle rent services are perfect for:</h3>
                <ul class="services-list">
                    <li>Airport and station transfers</li>
                    <li>Business meetings and roadshows</li>
                    <li>City tours and sightseeing</li>
                    <li>Family trips and personal travel</li>
                    <li>Special events and celebrations</li>
                </ul>
            </div>

            <div class="mt-5">
                <h2>Pick your perfect Area</h2>
                <p>
                    Choose the ideal area for your needs from any borough council in England. Simply give us a call,
                    and we will arrange a vehicle according to your council's licence requirements.
                </p>
            </div>

            <div class="mt-5">
                <h2>Travel24 – Your Trusted UK Vehicle Rent Partner</h2>
                <p>
                    With extensive experience in UK private hire and transport services, Travel24 is trusted for
                    reliable vehicle rental, professional drivers and flexible booking options.
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