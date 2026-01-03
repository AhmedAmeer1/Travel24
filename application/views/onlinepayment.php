<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel24: 15+ years of 24/7 taxi, minibus, chauffeur & executive services. Airport, long-distance specialists with licensed safe vehicles & competitive rates." />
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/aboutus" />
    <meta property="og:title" content="About Travel 24 Taxi - Your Trusted UK Airport Transfer Service">
    <meta property="og:description" content="Learn about Travel 24 Taxi – a professional, customer-focused airport transfer company offering safe, reliable transport across the UK.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/aboutus">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="<?= base_url('assets/css/aboutus.css?v=1') ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
    <?php $this->load->view('assets/js/seo/aboutus'); ?>
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
                <h1>online payment </h1>
             <button id="payBtn">Pay Now</button>

            </div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>



<script src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"></script>

<script>
document.getElementById('payBtn').onclick = function () {
  alert("hiiiiii");
    fetch("<?= base_url('OnlinePayment/create_checkout') ?>")
        .then(res => res.json())
        .then(data => {

            if (data.status === 'success') {

                SumUpCard.mount({
                    checkoutId: data.checkout_id,
                    onResponse: function (response) {
                        console.log(response);
                    }
                });

            } else {
                alert(data.message);
            }
        });
};
</script>


    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>