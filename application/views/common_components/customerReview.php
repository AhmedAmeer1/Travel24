
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">

<body>


    <section id="content">


        <section class="subpagecontent ">
            <h1 class="reviewshead">What our customers say</h1>
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

        var reviewsData = [{
                name: "Sophie",
                rating: 5,
                review: " Great thank you so much)!!! Sophie"
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
                review: "Excellent airport taxi service from the cab company book through Travel24"
            },

            {
                name: "Paul Doherty",
                rating: 5,
                review: "Friendly driver. Get me where I needed to go quickly…."
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
                    <div class="swiper-slide pr-5 ">
                        <span class="customer_name">${review.name}<br></span>
                        <span class="client_rating mt-3">${'*'.repeat(review.rating)}</span>
                        <span class="client_review">
                            <p>" ${review.review} "</p>
                        </span>
                    </div>
                `;
            reviewsContainer.innerHTML += reviewHTML;
        });
    });
    </script>
</body>