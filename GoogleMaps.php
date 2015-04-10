<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=true">
    </script>
    <script type="text/javascript">
      var directionsDisplay;
      var directionsService = new google.maps.DirectionsService();
      var initialLocation;

      function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var mapOptions = {
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        directionsDisplay.setMap(map);

         if(navigator.geolocation) {
            browserSupportFlag = true;
            navigator.geolocation.getCurrentPosition(function(position) {
              initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
              map.setCenter(initialLocation);
              calcRoute();
            }, function() {
              handleNoGeolocation(browserSupportFlag);
            });
          }
          // Browser doesn't support Geolocation
          else {
            browserSupportFlag = false;
            handleNoGeolocation(browserSupportFlag);
            calcRoute();
          }

          function handleNoGeolocation(errorFlag) {
            if (errorFlag === true) {
              alert("Servico Geolocation falhado.");
              initialLocation = newyork;
            } else {
              alert("O ser browser não suporta a geolocalizacao.");
              initialLocation = siberia;
            }
            map.setCenter(initialLocation);
          }
      }

      function calcRoute() {
            var start = initialLocation;
            var end = new google.maps.LatLng(41.45309173510626, -8.289228438273543);
            var request = {
              origin:start,
              destination:end,
              travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function(result, status) {
              if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(result);
              }
          });
      }


      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"/>
  </body>
</html>