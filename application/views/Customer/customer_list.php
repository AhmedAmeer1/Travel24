<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer | list Customer</title>
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
          <div class="col-md-6"><h3 class="box-title">Customers List</h3></div>
          <div class="col-md-6" align="right">
           
          <a class="btn btn-sm btn-primary" href="<?= base_url('Dashboard') ?>">Back</a>
          </div>
        </div>
      <div class="box-body">
        <table id="driverTable" class="table table-bordered table-striped datatable ">
          <thead>
            <tr>
              <th class="hidden">ID</th>
              <th width="13%;">Name</th> 
              <th width="13%;">Email ID</th> 
              <th width="10%;">Phone</th>
              <th width="5%;">Status</th>
              <th width="8%;">Action</th>
            </tr>
          </thead> 
          <tbody>
            <?php
            if(!empty($customerData)){
              foreach($customerData as $customer) {
               ?>
               <tr>
                 <th class="hidden"><?= $customer->id ?></th>
                 <td class="center"><?= $customer->name ?></th> 
                 <td class="center"><?= $customer->email ?></th>
                 <td class="center"><?= $customer->phone?></th>
                 <td class="center"><?= ($customer->status == '1')?'Active':'Inactive'?></td>
                 <td class="center">	 
                    <a class="btn btn-sm btn-primary" id="viewCustomer" customer_id="<?= encode_param($customer->id) ?>">
                      <i class="fa fa-fw fa-eye"></i>View
                    </a>
                    <a class="btn btn-sm btn-danger" 
                      href="<?= base_url("Customer/changeStatus/".encode_param($customer->id))."/2" ?>" 
                      onClick="return doconfirm()">
                      <i class="fa fa-fw fa-trash"></i>Delete
                    </a>    
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