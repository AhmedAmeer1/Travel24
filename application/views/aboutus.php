<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel24: 15+ years of 24/7 taxi, minibus, chauffeur & executive services. Airport, long-distance specialists with licensed safe vehicles & competitive rates." />
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="canonical" href="https://travel24taxi.com/aboutus" />
    <link rel="stylesheet" href="<?= base_url('assets/css/aboutus.css') ?>">
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
    <section>
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/about_us.svg')?>" alt="about_us_banner" class="banner-image">
        </div>
        <div class=" aboutus_wrapper">
            <div class="aboutus_content_div">
                <h1>About us </h1>
                <p>Travel24 offer a highly professional taxi, minibus, chauffeur, parcel and executive service
                    who are airport and distance specialists. We have been serving customers for over 15 years, now
                    new management, new price.</p>
                <p>When you require a taxi we can meet your needs 24/7.</p>
                <p>Our Airport Transfer service is a speciality but we will also undertake work going to or from
                    almost anywhere and willing to do any distance, any time!</p>
                <p>We operate a wide range of vehicles capable of comfortably seating between 4 and 16 passengers.
                    We pride ourselves in providing a high quality service and our rates are highly competitive.</p>
                <p>All our taxis are licensed and badged and vehicles undergo a regular safety check which is
                    carried out by the relevant Council.</p>
                <p>Bookings can be made online, by email or by telephone although email should only be used for
                    advance bookings.Travel24 will confirm such bookings by return e-mail.</p>
                <p>Travel24 also provide account facilities, and are available for regular school runs, these
                    can be set-up upon request. We accept all card payments.</p>
                <p>Remember online, Airport, Distance and Local Specialists will meet your needs and always put
                    customers first.</p>
                <div class="subbottom_text">If you would like a quote for a journey you are planning please use our
                    online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.</div>
            </div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>