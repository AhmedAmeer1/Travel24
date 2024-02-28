<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Join Our Team: Drive withTravel24
        content="Become a part of theTravel24 driving team. We're inviting professional drivers to register with us and join our network for airport transfers. Enjoy flexible hours, competitive earnings, and the chance to provide top-tier service across the UK." />



    <title>Drivers</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/drivers.css') ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-230246454-1');
    </script>

</head>

<body>
    <?php $this->load->view('common_components/header'); ?>


    <section>
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/driver.svg')?>" alt="about_us_banner"
                class="banner-image">
        </div>
        <div class=" drivers_wrapper background-gray">
            <div class="drivers_content_div">
                <h1>Driver Application</h1>
                <div class="d-flex ">
                    <img src="<?php echo base_url('assets/images/travel24/terms.svg')?>" alt="terms_icon"
                        class="terms_icon">
                    <p>
                        We specialise in taxi transfers to and from all UK airports for both individuals and groups,
                        with the accent on a courteous and thoroughly professional personal service at affordable
                        prices. 24 hours a day, 7 days a week.
                    </p>
                </div>
                <div class="d-flex">
                    <img src="<?php echo base_url('assets/images/travel24/terms.svg')?>" alt="terms_icon"
                        class="terms_icon">
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
                    <img src="<?php echo base_url('assets/images/doc-logo.png')?>" alt="terms_icon" class="">
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
                    <img src="<?php echo base_url('assets/images/pdf-logo.png')?>" alt="terms_icon" class="">
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