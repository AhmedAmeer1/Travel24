<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('common_components/Home/head'); ?>
<link href="<?php echo base_url('assets/css/custom.css?v=20')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/index.css?v=21')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/listView.css?v=11')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/details.css?v=3')?>" rel="stylesheet" />

<style>
.hidden {
    display: none !important;
}

.pointer {
    cursor: pointer;
}

/* Form is now always visible */
.details-forms-wrapper {
    display: block;
}

.slide-anchor-spacer {
    height: 10px;
}

.list-box .card-footer h6 {
    font-weight: 700;
}

.info-icon {
    height: 20px;
}

.promo-text .code {
    font-weight: 700;
}

.selected-card {
    background-color: #004c78 !important;
    color: #fff;
}
</style>

<body>
    <?php $this->load->view('common_components/header'); ?>
    <main class="home">
        <div class="responsive-header-image mt-2"></div>
        <section class="limits-banner">
            <div class="banner_container ">
                <div class="row ">
                    <div class="col-md-6 box-padding">
                        <div class="book-form-box">
                            <?php 
                           $redirectUrl = (isset($customer_id) && !empty($customer_id))
                            ?'Index/Search'.$customer_id
                            :'Index/Search';
                            if($this->session->flashdata('message')) { 
                                $flashdata = $this->session->flashdata('message'); ?>
                            <div class="alert alert-<?= $flashdata['class'] ?>">
                                <?= $flashdata['message'] ?>
                            </div>
                            <?php } ?>
                            <div class="content">
                                <div class="form-inner">
                                    <p class="form-heading">Quick & Easy Booking</p>
                                    <form id="createCustomerForm" role="form" action="<?=base_url($redirectUrl)?>"
                                        method="post" class="validate" data-parsley-validate=""
                                        enctype="multipart/form-data">
                                        <div class="form-group position-relative">
                                            <div id="">
                                                <input type="text" class="form-control autocompleteDoc pickupLocation"
                                                    name="source" required id="pickPoint" placeholder="Pickup Location">
                                                <div class="custom-dropdown" id="dropdown-pickPoint"></div>

                                                <input type="hidden" class="lat_perfect" id="sourceLat"
                                                    name="sourceLat">
                                                <input type="hidden" class="lon_perfect" id="sourceLon"
                                                    name="sourceLon">
                                                <input type="hidden" id="total_way_points" name="total_way_points">
                                            </div>
                                        </div>
                                        <div class="way-points">
                                        </div>
                                        <div class="form-group position-relative">
                                            <div class="d-flex justify-content-between">
                                                <label>&nbsp;</label>
                                                     <button type="button" style="float:right" class="multi-root"><i
                                                     class="fa fa-plus-circle"></i> Multi Route</button>
                                            </div>
                                            <input type="text" class="form-control autocompleteDoc destination"
                                                name="destination" required id="dropPoint" placeholder="Destination">

                                            <div class="custom-dropdown" id="dropdown-dropPoint"></div>
                                            <input type="hidden" class="lat_perfect" id="destLat" name="destLat">
                                            <input type="hidden" class="lon_perfect" id="destLong" name="destLong">
                                        </div>
                                        <button id="createCustomerSubmit" type="submit" class="submit-btn">GET A
                                            QUOTE & BOOK NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 banner-details">
                        <!-- Banner Features Section -->
                        <?php $this->load->view('common_components/Home/banner_features'); ?>

                    </div>
                </div>
            </div>
        </section>
  

        <div class="container">
            <!-- Vehicle cards -->
            <div class="row mt-5">
                <?php foreach ($fleet_data as $vh) { ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4">
                    <div class="card h-100 list-box text-center">
                        <img src="<?php echo base_url('assets/images/travel24/fleet/' . $vh['vehicle_image'] . '?v=19'); ?>"
                            class="card-img-top p-2" alt="car">
                        <div class="card-body px-1 pt-1">
                            <h5 class="card-title"><?= $vh['title']; ?></h5>
                            <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url("assets/images/travel24/passangers.svg") ?>"
                                        class="passanger_img" alt="Passengers" style="height: 20px; margin-right: 6px;">
                                    <span class="passangers-text"><?= $vh['noOfPassengers']; ?></span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url("assets/images/travel24/Suitcases.svg") ?>"
                                        class="suitcases_img" alt="Suitcases" style="height: 20px; margin-right: 6px;">
                                    <span class="suitcases-text"><?= $vh['noOfSuitcases']; ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div><!-- row -->






        </div>


        <section class="details-forms-wrapper" id="booking-form-section">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="user-from mb-5">
                            <div class="row">
                                <div class="col-md-12 brdr-b">
                                    <div class="form-group">
                                        <input type="text" id="first_name" class="formcontrol" name="first_name"
                                            placeholder="FULL NAME*" >
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <input type="email" id="email_id" class="formcontrol"
                                            placeholder="E-MAIL ADDRESS*">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <input type="number" id="phone_no" name="phone_no" class="formcontrol"
                                            placeholder="PHONE NUMBER">
                                    </div>
                                </div>

                                <input type="hidden" id="exceed_time" value="0">

                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <input type="text" id="pick_up" class="formcontrol"
                                            placeholder="PICKUP DOOR NAME / HOME NUMBER">
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <input type="text" id="flight_no" class="formcontrol"
                                            placeholder="FLIGHT NUMBER(IF APPLICABLE)">
                                    </div>
                                </div>

                                <div class="col-md-6 brdr-b-r">
                                    <div class="form-group">
                                        <p class="picker mb-2"><input onChange="checkDate()"  type="text"
                                                id="datepicker" class="w-100 custom-placeholder" autocomplete="off"
                                                placeholder="PICKUP DATE "></p>
                                    </div>
                                </div>
                                <div class="col-md-6 brdr-b">
                                    <div class="form-group">
                                        <p class="picker mb-2"><input type="text" class="w-100 custom-placeholder"
                                                id="timepicker" autocomplete="off" placeholder="PICKUP TIME "></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="promotion-btn paycash-btn promo-code mt-4"
                                        onclick="apply_promo_code()">Apply Promocode</button>
                                    <span class="promo-text">Enter <span class="code">LUTH25</span> to get 10 %
                                        off.</span>
                                </div>
                            </div>
                        </div>

                      <div class="bottom-buttons mb-3">
                        <div class="user-pay-type d-flex justify-content-end" style="gap: 3px;">
                            <?php foreach($payment_types as $pt){?>
                            <button class="paynow-btn payment-method" id="pay_btn_<?php echo $pt->method; ?>"
                                data-method="<?php echo $pt->method; ?>">
                                <a id="pay_now_a_<?php echo $pt->method; ?>"><?php echo $pt->title; ?>
                                    <span class="hidden spinner" id="loading_<?php echo $pt->method; ?>"></span>
                                </a>
                            </button>
                            <?php } ?>
                            <span id="loading" class="hidden">
                                <span id="hiddenBtn">
                                    <span class="spinner"></span>
                                </span>
                            </span>
                        </div>
                    </div> 

                    </div>
                </div>


            </div><!-- container -->
        </section>


    </main>
    <?php $this->load->view('common_components/footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $result->google_api_key; ?>&sensor=false&libraries=places">
</script>
<script src="<?php echo base_url('assets/js/homepage.js?v=8'); ?>">
</script>

<script>





</script>



</html>