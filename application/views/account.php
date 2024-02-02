
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="author" content="">
      <meta name="keywords" content="<?php echo $setting->meta_keyword; ?>" />
      <meta name="description" content="<?php echo $setting->account_meta_desc; ?>" />
       <meta name="title" content="<?php echo $setting->account_meta_title; ?>" />
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
    <style>
    .hide{
        display:none;
    }
    </style>
</head>

<body>
    <header class="limits-header-wrapper d-md-block d-none">

        <div class="sub-header">
            <div class="container pa-50">
                <div class="row">
                    <div class="col-md-12 text-right no-gutter">
                        <ul>
                     
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container pa-50">
                <a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url('assets/images/logo.png')?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url()?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                    </ul>
                   
                </div>
                <div class="container  text-right new-number" style="padding-top:60px;padding-right: 0px !important;">
                    <a href="tel:02039822911"><img src="<?php echo base_url('assets/images/call.png')?>" alt=""> 02039822911</a>
                </div>
            </div>
                 
            </div>
        </nav>
    </header>



    <main class="home">

        <div class="inner-header-wrapper text-center">
            
            <div class="container text-center">
       
                <h1>My Account</h1>
            </div>
        </div>
 
    <section class="myaccount-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>My Account</h1>
                    <ul class="nav nav-pills d-flex justify-content-between mb-5 mt-5" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-one" data-toggle="pill" href="#tab-content-one" role="tab" aria-controls="tab-content-one" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-two" data-toggle="pill" href="#tab-content-two" role="tab" aria-controls="tab-content-two" aria-selected="false">Orders</a>
                        </li>
                        <?php if($user_type == "customer"){?>
                            <li class="nav-item">
                            <a class="nav-link" id="tab-three" data-toggle="pill" href="#tab-content-three" role="tab" aria-controls="tab-content-three" aria-selected="false">Account Details</a>
                        </li>
                        <?php } ?>
                      
                        <li class="nav-item">
                            <a class="nav-link" id="tab-four"  href="<?php echo base_url('Index')?>" role="tab" aria-selected="false">Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="tab-content-one" role="tabpanel" aria-labelledby="tab-one">
                           <div class="orders-content">
                               <p>Hello <?php echo $user_details->fullname; ?></p>
                               <p>(not <?php echo $user_details->fullname; ?>?<a href="<?php echo base_url('Index')?>">Logout</a> )</p>
                               <br>
                               <p>Check your <a id="recent_order" >recent orders</a> </p>
                               <p><a id="edit_account">edit your password and account details.</a></p>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="tab-content-two" role="tabpanel" aria-labelledby="tab-two">
                            <div class="order-list">
                                <table id="list_table">
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php foreach($book_details as $bd){?>
                                        <tr>

                                            <td>#<?php echo $bd->booking_id;?></td>
                                            <td><?php echo $bd->travel_date;?></td>
                                            <td id="status-td-<?php echo $bd->booking_id;?>"><?php echo $bd->status_desc;?></td>
                                            <td>£ <?php echo $bd->amount;?></td>
                                            <td class="action-btns"><a data-status="<?php echo $bd->status;?>" data-id="<?php echo $bd->booking_id;?>"class="delete-trip" id="delete-<?php echo $bd->booking_id;?>">Delete</a>
                                            <a class="view_data" id="<?php echo $bd->booking_id;?>">View</a></td>
                                        </tr>

                                    <?php }?>
                                   
                                </table>
                            </div>
                            <div class="order-details" class="hide">
                                <p>Order <span id="order_no"></span> was plased on <span id="order_date"></span> and is currently <span id="status"></span></p>
                                <h2>Order details</h2>

                                <table id="view_table" >

                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td ><span id="vehicle_type"></span> x <span id="service_type"></span></td>
                                        <td id="vehicle_charge"></td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal:</td>
                                        <td id="sub_total"></td>
                                    </tr>
                                    <tr>
                                        <td>Greeting</td>
                                        <td id="greeting"></td>
                                    </tr>
                                    <tr>
                                        <td>Child Seat</td>
                                        <td id="child_seat"></td>
                                    </tr>
                                    <tr id="promo_code_tr">
                                        <td>Promo Code discount</td>
                                        <td id="promo_code"></td>
                                    </tr>
                                   
                                   
                                    <tr>
                                        <td>Payment method</td>
               
               
                                        <td id="payment_method"></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td id="total"></td>
                                    </tr>
                                </table>
                                <div class="text-center mt-4">
                                    <a href="#" class="btn-details">Re Book</a>
                                    <a class="btn-details delete">Delete</a>
                                    <!-- <td class="action-btns"><a data-status="<?php echo $bd->status;?>"class="delete-trip" id="delete-<?php echo $bd->booking_id;?>">Delete</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-content-three" role="tabpanel" aria-labelledby="tab-three">
                            <div class="account-profile">
                                <form>
                                    <div class="row">
                                    <?php if($user_type =="customer"){?>
                                        <div class="col-md-6">
                                            <div class="form-group"><?php $name = (explode(" ",$user_details->fullname)); ?>
                                                <label for="">First Name</label>
                                                <input type="text" id="first_name" class="form-control" value="<?php echo $name[0]?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text" id="last_name" class="form-control"value="<?php echo $name[1]?>">
                                            </div>
                                        </div>
                                       <?php } ?>
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Display Name</label>
                                                <input type="text" id="display_name" readonly class="form-control" value="<?php echo $user_details->fullname?>">
                                                <span >This will be how your name will be displayed in the account section and in reviews</span>
                                            </div>
                                        </div>
                                        <?php if($user_type =="customer"){?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Email Address</label>
                                                <input type="text" id="email" class="form-control" value="<?php echo $user_details->email?>">
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h1>Password Change</h1>
                                                <label for="">Current Password(Leave blank to leave unchanged)</label>
                                                <input type="text" id="current_password" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">New Password(Leave blank to leave unchanged)</label>
                                                <input type="text" id="new_password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Confirm New Password</label>
                                                <input type="text" id="confirm_new_password"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a id="save_change" class="save-btn">Save changes</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>

    <footer class="limits-footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center order-md-0 order-1">
                    <h1>Book a Taxi</h1>
                    <h2>Tel: <a href="tel:02039822911" class="footer-contact">02039822911</a></h2>
                </div>
                <div class="col-md-4 no-gutter text-center order-md-1 order-0">
                    <img src="<?php echo base_url('assets/images/logo.png')?>" class="img-fluid footr-logo" alt="Logo">
                    
                </div>
                <div class="col-md-4 text-center order-md-2 order-2">
                    <h1>Email us</h1>
                    <h2><a href="mailto:info@nolimitcars.co.uk" class="footer-contact">info@nolimitcars.co.uk</a></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>All major credit cards accepted</h3>
                    <ul class="social-media">
                        <li>
                            <a href="https://twitter.com/nolimit_cars" target="_blank"><img src="<?php echo base_url('assets/images/twitter.png')?>" alt="icon"></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/nolimitcars/" target="_blank"><img src="<?php echo base_url('assets/images/linkedin.png')?>" alt="icon"></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/nolimitcars8/" target="_blank"><img src="<?php echo base_url('assets/images/insta.png')?>" alt="icon"></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/nolimitcarsltd/" target="_blank"><img src="<?php echo base_url('assets/images/facebook.png')?>" alt="icon"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-md-4 mt-3">
                <div class="col-md-6">
                    <ul class="side-menu">
                        <li><a href="">© NOLIMIT Cars 2017</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Terms</a></li>
                        <li><a href="">Drivers</a></li>
                        <li><a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Areas</a>
                    </ul>
                </div>
                <div class="col-md-6">
                   <h6 class="credit"> Crafted by <a href="https://www.solutions2xl.com/" target="_blank" >2XL</a></h6>
                </div>
            </div>
            
        </div>
    </footer>

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
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script>
      $('.view_data').click(function(e){
        
          var booking_id = $(this).attr('id');
          var url ="<?php echo base_url('index/get_book_details') ?>";
        $.ajax({
                         type: "POST",
                         url: url,
                         data: {booking_id:booking_id},
                         success: function(result)
                         {
                            
                             var obj = jQuery.parseJSON(result);
                             console.log(obj.result)
                             $(".order-details").removeClass('hide');
                             $("#list_table").addClass('hide');
                             $("#order_no").text(obj.result['booking_id']);
                             $("#order_date").text(obj.result['travel_date']);
                             $("#vehicle_type").text(obj.result['title']);
                             $("#service_type").text(obj.result['service_type']);
                             $("#vehicle_charge").text("£"+obj.result['base_fare']);
                             $("#sub_total").text("£"+obj.result['base_fare']);
                             $("#payment_method").text(obj.result['payment_type']);
                             $("#total").text("£"+obj.result['amount']);
                             $("#greeting").text("£"+obj.result['greeting_cost']); 
                             $("#child_seat").text("£"+obj.result['child_seat_cost']);
                             $("#status").text(obj.result['status_desc']);
                             if(obj.result['promocode_discount'] != ""){
                                $("#promo_code").text(obj.result['promocode_discount']+"%");
                                $("#promo_code_tr").removeClass('hide');
                             }
                             $('a.delete').attr('data-status',obj.result['status'])
                             $('a.delete').attr('id',"delete-"+obj.result['booking_id'])
                             $('a.delete').addClass('delete-trip')

                          
                            
                             
                             
                        //      if(obj.status > 0){
                        //          $("#login_div").addClass('hide');
                        //          $("#my_account_div").removeClass('hide');
                        //          $("#my_account").attr('data-user-id',obj.user_id)


                        //      }
                          
                        //    alert(obj.msg)

             
                         }
             })
      })
      $("#tab-two").click(function(){ 
        $(".order-details").addClass('hide');
        $("#list_table").removeClass('hide');
      })
      $("body").delegate(".delete-trip", "click", function(e){

     // $('.delete-trip').click(function(e){ 
          var status = $(this).data('status');
          switch(status) {
            case 1:
            var book_id = $(this).attr('data-id');
            
           
            var url ="<?php echo base_url('index/cancel_trip') ?>";
                    $.ajax({
                         type: "POST",
                         url: url,
                         data:{book_id:book_id},
                         
                         success: function(result)
                         {
                            
                             var obj = jQuery.parseJSON(result);
                             console.log()
                             $("#status-td-"+book_id).text("Trip Cancel")
                             alert(obj.msg)
                             
                             
                         }
        })
            break;
        case 2:
            var msg ="Your Trip has been already rejected by admin";
        break;
        case 3:
            var msg ="SORRY!! Your Trip has been accepted already.You cannot cancel this trip ";
        break;
        case 4:
            var msg ="SORRY!! Your Trip has been started already.You cannot cancel this trip ";
        break;
        case 5:
            var msg ="SORRY!! Your Trip has been finished already";
        break;
        case 6:
            var msg ="This Trip is already cancelled by yourself";
        break;
       
}
if(status != 1){
            alert(msg)
        }

      })
      $("#save_change").click(function(){
          var first_name = $("#first_name").val();
          var last_name = $("#last_name").val();
          var email = $("#email").val();
          var password = $("#current_password").val();
          var new_password = $("#new_password").val();
          var confirm_new_password = $("#confirm_new_password").val();
          
          if(new_password != confirm_new_password){
              alert("Password mismatch")
              if(password == ''){
                alert("Please enter current password")
              }
          }
          else if(password != '' && (new_password == '' || confirm_new_password == '')){
                alert("Please enter both new  password and confirm password")
              }
              else if(password == '' && (new_password != '' || confirm_new_password != '')){
                alert("Please enter current password")
              }
              else if(password == new_password && password!= ''){
                alert("Current password and new password are same.please change ")
              }
              else{
                  var user_type ="<?php echo $user_type;?>";
               
                  
                var url ="<?php echo base_url('index/change_user_data') ?>";
                    $.ajax({
                         type: "POST",
                         url: url,
                         data:{first_name:first_name,last_name:last_name,email:email,password:password,new_password:new_password},
                         
                         success: function(result)
                         {
                            
                             var obj = jQuery.parseJSON(result);
                             alert(obj.msg)
                             if(obj.update == 1){
                                $("#display_name").val(first_name+" "+last_name);
                             }
                             
                         }
        })

              }
      
  

      })
      $("#recent_order").click(function(){
        $("#tab-two").trigger('click')
          $("#tab-content-two").addClass("active")
          $("#tab-content-two").addClass("show")
          $("#tab-content-two").addClass("in")
          $("#tab-content-two").removeClass("fade")

          $("#tab-content-one").addClass("fade")
          $("#tab-content-three").addClass("fade")
          $("#tab-content-four").addClass("fade")

          $("#tab-content-one").removeClass("show")
          $("#tab-content-three").removeClass("show")
          $("#tab-content-four").removeClass("show")
          $("#tab-content-one").removeClass("active")
          $("#tab-content-three").removeClass("active")
          $("#tab-content-four").removeClass("active")
          
      })
      $("#edit_account").click(function(){
        $("#tab-three").trigger('click')
            $("#tab-content-three").addClass("active")
          $("#tab-content-three").addClass("show")
          $("#tab-content-three").addClass("in")
          $("#tab-content-three").removeClass("fade")

          $("#tab-content-one").addClass("fade")
          $("#tab-content-two").addClass("fade")
          $("#tab-content-four").addClass("fade")

          $("#tab-content-one").removeClass("show")
          $("#tab-content-two").removeClass("show")
          $("#tab-content-four").removeClass("show")
          $("#tab-content-one").removeClass("active")
          $("#tab-content-two").removeClass("active")
          $("#tab-content-four").removeClass("active")
      })
      
	</script>
    <!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnCzDk6ec1OJFcW5FYgxP3LWVHMNumGDM&callback=initMap">
    </script> -->

