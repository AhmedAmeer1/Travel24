<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Find answers about bookings, payments, vehicle types & more on Travel24’s FAQ. Simple online, phone or email support—24/7 clarity for every ride" />
    <title>faq</title>
    <meta property="og:title" content="Travel 24 Taxi - Frequently Asked Questions (FAQ)">
    <meta property="og:description" content="Find answers to common questions about Travel 24 Taxi’s booking process, pricing, airport pickups, cancellations, and more.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/faq">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/faq" />
    <!-- <link rel="stylesheet" href="./css/faqs.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/faqs.css') ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
     <?php $this->load->view('assets/js/seo/nolimitFaq'); ?>
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
    <section>
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/about_us.svg')?>" alt="about_us_banner" class="banner-image">
        </div>
        <div class=" faq_wrapper">
            <div class="faq_content_div">
                <div class="heading">
                    <h1>Frequently asked questions </h1>
                    <p class="sub_heading">Everything you need to know about the taxi ride and bookings </p>
                </div>
                <div class="questions">
                    <h1>How do I make a booking?</h1>
                    <p>Reserve your vehicle online or with a quick phone call. Not sure of the address? No problem—just
                        email us with as many details as you have, and we'll take care of the rest.</p>
                    <hr />
                    <h1>How will I know if my booking got confirmed?</h1>
                    <p>Once you book with us, you'll get a welcome email with your personal login and password. After
                        that, every trip you book will be confirmed with an acknowledgement email from Travel24.
                        Plus, we'll send over all the details you need, like journey specifics, pick-up instructions,
                        and your driver's contact, once they're assigned</p>
                    <hr />
                    <h1>I didn’t receive a booking confirmation & Transfer Imminenet</h1>
                    <p>If your transfer is approaching and you haven't received confirmation, please contact us at the
                        listed number. Our team is here for you 24/7 to address your concerns promptly.</p>
                    <hr />
                    <h1>Are there any extra charges?</h1>
                    <p>Don't worry about flight delays; we monitor your flight and adjust accordingly without extra
                        charge. If there's a delay exceeding one hour after landing, please refer to our T&Cs for
                        potential additional charges. Expect a detailed receipt sent to you 12 hours post-journey.</p>
                    <hr />
                </div>
                <div class="get_in_touch">
                    <img src="<?php echo base_url('assets/images/get_in_touch.svg')?>" class="img-fluid" alt="get_in_touch">
                    <h1>Still have questions? </h1>
                    <p class="">Everything you need to know about the taxi ride and bookings </p>
                    <button> <a href="<?php echo base_url()?>contactUs">Get in touch </a></button>
                </div>
            </div>
            <div class="subbottom_text">If you would like a quote for a journey you are planning please use our
                online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.</div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>