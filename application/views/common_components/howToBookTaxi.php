<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Shape Layout</title>
    <!-- Bootstrap CSS -->

    <style>
    .shape-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        /* Space between shapes */
        flex-wrap: wrap;
        /* Allows wrapping on small screens */
    }

    .book-container {
        margin-top: 50px;
        padding: 78px 310px 100px 229px;
    }

    .taxi-heading {
        font-size: 42px;
        text-align: center;
        font-weight: bold;
        margin-bottom: 60px;

    }

    .shape-container>div {
        flex: 1 1 100px;
        /* Flex-grow, flex-shrink, and minimum width */
        max-width: 260px;
    }


    .horizontal-line {
        width: 100px;
        height: 2px;
        background-color: #333;
        margin: 10px auto;
        margin-bottom: 74px;
        /* Centers the line when stacked */
    }


    .main-heading {
        text-align: center;
        font-size: 27px;
        margin-bottom: 40px;
        color: #00517c;
        /* color: black; */
        font-weight: 600;
    }

    .image-row {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .image-container {
        width: 56px;
        height: 52px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid black;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .image-container img {
        width: fit-content;
        height: 58%;
        object-fit: cover;
    }

    .sub-heading {
        height: 100px;
        text-align: center;
        font-size: 15px;
        text-transform: capitalize;
        margin-top: 30px;
        /* color: black; */
        color: #00517c;
        font-weight: 400;
    }

    @media only screen and (max-width: 1688px) {
        .book-container {
            padding: 17px 90px 0px 90px;
        }
    }

    @media (max-width: 1350px) {
        .book-container {
            padding: 17px 10px 0px 10px;
        }
    }

    @media (max-width: 1171px) {
        .book-container {
            padding: 17px 2px 0px 2px;
        }

        .shape-container>div {
            max-width: 234px;
        }
    }

    @media (max-width: 1133px) {
        .shape-container>div {
            max-width: 170px;
        }

        .image-container {
            width: 46px;
            height: 41px;
        }

        .image-container img {
            height: 49%;
        }


    }

    @media (max-width: 1032px) {
        .shape-container>div {
            max-width: 165px;
        }
    }

    @media (max-width: 1024px) {
        .shape-container>div {
            max-width: 155px;
        }

        .book-container {
            padding: 17px 10px 0px 10px;
        }
    }

    @media (max-width: 1005px) {
        .shape-container {
            flex-direction: column;
        }

        .horizontal-line {
            width: 2px;
            height: 100px;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        .sub-heading {
            height: 0px;
            margin-bottom: 20px;
        }

        .image-container {
            width: 52px;
            height: 45px;
        }

    }

    .test-img {
        display: none;
    }

    /* Media query for mobile view */
    @media (max-width: 767.98px) {
        .test-img {
            width: 400px;
            display: block;
        }

        .image-container img {
            height: 58%;
        }

        .main-heading {
            font-size: 20px;
            margin-bottom: 24px;
        }

        .taxi-heading {
            font-size: 29px;
            margin-bottom: 0px;
        }

        .shape-container>div {
            max-width: 260px;
        }

        .book-container {
            padding: 27px 7px 49px 22px;
        }

    }
    </style>
</head>

<body>


    <img src="assets/images/travel24/book_taxi/book_taxi.png" class="test-img" alt="car">

    <div class="book-container">
        <!-- <div class="container-fluid"> -->

        <h1 class="taxi-heading">How to book a ride ?</h1>

        <div class="shape-container">
            <div class="step1">
                <h1 class="main-heading mt-5 mt-md-0">Location </h1>
                <div class="image-row">
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/location.png" alt="Image 1">
                    </div>
                    <!-- <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/people.png" alt="Image 2">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/people.png" alt="Image 3">
                    </div> -->
                </div>
                <h2 class="sub-heading">Select Location and Destination
                </h2>
            </div>
            <div class="horizontal-line"></div>
            <div class="step2">
                <h1 class="main-heading"> Compare Price</h1>
                <div class="image-row">
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/pound.png" alt="pound">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/rating.png" alt="rating">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/car.png" alt="car">
                    </div>
                </div>
                <!-- <h2 class="sub-heading">Choose by Price , ratings and car type</h2> -->
                <h2 class="sub-heading">Choose Right Vehicle and Right Price </h2>
            </div>
            <div class="horizontal-line"></div>
            <div class="step3">
                <h1 class="main-heading">Add Details </h1>
                <div class="image-row">
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/calendar.png" alt="calendar">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/people.png" alt="people">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/suitcase.png" alt="suitcase">
                    </div>
                </div>
                <h2 class="sub-heading">Choose date and time number of passangers and any luggage</h2>
            </div>
            <div class="horizontal-line"></div>
            <div class="step4">
                <h1 class="main-heading">Book and Pay</h1>
                <div class="image-row">
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/visa.png" alt="visa">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/master.png" alt="master">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/paypal.png" alt="paypal">
                    </div>
                    <div class="image-container">
                        <img src="assets/images/travel24/book_taxi/dollars.png" alt="dollars">
                    </div>

                </div>



                <h2 class="sub-heading">Booking confirmation sent via email</h2>
            </div>
        </div>

    </div>
</body>

</html>