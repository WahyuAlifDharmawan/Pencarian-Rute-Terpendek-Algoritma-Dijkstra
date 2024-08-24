<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Location Tracking</title>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
</head>
<body>
    <div id="map"></div>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoid2h5ZGhyIiwiYSI6ImNscGJiOWphOTBjcGkyanBwZGk1bXViZHUifQ.V9qxRfUMBrQs2OVo_mgVaQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            zoom: 14
        });

        var marker;

        function updateMarker(position) {
            const lngLat = [position.coords.longitude, position.coords.latitude];
            if (marker) {
                marker.setLngLat(lngLat);
            } else {
                marker = new mapboxgl.Marker({ color: '#FF0000' })
                    .setLngLat(lngLat)
                    .addTo(map);
                map.setCenter(lngLat);
            }
        }

        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(updateMarker, function(error) {
                console.error('Error watching position:', error);
            }, { enableHighAccuracy: true });
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    </script>
</body>
</html>
