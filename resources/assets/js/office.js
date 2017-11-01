var map = null;
var infoWindow = null;
var myLatlng = null;
var marker;
$(document).ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      $('#latitude').val(pos.lat);
      $('#longitude').val(pos.lng);

      myLatlng = new google.maps.LatLng(pos);

      var myOptions = {
        zoom: 18,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map($('#map_canvas').get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();

      marker = new google.maps.Marker({
        position: myLatlng,
        draggable: true,
        map: map,
        zoom: 18,
        title:'Arrastrar a la ubicacion del negocio',
      });

      google.maps.event.addListener(map, 'click', function(event){
        setMarker(event.latLng);
      });
    });
  }
});


function setMarker(location) {
  if ( marker ) {
    marker.setPosition(location);
  } else {
   marker = new google.maps.Marker({
    position: location,
    draggable: true,
    map: map,
    zoom: 18,
    title:'Arrastrar a la ubicacion del negocio',
  });
 }
 $('#latitude').val(marker.position.lat());
 $('#longitude').val(marker.position.lng());
}