<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  </head>
<div class="content-wrapper">
    <section class="content-header">
    <h1> <?= $page_title ?>
        <small><?= $page_desc ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0);" ><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    </section>
 
    <?php 
        if($this->session->flashdata('message')) { 
        $flashdata = $this->session->flashdata('message'); ?>
        <br><div class="alert alert-<?= $flashdata['class'] ?>">
           <button class="close" data-dismiss="alert" type="button">×</button>
           <?= $flashdata['message'] ?>
        </div>
    <?php } ?>  
    <section class="content">
        <div class="row">
            <?php if(isset($customerCount) && !empty($customerCount)){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4>Vehicles</h4>
                            <p><?php echo 'Total : '. $customerCount ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('Vehicle/viewVehicle') ?>" class="small-box-footer ">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php } if(isset($totalorder) && !empty($totalorder)){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h4>Total Vehicles</h4> 
                            <p>
                                <?php echo 'Total : '.$totalorder; ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-car"></i>
                        </div>
                        <a href="<?= base_url('Vehicle/viewVehicle') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php } if(isset($totalcustomers) && !empty($totalcustomers)){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h4>Total Users</h4> 
                            <p>
                                <?php echo 'Total : '.$totalcustomers; ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('Customer/listCustomerUsers') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php } if(isset($totalbooking) && !empty($totalbooking)){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h4>Total Bookings</h4> 
                            <p>
                                <?php echo 'Total : '.$totalbooking; ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="<?= base_url('Booking/listBookingDetails') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } if(isset($totalcompany) && !empty($totalcompany)){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4>Total Companies</h4> 
                            <p>
                                <?php echo 'Total : '.$totalcompany; ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="<?= base_url('Company/listCompany') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php }  ?>
        </div> 
    </section>

   
		  

</div>
