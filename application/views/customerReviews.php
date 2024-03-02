<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Customer Reviews: See What Others Say AboutTravel24" />
    <meta name="description"
        content="Read authentic customer reviews and experiences with NTravel24. Discover why our clients choose us for reliable and comfortable airport transfers across the UK" />

    <title>Reviews</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/travel24.jpg')?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">
    <style>



    </style>
</head>

<body>

    <?php $this->load->view('common_components/header'); ?>

    <section id="content">
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/review_banner.svg')?>" alt="about_us_banner"
                class="banner-image">
        </div>
        <?php $this->load->view('common_components/customerReview'); ?>

    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

</body>

</html>