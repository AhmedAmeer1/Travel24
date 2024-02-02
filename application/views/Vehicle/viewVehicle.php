<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vehicle |View Vehicle</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  </head>

<div class="content-wrapper" >
  <section class="content-header">
    <h1>
       <?= $pTitle ?>
        <small><?= $pDescription ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('Dashboard')?>"><i class="fa fa-star-o" aria-hidden="true"></i>Home</a></li>
      <li><?= $menu ?></li>
      <li class="active"><?= $smenu ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
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
            <div class="col-md-6"><h3 class="box-title">Vehicle List</h3></div>
            <div class="col-md-6" align="right">
              
              <a class="btn btn-sm btn-primary" href="<?= base_url('Vehicle/addVehicle')?>">Add New Vehicle</a>
              <a class="btn btn-sm btn-primary" href="<?= base_url('Dashboard') ?>">Back</a>
           </div>
          </div>
          <div class="box-body">
            <table id="vehicleTable" class="table table-bordered table-striped datatable ">
              <thead>
                <tr>
                <th class="hidden">Fake Order</th>
                  <th class="hidden">ID</th>
                  <th width="100px;">Title</th>
                  <th width="100px;">VEHICLE IMAGE</th>
                  <th width="300px;">VEHICLE DESCRIPTION</th>
				          <th width="100px;">NUMBER OF PASSENGERS</th>
                  <th width="100px;">NUMBER OF SUITCASES</th>
                  <th width="100px;">AMOUNT Per Mile</th>
                  <th width="100px;">COMPANY</th>
                  <th width="100px;">TYPE</th>
                  <th width="100px;">STATUS</th>
                  <th width="100px;">ACTION</th>
               </tr>
              </thead> 
              <tbody>
                <?php
                if(!empty($vehicle_data)){
                 $count = count($vehicle_data);
                  foreach($vehicle_data as $key => $vehicles){
                    $vehicle_data[$key]->fake_order =  $count;
                    $count--;
                  }
                 
                $i=1;
                  foreach($vehicle_data as $vehicle) {  ?>
                    <tr>
                    <th class="hidden"><?= $vehicle->fake_order ?></th>
                      <th class="hidden"><?= $vehicle->vehicle_id ?></th>
                     <th class="center"><?= $vehicle->title ?></th>
                      <th class="center"><img src="<?= base_url($vehicle->vehicle_image) ?>" class="cpoint" onclick="viewImageModal('Profile Image','<?= base_url($vehicle->vehicle_image) ?>');"
                  onerror="this.src='<?=base_url("assets/images/user_avatar.jpg")?>';" height="100" width="100" /></th>
                       <th class="center"><?= $vehicle->vehicle_description?></th>
                     	<th class="center"><?= $vehicle->noOfPassengers ?></th>
                       <th class="center"><?= $vehicle->noOfSuitcases ?></th>
                       <th class="center"><?= $vehicle->perKm?></th>
                       <th class="center"><?= $vehicle->company_name ?></th>
                       <th class="center"><?= $vehicle->type?></th>
                      <th class="center"><?= ($vehicle->status == 1)?'Active':'De-activate' ?></th>
                      <td class="center">   
                        <a class="btn btn-sm btn-info" id="viewVehicleDetails" vehicle_id="<?= encode_param($vehicle->vehicle_id) ?>">
                          <i class="fa fa-fw fa-eye"></i>View
                        </a> 
                        <a class="btn btn-sm btn-primary" href="<?= base_url('Vehicle/editVehicle/'.encode_param($vehicle->vehicle_id)) ?>">
                          <i class="fa fa-fw fa-edit"></i>Edit
                        </a> 
                        <a class="btn btn-sm btn-danger" href="<?= base_url("Vehicle/changeStatus/".encode_param($vehicle->vehicle_id))."/2" ?>" onClick="return doconfirm()">
                          <i class="fa fa-fw fa-trash"></i>Delete
                        </a>    
                      </td>
                    </tr>
                <?php $i++;} } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
