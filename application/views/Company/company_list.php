<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> City | City List </title> 
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
          <div class="col-md-6"><h3 class="box-title">Company List</h3></div>
          <div class="col-md-6" align="right">
            
            <a class="btn btn-sm btn-primary" href="<?= base_url('Company/addNewCompany')?>">Add New Company</a>
            <a class="btn btn-sm btn-primary" href="<?= base_url('Dashboard') ?>">Back</a>
          </div>
        </div>
      <div class="box-body">
        <table id="driverTable" class="table table-bordered table-striped datatable ">
          <thead>
            <tr>
              <th class="hidden">ID</th>
              <th width="13%;">Company Name</th> 
              <th width="5%;">Status</th>
              <th width="33%;">Action</th>
            </tr>
          </thead> 
          <tbody>
            <?php
            if(!empty($company_data)){
              foreach($company_data as $city) {
               ?>
               <tr>
                 <th class="hidden"><?= $city->company_id ?></th>
                 <td class="center"><?= $city->company_name  ?></th> 
                 <td class="center"><?= ($city->status == '1')?'Active':'Inactive'?></td>
                 <td class="center">	 
                    <a class="btn btn-sm btn-primary" id="viewCity" city_id="<?= encode_param($city->company_id) ?>">
                      <i class="fa fa-fw fa-eye"></i>View
                    </a>
                    <a class="btn btn-sm btn-danger" 
                      href="<?= base_url('Company/editCompany/'.encode_param($city->company_id)) ?>">
                      <i class="fa fa-fw fa-edit"></i>Edit
                    </a> 
                    <a class="btn btn-sm btn-danger" 
                      href="<?= base_url("Company/changeStatus/".encode_param($city->company_id))."/2" ?>" 
                      onClick="return doconfirm()">
                      <i class="fa fa-fw fa-trash"></i>Delete
                    </a>    
                    <?php if($city->status == 1){ ?>
                      <a class="btn btn-sm btn-success" style="background-color:#ac2925" href="<?= base_url("Company/changeStatus/".encode_param($city->company_id))."/0" ?>">
                        <i class="fa fa-cog"></i> De-activate
                      </a>
                    <?php } else { ?>
                      <a class="btn btn-sm btn-success" href="<?= base_url("Company/changeStatus/".encode_param($city->company_id))."/1" ?>">
                        <i class="fa fa-cog"></i> Activate
                      </a>
                    <?php } ?>
                  </td>
                </tr>
            <?php 
              } 
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>