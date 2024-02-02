jQuery(document).ready(function(){
    jQuery('<div class="overlay"></div>').insertBefore(".content-wrapper");
});

function setImg(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function setMultiImg(input,thisObj){
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var count = thisObj.attr('count');
      thisObj.attr('count',count+1);
      jQuery('[id="multipleImageInputCntr"]').append(jQuery('[id="multipleImageInput"]').html().replace(/{:count}/g,count+1));

      thisObj.addClass('prevent-click');
      jQuery('[id="multiImageClose_'+count+'"]').removeClass('hide');
      jQuery('[id="multiImageImg_'+count+'"]').attr('src', e.target.result);
      jQuery('[id^="multiImageImg_"]').removeClass('errorBorder');
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function removeImage(count){
  jQuery('[id="multiImageCntr_'+count+'"]').remove();
}

function setModal(header_msg,body_msg){
    jQuery('[id="modal_body_msg"]').html(body_msg);
    jQuery('[id="modal_header_msg"]').html(header_msg);
    jQuery('[id="errModal"]').modal('show');
}

function slideTo(id){
    jQuery('html, body').animate({
        scrollTop: jQuery('[id="'+id+'"]').offset().top
    }, 800);
}

function modalTrigger(header,body_html){
    jQuery('[id="modal_content"]').html(body_html);
    jQuery('[id="modal_header"]').html(header);

    jQuery('[id="popup_modal"]').modal('show');
}

function modalHide(){
    jQuery('[id="popup_modal"]').modal('hide');
}

function addModalLoader(){
    jQuery("[id='modal_content']").addClass('relative height_200');
    jQuery("[id='modal_content']").prepend("<div id='modal_loader_body' class='loader'></div>");
}

function remModalLoader(){
    jQuery("[id='modal_loader_body']").remove();
    jQuery("[id='modal_content']").removeClass('relative height_200');
}

function showFullScreenLoader(){
    var thisObj = jQuery('.overlay');
    thisObj.css("display",'block');

    thisObj.addClass('relative');
    thisObj.prepend("<div id='fullScreenLoaderBody' class='loader'></div>");
}

function remFullScreenLoader(){
    var thisObj = jQuery('.overlay');
    thisObj.css("display",'none');

    jQuery('[id="fullScreenLoaderBody"]').remove();
    thisObj.removeClass('relative');
}

function viewImageModal(title,img_src){
	if(title=='' || title==undefined || title=='undefined' || title==null || title=='null'||
	   img_src=='' || img_src==undefined || img_src=='undefined' || img_src==null || img_src=='null'){
		return false;
	}
	body_html = '<div style="text-align:center">'+
				  '<img src="'+img_src+'" onerror="this.src=\''+base_url+'assets/images/no_image.png\';" height="400px" width="auto">'+
   		  		'</div>';
	modalTrigger(title,body_html);
}
/*function initLocSearch_1() {
 var input = document.getElementById('loc_search_1');
 var options = {componentRestrictions: {country: country_flag}};
 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
google.maps.event.addDomListener(window,'load',initLocSearch_1);
function initLocSearch_2() {
 var input = document.getElementById('loc_search_2');
 var options = {componentRestrictions: {country: country_flag}};
 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
google.maps.event.addDomListener(window,'load',initLocSearch_2);
function initLocSearch_3() {
 var input = document.getElementById('loc_search_3');
 var options = {componentRestrictions: {country: country_flag}};
 var autocomplete = new google.maps.places.Autocomplete(input, options);
}
google.maps.event.addDomListener(window,'load',initLocSearch_3);
*/

function changeMechanic(){
    jQuery('[id="chooseMechForm"]').submit();
}

jQuery('[id="viewCustomer"]').on('click',function() {
  customer_id = jQuery(this).attr('customer_id');

  if(customer_id=='' || customer_id==undefined || customer_id=='undefined' || customer_id==null || customer_id=='null'){
    return true;
  }
  modalTrigger('Customer Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Customer/getCustomerData", 
    type : 'POST',
    data : {'customer_id':customer_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var customer_data = resp_data['customer_data'], html = '', veh_html = '',
          vehicle_data = resp_data['customer_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html = '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Full Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                    customer_data['name']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Email </span> : '+
                  '<label style="padding-left: 10px;">'+
                    customer_data['email']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 56px;">Phone</span> : '+
                  '<label style="padding-left: 10px;">'+
                    customer_data['phone']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="customerProfileImg"]').error(function() {
        jQuery('[id="customerProfileImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});
jQuery('[id="createCustomerSubmit"]').on('click',function() {
  jQuery('[id="createCustomerForm"]').submit();
});

jQuery('[id="viewCity"]').on('click',function() {
  company_id = jQuery(this).attr('city_id');

  if(company_id=='' || company_id==undefined || company_id=='undefined' || company_id==null || company_id=='null'){
    return true;
  }
  modalTrigger('Company Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Company/getCompanyData", 
    type : 'POST',
    data : {'company_id':company_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var company_data = resp_data['company_data'], html = '', veh_html = '',
          vehicle_data = resp_data['company_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html =  '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Company ID </span> : '+
                  '<label style="padding-left: 10px;">'+
                  company_data['company_id']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 55px;">Company Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                  company_data['company_name']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="customerProfileImg"]').error(function() {
        jQuery('[id="customerProfileImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewVehicleDetails"]').on('click',function() {
  vehicle_id = jQuery(this).attr('vehicle_id');

  if(vehicle_id=='' || vehicle_id==undefined || vehicle_id=='undefined' || vehicle_id==null || vehicle_id=='null'){
    return true;
  }
  modalTrigger('Vehicle Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Vehicle/getVehicleData", 
    type : 'POST',
    data : {'vehicle_id':vehicle_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var vehicle_data1 = resp_data['vehicle_data1'], html = '', veh_html = '',
      vehicle_data = resp_data['vehicle_data1']['vehicle_data'];
      html = '<div class="col-xs-12">'+
              '<div class="col-md-2"> '+
                '<div class="form-group has-feedback"> '+
                  '<img id="VehicleImg" src="'+base_url+vehicle_data1['vehicle_image']+'"'+
                    'height="100" width="100" /> '+
                '</div> '+
              '</div> '+
              '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Title </span> : '+
                  '<label style="padding-left: 10px;">'+
                  vehicle_data1['title']+
                  '</label> '+
                '</div> '+
              '<div class="form-group has-feedback"> '+
                '<span style="padding-right: 68px;">Vehicle Type</span> : '+
                '<label style="padding-left: 10px;">'+
                vehicle_data1['type']+
                '</label> '+
              '</div> '+
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 68px;">Company</span> : '+
              '<label style="padding-left: 10px;">'+
              vehicle_data1['company_name']+
              '</label> '+
              '</div> '+ 
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 68px;">Amount Per Mile</span> : '+
              '<label style="padding-left: 10px;">'+
              vehicle_data1['perKm']+
              '</label> '+
              '</div> '+
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 68px;">No of Suitcases</span> : '+
              '<label style="padding-left: 10px;">'+
              vehicle_data1['noOfSuitcases']+
              '</label> '+
              '</div> '+
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 68px;">No of Passengers</span> : '+
              '<label style="padding-left: 10px;">'+
              vehicle_data1['noOfPassengers']+
              '</label> '+
              '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Vehicle description</span> : '+
                  '<label style="padding-left: 10px;">'+
                  vehicle_data1['vehicle_description']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="VehicleImg"]').error(function() {
        jQuery('[id="VehicleImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewPromocode"]').on('click',function() {
  promo_id = jQuery(this).attr('promo_id');

  if(promo_id=='' || promo_id==undefined || promo_id=='undefined' || promo_id==null || promo_id=='null'){
    return true;
  }
  modalTrigger('promocode Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Promocode/getPromoData", 
    type : 'POST',
    data : {'promo_id':promo_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var promo_data = resp_data['promo_data'], html = '', veh_html = '',
          vehicle_data = resp_data['promo_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html =  '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Promo ID </span> : '+
                  '<label style="padding-left: 10px;">'+
                  promo_data['promo_id']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                '<span style="padding-right: 38px;">Code Name </span> : '+
                '<label style="padding-left: 10px;">'+
                promo_data['promo_code']+
                '</label> '+
              '</div> '+
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 38px;">Usage Limit</span> : '+
              '<label style="padding-left: 10px;">'+
              promo_data['usage_limit']+
              '</label> '+
              '</div> '+
              '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 38px;">Discount </span> : '+
              '<label style="padding-left: 10px;">'+
              promo_data['discount']+
              '</label> '+
             '</div> '+
             '<div class="form-group has-feedback"> '+
              '<span style="padding-right: 38px;">Starting Date </span> : '+
              '<label style="padding-left: 10px;">'+
              promo_data['starting_date']+
              '</label> '+
             '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 55px;">Ending Date </span> : '+
                  '<label style="padding-left: 10px;">'+
                  promo_data['ending_date']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="customerProfileImg"]').error(function() {
        jQuery('[id="customerProfileImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});



jQuery('[id="viewBookingDetails"]').on('click',function() {
  booking_id  = jQuery(this).attr('booking_id');

  if(booking_id =='' || booking_id ==undefined || booking_id =='undefined' || booking_id ==null || booking_id =='null'){
    return true;
  }
  
  modalTrigger('Booking Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Booking/getBookingData", 
    type : 'POST',
    data : {'booking_id':booking_id},
    success: function(resp){
      
      var resp_data = jQuery.parseJSON(resp);
      
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var book_data = resp_data['book_data'], html = '', veh_html = '',
          vehicle_data = resp_data['book_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html = '<div class="col-xs-12">'+
         
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;"> Book ID</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['booking_id']+
                  '</label> '+
                '</div> '+
              
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">First Name</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['first_name']+
                  '</label> '+
                '</div> '+
           
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Last Name</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['last_name']+
                  '</label> '+
                '</div> '+
              
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Vehicle</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['title']+
                  '</label> '+
                '</div> '+
               
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Source</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['source']+
                  '</label> '+
                '</div> '+
            
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Destination</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['destination']+
                  '</label> '+
                '</div> '+
           
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Way Point 1</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['way_point_1']+
                  '</label> '+
                '</div> '+
             
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Way Point 2</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['way_point_2']+
                  '</label> '+
                '</div> '+
             
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Way Point 3</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['way_point_3']+
                  '</label> '+
                '</div> '+
               
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Travel Time</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['travel_time']+
                  '</label> '+
                '</div> '+
              
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Pick Up Door Name</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['pick_up_door_name']+
                  '</label> '+
                '</div> '+
            
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Flight Number</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['flight_no']+
                  '</label> '+
                '</div> '+
             
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">No of Passenger(s)</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['passenger']+
                  '</label> '+
                '</div> '+
                
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">No of Suitcase(s)</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['suitcase']+
                  '</label> '+
                '</div> '+
              
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">No of Child Seat(s)</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['child_seat']+
                  '</label> '+
                '</div> '+
               
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Greet Status</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['greet_status']+
                  '</label> '+
                '</div> '+
              
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Payment Type</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['payment_type']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Amount</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['amount']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Payment Status</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['payment_status']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Payment ID</span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['payment_id']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Payer ID </span> : '+
                  '<label style="padding-left: 10px;">'+
                  book_data['payer_id']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="subcategoryImg"]').error(function() {
        jQuery('[id="subcategoryImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewStoreProduct"]').on('click',function() {
  store_id = jQuery(this).attr('store_id');

  if(store_id=='' || store_id==undefined || store_id=='undefined' || store_id==null || store_id=='null'){
    return true;
  }
  modalTrigger('Store Product Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Store/getStoreData", 
    type : 'POST',
    data : {'store_id':store_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var store_data = resp_data['store_data'], html = '', veh_html = '',
          vehicle_data = resp_data['store_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html = '<div class="col-xs-12">'+
              '<div class="col-md-2"> '+
                '<div class="form-group has-feedback"> '+
                  '<img id="StoreImg" src="'+base_url+store_data['store_image']+'"'+
                    'height="100" width="100" /> '+
                '</div> '+
              '</div> '+
              '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Store Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                  store_data['store_name']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Product Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                  store_data['product_name']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="storeImg"]').error(function() {
        jQuery('[id="storeImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewShopperDetails"]').on('click',function() {
  shopper_id = jQuery(this).attr('shopper_id');

  if(shopper_id=='' || shopper_id==undefined || shopper_id=='undefined' || shopper_id==null || shopper_id=='null'){
    return true;
  }
  modalTrigger('Shopper Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Shopper/getShopperData", 
    type : 'POST',
    data : {'shopper_id':shopper_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var shopper_data = resp_data['shopper_data'], html = '', veh_html = '',
          vehicle_data = resp_data['shopper_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html = '<div class="col-xs-12">'+
              '<div class="col-md-2"> '+
                '<div class="form-group has-feedback"> '+
                  '<img id="StoreImg" src="'+base_url+shopper_data['shopper_image']+'"'+
                    'height="100" width="100" /> '+
                '</div> '+
              '</div> '+
              '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Shopper Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                  shopper_data['shopper_name']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Email </span> : '+
                  '<label style="padding-left: 10px;">'+
                  shopper_data['email']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 55px;">Phone Number </span> : '+
                  '<label style="padding-left: 10px;">'+
                  shopper_data['phone_no']+
                  '</label> '+
                '</div> '+
              '</div> '+
              '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 56px;">Store Name</span> : '+
                  '<label style="padding-left: 10px;">'+
                  shopper_data['store_name']+
                  '</label> '+
                '</div> '+
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="StoreImg"]').error(function() {
        jQuery('[id="StoreImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewStoreDetails"]').on('click',function() {
  store_id = jQuery(this).attr('store_id');

  if(store_id=='' || store_id==undefined || store_id=='undefined' || store_id==null || store_id=='null'){
    return true;
  }
  modalTrigger('Store Details','');
  addModalLoader();
  jQuery.ajax({
    url  : base_url+"Stores/getStoresData", 
    type : 'POST',
    data : {'store_id':store_id},
    success: function(resp){
      if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var resp_data = jQuery.parseJSON(resp);
      if(resp_data['status'] == '0'){
        remModalLoader();
        jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        return false;
      }
      var store_data = resp_data['store_data'], html = '', veh_html = '',
          vehicle_data = resp_data['store_data']['vehicle_data'];

      if(vehicle_data != '' && vehicle_data != undefined && vehicle_data != 'undefined' && vehicle_data != null && vehicle_data != 'null'){

        jQuery.each(vehicle_data, function (index, value) {
          veh_html += '<span class="vechile-body disp-block marginBottom-5">'+
                        '<i class="fa fa-fw fa-car padRight-8p"></i>'
                          +value['car_name']+
                      '</span>';
        });
        if(veh_html != ''){
          veh_html =  '<div class="col-xs-12"><div class="col-xs-2"></div><div class="col-xs-9">'+
                      '<label>Vehicles Added</label>'+veh_html+'</div></div>';
        }
      }

      html = '<div class="col-xs-12">'+
              '<div class="col-md-2"> '+
                '<div class="form-group has-feedback"> '+
                  '<img id="StoreImg" src="'+base_url+store_data['store_image']+'"'+
                    'height="100" width="100" /> '+
                '</div> '+
              '</div> '+
              '<div class="col-md-5"> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 38px;">Store Name </span> : '+
                  '<label style="padding-left: 10px;">'+
                  store_data['store_name']+
                  '</label> '+
                '</div> '+
                '<div class="form-group has-feedback"> '+
                  '<span style="padding-right: 68px;">Store Description </span> : '+
                  '<label style="padding-left: 10px;">'+
                  store_data['description']+
                  '</label> '+
                '</div> '+
                
              '</div> '+
            '</div>'+veh_html;

      remModalLoader();
      jQuery('[id="modal_content"]').html(html);

      jQuery('[id="StoreImg"]').error(function() {
        jQuery('[id="StoreImg"]').attr('src',base_url+'assets/images/user_avatar.jpg');
      });

    },
    fail: function(xhr, textStatus, errorThrown){
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    },
    error: function (ajaxContext) {
      remModalLoader();
      jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
    }
  });
});

jQuery('[id="viewOrderDetails"]').on('click',function() {
    var order_id = jQuery(this).attr('order_id');

    if(order_id=='' || order_id==undefined || order_id=='undefined' || order_id==null || order_id=='null'){
        return true;
    }

    modalTrigger('Order Details','');
    addModalLoader();
    jQuery.ajax({
        url  : base_url+"Orders/getOrderData", 
        type : 'POST',
        data : {'order_id':order_id},
        success: function(resp){
            if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
                remModalLoader();
                jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
                return false;
            }
            var resp_data = jQuery.parseJSON(resp);
            if(resp_data['status'] == '0'){
                remModalLoader();
                jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
                return false;
            }
            var html = '',
                imgCount = 0,
                optionalHtml = '';
                
            if(resp_data.product_image.length > 0){
              optionalHtml =  '<div class="col-md-12" style="padding-top:20px;">'+
                                  '<div class="row"><label>Product Images</label></div>';

                optionalHtml += '<div class="row">'+
                                  '<div class="col-md-12">';

                jQuery.each(resp_data.product_image, function (index, product_image) {
                  imgCount += 1;
                  optionalHtml += '<img id="optionalImage_'+imgCount+'" src="'+base_url+resp_data.product_image.product_image+'" height="100" width="100" /> ';
                });
                optionalHtml += '</div>';
              optionalHtml += '</div>';
            }

            html = '<div class="col-xs-12">'+
                    '<div class="row"><label>Order Details</label></div>'+
                    '<div class="col-md-6">'+
                     '<div class="row">'+
                        '<div class="col-md-4">Order Id</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.order_id+'</label></div>'+
                      '</div> '+
                      '<div class="row">'+
                        '<div class="col-md-4">User Name</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.fullname+'</label></div>'+
                      '</div> '+
                      '<div class="row">'+
                        '<div class="col-md-4">Product Name</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.product_name+'</label></div>'+
                      '</div> '+
                    '</div>'+
                    '<div class="col-md-6">'+
                      '<div class="row"> '+
                        '<div class="col-md-4">Booking Date</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.booking_date+'</label></div>'+
                      '</div> '+
                      '<div class="row"> '+
                        '<div class="col-md-4">Schedule Date</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.scheduled_date+'</label></div> '+
                      '</div> '+
                      '<div class="row"> '+
                        '<div class="col-md-4">Amount</div>'+
                        '<div class="col-md-1">:</div>'+
                        '<div class="col-md-6"><label>'+resp_data.order_data.total_amount+'</label></div> '+
                      '</div> ';
                      if(resp_data.order_data.status == '0' || resp_data.order_data.status == '2' || resp_data.order_data.status == '3'){
                        html += '<div class="row"> '+
                                  '<div class="col-md-4">Expected Delivery Date</div>'+
                                  '<div class="col-md-1">:</div>'+
                                  '<div class="col-md-6"><label>'+resp_data.order_data.scheduled_date+'</label></div> '+
                                '</div> ';
                      }else if(resp_data.order_data.status == '1'){
                        html += '<div class="row"> '+
                                  '<div class="col-md-4">Delivered On</div>'+
                                  '<div class="col-md-1">:</div>'+
                                  '<div class="col-md-6"><label>'+resp_data.order_data.scheduled_date+'</label></div> '+
                                '</div> ';
                      }
                   html += '</div> '+
                    optionalHtml+
                  '</div>';

              remModalLoader();
              jQuery('[id="modal_content"]').html(html);
              
              jQuery('[id^="optionalImage_"]').error(function() {
                jQuery('[id^="optionalImage_"]').attr('src',base_url+'assets/images/no_image_text.png');
              });
            },
            fail: function(xhr, textStatus, errorThrown){
                remModalLoader();
                jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
            },
            error: function (ajaxContext) {
                remModalLoader();
                jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
        }
    });
});

jQuery('[id="changeOrderStatus"]').on('click',function() {
    var order_id = jQuery(this).attr('order_id');
    var order_status = jQuery(this).attr('order_status');
    if(order_id=='' || order_id==undefined || order_id=='undefined' || order_id==null || order_id=='null'){
        return true;
    }
    modalTrigger('Change Order Detail Status','');
    addModalLoader();

    var stat = '', 
        dropOption = '<option selected disabled value="">--Change Status--</option>';

    switch (order_status){
      case '2': stat = 'Order Places';
              dropOption += '<option value="3">Order Packed</option>';
              dropOption += '<option value="4">Order Shipped</option>';
              dropOption += '<option value="5">Order Delivered</option>';
              break;
      case '3': stat = 'Order Packed';
              dropOption += '<option value="4">Order Shipped</option>';
              dropOption += '<option value="5">Order Delivered</option>';
              break;
      case '4': stat = 'Ordered Shipped';
              dropOption += '<option value="5">Order Delivered</option>';
              break;
    }

    var html =   '<form id="changeOrderStatus" role="form" method="post">'+
                  '<div class="col-md-12" style="padding-top:10px">'+
                    '<div class="col-md-3"><div class="row"><label>Current Status</label></div></div>'+
                    '<div class="col-md-1"> : </div>'+
                    '<div class="col-md-3"><div class="row"><label>'+stat+'</label></div></div>'+
                  '</div>'+
                  
                  '<div class="col-md-12" style="padding-top:10px">'+
                    '<div class="col-md-3"><div class="row"><label>Change Status</label></div></div>'+
                    '<div class="col-md-1"> : </div>'+
                    '<div class="col-md-3">'+
                      '<div class="row">'+
                        '<select id="orderStatus" onchange="statusChangeFun()" name="status" class="form-control required">'+
                          dropOption+
                        '</select>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-5" id="deliverydatediv"></div>'+
                  '</div>'+
                  '<input type="hidden" name="order_id" id="order_id" value="'+order_id+'">'+
                  '<div class="col-md-12"  style="padding-top:10px">'+
                    '<div class="box-footer textCenterAlign">'+
                      '<button type="button" onclick="changeOrderStatus(event);" class="btn btn-primary">Submit</button>'+
                    '</div>'+        
                  '</div>'+
                '</form>';
      remModalLoader();
      jQuery('[id="modal_content"]').html(html);
});

function statusChangeFun(){
  var status = jQuery('[id="orderStatus"]').val();
  if(status == '3' || status == '4'){
    jQuery('[id="deliverydatediv"]').html('<div class="col-md-4">'+
                                            '<div class="row">'+
                                              '<label>Deliver On</label>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div class="col-md-1"> : </div>'+
                                          '<div class="col-md-6">'+
                                            '<div class="row">'+
                                              '<input type="date" id="expected_delivery" class="form-control required" name="expected_delivery">'+
                                            '</div>'+
                                          '</div>');
  }else if(status == '5'){
    jQuery('[id="deliverydatediv"]').html('<div class="col-md-4">'+
                                            '<div class="row">'+
                                              '<label>Delivered on</label>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div class="col-md-1"> : </div>'+
                                          '<div class="col-md-6">'+
                                            '<div class="row">'+
                                              '<input type="date" id="delivery" class="form-control required" name="expected_delivery">'+
                                            '</div>'+
                                          '</div>');
  }
}

function changeOrderStatus(e){
  e.preventDefault();
  var errFlag = '1';

  jQuery('[id^="orderStatus"]').removeClass('errInput');

  var status = jQuery('[id="orderStatus"]').val();
  var order_id = jQuery('[id="order_id"]').val();

  if(status == '' || status == 'null' || status == 'NULL' || status == null){
    jQuery('[id="orderStatus"]').addClass('errInput');
    return false;
  }

  if(status != '' || status != 'null' || status != 'NULL' || status != null){
    errFlag = '0';
    if(status == '3' || status == '4'){
      var expected_delivery = jQuery('[id="expected_delivery"]').val();
      if(expected_delivery == '' || expected_delivery == 'null'){
        jQuery('[id="expected_delivery"]').addClass('errInput');
        errFlag = '1';
      }
    }else if(status == '5'){
      var scheduled_date = jQuery('[id="delivery"]').val();
      if(scheduled_date == '' || scheduled_date == 'null'){
        jQuery('[id="delivery"]').addClass('errInput');
        errFlag = '1';
      }
    }
  }
  if(errFlag == '1'){
    return false;
  }

  jQuery.ajax({
      url  : base_url+"Orders/changeOrderStatus", 
      type : 'POST',
      data : {'order_id':order_id,'status':status,'expected_date':expected_delivery},
      success: function(resp){
       if(resp == '' || resp == undefined || resp == 'undefined' || resp == null || resp == 'null'){
            remModalLoader();
            jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
            return false;
        }
        var resp_data = jQuery.parseJSON(resp);
        if(resp_data['status'] == '10'){
            remModalLoader();
            jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');
            return false;
        }
        else{
          remModalLoader();
          if(status == '0'){
            var html = 'Ordered <br>(Deliver by '+scheduled_date+')';
          }else if(status == '2'){
            var html = 'Order packed <br>(Deliver by '+scheduled_date+')';
          }else if(status == '3'){
            var html = 'Order shipped <br>(Deliver by '+scheduled_date+')';
          }
          else if(status == '1'){
            var html = 'Order delivered <br>(Delivered on '+scheduled_date+')';
          }
          jQuery('[id="orderStatus_'+order_id+'"]').html(html);
          jQuery('[id="modal_content"]').html('Status Changed Successfully.');

          setTimeout(function(){
            modalHide();
          }, 1000);
          return false;
        }
      },
        fail: function(xhr, textStatus, errorThrown){
          remModalLoader();
          jQuery('[id="modal_content"]').html('Something went wrong, please try again later...!');

          setTimeout(function(){
            modalHide();
          }, 1000);
        },
        error: function (ajaxContext) {
          remModalLoader();
          jQuery('[id="modal_content"]').html('Something went wrong,  try again later...!');

          setTimeout(function(){
            modalHide();
          }, 1000);
      }
  });
}
