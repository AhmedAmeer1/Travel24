<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="Contact Nolimit Cars for Airport Transfers and Inquiries" />
    <meta name="description"
        content="Reach out to Nolimit Cars for all your airport transfer needs or any inquiries. Our team is ready to assist you with bookings, questions, and customized travel solutions." />




    <title>Contact us</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact.css') ?>">

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
</head>

<style>
/* -------------Banner component ----------------------*/
.banner-section {
    background-color: #004c78;
    text-align: center;
}

.banner-image {
    max-width: 100%;
    height: auto;
}




/* -------------form component ----------------------*/

.success {
    padding: 10px;
    color: white;
    background-color: green;
    font-size: 18px;
    border-bottom: green 2px solid;
}


.contact_form {
    margin-right: auto;
    margin-left: auto;

    width: 50%;
    /* background-color: red; */
    padding: 100px 190px 100px 155px;
}

.contact_form .heading h1 {
    text-align: center;
    font-size: 48px;
    font-weight: 600;
    color: #101828:
}

.contact_form .heading p {
    text-align: center;
    font-size: 20px;
    font-weight: 400;
    color: #475467;
    margin-top: 30px;
}

.name_div {
    margin-top: 100px;
    width: 280px;
}


.phone_div {
    margin-top: 20px;
    height: 50px;
    /* background-color: green; */
}

.enquiry_div {
    margin-top: 50px;
    height: 125px;
    /* background-color: green; */
}



.input_fields {
    margin-top: 10px;
    border-style: solid;
    border-radius: 8px;
    border-color: #D0D5DD;

}

.btnsubmit {
    background-color: #004C78;
    color: white;
    height: 48px;
    border-radius: 8px;
    border-color: white;
    margin-top: 70px;
}




/* ---------------second component--------------------  */

.contact-detail-container {
    padding: 100px 175px 100px 175px;
    /* background-color: red; */
}

.contact_icon {
    width: 57px;
    padding-right: 10px;
    margin-bottom: auto;
}

.contact-detail-container h1 {
    margin-top: 10px;
    font-size: 20px;
    font-weight: 600;
    color: #101828;
}

.contact-detail-container p {
    font-size: 18px;
    font-weight: 500;
    color: #004C78;
    margin-top: 10px;
}

.subbottom_text{
    text-align: center;
	font-family: "Helvetica Neue Medium";
	font-size: 23px;
	color: #000000;
	font-weight: 700;
	margin-top: 10px;
}

.subbottom_text a {
	margin-left: 10px;
	color: #000000;
	text-decoration: underline;
}




@media only screen and (max-width: 1366px) {
    .contact_form {
        width: 70%;

    }

    .contact-detail-container {
        padding: 10px 10px 20px 10px;
        /* background-color: red; */
    }
}

@media only screen and (max-width: 1024px) {
    .contact_form {
        width: 95%;

    }
}

@media only screen and (max-width: 767px) {
    .contact_form .heading h1 {
        font-size: 30px;
    }

    .contact_form .heading p {
        font-size: 18px;
        margin-top: 20px;
    }

    .contact_form {
        width: 100%;
        padding: 100px 20px 100px 20px;
    }

    .name_div {
        margin-top: 46px;
        width: 100%;
        height: 50px;
    }

    .phone_div {
        margin-top: 50px;
    }


    .contact-detail-container {
        padding: 10px 9px 20px 13px;
        /* background-color: red; */
    }

    .subbottom_text {
        padding: 27px 16px 10px 22px;
        font-size: 19px;
    }

}
</style>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <section id="content">

        <div class="container-fluid banner-section">
            <img src="<?php echo base_url('assets/images/travel24/contact_us.svg')?>" alt="about_us_banner"
                class="banner-image">
        </div>

        <div class="contact_form">

            <div class="heading">
                <h1>Get in touch</h1>
                <p>We’d love to hear from you. Please fill out this form.</p>
            </div>
            <form action="<?= base_url('contactUs/send_email'); ?>" method="post">
                <?php
                     if ($this->session->flashdata('success_message')) {
                     echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                     } elseif ($this->session->flashdata('error_message')) {
                     echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                     }
                ?>
                <div class="d-flex flex-column flex-md-row justify-content-between">

                    <div class="name_div">
                        <p>First name</p>
                        <input name="name" id="name" type="text" placeholder="Your Name*" class="input_fields p-3 w-100"
                            required>
                    </div>

                    <div class="name_div">
                        <p>Email</p>
                        <input name="email" id="email" type="email" placeholder="Your Email*"
                            class=" input_fields p-3  w-100" required>
                    </div>

                </div>

                <div class="d-flex  flex-column justify-content-between">
                    <div class="phone_div">
                        <p>Phone number</p>
                        <input name="contactnumber" id="contactnumber" type="text" placeholder="Contact Number "
                            class="w-100 h-100 p-3 input_fields  " required>
                    </div>
                    <div class="enquiry_div">
                        <p>Your Enquiry</p>
                        <textarea name="message" cols="" rows="" id="message" placeholder="Leave us a message..."
                            class="input_fields p-3 w-100 h-100 "></textarea>
                    </div>
                    <!-- 
                    <input name="Gcode" id="Gcode" size="10" maxlength="6" type="text"
                        class="captcha validate[required] text-input" placeholder="CODE">
                    <div class="capimage"><img src="<?php echo base_url('assets/themes/captcha.php')?>"
                            alt="Enter captcha" title="Enter captcha" id="captcha"></div> -->


                    <button class="btnsubmit " name="" id="">Submit</button>
                </div>





            </form>
        </div>


        <div class=" contact-detail-container d-flex flex-column flex-md-row justify-content-between">
            <div class="d-flex  p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/email.svg')?>" alt="terms_icon"
                    class="contact_icon">
                <div>
                    <h1>Email</h1>
                    <p> info@nolimitcars.co.uk</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/location.svg')?>" alt="terms_icon"
                    class="contact_icon">
                <div>
                    <h1>Nolimit Cars LTD</h1>
                    <p> 102 Mulberry Crescentwest Drayton UB7 9AJ</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/location.svg')?>" alt="terms_icon"
                    class="contact_icon">
                <div>
                    <h1>Nolimit Airport LTD</h1>
                    <p> Registered England and Wales.Registration No: 11212437.</p>
                </div>
            </div>
            <div class="d-flex mt-5 mt-md-0 p-xl-5">
                <img src="<?php echo base_url('assets/images/travel24/phone.svg')?>" alt="terms_icon"
                    class="contact_icon">
                <div>
                    <h1>Phone</h1>
                    <p>01293&nbsp;775422 </p>
                </div>
            </div>
        
        </div>
   
        <div class="subbottom_text">
                If you would like a quote for a journey you are planning please use our
                online booking form or call us on&nbsp;<a href="tel:02039822911">02039 822 911</a>.
            </div>

    </section>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>




</body>

</html>