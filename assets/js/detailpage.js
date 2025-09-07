




$(document).ready(function () {
	var payment_status = "<?php echo $payment_status;?>";
	var book_id = "<?php echo $booking_id;?>";

	if (payment_status == "done" && book_id != 0) {
		get_book_details(book_id);
		$(".payment-method").addClass("hide");
		$("#book_id").text("<?php echo $booking_id;?>");
		$("#success_modal").trigger("click");
	}
});



$("#timepicker").timepicker({
	timeFormat: "h:mm p", // Display format with AM/PM
	interval: 5, // Time intervals in minutes
	scrollbar: true, // Show scrollbar for longer lists
	showMeridian: true, // Show AM/PM
});

$('input#create_acnt[type="checkbox"]').click(function () {
	if ($(this).prop("checked") == true) {
		$("#create_acnt_div").removeClass("hide");
	} else {
		$("#create_acnt_div").addClass("hide");
	}
});

function Converttimeformat(time) {
	var hrs = Number(time.match(/^(\d+)/)[1]);
	var mnts = Number(time.match(/:(\d+)/)[1]);
	var format = time.match(/\s(.*)$/)[1];

	if (format == "PM" && hrs < 12) hrs = hrs + 12;
	if (format == "AM" && hrs == 12) hrs = hrs - 12;

	// Adjust the time difference to 5 minutes instead of 30
	var timeDifference = 5;
	var totalMinutes = hrs * 60 + mnts;
	totalMinutes += timeDifference;
	hrs = Math.floor(totalMinutes / 60) % 24;
	mnts = totalMinutes % 60;

	var hours = hrs.toString();
	var minutes = mnts.toString();

	if (hrs < 10) hours = "0" + hours;
	if (mnts < 10) minutes = "0" + minutes;

	return hours + ":" + minutes;
}

$("#timepicker").click(function () {
	checkTime();
});

function checkTime() {
	var selectedText = document.getElementById("datepicker").value;
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 3;
	var yyyy = today.getFullYear();
	if (dd < 10) {
		dd = "0" + dd;
	}
	if (mm < 10) {
		mm = "0" + mm;
	}
	today = mm + "/" + dd + "/" + yyyy;
	var time = $("#timepicker").val();
	var d = new Date();
	var hour = d.getHours();
	var minute = d.getMinutes();
	current_time = hour + ":" + minute;
	if (selectedText == today) {
		if (time != "") {
			var select_time = Converttimeformat(time);
			var valuestart = current_time;
			var valuestop = select_time;
			var timeStart = new Date(today + " " + valuestart).getHours();
			var timeEnd = new Date(today + " " + valuestop).getHours();
			var hourDiff = timeEnd - timeStart;

			if (hourDiff < 3) {
				alert("You should book 3 hour prior to your journey");
				//$("#exceed_time").val("1");
			}
		}
	}
}

function checkDate() {
	var selectedText = document.getElementById("datepicker").value;
	var selectedDate = new Date(selectedText);
	var now = new Date();
	var time = $("#timepicker").val();
	var today = new Date();
	var hour = today.getHours();
	var minute = today.getMinutes();
	current_time = hour + ":" + minute;
	var dd = today.getDate();
	var mm = today.getMonth() + 1;
	var yyyy = today.getFullYear();
	if (dd < 10) {
		dd = "0" + dd;
	}

	if (mm < 10) {
		mm = "0" + mm;
	}
	today = mm + "/" + dd + "/" + yyyy;
	if (selectedDate < now && selectedText != today) {
		alert("Date must be in the future");
	}
	if (selectedText == today) {
		alert("select today");
	}
}

$(".cost-add-on").change(function (e) {
	var fare = '<?php echo $_SESSION["base_fare"];?>';
	if ($(this).val() != 0) {
		let no_of_chile_seat = $(this).val();
		let child_seat_cost =
			no_of_chile_seat * $(this).attr("data-cost-per-child-seat");
		$("#total_fare").text(parseFloat(child_seat_cost) + parseFloat(fare));
		$("#child_seat_amt").text(
			"(£" + $(this).attr("data-cost-per-child-seat") + "/Seat)"
		);
	} else {
		$("#total_fare").text(parseFloat(fare));
	}
});




