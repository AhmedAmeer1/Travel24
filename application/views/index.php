<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('common_components/Home/head'); ?>
<link href="<?php echo base_url('assets/css/custom.css?v=19')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/index.css?v=18')?>" rel="stylesheet" />

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
        <!-- How to book a ride Container -->
        <?php $this->load->view('common_components/howToBookTaxi'); ?>
        <!-- Text Container -->
        <?php $this->load->view('common_components/Home/text_container'); ?>

        <section class="carlist-wrapper">
            <div class="home_container no-gutter-responsive">
                <h2 class=" pt-2">OUR FLEET</h2>
                <div class="row mt-2 no-gutter-responsive">
                    <?php foreach ($fleet_data as $fleet): ?>
                    <div class="col-6 col-md">
                        <div class="car-box -ml-2">
                            <div class="w-100 image_card">
                                <h3><?= $fleet['title']; ?></h3>
                                <img src="<?php echo base_url('assets/images/travel24/fleet/' . $fleet['vehicle_image'] . '?v=19'); ?>"
                                    class="fleet-img mt-2" alt="car">
                                <div class="fleet-details">
                                    <div class="detail-item">
                                        <img src="<?php echo base_url('assets/images/travel24/passangers.svg')?>"
                                            class="img-fluid passangers" alt="passengers">
                                        <span><?= $fleet['noOfPassengers']; ?> Passengers</span>
                                    </div>
                                    <div class="detail-item">
                                        <img src="<?php echo base_url('assets/images/travel24/Suitcases.svg')?>"
                                            alt="suitcases">
                                        <span><?= $fleet['noOfSuitcases']; ?> Suitcases</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-md-12 mt-3">
                        <!-- Journey Mission Section -->
                        <?php $this->load->view('common_components/Home/journey_mission'); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Customer Review Container -->
        <?php $this->load->view('common_components/customerReview.php',array('CustomerReviewData' => $CustomerReviewData)); ?>
        <!-- UK Airports Section -->
        <?php $this->load->view('common_components/Home/airports-section.php'); ?>

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
<script src="<?php echo base_url('assets/js/homepage.js?v=9'); ?>">
</script>

</script>

</html>