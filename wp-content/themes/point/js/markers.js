var jsonmarkers;
var markers = [];
function initialize() {
  var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(51.060000, 3.726115)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  $.each($(jsonmarkers), function(i, d) {
  	var myLatlng = new google.maps.LatLng(d.ypos,d.xpos);
  	var marker = new google.maps.Marker({
	    position: myLatlng,
	    title:"Hello World!",
	    map: map
	});
  	markers.push()
  });
  }

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
      'callback=initialize';
  document.body.appendChild(script);
}

window.onload = loadScript;