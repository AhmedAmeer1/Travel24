<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Location | ADD Location</title>
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
            <h3 class="box-title">Special Locations</h3>
          </div>
          <div class="box-body">
            <form id="locationForm" role="form"  method="post" class="validate" data-parsley-validate="" enctype="multipart/form-data">
          <div class="row col-md-12">
            <div class="form-group col-md-5">
              <label> Pick Up Location</label>
             
							<input type="text" class="form-control autocompleteDoc" name="source" required id="pickPoint" placeholder="Enter a location">
							<input type="hidden" class="lat_perfect" id="sourceLat" name="sourceLat">
							<input type="hidden" class="lon_perfect" id="sourceLon" name="sourceLon">
            </div>
            <div class="form-group col-md-5">
            <label> Drop Off Location</label>
            <input type="text" class="form-control autocompleteDoc" name="destination" required id="dropPoint" placeholder="Enter a location">
							<input type="hidden" class="lat_perfect" id="destLat" name="destLat">
							<input type="hidden" class="lon_perfect" id="destLon" name="destLon">
              <!-- <label> Mile </label>
              <input type="text" class="form-control " name="mile_range" required id="mile_range" placeholder="Enter Mile"> -->
            </div>
            <div class="col-md-2">
            <button style="margin-top: 23px;"id="createNewLoc" type="button" class="btn btn-primary">Submit</button>
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
                  <th width="100px;">Pick Up Location</th>
                  <th width="100px;">Drop Off Location</th>
                  <th width="100px;">Action</th>
                  </tr>
                 
               
              </thead> 
              <tbody>
                <?php
                if(!empty($location)){
                  foreach($location as $location) {  ?>
                    <tr>
                      <th class="hidden"><?= $location->id ?></th>
                       <th class="center"><?= $location->name?></th>
                       <th class="center"><?= $location->destination?></th>
                      <!-- <th class="center"><?= ($location->status == 1)?'Active':'De-activate' ?></th> -->
                      <th class="center">   
                      
                        <a class="btn btn-sm btn-danger" href="<?= base_url("Location/delete_location/".encode_param($location->id))."/2" ?>" onClick="return doconfirm()">
                          <i class="fa fa-fw fa-trash"></i>Delete
                        </a>    
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
        $("#createNewLoc").click(function(){
          var location1 = $("#pickPoint").val();
          var latitude = $("#sourceLat").val();
          var longitude = $("#sourceLon").val();

          var location2 = $("#dropPoint").val();
          var dest_latitude = $("#destLat").val();
          var dest_longitude = $("#destLon").val();
         
          if(latitude == "" || longitude== "" ){
            alert("Please Enter valid PickPoint")
          }
          else if(dest_latitude == "" || dest_longitude == ""){
            alert("Please Enter valid Drop Point")
          }
          else{
            $.ajax({         
               type: "POST",
               
               url: '<?php echo base_url('Location/save_new_location')?>',
                   
               data: {'location':location1,'latitude':latitude,'longitude':longitude,
               
                'location2':location2,'dest_latitude':dest_latitude,'dest_longitude':dest_longitude},
               cache: false,
               success: function(result)
               {
                 alert("Location added successfully");
                 location.reload();
               }
      });

          }
        })
        </script>