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

function useCurrentLocation(input) {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(pos) => {
				const latlng = {
					lat: pos.coords.latitude,
					lng: pos.coords.longitude,
				};

				// Reverse geocode to readable address
				geocoder.geocode({ location: latlng }, (results, status) => {
					if (status === "OK" && results[0]) {
						// 🔑 Find the "country" component explicitly
						let countryCode = null;
						results[0].address_components.forEach((c) => {
							if (c.types.includes("country")) {
								countryCode = c.short_name; // e.g. "GB", "LK"
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

/* ---------------- Waypoint handling ---------------- */
function initWaypointHandlers() {
	$("#createCustomerForm").delegate(".multi-root", "click", function (e) {
		e.preventDefault();

		const total_way_points = $(".multi-btn").length;
		const next_way_point = parseInt(total_way_points) + 1;
		$("#total_way_points").val(next_way_point);

		if (next_way_point > 3) {
			$("#total_way_points").val("3");
			alert("OOPS !!! way Points limited to 3");
			return;
		}

		const html = `
        <div id="way-points-div-${next_way_point}" class="form-group position-relative">
            <input type="text" class="form-control autocompleteDoc multiRoute"
                name="wayPoint-${next_way_point}" required id="wayPoint-${next_way_point}" placeholder="Enter a location">
            <div class="custom-dropdown" id="dropdown-wayPoint-${next_way_point}"></div>
            <input type="hidden" class="lat_perfect" id="wayPointLat-${next_way_point}" name="wayPointLat-${next_way_point}">
            <input type="hidden" class="lon_perfect" id="wayPointLon-${next_way_point}" name="wayPointLon-${next_way_point}">
        </div>`;

		if ($(".way-points").hasClass("hide")) $(".way-points").removeClass("hide");

		$(".way-points").append(html);

		// Initialize new waypoint
		initializeAutocompleteInput(
			`wayPoint-${next_way_point}`,
			`wayPointLat-${next_way_point}`,
			`wayPointLon-${next_way_point}`
		);
	});

	$("#createCustomerForm").delegate(".remove-multi-root", "click", function () {
		const id = $(this).attr("data-index");
		$("#way-points-div-" + id).remove();
	});
}

// Initialize autocomplete when maps is ready
google.maps.event.addDomListener(window, "load", initAutocomplete);
