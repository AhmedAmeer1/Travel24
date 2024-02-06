<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Nolimit Cars FAQs: Your Airport Transfer Questions Answered" />
    <meta name="description"
        content="Find answers to all your queries about Nolimit Cars' airport transfer services. Our FAQ section covers everything from booking processes to journey details, ensuring a smooth travel experience for every customer." />



    <title>faq</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <!-- <link rel="stylesheet" href="./css/faqs.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/faqs.css') ?>">

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
            <img src="<?php echo base_url('assets/images/travel24/about_us.svg')?>" alt="about_us_banner"
                class="banner-image">
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
                        that, every trip you book will be confirmed with an acknowledgement email from NoLimitCars.
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


            </div>

            <div class="subbottom_text">If you would like a quote for a journey you are planning please use our
                online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.</div>
        </div>
    </section>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>