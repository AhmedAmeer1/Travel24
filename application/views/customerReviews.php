<!DOCTYPE html>
<html lang="en">


<script>
let currentIndex = 0;

// Start from the second slide (Slide 2)
const items = document.querySelectorAll('.carousel-item');

const totalItems = window.innerWidth >= 768 ? items.length - 7 : items.length - 2;
// const totalItems = items.length -3 ;  // if data  count is  even number divide by 3 and odd means divide 2
const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');
leftArrow.classList.add('disabled');

function moveCarousel(direction) {
    console.log(totalItems);
    console.log(currentIndex);

    currentIndex = (currentIndex + direction + totalItems) % totalItems;
    const offset = -currentIndex * 100;
    document.querySelector('.carousel').style.transform = `translateX(${offset}%)`;

    // Disable or enable arrows based on currentIndex
    if (currentIndex === 0) {
        leftArrow.classList.add('disabled');
        rightArrow.classList.remove('disabled');
    } else if (currentIndex === totalItems - 1) {
        rightArrow.classList.add('disabled');
        leftArrow.classList.remove('disabled');
    } else {
        leftArrow.classList.remove('disabled');
        rightArrow.classList.remove('disabled');
    }
}
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Customer Reviews: See What Others Say About Travel24" />
    <meta name="description"
        content="Read authentic customer reviews and experiences with Travel24. Discover why our clients choose us for reliable and comfortable airport transfers across the UK" />

    <title>Reviews</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">
    <style>
    .carousel-container {
        position: relative;
        width: 80%;
        margin: 0 auto;
        overflow: hidden;
    }

    .carousel {
        display: flex;
        transition: transform 0.5s ease;
    }


    .carousel-item {
        flex: 0 0 33.4%;
        max-width: 50%;
    }


    .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .carousel-arrow.left {
        left: 0;
    }

    .carousel-arrow.right {
        right: 0;
    }

    .disabled {
        opacity: 0.5;
        pointer-events: none;
    }



    .swiper-slide {
        background-color: gray;
        border: 2px solid red;
        /* background-color: red; */
        padding: 40px 70px 40px 110px;
    }

    .review_detail {
        padding: 40px 10px 40px 90px;
    }

    .client_rating {
        font-size: 20px;
        color: #f38422;
    }

    p {
        font-size: 20px;
        color: black;
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }



    @media (max-width: 1366px) {
        .carousel-item {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 768px) {

        .carousel-container {
            width: 100%;
        }

        .carousel-item {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .review_detail {
            padding: 40px 10px 40px 10px;
        }

        .client_rating {
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 16px;
            text-align: center;
        }
    }
    </style>




</head>

<body>
    <?php $this->load->view('common_components/header'); ?>

    <div class="container-fluid banner-section">
        <img src="<?php echo base_url('assets/images/travel24/review_banner.svg')?>" alt="about_us_banner"
            class="banner-image">
    </div>


    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Sophie</h1>
                    <p class="client_rating">*****</p>
                    <p>Great thank you so much )!!! Sophie</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Kiran Bhati</h1>
                    <p class="client_rating">*****</p>
                    <p>Everything’s excellent, except traffic</p>
                </div>
            </div>

            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Nicola Wilson</h1>
                    <p class="client_rating">***</p>
                    <p>Not on time, but driver made up and friendly</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Claudia Boggio</h1>
                    <p class="client_rating">*****</p>
                    <p>Excellent service and helpful driver</p>
                </div>
            </div>

            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Kerry Angel</h1>
                    <p class="client_rating">*****</p>
                    <p>On time and helpful driver…</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Katie Tyrrell</h1>
                    <p class="client_rating">****</p>
                    <p>Good service</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Chakradhaar</h1>
                    <p class="client_rating">*****</p>
                    <p>Excellent service</p>
                </div>
            </div>

            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Graham Madge</h1>
                    <p class="client_rating">*****</p>
                    <p>On time and VERY friendly</p>
                </div>
            </div>


            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Ben Goode</h1>
                    <p class="client_rating">*****</p>
                    <p>Excellent airport taxi service from the cab company book through nolimitcars</p>
                </div>
            </div>


            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Paul Doherty</h1>
                    <p class="client_rating">*****</p>
                    <p>Friendly driver. Get me where I needed to go quickly…….</p>
                </div>
            </div>

            <div class="carousel-item">
                <div class="review_detail">
                    <h1>Mooly Tarpin</h1>
                    <p class="client_rating">*****</p>
                    <p>ON time and really helpful. Would recommend to anyone</p>
                </div>
            </div>
        </div>
        <div class="carousel-arrow left" onclick="moveCarousel(-1)" id="leftArrow">&#10094;</div>
        <div class="carousel-arrow right" onclick="moveCarousel(1)" id="rightArrow">&#10095;</div>
    </div>



</body>

</html>