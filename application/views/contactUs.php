<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get in touch with Travel24 Taxi – contact us via online form, call 02039 822 911 or email info@travel24taxi.com. Fast quotes & 24/7 support." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Contact us</title>
    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description" content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/contactUs" />
    <link rel="stylesheet" href="<?= base_url('assets/css/contactUs.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/aboutus.css') ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
    <?php $this->load->view('assets/js/seo/contactUs'); ?>
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
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/contact_us.svg')?>" alt="about_us_banner" class="banner-image">
        </div>
        <div class="contact_form">
            <div class="heading">
                <h1>Get in touch</h1>
                <p>We’d love to hear from you. Please fill out this form.</p>
            </div>
            <form action="<?= base_url('contactUs/send_email'); ?>" method="post">
                <?php
                     if ($this->session->flashdata('success_message')) {
                     echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                     } elseif ($this->session->flashdata('error_message')) {
                     echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                     }
                ?>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="name_div">
                        <p>First name</p>
                        <input name="name" id="name" type="text" placeholder="Your Name*" class="input_fields p-3 w-100"
                            required>
                    </div>
                    <div class="name_div">
                        <p>Email</p>
                        <input name="email" id="email" type="email" placeholder="Your Email*"
                            class=" input_fields p-3  w-100" required>
                    </div>
                </div>
                <div class="d-flex  flex-column justify-content-between">
                    <div class="phone_div">
                        <p>Phone number</p>
                        <input name="contactnumber" id="contactnumber" type="text" placeholder="Contact Number "
                            class="w-100 h-100 p-3 input_fields  " required>
                    </div>
                    <div class="enquiry_div">
                        <p>Your Enquiry</p>
                        <textarea name="message" cols="" rows="" id="message" placeholder="Leave us a message..."
                            class="input_fields p-3 w-100 h-100 "></textarea>
                    </div>
                    <button class="btnsubmit " name="" id="">Submit</button>
                </div>
            </form>
        </div>
        <div class=" contact-detail-container d-flex flex-column flex-md-row justify-content-between">
            <div class="d-flex  p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/email.svg')?>" alt="email icon" class="contact_icon">
                <div>
                    <h1>Email</h1>
                    <p>info@travel24taxi.com</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/location.svg')?>" alt="location icon" class="contact_icon">
                <div>
                    <h1>TRAVEL24 </h1>
                    <p> Regus Maidenhead, Concorde Park.
                        Concorde Road,
                        Maidenhead,
                        Berkshire,
                        SL6 4FJ</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/location.svg')?>" alt="location icon" class="contact_icon">
                <div>
                    <h1>Nolimit Airport Cars Ltd</h1>
                    <p> Registered England and Wales.Registration No: 11212437.</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/phone.svg')?>" alt="call icon" class="contact_icon">
                <div>
                    <h1>Phone</h1>
                    <p>01293&nbsp;775422 </p>
                </div>
            </div>
        </div>
        <div class="subbottom_text">
            If you would like a quote for a journey you are planning please use our
            online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.
        </div>
    </section>
    <?php $this->load->view('common_components/contactusFooter'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>