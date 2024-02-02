<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Customer Reviews: See What Others Say About Nolimit Cars" />
    <meta name="description" content="Read authentic customer reviews and experiences with Nolimit Cars. Discover why our clients choose us for reliable and comfortable airport transfers across the UK" />
 
    <title>Reviews</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">
    <style>
        .swiper-slide {
            width: 300px; /* Adjust the width as needed */
            background-color: blue;
            border: 1px solid #ddd;
            padding: 15px;
            margin-right: 10px; /* Adjust the margin as needed */
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <?php $this->load->view('common_components/header'); ?>
    <section id="content">
        <section class="commonbanner">
            <div class="sub_banner_overlay"></div>
            <img src="<?php echo base_url('assets/images/nolimit-banner.jpg')?>">
        </section>
        <section class="subpagecontent">
  
                    <h1 class="reviewshead">Client Reviews</h1>

                    <!-- Swiper Container -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper" id="reviews-container"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

               
        </section>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3, // Display three reviews at a time
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000, // 3 seconds
                    disableOnInteraction: false,
                },
                speed: 1000, // 1 second for each slide (adjust as needed)
                effect: 'slide', // Other options: 'fade', 'cube', 'coverflow', 'flip'
            });

            // Sample Reviews Data
            var reviewsData = [
                { name: "Sophie", rating: 5, review: "Great thank you so much)!!! Sophie" },
                { name: "Kiran Bhati", rating: 5, review: "Everything’s excellent, except traffic" },
                { name: "Nicola Wilson", rating: 3, review: "Not on time, but driver made up and friendly" },
                { name: "Claudia Boggio", rating: 5, review: "Excellent service and helpful driver" },
                { name: "Kerry Angel", rating: 5, review: "On time and helpful driver…" },
                { name: "Katie Tyrrell", rating: 4, review: "Good service" },
                { name: "Chakradhaar", rating: 5, review: "Excellent service" },
                { name: "Graham Madge", rating: 5, review: "On time and VERY friendly" },
                { name: "Ben Goode", rating: 5, review: "Excellent airport taxi service from the cab company book through nolimitcars" },
                { name: "Paul Doherty", rating: 5, review: "Friendly driver. Get me where I needed to go quickly……." },
                { name: "Mooly Tarpin", rating: 5, review: "ON time and really helpful. Would recommend to anyone" },
                // Add more reviews as needed
            ];

            // Render reviews in the slider
            var reviewsContainer = document.getElementById('reviews-container');
            reviewsData.forEach(function (review) {
                var reviewHTML = `
                    <div class="swiper-slide">
                        <span class="name_date">${review.name}<br></span>
                        <span class="client_rating">${'*'.repeat(review.rating)}</span>
                        <span class="client_review">
                            <p>${review.review}</p>
                        </span>
                    </div>
                `;
                reviewsContainer.innerHTML += reviewHTML;
            });
        });
    </script>
</body>
</html>
