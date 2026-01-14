let autocompleteService;
let geocoder;
let activeInput = null;
let activeLatInput = null;
let activeLngInput = null;

function initAutocomplete() {
	autocompleteService = new google.maps.places.AutocompleteService();
	geocoder = new google.maps.Geocoder();

	// Initialize for existing pickup & drop
	initializeAutocompleteInput("pickPoint", "sourceLat", "sourceLon");
	initializeAutocompleteInput("dropPoint", "destLat", "destLong");

	// Handle adding/removing waypoints dynamically
	initWaypointHandlers();
}

/* ---------------- AUTOCOMPLETE INITIALIZATION ---------------- */
function initializeAutocompleteInput(inputId, latId, lngId) {
	const input = document.getElementById(inputId);
	if (!input) return;

	input.addEventListener("focus", () => {
		activeInput = input;
		activeLatInput = document.getElementById(latId);
		activeLngInput = document.getElementById(lngId);
		showDropdown(input, "");
	});

	input.addEventListener("input", () => {
		activeInput = input;
		activeLatInput = document.getElementById(latId);
		activeLngInput = document.getElementById(lngId);
		showDropdown(input, input.value);
	});
}

function showDropdown(input, query) {
	closeDropdown();

	const dropdown = document.createElement("div");
	dropdown.className = "custom-dropdown";
	dropdown.style.display = "block";
	dropdown.style.position = "absolute";
	dropdown.style.width = input.offsetWidth + "px";
	dropdown.style.left = input.offsetLeft + "px";
	dropdown.style.top = input.offsetTop + input.offsetHeight + "px";

	// --- Add Current Location option ---
	const currentLocOption = document.createElement("div");
	currentLocOption.textContent = "📍 Use Current Location";
	currentLocOption.style.fontWeight = "bold";
	currentLocOption.style.cursor = "pointer";
	currentLocOption.addEventListener("click", () => {
		useCurrentLocation(input);
	});
	dropdown.appendChild(currentLocOption);

	// --- Add Google Autocomplete suggestions ---
	if (query.length > 0) {
		autocompleteService.getPlacePredictions(
			{
				input: query,
				componentRestrictions: { country: "uk" }, // restrict to UK
			},
			(predictions, status) => {
				if (
					status === google.maps.places.PlacesServiceStatus.OK &&
					predictions
				) {
					predictions.forEach((prediction) => {
						const option = document.createElement("div");
						option.textContent = prediction.description;
						option.style.cursor = "pointer";
						option.addEventListener("click", () => {
							input.value = prediction.description;
							fillLatLngFromPlaceId(prediction.place_id);
							closeDropdown();
						});
						dropdown.appendChild(option);
					});
				}
			}
		);
	}

	input.parentElement.appendChild(dropdown);
}

function closeDropdown() {
	document.querySelectorAll(".custom-dropdown").forEach((el) => el.remove());
}

/* ---------------- CURRENT LOCATION ---------------- */
function useCurrentLocation(input) {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(pos) => {
				const latlng = {
					lat: pos.coords.latitude,
					lng: pos.coords.longitude,
				};

				geocoder.geocode({ location: latlng }, (results, status) => {
					if (status === "OK" && results[0]) {
						let countryCode = null;
						results[0].address_components.forEach((c) => {
							if (c.types.includes("country")) {
								countryCode = c.short_name;
							}
						});

						// ✅ Only allow GB (United Kingdom)
						if (countryCode !== "GB") {
							alert("❌ Current location is outside the UK.");
							return;
						}

						input.value = results[0].formatted_address;
						if (activeLatInput && activeLngInput) {
							activeLatInput.value = latlng.lat;
							activeLngInput.value = latlng.lng;
						}
					} else {
						alert("❌ Could not determine address for your location.");
					}
				});

				closeDropdown();
			},
			() => {
				alert("❌ Error: Unable to fetch your location.");
			}
		);
	} else {
		alert("❌ Geolocation not supported by your browser.");
	}
}

function fillLatLngFromPlaceId(placeId) {
	geocoder.geocode({ placeId: placeId }, (results, status) => {
		if (status === "OK" && results[0]) {
			const location = results[0].geometry.location;
			if (activeLatInput && activeLngInput) {
				activeLatInput.value = location.lat();
				activeLngInput.value = location.lng();
			}
		}
	});
}

/* ---------------- WAYPOINT HANDLING ---------------- */
function initWaypointHandlers() {
	const MAX_WAYPOINTS = 3;

	// Add waypoint
	$("#createCustomerForm").delegate(".multi-root", "click", function (e) {
		e.preventDefault();

		const currentCount = $(".way-points .multiRoute").length;

		if (currentCount >= MAX_WAYPOINTS) {
			$("#total_way_points").val(MAX_WAYPOINTS);
			alert("OOPS !!! way Points limited to " + MAX_WAYPOINTS);
			return;
		}

		const next_way_point = currentCount + 1;
		$("#total_way_points").val(next_way_point);

		const html = `
<div id="way-points-div-${next_way_point}" class="form-group position-relative waypoint-item mt-2">
    <div class="d-flex align-items-center gap-2">
        <input type="text"
               class="form-control autocompleteDoc multiRoute waypoint"
               name="way_points[]"
               required
               id="wayPoint-${next_way_point}"
               placeholder="Enter a location">
        <button type="button"
                class="btn btn-link text-danger remove-multi-root"
                data-index="${next_way_point}">
            <i class="fa fa-minus-circle"></i>
        </button>
    </div>

    <input type="hidden" id="wayPointLat-${next_way_point}">
    <input type="hidden" id="wayPointLon-${next_way_point}">
</div>`;


		if ($(".way-points").hasClass("hide")) $(".way-points").removeClass("hide");

		$(".way-points").append(html);

		// Initialize new waypoint autocomplete
		initializeAutocompleteInput(
			`wayPoint-${next_way_point}`,
			`wayPointLat-${next_way_point}`,
			`wayPointLon-${next_way_point}`
		);
	});

	// Remove waypoint
	$("#createCustomerForm").delegate(".remove-multi-root", "click", function () {
		const id = $(this).attr("data-index");
		$("#way-points-div-" + id).remove();

		// Update total count after removal
		const remaining = $(".way-points .multiRoute").length;
		$("#total_way_points").val(remaining);
	});
}

// Initialize autocomplete when Google Maps is ready
google.maps.event.addDomListener(window, "load", initAutocomplete);

// Ensure total waypoints count is correct on load
$(document).ready(function () {
	const initial = $(".way-points .multiRoute").length || 0;
	$("#total_way_points").val(initial);
});
