<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Nolimit Cars FAQs: Your Airport Transfer Questions Answered" />
    <meta name="description" content="Find answers to all your queries about Nolimit Cars' airport transfer services. Our FAQ section covers everything from booking processes to journey details, ensuring a smooth travel experience for every customer." />
 


    <title>faq</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <!-- <link rel="stylesheet" href="./css/faqs.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/faqs.css') ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-230246454-1');
    </script> 

</head>
    <body>


    <?php $this->load->view('common_components/header'); ?>
    <section id="content">
    <section class="commonbanner">
        <div class="sub_banner_overlay"></div>
        <img src="<?php echo base_url('assets/images/nolimit-banner.jpg')?>">
    </section>
    <section class="subpagecontent">
        <img src="<?php echo base_url('assets/images/nolimit-body.jpg')?>">
        <div class="wrapper">
            <div class="subcontent_wrapper">
                <h1>Client FAQS</h1>

                <span class="contenthead">How do I make a booking?</span>
                <p>Reserve your vehicle online or with a quick phone call. Not sure of the address? No problem—just email us with as many details as you have, and we'll take care of the rest.</p>

                <span class="contenthead">How will I know if my booking got confirmed?</span>
                <p>Once you book with us, you'll get a welcome email with your personal login and password. After that, every trip you book will be confirmed with an acknowledgement email from NoLimitCars. Plus, we'll send over all the details you need, like journey specifics, pick-up instructions, and your driver's contact, once they're assigned.</p>
                
                <span class="contenthead"> I didn’t receive a booking confirmation & Transfer Imminenet </span>
                <p>If your transfer is approaching and you haven't received confirmation, please contact us at the listed number. Our team is here for you 24/7 to address your concerns promptly.</p>
              
                <span class="contenthead">Are there any extra charges?</span>
                <p>Don't worry about flight delays; we monitor your flight and adjust accordingly without extra charge. If there's a delay exceeding one hour after landing, please refer to our T&Cs for potential additional charges. Expect a detailed receipt sent to you 12 hours post-journey.</p>
            </div>
        </div>
    </section>
</section>
<?php $this->load->view('common_components/footer'); ?>
<script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    </body>
    </html>