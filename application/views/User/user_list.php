<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Users | ADD Users</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  </head>
  <style>
    table {   
    position: relative;
    top: 10px;
    }
table, th, td {
 border: 1px solid gainsboro;
    padding: 6px;
}
.hide{
  display:none;
}
.pl-0 {
  padding-left: 0;
}
.mt-3 {
  margin-top: 3rem;
}
.close-td {
  border: 1px solid transparent;
}
.mile-button {
  margin-top: 25px;
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
 
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
          $redirectUrl = (isset($vehicle_id) && !empty($vehicle_id))
                            ?'Vehicle/updateVehicle/'.$vehicle_id
                            :'Location/addLocation';
        
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
            <h3 class="box-title">Users</h3>
          </div>
          <div class="box-body">
            <form id="userForm" role="form"  method="post"  class="validate" data-parsley-validate="" enctype="multipart/form-data">
          <div class="row col-md-12">
            <div class="form-group col-md-2">
              <label> UserName</label>
             
							<input type="text" class="form-control " name="username" value="<?php echo (isset($user_details->username))?$user_details->username:""?>" required id="username" placeholder="Enter a username">
					
            </div>
            <div class="form-group col-md-2">
            <label> Display Name</label>
            <input type="text" class="form-control " name="displayname" value="<?php echo (isset($user_details->display_name))?$user_details->display_name:""?>" required id="displayname" placeholder="Enter a displayname">
						
            </div>
            <div class="form-group col-md-3">
            <label>Email</label>
            <input type="email" class="form-control " name="email" value="<?php echo (isset($user_details->email))?$user_details->email:""?>" required id="email" placeholder="Enter an Email">
						
            </div>
            <div class="form-group col-md-2">
            <label>User Type</label>
            <select class="form-control" id="user_type" name="user_type">
            <option value="1" <?php echo ((isset($user_details->user_type) && $user_details->user_type ==1?"selected":"")) ?>>Admin</option>
            <option value="2" <?php echo ((isset($user_details->user_type) && $user_details->user_type ==2?"selected":"")) ?>>Staff</option>

            </select>
						
            </div>
            <div class="col-md-3">
            <label>Password</label>
            <input type="password" class="form-control autocompleteDoc" name="password" required id="password" value="" >
          </div>
          <div   style="text-align:center;" class="row col-md-12">
          <button  id="createNewUser" type="button" class="btn btn-primary">Submit</button>
          </div>
      </div>
      
       </form></div></div></div></div>

         </section>
         <section>
         <div class="box-body">
            <table  id="mechanicUsers" class="table table-bordered table-striped datatable ">
              <thead>
                <tr>
                  <th class="hidden">ID</th>
                  <th width="100px;">Username</th>
                  <th width="100px;">Display Name</th>
                  <th width="100px;">User Type</th>
                  <th width="100px;">Action</th>
                  </tr>
                 
               
              </thead> 
              <tbody>
                <?php
                if(!empty($users)){
                  foreach($users as $users) {  ?>
                    <tr>
                      <th class="hidden"><?= $users->id ?></th>
                       <th class="center"><?= $users->username?></th>
                       <th class="center"><?= $users->display_name?></th>
                       <th class="center"><?= ($users->user_type == 1)?'Admin':'Staff' ?></th>
                      <!-- <th class="center"><?= ($users->status == 1)?'Active':'De-activate' ?></th> -->
                      <th class="center">   
                      
                        <a class="btn btn-sm btn-danger" href="<?= base_url("User/delete_user/".encode_param($users->id))."/2" ?>" onClick="return doconfirm()">
                          <i class="fa fa-fw fa-trash"></i>Delete
                        </a>
                        <input data-user-id = "<?php echo $users->id;?>" type="radio" class="change-status" id="active-<?php echo $users->id;?>" name="user_status-<?php echo $users->id;?>" value="1" <?php if ($users->status == 1): ?> checked="true"   <?php endif ?>>
               
  
                        <label for="active">Active</label>
                        <input type="radio"  data-user-id = "<?php echo $users->id;?>" class="change-status" id="deactive-<?php echo $users->id;?>" name="user_status-<?php echo $users->id;?>" value="0" <?php if ($users->status == 0): ?> checked="true"   <?php endif ?>>
                        <label for="deactive">Deactive</label>
                        <!-- <a class="btn btn-sm btn-info" href="<?= base_url("User/list_users/".encode_param($users->id))."/2" ?>">
                          <i class="fa fa-fw fa-edit  "></i>Edit
                        </a>         -->
                      </th>
                    </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
         </section>
         </div>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/jquery.3.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.touchSwipe.min.js')?>"></script>
    <script src="https://use.fontawesome.com/1e36072efd.js"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo $result->google_api_key; ?>&sensor=false&libraries=places"></script>
 
 <script type="text/javascript">



var chnaged_id ="pickPoint";

$( "#locationForm" ).delegate( '#pickPoint,#dropPoint', "keyup", function() {
    chnaged_id = $(this).attr('id');
    find_locations(chnaged_id)
    
})



 function find_locations(chnaged_id){ 

    var options = {
   // types: ['(cities)'],
    componentRestrictions: {country: "uk"}
        };
    var places = new google.maps.places.Autocomplete(document.getElementById(chnaged_id),options);
    //console.log('places',places.getPlace())
        google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
             var address = place.formatted_address;
             var latitude = place.geometry.location.lat();
             var longitude = place.geometry.location.lng();
              var mesg = "Address: " + address;
             mesg += "\nLatitude: " + latitude;
             mesg += "\nLongitude: " + longitude;
           // alert(mesg)
             if(chnaged_id=="pickPoint")
             {
                
                 $("#sourceLat").val(latitude);
                 $("#sourceLon").val(longitude);
                 
             }else if(chnaged_id=="dropPoint"){
               
                 $("#destLat").val(latitude);
                 $("#destLon").val(longitude);
             }
            
         });
    
         
        }
        $("#createNewUser").click(function(){
          var username = $("#username").val();
          var displayname = $("#displayname").val();
          var user_type = $("#user_type").val();
          var password = $("#password").val();
          var email = $("#email").val();
          var user_id = '<?php echo $user_id ?>';
         

           if(user_id == ""){
             var url = '<?php echo base_url('User/save_new_user')?>';
           }else{
            var url = '<?php echo base_url('User/update_user/'.$user_id)?>';
           }
         
          if(username == "" || displayname== "" || password == "" ||  email == ""){
            alert("Please Enter All the fields")
          }
          else if(password.length <5){
            alert("Minimum Length of the password should be 5")
          }
          else  if(IsEmail(email)==false){
            alert("Invalid Email");
          }
          else{
            $.ajax({         
               type: "POST",
               
               url: url,
                   
               data: {'username':username,'displayname':displayname,'user_type':user_type,
               'password':password,'email':email
               },
               cache: false,
               success: function(result)
               {
                 alert(result)
                  location.reload();
                 
               }
               
      });

          }
        })
        function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(email)) {
          return false;
          }else{
          return true;
        }
      }
      $(".change-status").click(function(e){
        var status = $(this).val();
        var id = $(this).data('user-id');
        if(status == 1)
        {
          var msg="Are you sure to Activate this user?"
        }else{
          var msg="Are you sure to Deactivate this user?"
        }
        action = confirm(msg);
        if(action != true) return false;
        $.ajax({         
               type: "POST",
               
               url: '<?php echo base_url('User/change_status')?>',
                   
               data: {'status':status,'id':id},
               cache: false,
               success: function(result)
               {
                // alert("Status changed successfully")
                  location.reload();
                 
               }
               
      });

        
      })
        </script>