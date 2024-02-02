<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> VEHICLE | ADD VEHICLE</title>
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

table,
th,
td {
    border: 1px solid gainsboro;
    padding: 6px;
}

.hide {
    display: none;
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
                            :'Vehicle/createVehicle';
        
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
                        <h3 class="box-title">Vehicle Details</h3>
                    </div>
                    <div class="box-body">
                        <form id="createProductForm" role="form" action="<?= base_url($redirectUrl) ?>" method="post"
                            class="validate" data-parsley-validate="" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label>TITLE</label>
                                        <input type="text" class="form-control required" data-parsley-trigger="change"
                                            data-parsley-minlength="2" name="title" required=""
                                            placeholder="Enter Title"
                                            value="<?= (isset($vehicle_data->title))?$vehicle_data->title:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>NUMBER OF CHILDSEATs</label>
                                        <input type="number" class="form-control required" data-parsley-trigger="change"
                                            name="child_seat" required="" placeholder="Enter Number of Child seat"
                                            value="<?= (isset($vehicle_data->child_seat))?$vehicle_data->child_seat:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>AMOUNT Per CHILDSEAT</label>
                                        <input type="number" class="form-control required" data-parsley-trigger="change"
                                            name="cost_per_child_seat" required=""
                                            placeholder="Enter Amount Per Child seat"
                                            value="<?= (isset($vehicle_data->cost_per_child_seat))?$vehicle_data->cost_per_child_seat:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>VEHICLE DESCRIPTION</label>
                                        <textarea id="rich_editor" type="text"
                                            class="ip_reg_form_input form-control reset-form-custom"
                                            placeholder="Product Description" name="vehicle_description"
                                            style="height:108px;" data-parsley-trigger="change"
                                            data-parsley-minlength="2"><?= (isset($vehicle_data->vehicle_description))?$vehicle_data->vehicle_description:'' ?></textarea>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <?php if(!empty($company_data)){ ?>
                                    <div class="form-group">
                                        <label>COMPANY</label>
                                        <select name="company_id" class="form-control" placeholder="Select Company">
                                            <option selected value="0">COMPANY</option>
                                            <?php 
                                            foreach ($company_data as $company) {
                                            $select = (isset($company->company_id) && $company->company_id == $company->company_id)?'selected':'';
                                            echo '<option '.$select.' value="'.$company->company_id.'">'.
                                                    $company->company_name.
                                                '</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php } ?>

                                    <?php if(!empty($vehicle_type)){ ?>
                                    <div class="form-group">
                                        <label>VEHICLE TYPE</label>
                                        <select name="vehicle_type" class="form-control"
                                            placeholder="Select Vehicle Type">
                                            <option selected value="0">VEHICLE TYPE</option>
                                            <?php 
                                        foreach ($vehicle_type as $vh) {
                                            $select = (isset($vh->id) && $vh->id == $vehicle_data->vehicle_type)?'selected':'';
                                            echo '<option '.$select.' value="'.$vh->id.'">'.
                                                    $vh->type.
                                                '</option>';
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label>NUMBER OF PASSENGERS</label>
                                        <input type="number" class="form-control required" data-parsley-trigger="change"
                                            name="noOfPassengers" required="" placeholder="Enter No Of Passengers"
                                            value="<?= (isset($vehicle_data->noOfPassengers))?$vehicle_data->noOfPassengers:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>NUMBER OF SUITCASES</label>
                                        <input type="number" class="form-control required" data-parsley-trigger="change"
                                            name="noOfSuitcases" required="" placeholder="Enter Number Of Suitcases"
                                            value="<?= (isset($vehicle_data->noOfSuitcases))?$vehicle_data->noOfSuitcases:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>NUMBER OF HANDLUGGAGE</label>
                                        <input type="number" class="form-control required" data-parsley-trigger="change"
                                            name="hand_lagguage" required="" placeholder="Enter Number of Handluggage"
                                            value="<?= (isset($vehicle_data->hand_lagguage))?$vehicle_data->hand_lagguage:'' ?>">
                                        <span class="glyphicon form-control-feedback"></span>
                                    </div>












                                    <!-- ---------------------- ASSIGNING THE VALUES TO THE VEHICLE BASED ON THE KILOMETER  AMOUNT PER MILE FORM ------------------------------START  -->
                                    <div class="form-group ">
                                        <label> AMOUNT Per Mile</label>

                                        <div class="row col-sm-12">

                                            <div class="col-sm-2 pl-0">
                                                <label>From</label>
                                                <input type="number" class="form-control " data-parsley-trigger="change"
                                                    id="from">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label>To</label>
                                                <input type="number" class="form-control " data-parsley-trigger="change"
                                                    id="to">
                                            </div>

                                            <div class="col-sm-2 pl-0">
                                                <label>Single</label>
                                                <input type="text" class="form-control " data-parsley-trigger="change"
                                                    id="single">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label>Return</label>
                                                <input type="text" class="form-control " data-parsley-trigger="change"
                                                    id="return">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label></label>
                                                <input type="button" class="btn btn-primary mile-button" id="mile_range"
                                                    value="save">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group add-vehicle-table">
                                        <?php if(!empty($mile_range)){?>
                                        <table id="mile_range_table" style="width:80%" style="border: 2px solid black;">
                                            <thead>
                                                <tr>
                                                    <th>Range</th>
                                                    <th>Single</th>
                                                    <th>Return</th>
                                                </tr>
                                                <thead>
                                                    <?php $m=1;foreach($mile_range as $mr){?>
                                                    <tr data-id="<?php echo $m; ?>" id=row-<?php echo $m;?>>
                                                        <td><?php echo $mr->from;?>-<?php echo $mr->to;?></td>
                                                        <td><?php echo $mr->single;?></td>
                                                        <td><?php echo $mr->return;?></td>
                                                        <td class='close-td'><i
                                                                class='fa fa-close mile-range-delete'></i></td>
                                                    </tr>
                                                    <?php $m++;}?>

                                        </table>

                                        <?php 
                    
                                            $m1=1; foreach($mile_range as $mr1){?>
                                        <input type="hidden" id="mile-range-<?php echo $m1;?>"
                                            name="mile-range-<?php echo $m1;?>"
                                            value="<?php echo $mr1->from;?>-<?php echo $mr1->to;?>-<?php echo $mr1->single;?>-<?php echo $mr1->return;?>">
                                        <?php $m1++;}
             
                                     } 
                                else {?>
                                        <table id="mile_range_table" class="hide" style="width:80%"
                                            style="border: 2px solid black;">
                                            <thead>
                                                <tr>
                                                    <th>Range</th>
                                                    <th>Single</th>
                                                    <th>Return</th>
                                                </tr>
                                                <thead>
                                        </table>
                                        <?php }?>

                                        <div class="mile-range-hidden">
                                            <input type="hidden" name="total_mile_range" id="total_mile_range"
                                                value="<?php echo (!empty($mile_range)?count($mile_range):"0")?>">
                                        </div>
                                    </div>


                                    <!-- ---------------------- ASSIGNING THE VALUES TO THE VEHICLE BASED ON THE KILOMETER  AMOUNT PER MILE FORM ------------------------------END   -->





















                                    <!-- ---------------------- ASSIGNING THE VALUES TO THE VEHICLE BASED ON THE TIME  AMOUNT PER TIME  FORM ------------------------------START  -->
                                  
                                    <div class="form-group mt-4 ">
                                    <br />
                                        <label> AMOUNT Per Time</label>

                                        <div class="row col-sm-12">

                                            <div class="col-sm-2 pl-0">
                                                <label>From Time</label>
                                                <input type="number" class="form-control " data-parsley-trigger="change"
                                                    id="fromTime">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label>To Time</label>
                                                <input type="number" class="form-control " data-parsley-trigger="change"
                                                    id="toTime">
                                            </div>

                                            <div class="col-sm-2 pl-0">
                                                <label>Single</label>
                                                <input type="text" class="form-control " data-parsley-trigger="change"
                                                    id="singleTime">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label>Return</label>
                                                <input type="text" class="form-control " data-parsley-trigger="change"
                                                    id="returnTime">
                                            </div>
                                            <div class="col-sm-2 pl-0">
                                                <label></label>
                                                <input type="button" class="btn btn-primary time-button" id="time_range"
                                                    value="save">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group add-vehicle-table">
                                        <?php if(!empty($time_range)){?>
                                        <table id="time_range_table" style="width:80%" style="border: 2px solid black;">
                                            <thead>
                                                <tr>
                                                    <th>Range</th>
                                                    <th>Single</th>
                                                    <th>Return</th>
                                                </tr>
                                                <thead>
                                                    <?php $m=1;foreach($time_range as $mr){?>
                                                    <tr data-id="<?php echo $m; ?>" id=row-<?php echo $m;?>>
                                                        <td><?php echo $mr->from;?>-<?php echo $mr->to;?></td>
                                                        <td><?php echo $mr->single;?></td>
                                                        <td><?php echo $mr->return;?></td>
                                                        <td class='close-td'><i
                                                                class='fa fa-close time-range-delete'></i></td>
                                                    </tr>
                                                    <?php $m++;}?>

                                        </table>

                                        <?php 
                    
                                            $t1=1; foreach($time_range as $tr1){?>
                                        <input type="hidden" id="time-range-<?php echo $t1;?>"
                                            name="time-range-<?php echo $t1;?>"
                                            value="<?php echo $tr1->from;?>-<?php echo $tr1->to;?>-<?php echo $tr1->single;?>-<?php echo $tr1->return;?>">
                                        <?php $t1++;}
             
                                     } 
                                else {?>
                                        <table id="time_range_table" class="hide" style="width:80%"
                                            style="border: 2px solid black;">
                                            <thead>
                                                <tr>
                                                    <th>Range</th>
                                                    <th>Single</th>
                                                    <th>Return</th>
                                                </tr>
                                                <thead>
                                        </table>
                                        <?php }?>

                                        <div class="time-range-hidden">
                                            <input type="hidden" name="total_time_range" id="total_time_range"
                                                value="<?php echo (!empty($time_range)?count($time_range):"0")?>">
                                        </div>
                                    </div>


                                    <!-- ---------------------- ASSIGNING THE VALUES TO THE VEHICLE BASED ON THE TIME   AMOUNT PER TIME FORM ------------------------------END   -->
































                                    <div class="form-group mt-3">
                                        <label> Base Rate</label>

                                        <div class="col-sm-12 pl-0">
                                            <div class="col-sm-6 pl-0">
                                                <input type="text" class="form-control required"
                                                    data-parsley-trigger="change" id="perKm" name="perKm" required=""
                                                    placeholder="Enter Base Rate(Single)"
                                                    value="<?= (isset($vehicle_data->perKm))?$vehicle_data->perKm:'' ?>">
                                                <span class="glyphicon form-control-feedback"></span>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <input type="text" class="form-control required"
                                                    data-parsley-trigger="change" id="perKmReturn" name="perKmReturn"
                                                    required="" placeholder="Enter  Base Rate (Return)"
                                                    value="<?= (isset($vehicle_data->perKmReturn))?$vehicle_data->perKmReturn:'' ?>">
                                                <span class="glyphicon form-control-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <!-- <label> Base Rate</label> -->

                                        <div class="col-sm-12 pl-0">
                                            <div class="col-sm-6 pl-0">
                                                <input type="hidden" class="form-control required"
                                                    data-parsley-trigger="change" id="fixedPrice" name="fixedPrice"
                                                    required="" placeholder="Fixed Price"
                                                    value="<?= (isset($vehicle_data->fixedPrice))?$vehicle_data->fixedPrice:0 ?>">
                                                <span class="glyphicon form-control-feedback"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>VEHICLE IMAGE</label>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <img id="vehicle_image"
                                                    src="<?= (isset($vehicle_data) && isset($vehicle_data->vehicle_image))?base_url($vehicle_data->vehicle_image):'' ?>"
                                                    onerror="this.src='<?=base_url("assets/images/user_avatar.jpg")?>'"
                                                    height="75" width="75" />
                                            </div>
                                            <div class="col-md-9" style="padding-top: 25px;">
                                                <input name="vehicle_image" type="file" accept="image/*"
                                                    class="<?= (isset($vehicle_id) && !empty($vehicle_id))?'':'required' ?>"
                                                    onchange="setImg(this,'vehicle_image')" />
                                            </div>

                                            <div class="col-md-12" style="padding-top:15px;">

                                                <button id="createProductSubmit" type="submit"
                                                    class="btn btn-primary">Submit</button>
                                                <a href="<?=base_url('Vehicle/addVehicle')?>"
                                                    class="btn btn-primary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
</div>
</div>
</div>
</section>
</div>
<script>













var id = 0;
$("#mile_range").click(function() {

    var from = $("#from").val();
    var to = $("#to").val();
    var single = $("#single").val();
    var retn = $("#return").val();
    var single_valid = $.isNumeric(single);
    var retn_valid = $.isNumeric(retn);

    if (parseInt(to) <= parseInt(from)) {
        alert("To value should be grater than from value");
        return;
    }
    if (single_valid == false || retn_valid == false) {
        alert("Single and return values should be a valid number");
        return;
    }

    if (from == "" || to == "" || single == "" || retn == "") {
        alert("Please fill all the fields")
    } else {
        //id =id+1;
        id = parseInt($("#total_mile_range").val()) + 1;
        var row = "<tr data-id=" + id + " id =row-" + id + "><td>" + from + "-" + to + "</td><td>" + single +
            "</td><td>" + retn +
            "</td><td class='close-td'><i class='fa fa-close mile-range-delete'></i></td></tr>";
        $("#mile_range_table").append(row)
        $(".mile-range-hidden").append('<input type="hidden" id="mile-range-' + id + '" name="mile-range-' +
            id + '" value="' + from + '-' + to + '-' + single + '-' + retn + '">');
        $("#total_mile_range").val(id);
        $("#mile_range_table").removeClass('hide');
    }
})






$("table").delegate('.mile-range-delete', "click", function() {
    var ids = $(this).closest('tr').data('id')
    $("#mile-range-" + ids).remove();
    $(this).closest('tr').remove();
    id = parseInt($("#total_mile_range").val()) - 1;
    $("#total_mile_range").val(id);
    if (id == 0) {
        $("#mile_range_table").addClass('hide');
    }
})







// ----------------------------------------------------------------------------start -------------------------------------------------------


var idTime = 0;
$("#time_range").click(function() {

    var fromTime = $("#fromTime").val();
    var toTime = $("#toTime").val();
    var singleTime = $("#singleTime").val();
    var retnTime = $("#returnTime").val();
    var single_valid_time = $.isNumeric(singleTime);
    var retn_valid_time = $.isNumeric(retnTime);



    if (parseInt(toTime) <= parseInt(fromTime)) {
        alert("To value should be grater than from value");
        return;
    }
    if (single_valid_time == false || retn_valid_time == false) {
        alert("Single time  and return time  values should be a valid number");
        return;
    }

    if (fromTime == "" || toTime == "" || singleTime == "" || retnTime == "") {
        alert("Please fill all the fields")
    } else {
       
        idTime = parseInt($("#total_time_range").val()) + 1;
        var row = "<tr data-id=" + idTime + " id =row-" + idTime + "><td>" + fromTime + "-" + toTime + "</td><td>" + singleTime +
            "</td><td>" + retnTime +
            "</td><td class='close-td'><i class='fa fa-close time-range-delete'></i></td></tr>";
        $("#time_range_table").append(row)
        $(".time-range-hidden").append('<input type="hidden" id="time-range-' + idTime + '" name="time-range-' +
        idTime + '" value="' + fromTime + '-' + toTime + '-' + singleTime + '-' + retnTime + '">');
        $("#total_time_range").val(idTime);
        $("#time_range_table").removeClass('hide');
    }
})






$("table").delegate('.time-range-delete', "click", function() {
    var ids = $(this).closest('tr').data('id')
    $("#time-range-" + ids).remove();
    $(this).closest('tr').remove();
    id = parseInt($("#total_time_range").val()) - 1;
    $("#total_time_range").val(id);
    if (id == 0) {
        $("#time_range_table").addClass('hide');
    }
})


















$("#createProductSubmit").click(function(e) {
    var perkm = $("#perKm").val();
    var perkm_valid = $.isNumeric(perkm);
    var perkmretn = $("#perKmReturn").val();
    var perkmretn_valid = $.isNumeric(perkmretn);
    var fixedPrice = $("#fixedPrice").val();
    var fixed_price_valid = $.isNumeric(fixedPrice);

    if (perkm_valid == false || perkmretn_valid == false) {
        alert("Please Enter valid values for  AMOUNT Per Mile as default");
        return false;
    } else if (fixed_price_valid == false) {
        alert("Please Enter valid values fixed price");
        return false;
    }

})
</script>