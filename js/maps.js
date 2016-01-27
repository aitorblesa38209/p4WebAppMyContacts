var map, latitud, longitud;
var geocoder = new google.maps.Geocoder;
var infowindow = new google.maps.InfoWindow;
//funcion para iniciar el mapa
function initMap() {
  //se asigna la situación elegida (Hospitalet)
  var centro = new google.maps.LatLng(41.368115, 2.116750);

  // se genera la variable map que contiene el objeto mapa y sus características
  map = new google.maps.Map(document.getElementById('map',centro), {
    center: centro,
    zoom: 13
  });

  //se asigna un evento al mapa cuando se le hace click.
  google.maps.event.addListener(map, 'click', function(event) {
    //se asigna a los input latitud y longitud las coordenadas del click
    latitud = event.latLng.lat();
    longitud = event.latLng.lng()
    document.getElementById('latitud').value=latitud+", "+longitud;
    //document.getElementById('latitud').value=latitud;
    //document.getElementById('longitud').value=longitud;
    geocodeLatLng(geocoder, map, infowindow);
    });
}

function geocodeLatLng(geocoder, map, infowindow) {
  var input = document.getElementById('latitud').value;
  var latlngStr = input.split(',', 2);
  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(11);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}
