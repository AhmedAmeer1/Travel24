<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/css/reviews.css?v=2') ?>">
<body>
    <section id="content">
        <section class="subpagecontent my-5">
            <h2 class="reviewshead">What our customers say</h2>
            <p class="sub-heading">Discover why our passengers applaud the excellence of our taxi service.</p>
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

        var reviewsDatatest = [{
                name: "Sophie",
                rating: 5,
                review: " Great thank you so much)!!! Sophie"
            },
            {
                name: "Kiran Bhati",
                rating: 5,
                review: "Everything’s excellent, except traffic"
            },
            // Add more reviews as needed
        ];
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
    
    <br></span> 
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