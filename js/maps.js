//funcion para iniciar el mapa
function initMap() {
  //se asigna la situación elegida (Hospitalet)
  var hospi = new google.maps.LatLng(41.368115, 2.116750);
  // se genera la variable map que contiene el objeto mapa y sus características
  var map = new google.maps.Map(document.getElementById('map',hospi), {
    center: hospi,
    zoom: 13
  });

  //se asigna un evento al mapa cuando se le hace click.
  google.maps.event.addDomListener(map, 'click', function(event) {
    //muestra un alert con las coordenadas del click
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    document.getElementById('latitud').value=lat;
    document.getElementById('longitud').value=lng;
    crearMarker(map,lat,lng);

    });
}

function crearMarker(mapa,latitud,longitud){
  //se genera la variable marker que contiene el objeto marker y sus características
  var marker = new google.maps.Marker({
    map: map,
    position: hospi,
    title: 'Hello World!'
  });

}
