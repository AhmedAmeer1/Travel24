<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"content="Join Travel24’s 24/7 UK airport & chauffeur fleet. We hire professional drivers with local knowledge—wheelchair-accessible vehicles, steady bookings." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Drivers</title>
    <meta property="og:title" content="Join Travel 24 Taxi as a Driver - Flexible Airport Transfer Jobs">
    <meta property="og:description" content="Become a driver with Travel 24 Taxi. Enjoy flexible hours, competitive pay, and the opportunity to provide top-notch airport transfer services across the UK.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/drivers">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/drivers" />
    <link rel="stylesheet" href="<?= base_url('assets/css/drivers.css?v=1') ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
     <?php $this->load->view('assets/js/seo/drivers'); ?>
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
            <img src="<?php echo base_url('assets/images/travel24/driver.svg')?>" alt="driver icon" class="banner-image">
        </div>
        <div class=" drivers_wrapper background-gray">
            <div class="drivers_content_div">
                <h1>Driver Application</h1>
                <div class="d-flex ">
                    <img src="<?php echo base_url('assets/images/travel24/terms.svg')?>" alt="terms icon" class="terms_icon">
                    <p>
                        We specialise in taxi transfers to and from all UK airports for both individuals and groups,
                        with the accent on a courteous and thoroughly professional personal service at affordable
                        prices. 24 hours a day, 7 days a week.
                    </p>
                </div>
                <div class="d-flex">
                    <img src="<?php echo base_url('assets/images/travel24/terms.svg')?>" alt="terms icon" class="terms_icon">
                    <p>
                        Please download and complete the form below and send it back with all required documents by
                        email: <a href="mailto:info@travel24taxi.com" class="">info@travel24taxi.com </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="drivers_wrapper ">
            <div class="flex-container  ">
                <div class="docs">
                    <img src="<?php echo base_url('assets/images/doc-logo.png')?>" alt="terms icon" class="">
                    <p>
                        Download and complete the provided Word document to start your driver application with us.
                    </p>
                    <p class="download-btn">
                        <a href="<?php echo base_url('assets/docs/Driver_Application_Form.docx')?>">
                            Download Now
                        </a>
                    </p>
                </div>
                <div class="docs">
                    <img src="<?php echo base_url('assets/images/pdf-logo.png')?>" alt="terms icon" class="">
                    <p>
                        Download and complete the provided Word document to start your driver application with us.
                    </p>
                    <p class="download-btn">
                        <a href="<?php echo base_url('assets/docs/Driver_Application_Form.pdf')?>">
                            Download Now
                        </a>
                    </p>
                </div>
            </div>
            <div class="subbottom_text">
                If you would like a quote for a journey you are planning please use our
                online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.
            </div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>