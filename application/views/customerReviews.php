<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Read real Travel24 customer reviews: punctual, professional drivers, clean cars & excellent 24/7 service. Discover why passengers love us." />
    <title>Reviews</title>
    <meta property="og:title" content="Travel 24 Taxi - Verified Customer Reviews & Testimonials">
    <meta property="og:description" content="Read real customer reviews about Travel 24 Taxi’s airport transfer services. Discover why our passengers trust us for their UK journeys.">
    <meta property="og:image" content="https://travel24taxi.com/assets/images/travel24/about_us.svg ">
    <meta property="og:url" content="https://travel24taxi.com/customerReviews">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link rel="canonical" href="https://travel24taxi.com/customerReviews" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reviews.css?v=8') ?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
    <?php $this->load->view('assets/js/seo/customerReviews'); ?>
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
    <section id="content">
        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/review_banner.svg')?>" alt="about_us_banner" class="banner-image">
        </div>
        <section class="subpagecontent my-5 ">
            <h2 class="reviewshead">What our customers say</h2>
            <p class="sub-heading">Discover why our passengers applaud the excellence of our taxi service.</p>
            <!-- Outer Container with Padding -->
            <div class="swiper-container-outer">
                <!-- Swiper Container -->
                <div class="swiper-container">
                    <div class="swiper-wrapper" id="reviews-container"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1, // Display three reviews on larger screens
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 2000,
            effect: 'slide',
            breakpoints: {
                768: {
                    slidesPerView: 3, // Display two reviews on smaller screens
                },
            },
        });
        var reviewsData = <?php echo json_encode($CustomerReviewData); ?>;
        var reviewsContainer = document.getElementById('reviews-container');
        reviewsData.forEach(function(review) {
            var reviewHTML = `
           <div class="swiper-slide pr-5 ">
    <span class="customer_name">${review.name }<br></span>
    <p class="client_rating ">${'*'.repeat(review.rating)}</p>
    ${review.reviewType ? `<img class="quatation_review_type" src="<?php echo base_url('assets/images/travel24/quatation_left.png')?>" alt="icon">` : ''}
    <span class="review_type">${review.reviewType}  ${review.reviewType  &&  review.comment? ',':'' }    
    ${!review.comment ? `<img class="quatation_review_type_right" src="<?php echo base_url('assets/images/travel24/quatation_right.png')?>" alt="icon">` : ''}
    <br></span> <br />
    <span class="client_review">
`;

            if (review.comment) { // Check if review.comment is not null or empty
                reviewHTML += `
        <p>
            ${review.reviewType ? '' : `<img class="quatation_left" src="<?php echo base_url('assets/images/travel24/quatation_left.png')?>" alt="icon">`}
            ${review.comment}
            <img class="quatation_right" src="<?php echo base_url('assets/images/travel24/quatation_right.png')?>" alt="icon">
        </p>
    `;
            }

            reviewHTML += `
    </span>
</div>
          `;
            reviewsContainer.innerHTML += reviewHTML;
        });
    });
    </script>
</body>

</html>