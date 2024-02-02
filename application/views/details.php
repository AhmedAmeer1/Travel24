<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
      <meta name="author" content="">
      <meta name="keywords" content="<?php echo $setting->meta_keyword; ?>" />
      <meta name="description" content="<?php echo $setting->journey_meta_desc; ?>" />
       <meta name="title" content="<?php echo $setting->journey_meta_title; ?>" />
      <meta name="language" content="ES">
      <title>NoLimitCars</title>
      <link rel="icon" type="img/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon.png')?>">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/bootstrap.min1.css')?>" rel="stylesheet" />
      <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
      <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


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

.hidden {
    display: none;
}

.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid white;
    border-radius: 50%;
    width: 17px;
    height: 17px;
    animation: spin 2s linear infinite;
    margin-left: -24px !important;
    margin-top: -14px;

}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}






      input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.note-text{
   color:red !important;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
   .hide{
       display:none
   }
   form .error {
  color: #ff0000;
}
.text_amt{
   font-size:12px;
}
	.paymentalert{
		position:relative;
		color:#f38422;
		font-size:20px;
		padding:0 0 30px;
	}
	.paymentalert a{
		text-decoration:underline;
	}
	/*================(640)================*/
	@media screen and (max-width: 40em) {
		.paymentalert{
			font-size:16px;
			padding:0 0 30px;
		}
	}

.promotion-btn{
   background-color: #f38422;
    border-radius: 25px;
    font-size: 12px;
    padding: 10px 15px;
    border: 0;
    color: #fff;
    margin-right: 15px;
}

   </style>
       <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <body>
   <?php $this->load->view('common_components/header'); ?>
      <!-- responsive menu -->
    
      <main class="home">
         <div class="inner-header-wrapper text-center">
           
            <div class="container text-center">
       
                <h1>Booking Details</h1>
            </div>
         </div>
         <section class="details-main-wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                    <!-- <div class="paymentalert">Our payment system is under maintenance, please call us on <a href="tel:02039822911">02039822911</a> or email on <a href="mailto:info@nolimitcars.co.uk">info@nolimitcars.co.uk</a> for booking</div> -->
                     <h1>Please check journey details and select date and time</h1>
                     <div class="details-box">
                        <h2>JOURNEY DETAILS</h2>
                        <button type="button" id="success_modal" class="btn btn-info btn-lg" style="display:none" data-toggle="modal" data-target="#myModal">Open Modal</button>
                        <div class="row">
                           <div class="col-md-7 no-gutter">
                              <div class="destination-details">
                                 <div class="row brdr-btm">
                                    <div class="col-md-6">
                                       <h3>PICK UP - POINT:</h3>
                                       <p><?php echo $_SESSION["source"];?></p>
                                    </div>
                                    <?php 
                                       if($_SESSION["total_way_points"] > 0){?>
                                    <div class="col-md-6">
                                       <h3>WAY POINTS</h3>
                                       <?php
                                          foreach ($_SESSION["way_points"] as $k => $v) {
                                           // if($k !=0 && $k!=(count($_SESSION["way_points"])-1)){?>
                                       <p><?php echo $v;?></p>
                                       <?php }
                                          ?>
                                    </div>
                                    <?php }
                                       ?>
                                    <div class="col-md-6">
                                       <h3>DROP - POINT:</h3>
                                       <p><?php echo $_SESSION["destination"];?></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row h-md-100">
                                 <div class="col-md-6 brdr-right">
                                    <div class="form-group">
                                       <div class="picker-head">
                                          <img src="<?php echo base_url('assets/images/calendar.png')?>" alt="">
                                          <label>Pickup Date</label>
                                       </div>
                                       <p class="picker"><input onChange="checkDate()" required type="text" id="datepicker" autocomplete="off"></p>
                               
                                   
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="picker-head">
                                          <img src="<?php echo base_url('assets/images/time.png')?>" alt="">
                                          <label>Pickup Time</label>
                                       </div>
                                       <p class="picker"><input type="text" id="timepicker" autocomplete="off"></p>
                                    </div>

                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5 no-gutter">
                              <div class="trip-d">
                                 <h1><?php echo $vechicle_data->title;?>, <span><?php echo ($_SESSION["journey_type"] =="1"?"Single":"Return") ?> TRIP</span></h1>
                                 <p><?php echo $vechicle_data->vehicle_description?></p>
                                 <div class="bottom">
                                    <img src="<?php echo base_url($vechicle_data->vehicle_image)?>" alt="Car">
                                    <h4>£<span id="total_fare"><?php echo ($_SESSION["total_fare"]==0?$_SESSION["base_fare"]:$_SESSION["total_fare"])?></span></h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <h1 class="note-text">Please give us 12 hours in advance for the booking or call us.</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="details-forms-wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div id="login_div">
                        <div class="login-box" >
                           <h1>Guest member login:</h1>
                           <div class="form-group">
                              <input type="text" id="exist_id" class="formcontrol" placeholder="Your email">
                           </div>
                           <div class="form-group">
                              <input type="password" class="formcontrol" id="exist_password" placeholder="Password">
                           </div>
                           <!--<h2>Forgot Password?</h2>-->
                           <button id="login">LOGIN</button>
                        </div>
                        
                        <img src="<?php echo base_url('assets/images/pay-options-2.png')?>" alt="">
                     </div>
                     <div class="login-box hide" id="my_account_div">
                        <button class="paycash-btn" id="my_account">My Account</button>
                        </div>
                     
                  </div>
                  <div class="col-md-8">
                     <h1 class="d-head">New Users please complete details below</h1>
                     <div class="user-from">
                        <h2>CONTACT DETAILS</h2>
                        <div class="row">
                           <div class="col-md-6 brdr-b-r">
                              <div class="form-group">
                                 <label>FIRST NAME*</label>
                                 <!-- <input type="text" onBlur="validateFN(this);"  id="first_name" class="formcontrol" name="first_name"> -->
                                 <input type="text"  id="first_name" class="formcontrol" name="first_name">
                              </div>
                           </div>
                           <script></script>
                           <div class="col-md-6 brdr-b">
                              <div class="form-group">
                                 <label>LAST NAME*</label>
                                 <!-- <input type="text" onBlur="validateLN(this);" name ="last_name" id="last_name"class="formcontrol"> -->
                                 <input type="text" name ="last_name" id="last_name"class="formcontrol">
                              </div>
                           </div>
                           </script>
                           <div class="col-md-6 brdr-b-r">
                              <div class="form-group">
                                 <label>E-MAIL ADDRESS*</label>
                                 <input  type="email" id="email_id"   class="formcontrol"  >
                                 <!-- <input  type="email" id="email_id"   class="formcontrol"  size="10" onblur="apply_promo_code('email_id')"> -->
                              </div>
                           </div>
                    
                           <div class="col-md-6 brdr-b">
                              <div class="form-group">
                                 <label>PHONE NUMBER</label>
                                 <input type="number"   id="phone_no" name= "phone_no"class="formcontrol">
                              </div>
                           </div>
                           <!-- onblur="validatePhone(this);" -->
                           <!-- <script>
                              function validatePhone(phone_no){
                                  var reg = /^[0-9]{10}$/;
                              
                                  if (reg.test(phone_no.value) == false) 
                                  {
                                      alert('Invalid Phone Number');
                                      return false;
                                  }
                              
                                  return true;
                              
                              }
                           </script> -->
                           <input type="hidden" id="exceed_time" value="0">
                           <div class="col-md-6 brdr-b-r">
                              <div class="form-group">
                                 <label>PICKUP DOOR NAME / HOME NUMBER</label>
                                 <input type="text" id="pick_up" class="formcontrol">
                              </div>
                           </div>
                           <div class="col-md-6 brdr-b">
                              <div class="form-group">
                                 <label>FLIGHT NUMBER(IF APPLICABLE)</label>
                                 <input type="text" id="flight_no"  class="formcontrol">
                              </div>
                           </div>
                           <div class="col-md-3 brdr-b-r">
                              <div class="form-group">
                                 <label>PASSENGERS</label>
                                 <!-- <select class="formcontrol">
                                    <?php
                                       ?>
                                    <option><?php echo $vechicle_data->noOfPassengers?></option>
                                    </select> -->
                                 <select id="no_of_passenger" class="formcontrol ">
                                 <option value="0">select</option>
                                    <?php for($i=1;$i<=$vechicle_data->noOfPassengers;$i++){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 brdr-b-r">
                              <div class="form-group">
                                 <label>SUITCASES</label>
                                 <select id="no_of_suitcase" class="formcontrol ">
                                 <option value="0">select</option>
                                    <?php for($j=1;$j<=$vechicle_data->noOfSuitcases;$j++){?>
                                    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                    <?php }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 brdr-b-r">
                              <div class="form-group">
                                 <label>HAND LUGGAGE</label>
                                 <select id="hand_lagguage" class="formcontrol ">
                                 <option value="0">select</option>
                                    <?php for($k=1;$k<=$vechicle_data->hand_lagguage;$k++){?>
                                    <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                    <?php }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 brdr-b">
                              <div class="form-group">
                                 <label>CHILD SEAT /TOOLS CHARGE</label><span id="child_seat_amt"></span>
                                 <select id="child_seat" class="formcontrol cost-add-on" data-cost-per-child-seat ="<?php echo $vechicle_data->cost_per_child_seat;?>" >
                                    <option value="0">Select</option>
                                    <?php for($k=1;$k<=$vechicle_data->child_seat;$k++){?>
                                    <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                    <?php }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12 pt-2">
                              <div class="form-group d-flex align-items-center">
                                 <input type="checkbox" id="meet_and_greet" class="c-check"><label class="ml-2"> MEET AND GREET (£6) 30 MINUTES </label>&nbsp;&nbsp;&nbsp;
                                 <!-- <span id="meet_amount" class="text_amt" > </span> &nbsp; -->
                                 <input type="checkbox" id="drop_off" class="c-check"><label class="ml-2"> DROP OFF (£5) </label>
                                 <!-- <span id="drop_amount" class="text_amt"></span> -->
                              </div>
                          
                              <div class="form-group mt-3">
                                 <label>COMMENTS OR SPECIAL INSTRUCTIONS</label>
                                 <textarea rows="3" class="formcontrol" id="scomments_special_inst" name="scomments_special_inst"></textarea>
                              </div>


                             <button class=" promotion-btn  paycash-btn promo-code" onclick="apply_promo_code()">Apply Promocode</button>
                                
                           </div>
                        </div>
                 
                 
                     </div>
                     <div class="bottom-buttons">
                         <div class="user-pay-type">
                              <?php foreach($payment_types as $pt){?>
                                 <button  class="paynow-btn payment-method" id="myButton"  data-method=<?php echo $pt->method ?>><a id="pay_now_a"><?php echo $pt->title ?> <span class=" hidden spinner"id="loading"></span></a></button>
                              <?php }?>
                                         
                              <span id="loading" class="hidden">
                                    <span id="hiddenBtn">
                                       <span class="spinner">
                                       </span>
                                    </span>
                              </span>
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
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Your Booking has been successfully completed</h4>
               </div>
                <div class="modal-body">
                  <strong>Booking-ID : <span id="book_id"></span></strong><br/>
                  <span>Amount:</span>: £ <span id="book_amount"></span><br/>
                  <span>Date</span>: <span id="book_date"></span><br/>

               <!-- <span>Time</span>: <span id="book_time"></span><br/> -->

               </div> 
            </div>
         </div>
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
   
               <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
               <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
               <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
      
      <script>
         $(document).ready(function(){
           console.log("inside  document ready function ----- ")
            var payment_status = '<?php echo $payment_status;?>';
            console.log("payment_status ----- ",payment_status)
            var book_id = '<?php echo $booking_id;?>';
            console.log("book_id ----- ",book_id)
            if(payment_status == "done" && book_id !=0){

               console.log("inside if condition  ----- ",book_id)
             get_book_details(book_id)
             $('.payment-method').addClass('hide')
                $("#book_id").text('<?php echo $booking_id;?>');
               $("#success_modal").trigger('click')
         
            }
            
         })
         window.get_book_details=function(book_id){ 
             var url ="<?php echo base_url('index/get_book_data') ?>";
             $.ajax({
                         type: "POST",
                         url: url,
                         data: {book_id:book_id},
                         success: function(result)
                         {
                           
                             var obj = jQuery.parseJSON(result);
                             //alert(obj.result['amount'])
                             console.log('here',obj)
                             //$("#book_time").text(obj.result['travel_time'])
                             $("#book_date").text(obj.result['travel_date'])
                             $("#book_amount").text(obj.result['amount'])
                           
             
                         }
             })
            
         };
         window.apply_promo_code=function(email_id){
             var email_id = document.getElementById("email_id").value;
             //alert(mail_id);
             $.confirm({
             title: 'Promo Code!',
             content: '' +
             '<form action="" class="formName">' +
             '<div class="form-group">' +
             '<label>Do you have a discount code? Enter it here</label>' +
             '<input type="text" placeholder="Promocode" class="name form-control" required />' +
             '</div>' +
             '</form>',
             buttons: {
                 formSubmit: {
                     text: 'Submit',
                     btnClass: 'btn-blue',
                     action: function () {
                         var promo_code = this.$content.find('.name').val();
                         if(!promo_code){
                             $.alert('provide a valid Promocode');
                             return false;
                         }
                         var url ="<?php echo base_url('index/check_promo_code') ?>"
                         
                         $.ajax({
                         type: "POST",
                         url: url,
                         data: {promo_code:promo_code,email_id:email_id},
                         success: function(data)
                         {
                             var obj = jQuery.parseJSON(data);
                            // alert(obj.msg);
                             if(obj.msg == "success"){
               
                                 $.alert("You will get &nbsp;" + obj.result['discount'] +"% discount for this booking")
                              
                                 let fare = $("#total_fare").text();
            


                          

                                 let discount_amt = (fare* obj.result['discount']/100).toFixed(2);
                                 console.log(" dicount success---------------44444444444-- discount_amt-----",discount_amt)
                                 let after_dscnt = (fare - discount_amt)
                                 console.log("after_dscnt----------------------",after_dscnt)

                                 $("#total_fare").text(after_dscnt.toFixed(2));
                                 $(".promo-code").hide();
                             }else{
                             $.alert(obj.msg)
                             }
                            
                            
                         }
                         })
                     }
                 },
                 cancel: function () {
                    
                 },
             },
             onContentReady: function () {
                 // bind to events
                 var jc = this;
                 this.$content.find('form').on('submit', function (e) {
                     // if the user submits the form by pressing enter in the field.
                     e.preventDefault();
                     jc.$$formSubmit.trigger('click'); // reference the button and click it
                 });
             }
         });
         }
         
             $('.payment-method').click(function(){ 
                     //  if($("#my_account_div").hasClass('hide')){
                     //     alert("please login to continue");return;
                     //  }
                     //alert($("#exceed_time").val())
                     var valid_phone = validatePhone($("#phone_no").val())
                     var valid_email = ValidateEmail($("#email_id").val())
                  
                     if($("#exceed_time").val() == "1"){
                        
                        alert("You should book 3 hour prior to your journey");return;
                     }
                     else if($("#datepicker").val() == '' || $("#timepicker").val() ==''){
                        alert("Please fill Journey  details to proceed")
                     }
                     else  if($("#first_name").val() == '' || $("#last_name").val() =='' || $("#email_id").val() =='' || $("#phone_no").val() =='' || $("#pickup").val() ==''){
                        alert("Please fill all mandatory contact   details to proceed")
                     }
                     else if(valid_phone == false){
                           alert("Please fill valid phone no")
                     }
                     else if(valid_email == false){
                        alert("You have entered an invalid email address!")
                     }
                     
                  
                     else{
                           var jouney_date = $("#datepicker").val();
                           var journey_time = $("#timepicker").val();
                           var first_name = $("#first_name").val();
                           var last_name = $("#last_name").val();
                           var email = $("#email_id").val();
                           var phone = $("#phone_no").val();
                           var pick_up = $("#pick_up").val();
                           var flight_no = $("#flight_no").val();
                           var no_of_passenger = $("#no_of_passenger").val();
                           var no_of_suitcase = $("#no_of_suitcase").val();
                           var hand_lagguage = $("#hand_lagguage").val();
                           var child_seat = $("#child_seat").val();
                           var chk_Greet = document.getElementById("meet_and_greet");
                           var chk_DropOff = document.getElementById("drop_off");
                        var scomments_special_inst = document.getElementById('scomments_special_inst').value;
                           if($(this).attr('data-method') =="pay_now_p"){
                                 var payment_method ="paypal";
                           }
                           if($(this).attr('data-method') =="pay_now_l"){
                                 var payment_method ="lloyds";
                           }else{
                                 var payment_method ="cash";
                           }

                           if (chk_Greet.checked) {
                                 var meet_and_greet = 1;
                           }else{
                                 var meet_and_greet = 0;
                           }

                           if (chk_DropOff.checked) {
                                 var drop_off = 1;
                           }else{
                                 var drop_off = 0;
                           }
                     
                           
                           
                           var url ="<?php echo base_url('index/booking_init') ?>"
                           $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: {payment_method:payment_method,jouney_date:jouney_date,journey_time:journey_time,first_name:first_name,last_name:last_name,email:email,phone:phone,pick_up:pick_up,flight_no:flight_no,no_of_passenger:no_of_passenger,no_of_suitcase:no_of_suitcase,hand_lagguage:hand_lagguage,child_seat:child_seat,meet_and_greet:meet_and_greet,drop_off:drop_off,scomments_special_inst:scomments_special_inst},
                                    success: function(data)
                                    {
                                       $('.payment-method').addClass('hide')
                                       if(payment_method =="cash")
                                       { 
                                       var obj = jQuery.parseJSON(data);
                                       
                                       if(obj.result['booking_id'] !=""){
                                             $("#book_id").text(obj.result['booking_id']);
                                             get_book_details(obj.result['booking_id'])
                                             $("#success_modal").trigger('click')
                     
                                       }
                                       }else if(payment_method =="lloyds"){

                                          <?php /*?>window.location.replace('<?php echo base_url('index/ipg')?>');<?php */?>
                                 window.open('<?php echo base_url('index/ipg')?>');
                                       //   $("#chargetotal").val(Math.round($("#total_fare").text()));
                                       //   // $("#lloyds_submit").click();

                                       }
                                       
                                       else{
                                          
                                       window.location.replace('<?php echo base_url('payment/create_payment')?>');
                                       }
                                       
                                    }
                                 })
                     
                     
                           $('.payment-method').removeClass('fa fa-check');
                           // $(this).addClass('fa fa-check');
                           var button = document.getElementById("myButton");
                           var loading = document.getElementById("loading");
                           var hiddenBtn = document.getElementById("hiddenBtn");
                           // Disable the button
                           button.disabled = true;
                           hiddenBtn.disabled = true;
                           //  button.style.display ="none"
                           // Show the loading spinner
                           loading.style.display = "block";

                           // Simulate a delay (replace with your actual processing)
                           setTimeout(function() {
                              // Re-enable the button
                              button.disabled = false;

                              // Hide the loading spinner
                              loading.style.display = "none";
                           }, 6000); 
                     
                     }
                             
  
               })
             
      </script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      <script>
      var valid="true";
         $('.cost-add-on').change(function(e){ 
             var fare = '<?php echo $_SESSION["base_fare"];?>';
             var chk_Greet = document.getElementById("meet_and_greet");
             var chk_DropOff = document.getElementById("drop_off");
               if (chk_Greet.checked) {
                 var meet_and_greet = 1;
             }else{
                 var meet_and_greet = 0;
             }


             if (chk_DropOff.checked) {
                 var drop_off = 1;
             }else{
                 var drop_off = 0;
             }
         
         
             if($(this).val() != 0)
             { let no_of_chile_seat = $(this).val();
            
               let child_seat_cost = no_of_chile_seat * $(this).attr('data-cost-per-child-seat');
           
             
            
             if(meet_and_greet == 1){
                 var fare = parseFloat(fare)+6;
             }
             if(drop_off == 1){
                 var fare = parseFloat(fare)+5;
             }
            
              $("#total_fare").text(parseFloat(child_seat_cost)+parseFloat(fare))
              $("#child_seat_amt").text("(£"+$(this).attr('data-cost-per-child-seat')+"/Seat)")
                // alert( "you need to pay extra £"+ $(this).attr('data-cost-per-child-seat') + "for booking each  child seat for this vehicle")
             } else{
                     if(meet_and_greet == 1){
                        var fare = parseFloat(fare)+6;
                     }
                     if(drop_off == 1){
                        var fare = parseFloat(fare)+5;
                     }
                  $("#total_fare").text(parseFloat(fare))
             }   
             })
             $('input#meet_and_greet[type="checkbox"]').click(function(){
               
                 var fare = $("#total_fare").text();
                 if($(this).prop("checked") == true){
                  $("#meet_amount").text("(+"+"£ 5)")
                     //alert( "you need to pay extra £5 for avail this service")
                    $("#total_fare").text(parseFloat(fare)+6)
                 }else{ 
                     $("#total_fare").text(parseFloat(fare)-6)
                     $("#meet_amount").text("")
                 }
                
             });

             //new check box inserted using this function the total cost will change 
             $('input#drop_off[type="checkbox"]').click(function(){
               
               var fare = $("#total_fare").text();
               if($(this).prop("checked") == true){
                $("#drop_amount").text("(+"+"£ 10)")
                   //alert( "you need to pay extra £5 for avail this service")
                  $("#total_fare").text(parseFloat(fare)+5)
               }else{ 
                   $("#total_fare").text(parseFloat(fare)-5)
                   $("#drop_amount").text("")
               }
              
           });



             $('.close').click(function(){
                 window.location.replace('<?php echo base_url('index')?>');
             })
         
             $('input#create_acnt[type="checkbox"]').click(function(){ 
                 if($(this).prop("checked") == true){
                     $("#create_acnt_div").removeClass('hide');
         
                 }else{
                    $("#create_acnt_div").addClass('hide');
                     
                 }
             })
             // Wait for the DOM to be ready
           


$("#login").click(function(){ 
   var username = $("#exist_id").val();
   var password = $("#exist_password").val();
   var url ="<?php echo base_url('index/login') ?>";
   $.ajax({
                         type: "POST",
                         url: url,
                         data: {username:username,password:password},
                         success: function(result)
                         {
                            
                             var obj = jQuery.parseJSON(result);
                             if(obj.status == 1){
                                 $("#login_div").addClass('hide');
                                 $("#my_account_div").removeClass('hide');
                                 if(obj.type == 'admin'){
                                  $('.admin-pay-type').removeClass('hide');
                                  $('.user-pay-type').addClass('hide');
                                 // $("#my_account").attr('disabled','disabled');
                                 }
                                 $("#my_account").attr('data-user-id',obj.result['user_id'])
                                 $("#my_account").append( '<a href="<?php echo base_url('index/account')?>">' );
                                 }
                               alert(obj.msg)

             
                         }
             })
})
$('#my_account').click(function(e){
   var user_id = $(this).attr('data-user-id');
   var uri= '<?php echo base_url('Index/account')?>';
   window.location.replace(uri);
})

      </script>
      <script>
function checkDate() { 
                                             
var selectedText = document.getElementById('datepicker').value;
var selectedDate = new Date(selectedText);
var now = new Date();
var time = $("#timepicker").val();
var today = new Date();
var hour = today.getHours();
var minute = today.getMinutes();
current_time = hour+":"+minute;
var dd = today.getDate();

var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 
today = mm+'/'+dd+'/'+yyyy;
if (selectedDate < now && selectedText !=  today) {
   alert("Date must be in the future");
}
if( selectedText ==  today)
{
   alert("select today")
  
}
}                        
                                            
function Converttimeformat(time) {
var hrs = Number(time.match(/^(\d+)/)[1]);
var mnts = Number(time.match(/:(\d+)/)[1]);
var format = time.match(/\s(.*)$/)[1];
if (format == "PM" && hrs < 12) hrs = hrs + 12;
if (format == "AM" && hrs == 12) hrs = hrs - 12;
var hours = hrs.toString();
var minutes = mnts.toString();
if (hrs < 10) hours = "0" + hours;
if (mnts < 10) minutes = "0" + minutes;
return hours + ":" + minutes;
}
$("#timepicker").click(function(){

   checkTime()

})
function checkTime(){
   var selectedText = document.getElementById('datepicker').value;
   var today = new Date();
   var dd = today.getDate();
   var mm = today.getMonth()+1; 
  var yyyy = today.getFullYear();
  if(dd<10) 
  {
    dd='0'+dd;
  } 
 if(mm<10) 
  {
   mm='0'+mm;
 } 
today = mm+'/'+dd+'/'+yyyy;
   var time = $("#timepicker").val();
   var d = new Date();
   var hour = d.getHours();
   var minute = d.getMinutes();
   current_time = hour+":"+minute;
   if(selectedText ==  today ){
                                                
    if( time != ""){
         var select_time =  Converttimeformat(time);
         var valuestart = current_time;
         var valuestop = select_time; 
         var timeStart = new Date(today +" "+ valuestart).getHours();
         var timeEnd = new Date(today +" "+ valuestop).getHours();
         var hourDiff = timeEnd - timeStart;   
         
         if(hourDiff < 3){
         alert("You should book 3 hour prior to your journey");
          //$("#exceed_time").val("1");
         }
      }    
                                                    
   }
}
function validatePhone(phoneno) {
    if (phoneno.match(/^\d{10}/)) {
         return true;
    } 
   
    return false;
}
function ValidateEmail(mail) 
{
 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
  {
    return (true)
  }
    
    return (false)
}
//
var min1 = new Date();

var minUk = min1.toLocaleString('en-GB', { timeZone: 'Europe/London' });
var ukdatetime =minUk.split(" ");
console.log(ukdatetime)
var uktime = ukdatetime[1];
var ukdates = ukdatetime[0].split(",");
var ukdate = ukdates[0];
var ukhourminute =uktime.split(":");
var ukhour = ukhourminute[0];
var ukminute = ukhourminute[1];


var min = new Date();

  strMin = $.datepicker.formatDate("dd/mm/yy", min);
console.log('india',strMin )
console.log('uk',ukdate)
// min.setHours(min.getHours() + 0.5);
// min.setMinutes(min.getMinutes() + (15 - min.getMinutes() % 15))
min.setHours(ukhour);
min.setMinutes(ukminute)
console.log('uk-min',min)
$('#datepicker').datepicker({  
    dateFormat: 'dd/mm/yy' ,
  minDate: 0,
  onSelect: function(v) { $("#timepicker").val('')
  console.log("v",v)
  console.log("strMin",strMin)
  $('#timepicker').timepicker('option', 'minTime', v == ukdate ? min : '12:00am');
   //  $('#timepicker').timepicker('option', 'minTime', v == strMin ? min : '12:00am');
  }
});



       

</script>

   </body>
</html>