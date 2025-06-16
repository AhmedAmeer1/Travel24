<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <title>Terms and Conditions - Travel24</title>
   <meta property="og:title" content="Travel 24 Taxi - Terms & Conditions of Service">
    <meta property="og:description" content="Review the terms and conditions for using Travel 24 Taxi services, including booking policies, cancellations, and service guidelines.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/terms">
    <meta property="og:type" content="website">
    <meta name="description" content="View Travel24’s terms: booking emails, journey details, free date/time changes, no liability for delays or missed flights. Clear rules, 24/7 support." />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="canonical" href="https://travel24taxi.com/terms">
    <link rel="stylesheet" href="<?= base_url('assets/css/terms.css'); ?>">
    <!-- Google Tag (gtag.js) -->
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
            <img src="<?php echo base_url('assets/images/travel24/terms_conditions.svg'); ?>" alt="Terms and Conditions Banner" class="banner-image">
        </div>
        <div class="terms_wrapper">
            <div class="terms_content_div">
                <h1>Terms & Conditions</h1>
                <?php
                $terms = [
                    "You will receive a welcome email containing your login details and password on your first booking with us. You will automatically receive a Travel24 acknowledgement email for the journey you have made. Check your email to verify all provided details. If there are any changes, contact us immediately. Travel24 will not be responsible for missed journeys due to incorrect details.",
                    "We will send your journey details, pick-up instructions, and driver contact when the journey is assigned. Ensure you monitor your email and phone regularly. If you fail to do so, Travel24 will not be responsible or offer refunds.",
                    "Passengers are advised to arrive 3 hours early for airport departures. Travel24 will not be responsible for missed flights or appointments due to traffic delays or other unforeseen circumstances.",
                    "Travel24 will not accept responsibility for missed flights or appointments due to severe weather, traffic delays, or accidents.",
                    "In case of vehicle breakdown, we will arrange another vehicle free of charge, depending on the situation. Travel24 will not be responsible for missed flights or appointments due to breakdowns.",
                    "Ensure the provided date and time of departure or arrival is in UK time zone.",
                    "Date and time changes are free if the vehicle is changed. Different vehicle sizes may incur extra charges. Notify us one hour before pick-up, otherwise, a 25% fee applies.",
                    "Travel24 is not responsible if passengers choose alternative transport. No refunds will be provided.",
                    "Inform Travel24 immediately about any journey time changes. Failure to do so will result in no refunds.",
                    "Ensure you book the appropriate vehicle size for passengers and luggage. Travel24 will not be responsible for excess luggage or passengers. If unsure, contact us 24/7.",
                    "Travel24 primarily uses its own transport but may use third-party services when required due to high booking volumes."
                ];
                foreach ($terms as $term) : ?>
                <div class="d-flex">
                    <img src="<?php echo base_url('assets/images/travel24/terms.svg'); ?>" alt="Terms Icon"
                        class="terms_icon">
                    <p><?= $term; ?></p>
                </div>
                <?php endforeach; ?>

                <div class="subbottom_text">
                    If you would like a quote for a journey, please use our online booking form or call us on
                    <a href="tel:02039822911">02039 822 911</a>.
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</body>
</html>