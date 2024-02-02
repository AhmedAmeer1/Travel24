<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Type|View Payment Type</title>
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
            <div class="col-md-6"><h3 class="box-title">Pay Type List</h3></div>
       
          </div>
          <div class="box-body">
            <table id="mechanicUsers" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="hidden">ID</th>
                  <th width="100px;">Payment Type</th>
                  <th width="100px;">STATUS</th>
                 
                  
               </tr>
              </thead> 
              <tbody>
                <?php
                if(!empty($pay_type)){
                  foreach($pay_type as $pay) {  ?>
                    <tr>
                      <th class="hidden"><?= $pay->id ?></th>
                       <th class="center"><?= $pay->name; ?></th>
                     
                      <th class="center"><input type="radio" class="pay-status" id=<?= $pay->id ?> name=<?= $pay->id ?> value="1" <?= ($pay->status == 1)?'checked':'' ?>>
                                        <label for="male">Active</label>
                                        <input type="radio" class="pay-status" id=<?= $pay->id ?> name=<?= $pay->id ?> value="0" <?= ($pay->status == 0)?'checked':'' ?>>
                                        <label for="female">Deactive</label></th>
                     
                    </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
$("input[type='radio']").change(function () {
 
var status=$(this).val();
var id = $(this).attr('id');
$.ajax({
                type: "POST",
                url: '<?php echo base_url('Customer/change_payment_tye_status')?>',
                data: {status:status,id:id},
                success: function(data)
                {
                  location.reload();
                }
        })
});
</script>