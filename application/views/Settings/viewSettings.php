<div class="content-wrapper">
 <section class="content-header">
  <h1><?= $page_title ?><small><?= $page_desc ?></small></h1>
  <ol class="breadcrumb">
  <li><a href="<?= base_url('Dashboard')?>"><i class="fa fa-star-o" aria-hidden="true"></i>Home</a></li>
   <li><?= $menu ?></li>
   <li class="active"><?= $sub_menu ?></li>
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
   <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header with-border">
        <div class="col-md-6">
          <h3 class="box-title">Edit Basic Site Details</h3>
        </div>
        <div class="col-md-6" align="right">
        <a class="btn btn-sm btn-primary" href="<?= base_url('Dashboard') ?>">Back</a>
        </div>
      </div>
      <form method="post" class="validate" role="form" action="<?= base_url().'Settings/change_settings'?>" enctype="multipart/form-data" data-parsley-validate="">
        <div class="box-body">
          <div class="row">
            <div class="form-group col-xs-4">
              <label>Site Title</label>
              <input type="text" name="title" class="form-control required" placeholder="Enter Site Title" value="<?= $data['title'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Meta Data</label>
              <input type="text" name="title_short" class="form-control required" placeholder="Enter Site Title" value="<?= $data['title_short'] ?>">
            </div>
            <div class="form-group col-xs-5">
              <label>Site Logo</label>
              <div class="col-md-12">
                <div class="col-md-3">
                  <img id="site_logo" src="<?= base_url($data['site_logo']) ?>" onerror="this.src='<?=base_url("assets/images/no_image.png")?>';" height="75" width="75">
                </div>
                <div class="col-md-9" style="padding-top: 25px;">
                  <input name="site_logo" type="file" accept="image/*" onchange="setImg(this,'site_logo');" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-4">
              <label>Meta Title</label>
              <input type="text" name="title" class="form-control required" placeholder="Enter Site Title" value="<?= $data['meta_title'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Meta Descriptions</label>
              <input type="text" name="title_short" class="form-control required" placeholder="Enter Site Title" value="<?= $data['meta_desc'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>MetaKey words</label>
              <input type="text" name="meta_keyword" class="form-control required" placeholder="Enter Site Title" value="<?= $data['meta_keyword'] ?>">
            </div>
       
          </div>
          <div class="row">
            <div class="form-group col-xs-4">
              <label>Country Code</label>
              <input type="text" name="country_flag" class="form-control required" placeholder="Enter Country Code" value="<?= $data['country_flag'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Currency</label>
              <input type="text" name="currency" class="form-control required" placeholder="Enter Currency" value="<?= $data['currency'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Google API key</label>
              <input type="text" name="google_api_key" class="form-control required" placeholder="Enter Google API key" value="<?= $data['google_api_key'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-4">
              <label>Paypal Client ID</label>
              <input type="text" name="paypal_client_id" class="form-control required" placeholder="Enter Paypal" value="<?= $data['paypal_client_id'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Paypal Client SECRET</label>
              <input type="text" name="paypal_client_secret" class="form-control required" placeholder="Enter Paypal ID" value="<?= $data['paypal_client_secret'] ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>Google Analytics Code</label>
              <input type="text" name="google_analytics_code" class="form-control required" placeholder="Enter Google Analytics Code" value="<?= $data['google_analytics_code'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-2" style="margin-top: 30px;">
              <strong>Index Page</strong>
             
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Title</label>
              <input type="text" name="index_meta_title" class="form-control required" placeholder="Meta Title" value="<?= $data['index_meta_title'] ?>">
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Description</label>
              <input type="text" name="index_meta_desc" class="form-control required" placeholder="Meta Description" value="<?= $data['index_meta_desc'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-2" style="margin-top: 30px;">
              <strong>Vehicle Listing Page</strong>
             
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Title</label>
              <input type="text" name="v_list_meta_title" class="form-control required" placeholder="Meta Title" value="<?= $data['v_list_meta_title'] ?>">
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Description</label>
              <input type="text" name="v_list_meta_desc" class="form-control required" placeholder="Meta Description" value="<?= $data['v_list_meta_desc'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-2" style="margin-top: 30px;">
              <strong>Journey deatils Page</strong>
             
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Title</label>
              <input type="text" name="journey_meta_title" class="form-control required" placeholder="Meta Title" value="<?= $data['journey_meta_title'] ?>">
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Description</label>
              <input type="text" name="journey_meta_desc" class="form-control required" placeholder="Meta Description" value="<?= $data['journey_meta_desc'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-xs-2" style="margin-top: 30px;">
              <strong>My Account Page</strong>
             
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Title</label>
              <input type="text" name="account_meta_title" class="form-control required" placeholder="Meta Title" value="<?= $data['account_meta_title'] ?>">
            </div>
            <div class="form-group col-xs-5">
              <label>Meta Description</label>
              <input type="text" name="account_meta_desc" class="form-control required" placeholder="Meta Description" value="<?= $data['account_meta_desc'] ?>">
            </div>
          </div>
          <div class="row">
            
          </div>
        </div>
        <div class="box-footer" style="padding-left:46%">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </section>
</div>