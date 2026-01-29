<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Get in touch with Travel24 Taxi – contact us via online form, call 02039 822 911 or email info@travel24taxi.com. Fast quotes & 24/7 support." />

    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />

    <?php $this->load->view('assets/js/metaPixel'); ?>

    <title>Weddings Parties</title>

    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description"
        content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">

    <link rel="canonical" href="https://travel24taxi.com/contactUs" />

    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/services.css?v=17') ?>">
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
                    <form action="<?= base_url('weddingsParties/send_email'); ?>" method="post">

                        <?php
                        if ($this->session->flashdata('success_message')) {
                            echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                        } elseif ($this->session->flashdata('error_message')) {
                            echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                        }
                        ?>

                        <div class="heading">
                            <h1>Book Your Weddings / Parties</h1>
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
            <h1>Weddings & Parties Transport
            </h1>
            <h3>Elegant & Reliable Transport for Weddings and Special Events</h3>
            <p>
                Make your special day truly unforgettable with Travel24 Weddings & Parties transport services.
                We provide professional, reliable and stylish transport solutions for weddings, private parties
                and special events across the UK. From intimate celebrations to large-scale events, Travel24
                ensures every journey is smooth, punctual and stress-free.
            </p>
            <p>
                Whether you need transport for the bride and groom, wedding guests, or party groups, our
                experienced drivers and modern vehicles deliver comfort, elegance and peace of mind.
            </p>
            <div class="mt-5">
                <h2>Wedding Transport Services</h2>
                <div class="">
                    <h3>Wedding Car & Guest Transfers</h3>
                    <p>
                        Travel24 offers reliable wedding transport for couples, families and guests. From ceremony to
                        reception, we coordinate every transfer carefully to ensure everyone arrives on time and in
                        comfort.

                    </p>
                </div>
                <div class="mt-5">
                    <h3>Bridal Party & Group Travel</h3>
                    <p>
                        We provide spacious vehicles for bridesmaids, groomsmen and family members, keeping your
                        wedding party together and on schedule.
                    </p>
                </div>
                <div class="mt-5">
                    <h3>Venue-to-Venue Transfers</h3>
                    <p>
                        Moving between hotels, ceremony venues and reception locations is effortless with our
                        door-todoor wedding transfer service.
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <h2>Party & Event Transport Services</h2>
                <p>Our transport services are perfect for:</p>
                <ul class="services-list">
                    <li>Birthday parties</li>
                    <li>Engagement celebrations</li>
                    <li>Anniversary events</li>
                    <li>Corporate parties</li>
                    <li>Private functions and celebrations</li>
                </ul>
                <p class="mt-5">
                    Enjoy safe and comfortable transport for your guests without worrying about parking, directions
                    or late-night travel.
                </p>
            </div>
            <div class="mt-5">
                <h2>Why Choose Travel24 for Weddings & Parties
                </h2>
                <div class="">
                    <h3>Professional & Courteous Drivers</h3>
                    <p>
                        Our drivers are smartly presented, experienced and committed to providing first-class service
                        for every event.
                    </p>
                </div>
                <div class="mt-5">
                    <h3>Stylish & Comfortable Vehicles</h3>
                    <p>
                        Travel in modern, well-maintained vehicles designed to offer comfort, elegance and ample space
                        for passengers.
                    </p>
                </div>
                <div class="mt-5">
                    <h3>Flexible & Customised Transport
                    </h3>
                    <p>
                        We tailor wedding and party transport to your schedule, venues and guest numbers — ensuring
                        seamless coordination.
                    </p>
                </div>
                <div class="mt-5">
                    <h3>Fixed Pricing & Transparent Quotes</h3>
                    <p>
                        Clear, upfront pricing with no hidden costs helps you plan your event transport with confidence.
                    </p>
                </div>
                <div class="mt-5">
                    <h3>UK-Wide Coverage</h3>
                    <p>
                        We provide wedding and party transport services across London and the UK, including cities,
                        towns and rural venues.
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <h2>Perfect for Guests, Groups & Special Occasions</h2>
                <p>
                    Whether it’s a small family gathering or a large wedding celebration, Travel24 delivers
                    dependable event transport for individuals and groups alike
                </p>
                <p>
                    We also offer airport transfers for wedding guests, making Travel24 the ideal choice for
                    destination weddings and international attendees.
                </p>
            </div>
            <div class="mt-5">
                <h2>Travel24 – Your Trusted Event Transport Partner</h2>
                <p>
                    With years of experience in UK private hire and event transfers, Travel24 is trusted for wedding
                    transport, party transfers and special occasion travel. We take pride in delivering punctual,
                    elegant and stress-free journeys for life’s most important moments.
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