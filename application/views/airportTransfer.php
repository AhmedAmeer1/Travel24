<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('common_components/Home/head'); ?>
<link href="<?php echo base_url('assets/css/custom.css?v=20')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/index.css?v=21')?>" rel="stylesheet" />

<link href="<?php echo base_url('assets/css/airports-transfer.css?v=4')?>" rel="stylesheet" />

<style>

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

        <section class="airports-transfer-section ">
            <h2 class=" pt-2 text-left">Airports Transfer</h2>
            <p>Choose Travel24 for smooth airport transfers. Enjoy reliable service, experienced and courteous
                drivers, and transparent competitive pricing with no hidden charges. Available 24/7, we ensure
                punctual pickups and comfortable journeys to and from all major UK airports. Whether you’re
                travelling for business or leisure, Travel24 gets you there safely, on time, and hassle-free. Book
                now and travel with confidence.
            </p>

            <h3 class=" pt-5">Find the right fit for your trip with reliable airport transfers across all UK airports.
            </h3>

            <p>Select from our variety of vehicles, each offering travel options for a maximum capacity of 8
                passengers with adequate luggage space, luxury vehicles and mobility vehicles with wheel chair
                accessibility.
            </p>




            <div class="airport-transfer-vehicle-types">

                <div>
                    <h4>Saloon Car (X)</h4>
                    <p>Select from our variety of vehicles, each offering
                        travel options for a maximum capacity of 4
                        passengers with adequate luggage space, luxury
                        vehicles and mobility vehicles with wheel chair
                        accessibility.
                    </p>
                </div>

                <div>
                    <h4>Estate Car (Comfort)</h4>
                    <p>Our estate cars are the ideal choice for 4 passengers
                        and an additional luggage capacity of 3 suitcases,
                        offering a comfortable and hassle-free travel
                        experience.
                    </p>
                </div>

                <div>
                    <h4>People Carrier (XL)</h4>
                    <p>Our People Carrier (XL) is the perfect solution for
                        larger groups, accommodating up to 5 passengers
                        with a generous luggage capacity of 4 suitcases,
                        ensuring a spacious and smooth journey for
                        everyone.
                    </p>
                </div>

                <div>
                    <h4>Executive Car</h4>
                    <p>Our Executive Car provides a premium travel
                        experience designed for up to 3 passengers. This
                        vehicle offers a balanced luggage capacity for 3
                        suitcases, making it a sophisticated choice for
                        business or leisure travelers seeking both style and
                        convenience.
                    </p>
                </div>






                <div>
                    <h4>8 Seater Minibus (Van)</h4>
                    <p>The 8 Seater Minibus (Van) is our most spacious
                        option, ideal for large groups of up to 8 passengers.
                        With a significant luggage capacity of 7 suitcases, it
                        ensures a comfortable and hassle-free journey for
                        families or teams traveling with extensive gear.
                    </p>
                </div>
                <div>
                    <h4>Executive People Carrier</h4>
                    <p>The Executive People Carrier combines luxury with
                        capacity, offering an ideal choice for 5 passengers. It
                        provides a generous luggage capacity of 4 suitcases,
                        ensuring a high-end, spacious travel experience for
                        small groups.
                    </p>
                </div>
                <div>
                    <h4>Mobility Vehicle</h4>
                    <p>Our Mobility Vehicle is specifically designed for
                        accessibility, featuring a wheelchair ramp to ensure
                        inclusive travel for all. It comfortably
                        accommodates 4 passengers and has space for 3
                        suitcases, making it an ideal choice for accessible,
                        hassle-free transport.
                    </p>
                </div>





                <div>
                    <h4>16 Seater Minibus
                    </h4>
                    <p><b>To book our 16 Seater Minibus, please contact us.</b>
                        Designed for large groups, our 16 seater minibus
                        offers comfortable seating for up to 16 passengers
                        with generous luggage capacity, ideal for airport
                        transfers, group travel, and events.
                    </p>
                </div>


                <div>
                    <h2>Reliable Airport Transfers, Right on Time
                    </h2>
                    <img src="assets/images/travel24/airports-transfer.jpg" alt="Reliable Airport Transfers"
                        class="airport-transfer-img">
                </div>



                <div>
                    <h2>Our Reliable Airport Transfer Service
                    </h2>
                    <p>
                    <ul class="">
                        <li>✈ To & From London Heathrow Airport Transfer</li>
                        <li>✈ To & From London Luton Airport Transfer</li>
                        <li>✈ To & From London Gatwick Airport Transfer</li>
                        <li>✈ To & From London City Airport Transfer</li>
                        <li>✈ To & From London Stansted Airport Transfer</li>
                        <li>✈ To & From London Southern Airport Transfer</li>
                        <li>✈ To & From Bristol Airport Transfer</li>
                        <li>✈ To & From Birmingham Airport Transfer</li>
                        <li>✈ To & From Manchester Airport Transfer</li>
                    </ul>
                    </p>
                </div>


            </div>




        </section>





















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

                </div>
            </div>
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