<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="language" content="ES">
    <title>Booking</title>

    <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="assets/css/bootstrap.min1.css" rel="stylesheet" />
    <link href="assets/css/custom.css "rel="stylesheet" />
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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

    <div class="menu-side-wrapper d-md-none d-block">
        <ul>
            <li>HOME</li>
            <li>FAQS</li>
            <li>REVIEWS</li>
            <li>CONTACT</li>
        </ul>
    </div>

    <main class="booking">

        <div class="inner-header-wrapper text-center">
            <div class="container text-right nw-num d-md-block d-none">
                 <a href="tel:02039822911"><img src="<?php echo base_url('assets/images/call.png')?>" alt=""> 02039822911</a>
            </div>
            <div class="container text-center">
       
                <h1>Booking Form</h1>
            </div>
        </div>

        <section class="booking-setnew">
            <div class="container">
                <div class="book-form-box">
                    <div class="head">
                        <h1>BOOK A TAXI</h1>
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
                    </div>
                    <div class="content">
                        <div class="form-inner">
                        <form id="createCustomerForm" role="form" action="<?=base_url($redirectUrl)?>" method="post" class="validate" data-parsley-validate="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>PICKUP LOCATION</label>
                                <div id="search_car"> 
											<input type="text" class="form-control autocompleteDoc" name="source" required id="pickPoint" placeholder="Enter a location">
											<input type="hidden" class="lat_perfect" id="sourceLat" name="sourceLat">
											<input type="hidden" class="lon_perfect" id="sourceLon" name="sourceLon">
                                            <input type="hidden" id="total_way_points" name="total_way_points">
										</div>
                              </div>
                            <div class="way-points">
                                       
                            </div>
                            <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label>DESTINATION</label>
                                           
                                            <button style="float:right"><i class="fa fa-plus-circle multi-root " ></i> Way Point</button>
                                        </div>
                                        
                                        <input type="text" class="form-control autocompleteDoc" name="destination" required id="dropPoint" placeholder="Enter a location">
										<input type="hidden" class="lat_perfect" id="destLat" name="destLat">
										<input type="hidden" class="lon_perfect" id="destLong" name="destLong">
                                    </div>
                                    <button  class="submit-btn" id="createCustomerSubmit" type="submit" class="submit-btn">Choose a Vehicle <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php $this->load->view('common_components/footer'); ?>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

    <div class="collapse areas-main" id="collapseExample">
        <div class="container">
            <div class="areas-wrapper">
                <h1>Popular Destinations</h1>
                <ul class="mb-5">
                    <li>Birmingham</li>
                    <li>Blackpool</li>
                    <li>Bournemouth</li>
                    <li>Bristol</li>
                    <li>Cardiff</li>
                    <li>Coventry</li>
                    <li>East Midlands</li>
                    <li>Exeter</li>
                    <li>Euston Station</li>
                    <li>Gatwick</li>
                    <li>Heathrow</li>
                    <li>humberside</li>
                    <li>Leeds-Bradford</li>
                    <li>Liverpool</li>
                    <li>London City</li>
                </ul>
                <ul>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-brighton/"> LOCAL TAXI CAB HIRE COMPANY BRIGHTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-brighton/"> LOCAL MINI CAB HIRE COMPANY BRIGHTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-brighton/"> LOCAL CORPORATE TAXI CAB COMPANY BRIGHTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-brighton/"> LOCAL CHAUFFEURED CAR HIRE COMPANY BRIGHTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-brighton/"> LOCAL AIRPORT TAXI TRANSFER COMPANY BRIGHTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-clifton-in-bristol/"> LOCAL TAXI CAB HIRE COMPANY CLIFTON IN BRISTOL</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-clifton-in-bristol/"> LOCAL MINI CAB HIRE COMPANY CLIFTON IN BRISTOL</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-clifton-in-bristol/"> LOCAL CORPORATE TAXI CAB COMPANY CLIFTON IN BRISTOL</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-clifton-in-bristol/"> LOCAL CHAUFFEURED CAR HIRE COMPANY CLIFTON IN BRISTOL</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-clifton-in-bristol/"> LOCAL AIRPORT TAXI TRANSFER COMPANY CLIFTON IN BRISTOL</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-gatwick-airport/"> LOCAL TAXI CAB HIRE COMPANY GATWICK AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-gatwick-airport/"> LOCAL MINI CAB HIRE COMPANY GATWICK AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-gatwick-airport/"> LOCAL CORPORATE TAXI CAB COMPANY GATWICK AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-gatwick-airport/"> LOCAL CHAUFFEURED CAR HIRE COMPANY GATWICK AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-heathrow-airport/"> LOCAL TAXI CAB HIRE COMPANY HEATHROW AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-heathrow-airport/"> LOCAL MINI CAB HIRE COMPANY HEATHROW AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-heathrow-airport/"> LOCAL CORPORATE TAXI CAB COMPANY HEATHROW AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-heathrow-airport/"> LOCAL CHAUFFEURED CAR HIRE COMPANY HEATHROW AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-heathrow-airport/"> LOCAL AIRPORT TAXI TRANSFER COMPANY HEATHROW AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-hove/"> LOCAL TAXI CAB HIRE COMPANY HOVE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-hove/"> LOCAL MINI CAB HIRE COMPANY HOVE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-hove/"> LOCAL CORPORATE TAXI CAB COMPANY HOVE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-hove/"> LOCAL CHAUFFEURED CAR HIRE COMPANY HOVE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-hove/"> LOCAL AIRPORT TAXI TRANSFER COMPANY HOVE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-luton-airport/"> LOCAL TAXI CAB HIRE COMPANY LUTON AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-luton-airport/"> LOCAL MINI CAB HIRE COMPANY LUTON AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-luton-airport/"> LOCAL CORPORATE TAXI CAB COMPANY LUTON AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-luton-airport/"> LOCAL CHAUFFEURED CAR HIRE COMPANY LUTON AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-luton-airport/"> LOCAL AIRPORT TAXI TRANSFER COMPANY LUTON AIRPORT</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-ocean-village/"> LOCAL TAXI CAB HIRE COMPANY OCEAN VILLAGE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-ocean-village/"> LOCAL MINI CAB HIRE COMPANY OCEAN VILLAGE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-ocean-village/"> LOCAL CORPORATE TAXI CAB COMPANY OCEAN VILLAGE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-ocean-village/"> LOCAL CHAUFFEURED CAR HIRE COMPANY OCEAN VILLAGE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-ocean-village/"> LOCAL AIRPORT TAXI TRANSFER COMPANY OCEAN VILLAGE</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-preston-park/"> LOCAL TAXI CAB HIRE COMPANY PRESTON PARK</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-preston-park/"> LOCAL MINI CAB HIRE COMPANY PRESTON PARK</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-preston-park-2/"> LOCAL CORPORATE TAXI CAB COMPANY PRESTON PARK</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-preston-park/"> LOCAL CHAUFFEURED CAR HIRE COMPANY PRESTON PARK</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-preston-park/"> LOCAL AIRPORT TAXI TRANSFER COMPANY PRESTON PARK</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-taxi-cab-hire-company-southampton/"> LOCAL TAXI CAB HIRE COMPANY SOUTHAMPTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-mini-cab-hire-company-southampton/"> LOCAL MINI CAB HIRE COMPANY SOUTHAMPTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-corporate-taxi-cab-company-southampton/"> LOCAL CORPORATE TAXI CAB COMPANY SOUTHAMPTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-chauffeured-car-hire-company-southampton/"> LOCAL CHAUFFEURED CAR HIRE COMPANY SOUTHAMPTON</a></li>
                    <li><a href="https://www.nolimitcars.co.uk/local-airport-taxi-transfer-company-southampton/"> LOCAL AIRPORT TAXI TRANSFER COMPANY SOUTHAMPTON</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo $setting->google_api_key; ?>&sensor=false&libraries=places"></script>
 
 <script type="text/javascript">
var chnaged_id ="pickPoint";

$( "#createCustomerForm" ).delegate( 'input', "keyup", function() {
    chnaged_id = $(this).attr('id');
    find_locations(chnaged_id)
    
})



 function find_locations(chnaged_id){ 

    var options = {
   // types: ['(cities)'],
    componentRestrictions: {country: "uk"}
        };
    var places = new google.maps.places.Autocomplete(document.getElementById(chnaged_id),options);
    //console.log('places',places.getPlace())
        google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
             var address = place.formatted_address;
             var latitude = place.geometry.location.lat();
             var longitude = place.geometry.location.lng();
              var mesg = "Address: " + address;
             mesg += "\nLatitude: " + latitude;
             mesg += "\nLongitude: " + longitude;
           // alert(mesg)
             if(chnaged_id=="pickPoint")
             {
                
                 $("#sourceLat").val(latitude);
                 $("#sourceLon").val(longitude);
                 
             }else if(chnaged_id=="dropPoint"){
               
                 $("#destLat").val(latitude);
                 $("#destLon").val(longitude);
             }
            
         });
    
         
        }
$( "#createCustomerForm" ).delegate( '.multi-root', "click", function() {
    var total_way_points = $('.multi-btn').length;
    var next_way_point = parseInt(total_way_points)+1;
    $("#total_way_points").val(next_way_point) ;
    if(next_way_point > 3){
        $("#total_way_points").val('3');
        alert("OOPS !!! way Points limited to 3");
        return;
    }
    
     var html ='<div id="way-points-div-'+next_way_point+'" class="form-group"><div class="d-flex justify-content-between"><label>WAY POINT</label> <span class="chbs-location-remove chbs-meta-icon-minus remove-multi-root"></span> <button style="float:right" class="multi-btn" ><i class="fa fa-plus-circle multi-root " ></i> Multi Route</button><button style="float:right"><i class="fa fa-minus-circle remove-multi-root" data-index = '+next_way_point+' ></i> </button></div><input type="text" class="form-control autocompleteDoc" name="wayPoint-'+next_way_point+'" required id="wayPoint-'+next_way_point+'" placeholder="Enter a location"><input type="hidden" class="lat_perfect" id="lat_doc" name="destLat"><input type="hidden" class="lon_perfect" id="lon_doc" name="destLong">';
     if($('.way-points').hasClass('hide')){
        $('.way-points').removeClass('hide')
        
     }
     $('.way-points').append(html)
});
$( "#createCustomerForm" ).delegate( '.remove-multi-root', "click", function() {
    var id = $(this).attr('data-index')
   $("#way-points-div-"+id).remove();
})

 </script>

</html>