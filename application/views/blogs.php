<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">

    <meta name="title" content="About Travel24: Trusted Airport Transfer Service" />
    <meta name="description"
        content="Learn more about Travel24, your trusted partner for airport transfers. Our story, values, and commitment to providing top-quality, reliable, and affordable transportation solutions across the UK." />

    <title>Blogs</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/travel24.jpg')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/blogs.css') ?>">

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
    <style>
    /* Custom styles for the banner */
    /* -------------AHMED CSS START------------------  */
    </style>

</head>

<body>

    <?php $this->load->view('common_components/header'); ?>


    <section>

        <div class=" banner-section">
            <img src="<?php echo base_url('assets/images/travel24/blogs/blogs_banner.svg')?>" alt="about_us_banner"
                class="banner-image">
        </div>

    </section>

    <section class="carlist-wrapper">
        <div class="home_container no-gutter-responsive">

            <h1>Our latest blogs </h1>
            <p>Uncover the vibrant stories that unfold on the streets in our "Ride Chronicles" blog series.</p>

            <div class="row mt-5 no-gutter-responsive">

                <div class="col-md-6">
                    <div class="car-box">
                        <div class="w-100 blogs_image_card">
                            <img src="assets/images/travel24/blogs/blog_2.svg" class="img-fluid w-100" alt="car">
                        </div>
                        <div class="text_card">
                            <h2>Balancing work and life as a PCO driver</h2>
                            <p>
                                Working as a private hire driver in London can be a lucrative job – but how do you make
                                sure …
                            </p>
                            <div class="d-flex justify-start ">
                                <a href="<?php echo base_url()?>blogDetails" class="">
                                    <h3>Read post</h3>
                                </a>
                                <a href="<?php echo base_url()?>blogDetails" class="">
                                    <img src="assets/images/travel24/blogs/arrow.svg" class="img-fluid mt-4 ml-4 "
                                        alt="car">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="car-box">
                        <div class="w-100 blogs_image_card">
                            <img src="assets/images/travel24/blogs/blog_3.svg" class="img-fluid w-100" alt="car">
                        </div>
                        <div class="text_card">
                            <h2>Navigating london’s street: insider tips for PCO drivers</h2>
                            <p>
                                Working as a private hire driver in London can be a lucrative job – but how do you make
                                sure …
                            </p>
                            <div class="d-flex justify-start ">
                                <h3>Read post</h3>
                                <img src="assets/images/travel24/blogs/arrow.svg" class="img-fluid mt-3 ml-4 "
                                    alt="car">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="car-box">
                        <div class="w-100 blogs_image_card">
                            <img src="assets/images/travel24/blogs/blog_5.svg" class="img-fluid w-100" alt="car">
                        </div>
                        <div class="text_card">
                            <h2>5 ways to maximise your income as a PCO driver</h2>
                            <p>
                                Working as a private hire driver in London can be a lucrative job – but how do you make
                                sure …
                            </p>
                            <div class="d-flex justify-start ">
                                <h3>Read post</h3>
                                <img src="assets/images/travel24/blogs/arrow.svg" class="img-fluid mt-3 ml-4 "
                                    alt="car">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="car-box">
                        <div class="w-100 blogs_image_card">
                            <img src="assets/images/travel24/blogs/blog_6.svg" class="img-fluid w-100" alt="car">
                        </div>
                        <div class="text_card">
                            <h2>Overview of london traffic laws for PCO drivers</h2>
                            <p>
                                Working as a private hire driver in London can be a lucrative job – but how do you make
                                sure …
                            </p>
                            <div class="d-flex justify-start ">
                                <h3>Read post</h3>
                                <img src="assets/images/travel24/blogs/arrow.svg" class="img-fluid mt-3 ml-4 "
                                    alt="car">
                            </div>
                        </div>
                    </div>
                </div>














            </div>

        </div>
    </section>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>