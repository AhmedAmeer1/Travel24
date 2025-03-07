<!DOCTYPE html>
<html lang="en">

<head>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Experience top-notch airport transfer services with Travel24. Catering to Gatwick, Heathrow, and Luton, we specialize in providing reliable, professional, and affordable travel solutions for both individuals and groups. Book now for a smooth and stress-free journey!" />
    <meta name="title"
        content="Travel24: Premier Airport Transfers | Gatwick, Heathrow, Luton, Hove, Southampton, Bristol" />
    <title>Popular Destinations</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('/favicon.ico')?>">


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
            <img src="<?php echo base_url('assets/images/travel24/about_us.svg')?>" alt="about_us_banner"
                class="banner-image">
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