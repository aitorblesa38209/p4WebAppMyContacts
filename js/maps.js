var map, latitud, longitud, direccion;

function initMap() {
  var centro = new google.maps.LatLng(41.368115, 2.116750);
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: centro,
  });

  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

google.maps.event.addListener(map, 'click', function(event) {
    //se asigna a los input latitud y longitud las coordenadas del click
    latitud = event.latLng.lat();
    longitud = event.latLng.lng()
    document.getElementById('coordenadas').value=latitud+","+longitud;
    geocodeLatLng(geocoder, map, infowindow);

    });
}

//funció de geolocalització
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
        window.alert('No hay resultados');
      }
    } else {
      window.alert('Geocoder ha fallado: ' + status);
    }
  });
}

//funció per mostrar els usuaris seleccionats al mapa
function mostrarMarker(json, usuario, map){
  usuario = usuario - 1;
  var input = json[usuario].con_coordenadas;
  var latlngStr = input.split(',', 2);
  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    animation: google.maps.Animation.DROP
  });
  var info = new google.maps.InfoWindow({
    content: json[usuario].con_nombre + "<br/>" + json[usuario].con_direccion + "<br/>" + json[usuario].con_telefono
  });
  info.open(map, marker);
}
