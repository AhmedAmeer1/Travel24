<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Explore our most popular taxi destinations: airports, cruise terminals & UK cities. Book fixed rate transfers online with reliable 24/7 service." />
    <title>Popular Destinations</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="canonical" href="https://travel24taxi.com/popularDestinations" />
    <link href="<?= base_url('assets/css/destination.css?v=2') ?>" rel="stylesheet">
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
    <section>
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/about_us.svg')?>" alt="about_us_banner" class="banner-image">
        </div>
        <div class=" destination_wrapper">
            <div class="destination_content_div">
                <div class="">
                    <h1>Popular Destinations </h1>
                </div>
                <div class="destination">
                    <?php foreach ($destinations as $dest): ?>
                    <h2>
                        <a href="<?php echo site_url('popularDestinations/view/'.$dest['slug']); ?>">
                            <?php echo $dest['title']; ?>
                        </a>
                    </h2>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>