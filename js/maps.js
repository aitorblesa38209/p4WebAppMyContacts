var map;
//iniciar mapa
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: 41.350035, , lng: 2.107802}
  });

  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

  google.maps.event.addListener(map, 'click', function(event) {
      //se asigna a los input latitud y longitud las coordenadas del click
      latitud = event.latLng.lat();
      longitud = event.latLng.lng()
      document.getElementById('coordenadas').value=latitud+", "+longitud;
      document.getElementById('lat').value=latitud;
      document.getElementById('lng').value=longitud;
      //document.getElementById('latitud').value=latitud;
     // document.getElementById('longitud').value=longitud;
      geocodeLatLng(geocoder, map, infowindow);
      });

      generarMarkets(json);
  }

  function geocodeLatLng(geocoder, map, infowindow) {
    var input = document.getElementById('coordenadas').value;
    var latlngStr = input.split(',', 2);
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        if (results[1]) {
          var marker = new google.maps.Marker({
            position: latlng,
            map: map
          });
          direccion = results[1].formatted_address;
          infowindow.setContent(direccion);
          document.getElementById('direccion').value=direccion;

          infowindow.open(map, marker);
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
  }

  function generarMarkets(json) {
    for (var i = 0; i < marcadores.length; i++) {
      var myLatLng = new google.maps.LatLng(json[i].con_latitud, json[i].con_longitud);
      var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: marcadores[i][0],
});
