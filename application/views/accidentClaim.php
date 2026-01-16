<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get in touch with Travel24 Taxi – contact us via online form, call 02039 822 911 or email info@travel24taxi.com. Fast quotes & 24/7 support." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Accident Claim</title>
    <meta property="og:title" content="Contact Travel 24 Taxi - 24/7 Airport Transfer Support">
    <meta property="og:description"
        content="Need assistance or want to book a taxi? Contact Travel 24 Taxi anytime. We’re here 24/7 to help with your airport transfer needs.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/contactUs">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/favicon-16x16.png')?> ">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/contactUs" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bookYourVanAndMan.css?v=9') ?>">
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




    <section id="content">
        <div class="van-man-container  van-man-section ">
            <div class="row">

                <!-- LEFT SIDE : CONTACT FORM -->
                <div class="col-md-6">
                    <div class=" ">


                        <form action="<?= base_url('accidentClaim/send_email'); ?>" method="post">
                            <?php
                        if ($this->session->flashdata('success_message')) {
                            echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                        } elseif ($this->session->flashdata('error_message')) {
                            echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                        }
                        ?>
                            <div class="heading">
                                <h1>Book Your Accident Claim</h1>
                                <p>Request your quote now.</p>
                            </div>
                            <div class="d-flex flex-column flex-md-row gap-4">



                                <div class="name_div w-100">

                                    <input name="name" type="text" placeholder="Name" class="input_fields p-3 w-100"
                                        required>
                                </div>

                                <div class=" name_div w-100 ml-md-2">
                                    <input name="contactnumber" type="text" placeholder="Phone Number"
                                        class="input_fields p-3 w-100" required>

                                </div>
                            </div>

                            <div class="mt-3">

                                <input name="email" type="email" placeholder="Email" class="input_fields p-3 w-100"
                                    required>


                            </div>

                            <div class="mt-3">

                                <textarea name="message" placeholder="Your Enquiry"
                                    class="input_fields p-3 w-100"></textarea>
                            </div>

                            <button class="btnsubmit mt-3">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- RIGHT SIDE : CONTACT DETAILS -->
                <div class="col-md-6">
                    <div class="contact-detail-container d-flex flex-column">
                        <h3>For More Information</h3>
                        <div class="d-flex align-items-start mb-4">
                            <img src="<?= base_url('assets/images/travel24/email.svg') ?>" class="contact_icon">
                            <div class="ms-3">
                                <h5>Email</h5>
                                <p>info@travel24taxi.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <img src="<?= base_url('assets/images/travel24/phone.svg') ?>" class="contact_icon">
                            <div class="ms-3">
                                <h5>Phone</h5>
                                <p>01293 775422</p>
                            </div>
                        </div>



                        <div class="d-flex align-items-start">
                            <img src="<?= base_url('assets/images/travel24/phone.svg') ?>" class="contact_icon">
                            <div class="ms-3">
                                <h5>WhatsApp</h5>
                                <p>01293 775422</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class=" van-man-container van-man-content">
            <h1>Accident Claim</h1>
            <h3>Get the Support You Need After a Road Traffic Accident</h3>
            <p>Being involved in a vehicle accident is stressful, confusing, and often overwhelming. At
                Travel24, we’re here to take that burden off your shoulders. So you can focus on recovery while
                we handle your accident claim from start to finish.</p>
            <p>Whether the accident was your fault or not, our experienced team will guide you through every
                step of the claims process, ensuring you get the compensation and support you deserve.</p>


            <div class="row mt-5 g-5">
                <div class="col-md-6">
                    <img src="assets/images/travel24/accident-Claim-1.jpg" alt="accident-Claim-1"
                        class="airport-transfer-img">
                </div>
                <div class="col-md-6">
                    <img src="assets/images/travel24/accident-Claim-2.jpg" alt="accident-Claim-2"
                        class="airport-transfer-img">
                </div>
            </div>

        </div>

    </section>

    <?php $this->load->view('common_components/contactusFooter'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>