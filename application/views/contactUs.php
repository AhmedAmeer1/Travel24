<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="Contact Nolimit Cars for Airport Transfers and Inquiries" />
    <meta name="description" content="Reach out to Nolimit Cars for all your airport transfer needs or any inquiries. Our team is ready to assist you with bookings, questions, and customized travel solutions." />
 



    <title>Contact us</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact.css') ?>">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-230246454-1');
        </script> 
</head>

<style>

.success{
    padding: 10px;
    color: white;
    background-color: green;
    font-size: 18px;
    border-bottom: green 2px solid;
}

</style>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <section id="content">
        <section class="commonbanner">
            <div class="sub_banner_overlay"></div>
            <img src="<?php echo base_url('assets/images/nolimit-banner.jpg')?>">
        </section>
        <section class="subpagecontent">
            <img src="<?php echo base_url('assets/images/nolimit-body.jpg')?>">
            <div class="wrapper">
                <div class="contact_wrapper">
                    <div class="columnwrapper">
                        <div class="contact_column">
                            <h1>Contact details</h1>
                            <div class="address_wrapper">
                                <!--<span class="sitename">NoLimit Cars Limited</span><br>-->
                                <!--Smallmead House<br>
                                Smallmead<br>
                                Gatwick<br>
                                RG6 9LW<br>
                                  <br>-->
                                <!--Redhill Kingsgate<br />
                                62 High Street<br />
                                Redhill<br />
                                Surrey<br />
                                RH1 1SG<br /><br />-->
                                <span class="sitename">NOLIMIT CARS LTD</span><br>
                                102 MULBERRY CRESCENT<br>
                                WEST DRAYTON<br>
                                UB7 9AJ<br><br>

                                Email us at <a class="contactmail"
                                    href="mailto:info@nolimitcars.co.uk">info@nolimitcars.co.uk</a><br>
                                Telephone: <a href="tel:01293775422">01293 775422</a><br>
                                <br>
                                <span class="sitename">NOLIMIT AIRPORT LTD.</span> <span class=""> <br>
                                    Registered England and Wales.<br>
                                    Registration No: 11212437.</span>
                            </div>
                        </div>
                        <div class="contact_column">
                            <form action="<?= base_url('contactUs/send_email'); ?>" method="post">
                                <h1>Enquiry form</h1>

                                <ul class="formfields">
                                    <?php
                                        if ($this->session->flashdata('success_message')) {
                                            echo '<div class="success">' . $this->session->flashdata('success_message') . '</div>';
                                        } elseif ($this->session->flashdata('error_message')) {
                                            echo '<div class="error">' . $this->session->flashdata('error_message') . '</div>';
                                        }
                                    ?>
                                    <li><input name="name" id="name" type="text" placeholder="YOUR NAME*"
                                            class="validate[required] text-input" required></li>
                                    <li><input name="email" id="email" type="email" placeholder="YOUR EMAIL*"
                                            class="validate[required,custom[email]] text-input" required></li>
                                    <li><input name="contactnumber" id="contactnumber" type="text"
                                            placeholder="CONTACT NUMBER" class="" required></li>
                                    <li><textarea name="message" cols="" rows="" id="message" placeholder="YOUR ENQUIRY"
                                            class=""></textarea></li>
                                    <li><input name="Gcode" id="Gcode" size="10" maxlength="6" type="text"
                                            class="captcha validate[required] text-input" placeholder="CODE">
                                        <div class="capimage"><img
                                                src="<?php echo base_url('assets/themes/captcha.php')?>"
                                                alt="Enter captcha" title="Enter captcha" id="captcha"></div>
                                    </li>
                                </ul>
                               
                                <button  class="btnsubmit" name="" id="">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>


 

</body>

</html>