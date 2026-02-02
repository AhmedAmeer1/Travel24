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
    <title>School Services</title>
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

    <link rel="stylesheet" href="<?= base_url('assets/css/services.css?v=2') ?>">
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
<style>
@media (max-width: 768px) {
    .logo-grid>div {
        margin-bottom: 30px;
    }
}
</style>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <section id="content">
        <div class="services-container  services-section ">
            <div class="row">
                <!-- LEFT SIDE : CONTACT FORM -->
                <div class="col-md-6">
                    <div class=" ">
                        <form action="<?= base_url('executiveChauffeur/send_email'); ?>" method="post">
                            <?php
                        if ($this->session->flashdata('success_message')) {
                            echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                        } elseif ($this->session->flashdata('error_message')) {
                            echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                        }
                        ?>
                            <div class="heading">
                                <h1>Book Your School Services</h1>
                                <p>Request your quote now.</p>
                            </div>
                            <?php $this->load->view('common_components/Services/contactInfoInputFields'); ?>
                            <button class="btnsubmit mt-3">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- RIGHT SIDE : CONTACT DETAILS -->
                <?php $this->load->view('common_components/Services/contactInfo'); ?>
            </div>
        </div>
    </section>
    <section>
        <div class=" services-container services-content">
            <h1>School Services</h1>
            <h2>Trusted School Travel Solutions Across the UK
            </h2>
            <p>At Travel24, we understand how important safe, dependable transport is for schoolchildren,
                parents and educational organisations. Our dedicated School Services provide comfortable,
                punctual journeys tailored to daily school runs, organised group travel and long-term transport
                needs. From early-morning pickups to afternoon drop-offs, Travel24 takes care of every detail
                with professionalism and care</p>

            <div class="mt-5">
                <h2>Why Choose Travel24 for School Transport

                </h2>
                <div>
                    <h4> <i class="fa-solid fa-check"></i> Safe & Fully Vetted Drivers</h4>
                    <p>All our drivers undergo enhanced background checks and extensive training to ensure every
                        journey is safe, secure and child-friendly. We prioritise safety above all else, giving parents
                        and
                        schools peace of mind on every trip.

                    </p>
                </div>
                <div>
                    <h4> <i class="fa-solid fa-check"></i> Modern & Comfortable Vehicle</h4>
                    <p>Our fleet includes modern minibuses and coaches equipped with comfortable seating and
                        ample space for students and luggage. Each vehicle is regularly inspected and maintained to the
                        highest safety and performance standards</p>
                </div>
                <div>
                    <h4> <i class="fa-solid fa-check"></i> Tailored Routes & Schedules
                    </h4>
                    <p>Whether it’s daily school runs, multi-school drop-offs or custom transport for school events, we
                        create personalised itineraries that match your timetable, routes and group size.
                    </p>
                </div>
                <div>
                    <h4><i class="fa-solid fa-check"></i> Easy Booking & Flexible Options
                    </h4>
                    <p>Booking your school transport with Travel24 is simple — choose the service, specify your route
                        and let our team handle the rest. We offer flexible solutions for individual families, school
                        groups and long-term contracts.
                    </p>
                </div>


                <div class="mt-5">


                    <h2>Our School Transport Services


                    </h2>
                    <div>
                        <h4> <i class="fa-solid fa-check"></i> Daily School Runs
                        </h4>
                        <p>Reliable transport for daily pickup and drop-off, designed to fit around school schedules and
                            parental needs

                        </p>
                    </div>
                    <div>
                        <h4> <i class="fa-solid fa-check"></i> Before & After School Care Transfers</h4>
                        <p>Safe journeys for students attending early morning or after-school programmes</p>
                    </div>
                    <div>
                        <h4> <i class="fa-solid fa-check"></i> Group & Event Transport
                        </h4>
                        <p>Secure transport for school sports days, field trips, competitions and other educational
                            outings.

                        </p>
                    </div>
                    <div>
                        <h4><i class="fa-solid fa-check"></i> Emergency & Special Needs Support
                        </h4>
                        <p>Supportive, attentive service for pupils with additional needs — just let us know your
                            requirements. </p>
                    </div>


                </div>



                <div class="mt-5">
                    <h3>
                        Why UK Schools & Parents Trust Travel24

                    </h3>
                    <p>
                        Choosing Travel24 means choosing a partner that values your child’s safety and your family’s
                        convenience. Our UK-wide transport experience — from urban school runs to regional group
                        transfers — makes us the go-to option for parents and educational institutions who want
                        professional, stress-free school travel.

                    </p>

                </div>


                <div class="row mt-5 g-5">
                    <div class="col-md-6">
                        <h2>SEN Transport Services</h2>
                        <p>Travel24 provides dedicated SEN (Special
                            Educational Needs) transport services
                            designed to support students with additional
                            needs through safe, comfortable, and
                            dependable journeys. By working closely with
                            councils including the London Borough of
                            Hillingdon, the Royal Borough of Windsor and
                            Maidenhead, and Slough Borough Council,
                            with many more coming soon, we ensure each
                            student receives a caring, punctual service
                            tailored to their individual requirements</p>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/travel24/accident-Claim-2.jpg" alt="accident-Claim-2"
                            class="airport-transfer-img">
                    </div>
                </div>

                <h2 class="mt-5">We are working with many councils at the moment.
                </h2>

                <div class="row mt-5 g-5 logo-grid">


                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="assets/images/travel24/services/LondonBoroughOfHillingdon.png"
                            alt="London Borough Of Hillingdon" class="airport-transfer-img">
                    </div>

                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="assets/images/travel24/services/NHS-RGB.webp" alt="NHS Logo" class="NHS-RGB">
                    </div>

                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="assets/images/travel24/services/RoyalBoroughoOfWindsorMaidenhead.jpeg"
                            alt="Royal Borough Windsor Maidenhead" class="airport-transfer-img">
                    </div>

                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="assets/images/travel24/services/Slough_Borough_Council.svg"
                            alt="Slough Borough Council" class="airport-transfer-img">
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