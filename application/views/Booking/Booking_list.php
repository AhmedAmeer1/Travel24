<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking | viewBooking</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
    
  </head>
<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $pTitle ?>&nbsp &nbsp<small><?= $pDescription ?></small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="<?= base_url('Dashboard')?>"><i class="fa fa-star-o" aria-hidden="true"></i>Home</a></li>
     <li><?= $menu ?></li>
     <li class="active"><?= $smenu ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <?php if($this->session->flashdata('message')) { 
          $flashdata = $this->session->flashdata('message'); ?>
          <div class="alert alert-<?= $flashdata['class'] ?>">
           <button class="close" data-dismiss="alert" type="button">×</button>
           <?= $flashdata['message'] ?>
         </div>
       <?php } ?>
      </div>
        <div class="col-xs-12">
          <div class="box box-warning"> 
            <div class="box-header with-border">
              <div class="col-md-6"><h3 class="box-title">Booking Details</h3></div>
              <div class="col-md-6" align="right">
                <?php if(!empty($orderData)){ ?>
                  
                <?php } ?>&nbsp &nbsp
                <a class="btn btn-sm btn-primary" href="<?= base_url('Dashboard') ?>">Back</a>
              </div>
            </div> 
            <br>   
            <div class="box-body">
              <table id="mechanicUsers" class="table table-bordered table-striped datatable ">
                <thead>
                  <tr>
                    <th class="hidden">ID</th>
                    <th width="12%;">Title</th>
                    <th width="15%;">Car </th>
                    <th width="15%;">Service type </th>
                    <th width="15%;">Source</th>
                    <th width="15%;">Destination </th>
                    <th width="22%;">Pickup/ Return Date</th>
                    <th width="9%;">Payment Type</th>
                    <th width="9%;">Amount</th>
                    <th width="9%;">Greet Status</th>
                    <th width="17%;">Booking Status</th>
                    <th width="17%;">Action</th>
                    <th width="17%;">View</th>
                 </tr>
                </thead> 
                <tbody>
                  <?php if(!empty($orderData)){
                    foreach($orderData as $odrData) { ?>
                      <tr>
                        <th class="hidden"><?= $odrData->booking_id?></th>
                        <th class="center"><?= $odrData->Name?></th>
                        <th class="center"><?= $odrData->title?></th>
                        <th class="center"><?= ($odrData->service_type == 1)?'Single':'Return' ?></th>
                        <th class="center"><?= $odrData->source?></th>
                        <th class="center"><?= $odrData->destination?></th>
                        <th class="center"><?= $odrData->travel_time?></th>
                        <th class="center"><?= $odrData->payment_type?></th>
                        <th class="center"><?= $odrData->amount?></th>
                        <th class="center"><?= ($odrData->greet_status == 1)?'Yes':'No' ?></th>
                        <th class="center" id="orderStatus_<?=$odrData->id?>">
                        <?php
                              switch($odrData->status){
                                case 1: echo 'New Booking.';  break;
                                case 2: echo 'Trip Rejected.'; break;
                                case 3: echo 'Trip Accepted.'; break;
                                case 4: echo 'Trip Started.'; break;
                                case 5: echo 'Trip Finished';break;
                               
                              }
                          ?>
                        </th>
                        
                        <td class="center">
                     <?php if($odrData->status ==1){ ?>
                      <a class="btn btn-sm btn-success" href="<?= base_url("Booking/changebookingStatus/".encode_param($odrData->id))."/3" ?>">
                        <i class="fa fa-cog"></i> Accept
                      </a>
                       <a class="btn btn-sm btn-success" style="background-color:#ac2925" href="<?= base_url("Booking/changebookingStatus/".encode_param($odrData->id))."/2" ?>">
                        <i class="fa fa-cog"></i> Reject
                      </a>
                      <?php } if($odrData->status ==3){  ?>
                      <a class="btn btn-sm btn-success" href="<?= base_url("Booking/changebookingStatus/".encode_param($odrData->id))."/4" ?>">
                        <i class="fa fa-cog"></i> Start Trip
                      </a>
                    <?php } ?>
                    <?php if($odrData->status ==4){  ?>
                      <a class="btn btn-sm btn-success" href="<?= base_url("Booking/changebookingStatus/".encode_param($odrData->id))."/5" ?>">
                        <i class="fa fa-cog"></i> Trip Started
                      </a>
                    <?php } if($odrData->status == 5){?>
                      <a class="btn btn-sm btn-success" href="<?= base_url("Reviews/addReview/".encode_param($odrData->id))."/1" ?>">
                        <i class="fa fa-cog"></i> Add Review
                      </a>
                    <?php } ?>
                        </td>
                        <td class="center">   
                        <a class="btn btn-sm btn-primary" id="viewBookingDetails" booking_id ="<?= encode_param($odrData->id) ?>">
                        <i class="fa fa-fw fa-eye"></i>View
                        </td>
                      </tr>
                  <?php } }?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </section>
</div>