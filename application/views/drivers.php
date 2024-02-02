<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Join Our Team: Drive with Nolimit Cars | Driver Registration" />
    <meta name="description" content="Become a part of the Nolimit Cars driving team. We're inviting professional drivers to register with us and join our network for airport transfers. Enjoy flexible hours, competitive earnings, and the chance to provide top-tier service across the UK." />
 


    <title>Drivers</title>
    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/drivers.css') ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230246454-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-230246454-1');
    </script> 

</head>
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
                <div class="subcontent_wrapper">
                    <h1>Driver Application</h1>
                    <p>We specialise in taxi transfers to and from all UK airports for both individuals and groups, with the accent on a courteous and thoroughly professional personal service at affordable prices. 24 hours a day, 7 days a week.</p>
                    <p>Please download and complete the form below and send it back with all required documents by email:&nbsp;<a href="mailto:info@nolimitcars.co.uk">info@nolimitcars.co.uk</a></p>
                    
                    <ul class="doctodown">
                        <li><a href="<?php echo base_url('assets/docs/Driver_Application_Form.docx')?>"> <img src="<?php echo base_url('assets/images/doc-logo.png')?>"></a></li>
                        <li><a href="<?php echo base_url('assets/docs/Driver_Application_Form.pdf')?>"> <img src="<?php echo base_url('assets/images/pdf-logo.png')?>"></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>