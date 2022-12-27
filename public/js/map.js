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
        [{ lat: 31.53940224912646, lng: 34.537889818316664 }, "مستشفى بيت حانون"],
        [{ lat: 31.535339596264432, lng: 34.509412878459194 }, "المستشفى الاندونيسي"],
        [{ lat: 31.533396462069064, lng: 34.45883711831664 }, "مستشفى النصر للأطفال"],
        [{ lat: 31.532335974974302, lng: 34.46135404530077 }, "مستشفى الرنتيسي"],
        [{ lat: 31.514973790631615, lng: 34.48034308949947 }, "مستشفى الشهيد محمد الدرة للاطفال"],
        [{ lat: 31.498939670588584, lng: 34.471569873526285 }, "مستشفى الحرازين"],
        [{ lat: 31.420475738125727, lng: 34.35970297413984 }, "مستشفى شهداء الأقصى"],
        [{ lat: 31.348068397681573, lng: 34.293265731813854 }, "مستشفى ناصر الطبي"],
        [{ lat: 31.303604754567882, lng: 34.320707560651165 }, "مستشفى غزة الأوروبي"],
        [{ lat: 31.307194947938612, lng: 34.245877431815025 }, "مستشفى الهلال الإماراتي"],
        [{ lat: 31.297218620975137, lng: 34.24346038424327 }, "مستشفى أبو يوسف النجار"],
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