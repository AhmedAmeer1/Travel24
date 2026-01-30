<style>
.nav-item .call-div {
    background-color: #00517c;
    padding: 11px 16px 11px 17px;
    color: white;
    border-radius: 5px;
    font-weight: bold;
}


/* ===== Sticky Header (Desktop) ===== */
.limits-header-wrapper {
    position: sticky;
    top: 0;
    z-index: 9999;
    background-color: #ffffff;
}

/* ===== Sticky Header (Mobile) ===== */
.res-side-menu {
    position: sticky;
    top: 0;
    z-index: 9999;
    background-color: #ffffff;
}

/* Prevent content hiding under header */
body {
    padding-top: 120px; /* adjust if header height changes */
}

/* Mobile padding fix */
@media (max-width: 767px) {
    body {
        padding-top: 90px;
    }
}


</style>
<link href="<?php echo base_url('assets/css/custom.css?v=2')?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/header.css?v=2')?>" rel="stylesheet" />
<header class="limits-header-wrapper  d-md-block d-none ">
    <nav class="navbar header_container  navbar-expand-md">
        <div class=" row container-fluid pa-50 mt-4">
            <div class="col-md-4">
                <a class="" href="<?php echo base_url()?>"><img src="<?php echo base_url('assets/images/travel24/Logo.svg')?>"alt="travel 24 taxi SVG Logo"></a>
            </div>
            <div class="col-md-8">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url()?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url()?>faq">Faq </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url()?>customerReviews">reviews</a>
                        </li>

                         <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url()?>bookNow">BookNow</a>
                        </li> -->
                        <li class="nav-item mt-1">
                            <a  href="<?php echo base_url()?>bookNow" class=" call-div">Book Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- responsive menu -->
<header class="res-side-menu d-md-none d-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="" href="<?php echo base_url()?>">
                    <img src="<?php echo base_url('assets/images/travel24/Logo.svg')?>" class="img-fluid mt-3" alt="travel 24 taxi SVG Logo"> </a>
                <ul class="sub-header-res-new">
                    <li>
                          <a href="<?php echo base_url()?>bookNow">
                            Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <button id="menu-btn" class="brgn-btn">X</button> -->
        <button id="menu-btn" class="navbar-toggler brgn-btn collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
    </div>
</header>
<div class="menu-side-wrapper  d-md-none d-block">
    <ul>
        <li>
            <a href="<?php echo base_url()?>">Home</a>
        </li>
        <li>
            <a href="<?php echo base_url()?>faq">Faq </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>customerReviews">Reviews</a>
        </li>
        <li class=" mt-1">
              <a  href="<?php echo base_url()?>bookNow"  class=" call-div">
          
                Book Now</a>
        </li>
    </ul>
</div>