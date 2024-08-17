<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Experience top-notch airport transfer services with Travel24. Catering to Gatwick, Heathrow, and Luton, we specialize in providing reliable, professional, and affordable travel solutions for both individuals and groups. Book now for a smooth and stress-free journey!" />
    <meta name="title"
        content="Travel24: Premier Airport Transfers | Gatwick, Heathrow, Luton, Hove, Southampton, Bristol" />
    <title>Popular Destinations</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/travel24.jpg')?>">
    <!-- <link rel="stylesheet" href="./css/faqs.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/faqs.css') ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
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
                    <h1>Popular Destinations </h1>

                </div>
                <div class="questions mt-5">
                    <?php foreach ($destinations as $dest): ?>
                    <h1>
                        <a href="<?php echo site_url('popularDestinations/view/'.$dest['slug']); ?>">
                            <?php echo $dest['title']; ?>
                        </a>
                    </h1>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
 
        <?php $this->load->view('common_components/footer'); ?>
        <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>