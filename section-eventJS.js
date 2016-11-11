/**
 * 
 */

var gmap_canvas;
 
function onLoadBody_section_event() {
	initElements_section_event();
	
	initMap_section_event();
}

function initElements_section_event() {
	gmap_canvas = document.getElementById("gmap_canvas");
}

function initMap_section_event() {
	if(typeof google === 'undefined') {
		gmap_canvas.style.height = 'auto';
		gmap_canvas.innerHTML = '<h3><strong><a href="http://goo.gl/maps/4uxub">Klik disini</a></strong></h3>';
	}
	else {
		var myOptions = {
							zoom:14, 
							center: new google.maps.LatLng(-7.781221,110.359603),
							mapTypeId: google.maps.MapTypeId.TERRAIN
						};
		map = new google.maps.Map(gmap_canvas, myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-7.7846537, 110.3546905)});
		infowindow = new google.maps.InfoWindow({content:"<small>Klik disini!<small>"}).open(map, marker);
		google.maps.event.addListener(marker, "click", function() {window.open("http://goo.gl/maps/4uxub");});
	}
}