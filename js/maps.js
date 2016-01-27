//funcion para iniciar el mapa
function initMap() {
  //se asigna la situación elegida (Hospitalet)
  var hospi = new google.maps.LatLng(41.368115, 2.116750);
  // se genera la variable map que contiene el objeto mapa y sus características
  var map = new google.maps.Map(document.getElementById('map',hospi), {
    center: hospi,
    zoom: 13
  });
  // se genera la variable marker que contiene el objeto marker y sus características
  var marker = new google.maps.Marker({
    map: map,
    position: hospi,
    title: 'Hello World!'
  });

  var posicion = marker.getPosition();

  //se asigna un evento al mapa cuando se le hace click.
  google.maps.event.addDomListener(map, 'click', function() {
    //muestra un alert con las coordenadas del click
    window.alert(map.getBounds());
    });

    //se crea la variable infowindow que contiene el objeto infowindow
  var infowindow = new google.maps.InfoWindow({
    content: 'texto'
  });
    // al hacer click sobre el marker, llama al objeto infowindow
  google.maps.event.addDomListener(marker, 'click', function() {
    infowindow.open(map,marker);
    });
}
