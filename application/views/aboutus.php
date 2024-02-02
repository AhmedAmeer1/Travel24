<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
  
    <meta name="title" content="About Nolimit Cars: Trusted Airport Transfer Service" />
    <meta name="description" content="Learn more about Nolimit Cars, your trusted partner for airport transfers. Our story, values, and commitment to providing top-quality, reliable, and affordable transportation solutions across the UK." />
 
    <title>About Us</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/aboutus.css') ?>">
    
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
                    <h1>About us </h1>
                    <p>NoLimit Cars offer a highly professional taxi, minibus, chauffeur, parcel and executive service
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
                        advance bookings. NoLimit Cars will confirm such bookings by return e-mail.</p>
                    <p>NoLimit Cars also provide account facilities, and are available for regular school runs, these
                        can be set-up upon request. We accept all card payments.</p>
                    <p>Remember online, Airport, Distance and Local Specialists will meet your needs and always put
                        customers first.</p>

                    <div class="subbottom_text">If you would like a quote for a journey you are planning please use our
                        online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.</div>
                </div>
            </div>
        </section>
    </section>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>