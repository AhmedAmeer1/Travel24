<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Company | Add Company</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  </head>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $pTitle ?><small><?= $pDescription ?></small>
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
        <?php 
        //print_r($company_id);exit;
          // $redirectUrl = (isset($company_id) && !empty($company_id))
          //                   ?'Company/updateCompany/'.$company_id
          //                   :'Company/createCompany';

                            $redirectUrl = (isset($company_id) && !empty($company_id))
                            ?'Company/updateCompany/'.$company_id
                            :'Company/createCompany';
                           
        
        if($this->session->flashdata('message')) { 
          $flashdata = $this->session->flashdata('message'); ?>
          <div class="alert alert-<?= $flashdata['class'] ?>">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <?= $flashdata['message'] ?>
          </div>
        <?php } ?>
      </div>

        <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Company Details</h3>
          </div>
          <div class="box-body">
            <form id="createProductForm" role="form" action="<?= base_url($redirectUrl) ?>" method="post" class="validate" data-parsley-validate="" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                  <label>Company Nane</label>
                  <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2" name="company_name" required="" 
                  placeholder="Enter company name" value="<?= (isset($company_data->company_name ))?$company_data->company_name :'' ?>">
                  <span class="glyphicon form-control-feedback"></span>
                </div>
        </div>
                      <div class="col-md-12">          
              <div class="box-footer">
                <div style="text-align: center;">
                  <button id="createProductSubmit" type="submit" class="btn btn-primary">Submit</button>
                  <a href="<?=base_url('Company/listCompany')?>" class="btn btn-primary">Cancel</a>
                       </div>
                     </div> 
                    </div>
                  </div>
                </div>
             </div>
           </div>
         </div>
       </form></div></div></div></div>
         </section></div>