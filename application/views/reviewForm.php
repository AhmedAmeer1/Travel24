<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="language" content="ES">
    <meta name="facebook-domain-verification" content="srylsftuqhor6ur1ywdlntruuzo54y" />
    <meta name="yandex-verification" content="5c20865ffae8f446" />
    <?php $this->load->view('assets/js/metaPixel'); ?>
    <title>Travel24</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="16x16"  href="<?php echo base_url('/favicon-16x16.png')?> " >
    <link rel="icon" type="image/png" sizes="32x32"  href="<?php echo base_url('/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="48x48"  href="<?php echo base_url('/favicon-48x48.png')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/reviewForm.css?v=1')?>" rel="stylesheet" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XK1KGHX0F7"></script>
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
    <div class="review-form-wrapper">
        <div class="review-box">
            <h1>Review Us</h1> <br>
            <input class="firstName" type="text" name="firstName" id="firstName" placeholder="First Name" required>
            <br>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <div class="clear"></div>
            <select id="reviewType" class="reviewType" name="reviewType">
                <option value="">Select Review Type</option>
                <option value="Excellent Service">Excellent Service </option>
                <option value="Smooth ride">Smooth ride</option>
                <option value="Friendly driver">Friendly driver</option>
                <option value="Late arrival">Late arrival</option>
                <option value="Bumpy ride">Bumpy ride</option>
            </select>
            <br><br>
            <div>
                <textarea rows="3" id="comment" placeholder="Write your comment"></textarea>
                <input type="hidden" name="trip_id" id="trip_id">
                <input type="hidden" name="type" id="type">
            </div><br>
            <button id="reviewSubmit">Submit</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <?php $this->load->view('common_components/footer'); ?>
</body>
</html>
<script>
$("#reviewSubmit").click(function() {
    var trip_id = $("#trip_id").val();
    var comment = $("#comment").val();
    var firstName = $("#firstName").val();
    var reviewType = $("#reviewType").val();
    // alert(comment)
    var type = $("#type").val();
    var rating = $("input[type=radio][name=rate]:checked").val();
    if (firstName == null || firstName == '' || firstName == undefined || firstName == 'undefined' ||
        firstName == 'null') {
        alert("Please Add your  Name");
        return;
    }
    if (rating == null || rating == '' || rating == undefined || rating == 'undefined' || rating == 'null') {
        alert("Please Add your  Rating");
        return;
    }

    var url = "<?php echo base_url('ReviewForm/save_review') ?>";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            firstName: firstName,
            rating: rating,
            comment: comment,
            reviewType: reviewType,
            trip_id: trip_id
        },
        success: function(result) {
            alert("Review Added Successfully...");
            (type == 1) ? window.location.replace(
                '<?php echo base_url('Booking/listBookingDetails')?>'): window.location.replace(
                '<?php echo base_url() ?>');


        }
    })
})
</script>