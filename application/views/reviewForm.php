<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="language" content="ES">
    <title>Travel24</title>

    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/travel24.jpg')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/reviewForm.css?v=5')?>" rel="stylesheet" />

</head>

    <body>
    <?php $this->load->view('common_components/header'); ?>
        <div class="review-form-wrapper">
            <div class="review-box">
                <h1>Review Us</h1>   <br>
              
                    
                    <input class="firstName" type="text" name="firstName" id="firstName" placeholder="First Name" >
                  

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
                <div>
                    <textarea rows="3" id="comment"  placeholder="Write your comment"></textarea>
                    <input type="hidden" name="trip_id" id="trip_id" >
                    <input type="hidden" name="type" id="type" >

                    <!-- <input type="hidden" name="trip_id" id="trip_id" value="<?= $trip_id; ?>">
                    <input type="hidden" name="type" id="type" value="<?= $type; ?>"> -->

                </div><br>
                <button id="reviewSubmit">Submit</button>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <?php $this->load->view('common_components/footer'); ?>
    </body>
</html>

<script>    

    $("#reviewSubmit").click(function(){ 
        var trip_id = $("#trip_id").val();
        var comment = $("#comment").val();
        var firstName = $("#firstName").val();
        // alert(comment)
        var type = $("#type").val();
        var rating = $( "input[type=radio][name=rate]:checked" ).val();
        if(rating == null || rating == '' || rating == undefined || rating == 'undefined' || rating == 'null' || comment == null || comment == '' || comment == undefined || comment == 'undefined' || comment == 'null'){
            alert("Please Add your Comment and Rating");
            return;
        }
        var url ="<?php echo base_url('ReviewForm/save_review') ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {firstName:firstName,rating:rating,comment:comment,trip_id:trip_id},
            success: function(result)
            {
                    alert("Review Added Successfully...");
                    (type == 1)? window.location.replace('<?php echo base_url('Booking/listBookingDetails')?>'): window.location.replace('<?php echo base_url() ?>');
              

            }
        })
    })

</script>