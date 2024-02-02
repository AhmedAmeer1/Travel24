<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Location |Location mapping</title>
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
           
            <div class="box-body">
            <form id="locationForm" role="form"  method="post" class="validate" data-parsley-validate="" enctype="multipart/form-data">
          <div class="row col-md-12">
            <div class="form-group col-md-5">
              <label> LOCATION</label>
             
							<select class="form-control" id ="location" name="location">
              <option value="0">Select Location</option>
              <?php
              foreach($location as $new){?>
              <option value="<?php echo $new->id; ?>"><b style="color:blue"><?php echo $new->name ?></b>-----<?php echo $new->destination; ?></option>
              <?php }
              ?>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label> Price (Single) </label>
              <input type="text" class="form-control " name="price" required id="price" placeholder="Enter Price">
            </div>
            <div class="form-group col-md-2">
              <label> Price (Return)  </label>
              <input type="text" class="form-control " name="price_return" required id="price_return" placeholder="Enter Return Price">
            </div>
            <div class="form-group col-md-3">
              <label> Vehicle</label>
             
							<select class="form-control" id ="vehicle" name="vehicle">
              <option value="0">Select Vehicle</option>
              <?php
              foreach($vehicle as $vh){?>
              <option value="<?php echo $vh->vehicle_id; ?>"><?php echo $vh->title; ?></option>
              <?php }
              ?>
              </select>
            </div>
           
      </div>
      <div class="row">
      
            <button style="margin-left: 500px;"id="mapLoc" type="button" class="btn btn-primary">Submit</button>
          
      </div>
      
       </form></div>
          </div>
          <div class="box-body">
            <table id="mechanicUsers" class="table table-bordered table-striped datatable ">
              <thead>
                <tr>
                  <th class="hidden">ID</th>
                  <th width="100px;">Locations</th>
                  <th width="100px;">Vehicle</th>
                  <th width="100px;">Price(Single) </th>
                  <th width="100px;">Price(Return) </th>
                  <th width="100px;">ACTION</th>
               </tr>
              </thead> 
              <tbody>
                <?php
                if(!empty($mapped_locations)){
                  foreach($mapped_locations as $ml) {  ?>
                    <tr>
                      <th class="hidden"><?= $ml->id ?></th>
                       <th class="center"><?= $ml->location?>----<?= $ml->destination?></th>
                       <th class="center"><?= $ml->vehicle?></th>
                       <th class="center"><?= $ml->price_single?></th>
                       <th class="center"><?= $ml->price_return?></th>
                      <td class="center">   
                       
                      
                        <a class="btn btn-sm btn-danger" href="<?= base_url("Location/delete_location_mapping/".encode_param($ml->id))."/2" ?>" onClick="return doconfirm()">
                          <i class="fa fa-fw fa-trash"></i>Delete
                        </a>    
                      </td>
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
$("#mapLoc").click(function(){
          var location1 = $("#location").val();
          var price = $("#price").val();
          var price_return = $("#price_return").val();
          var vehicle = $("#vehicle").val();
         
          if(location1 == 0 || vehicle ==0){
            alert("Please Choose  both location and vehicle")
          }else if(!$.isNumeric( price) ||!$.isNumeric( price_return)  ){
            alert("Invalid price")
          }else{
            $.ajax({         
               type: "POST",
               
               url: '<?php echo base_url('Location/save_new_location_mapping')?>',
                   
               data: {'location':location1,'price':price,'vehicle':vehicle,'price_return':price_return},
               cache: false,
               success: function(result)
               {
                 alert(result);
                 location.reload();
               }
      });

          }
        })
        </script>