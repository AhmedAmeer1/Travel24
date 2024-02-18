<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Customer Reviews: See What Others Say About Nolimit Cars" />
    <meta name="description"
        content="Read authentic customer reviews and experiences with Nolimit Cars. Discover why our clients choose us for reliable and comfortable airport transfers across the UK" />

    <title>Reviews</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">
    <style>
    .swiper-slide {
        width: 300px;
        background-color: lightgreen;
        border: 1px solid #ddd;
        padding: 15px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .swiper-container-outer {
        padding: 0 20px !important;
    }

    /* Media Queries for Responsive Design */
    @media only screen and (max-width: 768px) {
        .swiper-slide {
            width: calc(50% - 10px);
            /* Two reviews in a row with some margin in between */
            margin-right: 0;
        }
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
            slidesPerView: 3, // Display three reviews on larger screens
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 1000,
            effect: 'slide',
            breakpoints: {
                768: {
                    slidesPerView: 2, // Display two reviews on smaller screens
                },
            },
        });

        var reviewsData = [{
                name: "Sophie",
                rating: 5,
                review: "Great thank you so much)!!! Sophie"
            },
            {
                name: "Kiran Bhati",
                rating: 5,
                review: "Everything’s excellent, except traffic"
            },
            {
                name: "Nicola Wilson",
                rating: 3,
                review: "Not on time, but driver made up and friendly"
            },




            {
                name: "Claudia Boggio",
                rating: 5,
                review: "Excellent service and helpful driver"
            },
            {
                name: "Kerry Angel",
                rating: 5,
                review: "On time and helpful driver…"
            },
            {
                name: "Katie Tyrrell",
                rating: 4,
                review: "Good service"
            },







            {
                name: "Chakradhaar",
                rating: 5,
                review: "Excellent service"
            },
            {
                name: "Graham Madge",
                rating: 5,
                review: "On time and VERY friendly"
            },
            {
                name: "Ben Goode",
                rating: 5,
                review: "Excellent airport taxi service from the cab company book through nolimitcars"
            },


            
            {
                name: "Paul Doherty",
                rating: 5,
                review: "Friendly driver. Get me where I needed to go quickly……."
            },
            {
                name: "Mooly Tarpin",
                rating: 5,
                review: "ON time and really helpful. Would recommend to anyone"
            },
            // Add more reviews as needed
        ];

        var reviewsContainer = document.getElementById('reviews-container');
        reviewsData.forEach(function(review) {
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