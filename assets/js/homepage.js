var chnaged_id = "pickPoint";

$("#createCustomerForm").delegate('input', "keyup", function () {
    chnaged_id = $(this).attr('id');
    find_locations(chnaged_id);
});

function find_locations(chnaged_id) {
    var options = {
        componentRestrictions: {
            country: "uk"
        }
    };
    var places = new google.maps.places.Autocomplete(document.getElementById(chnaged_id), options);

    google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

        if (chnaged_id === "pickPoint") {
            $("#sourceLat").val(latitude);
            $("#sourceLon").val(longitude);
        } else if (chnaged_id === "dropPoint") {
            $("#destLat").val(latitude);
            $("#destLong").val(longitude);
        }
    });
}

$("#createCustomerForm").delegate('.multi-root', "click", function (e) {
    e.preventDefault();

    var total_way_points = $('.multi-btn').length;
    var next_way_point = parseInt(total_way_points) + 1;
    $("#total_way_points").val(next_way_point);

    if (next_way_point > 3) {
        $("#total_way_points").val('3');
        alert("OOPS !!! way Points limited to 3");
        return;
    }

    var html = '<div id="way-points-div-' + next_way_point + '" class="form-group">' +
        '<div class="d-flex justify-content-between">' +
        '<label></label>' +
        '<span class="chbs-location-remove chbs-meta-icon-minus remove-multi-root"></span>' +
        '<button style="float:right" class="multi-btn mb-4"><i class="fa fa-plus-circle multi-root  "></i> Multi Route</button>' +
        '<button style="float:right" class="mb-4"><i class="fa fa-minus-circle remove-multi-root " data-index="' + next_way_point + '"></i></button>' +
        '</div>' +
        '<input type="text" class="form-control autocompleteDoc multiRoute" name="wayPoint-' + next_way_point + '" required id="wayPoint-' + next_way_point + '" placeholder="Enter a location">' +
        '<input type="hidden" class="lat_perfect" id="lat_doc" name="destLat">' +
        '<input type="hidden" class="lon_perfect" id="lon_doc" name="destLong">' +
        '</div>';

    if ($('.way-points').hasClass('hide')) {
        $('.way-points').removeClass('hide');
    }

    $('.way-points').append(html);
});

$("#createCustomerForm").delegate('.remove-multi-root', "click", function () {
    var id = $(this).attr('data-index');
    $("#way-points-div-" + id).remove();
});
