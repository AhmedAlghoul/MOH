// The following example creates five accessible and
// focusable markers.
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10.1,
        center: { lat: 31.357896523412904, lng: 34.30916933057565 },

    });
    // Set LatLng and title text for the markers. The first marker (Boynton Pass)
    // receives the initial focus when tab is pressed. Use arrow keys to
    // move between markers; press tab again to cycle through the map controls.
    const tourStops = [
        [{ lat: 31.53556148478513, lng: 34.45938391286651 }, "مستشفى العيون"],
        [{ lat: 31.524492474075085, lng: 34.44287678603589 }, "مجمع الشفاء الطبي"],
        // [{ lat: 34.832149, lng: -111.7695277 }, "Chapel of the Holy Cross"],
        // [{ lat: 34.823736, lng: -111.8001857 }, "Red Rock Crossing"],
        // [{ lat: 34.800326, lng: -111.7665047 }, "Bell Rock"],
    ];
    // Create an info window to share between markers.
    const infoWindow = new google.maps.InfoWindow();

    // Create the markers.
    tourStops.forEach(([position, title], i) => {
        const marker = new google.maps.Marker({
            position,
            map,
            title: `${i + 1}. ${title} `,
            label: `${i + 1}`,
            optimized: false,
        });

        // Add a click listener for each marker, and set up the info window.
        marker.addListener("click", () => {
            infoWindow.close();
            infoWindow.setContent(marker.getTitle());
            infoWindow.open(marker.getMap(), marker);
        });
    });
}

window.initMap = initMap;