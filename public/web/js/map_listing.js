(function (A) {
	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function (action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
		};

})(Array.prototype);

var
	mapObject,
	markers = [],
	markersData = {
		'Doctors': [
			{
				name: 'Dr. Jhoanna Steel',
				location_latitude: 48.873792,
				location_longitude: 2.295028,
				map_image_url: 'img/doctor_listing_1.jpg',
				type: 'Psicologist - Pediatrician',
				url_detail: 'detail-page.html',
				name_point: 'Dr. Jhoanna Steel',
				description_point: '35 Newtownards Road, Belfast, BT4.',
				get_directions_start_address: '',
				phone: '+3934245255'
			},
			{
				name: 'Dr. Robert Carl',
				location_latitude: 48.800040,
				location_longitude: 2.139670,
				map_image_url: 'img/doctor_listing_1.jpg',
				type: 'Psicologist',
				url_detail: 'detail-page.html',
				name_point: 'Dr. Robert Carl',
				description_point: '35 Newtownards Road, Belfast, BT4.',
				get_directions_start_address: '',
				phone: '+3934245255'
			},
			{
				name: 'Dr. Mark Twain',
				location_latitude: 48.846222,
				location_longitude: 2.346414,
				map_image_url: 'img/doctor_listing_1.jpg',
				type: 'Primary Care',
				url_detail: 'detail-page.html',
				name_point: 'Dr. Mark Twain',
				description_point: '35 Newtownards Road, Belfast, BT4.',
				get_directions_start_address: '',
				phone: '+3934245255'
			}
		]

	};

var mapOptions = {
	zoom: 10,
	center: new google.maps.LatLng(48.865633, 2.321236),
	mapTypeId: google.maps.MapTypeId.ROADMAP,

	mapTypeControl: false,
	mapTypeControlOptions: {
		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		position: google.maps.ControlPosition.LEFT_CENTER
	},
	panControl: false,
	panControlOptions: {
		position: google.maps.ControlPosition.TOP_RIGHT
	},
	zoomControl: true,
	zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.RIGHT_BOTTOM
	},
	scrollwheel: false,
	scaleControl: false,
	scaleControlOptions: {
		position: google.maps.ControlPosition.LEFT_CENTER
	},
	streetViewControl: true,
	streetViewControlOptions: {
		position: google.maps.ControlPosition.RIGHT_BOTTOM
	},
	styles: [
		{
			"featureType": "landscape",
			"stylers": [
				{
					"hue": "#FFBB00"
				},
				{
					"saturation": 43.400000000000006
				},
				{
					"lightness": 37.599999999999994
				},
				{
					"gamma": 1
				}
			]
		},
		{
			"featureType": "road.highway",
			"stylers": [
				{
					"hue": "#FFC200"
				},
				{
					"saturation": -61.8
				},
				{
					"lightness": 45.599999999999994
				},
				{
					"gamma": 1
				}
			]
		},
		{
			"featureType": "road.arterial",
			"stylers": [
				{
					"hue": "#FF0300"
				},
				{
					"saturation": -100
				},
				{
					"lightness": 51.19999999999999
				},
				{
					"gamma": 1
				}
			]
		},
		{
			"featureType": "road.local",
			"stylers": [
				{
					"hue": "#FF0300"
				},
				{
					"saturation": -100
				},
				{
					"lightness": 52
				},
				{
					"gamma": 1
				}
			]
		},
		{
			"featureType": "water",
			"stylers": [
				{
					"hue": "#0078FF"
				},
				{
					"saturation": -13.200000000000003
				},
				{
					"lightness": 2.4000000000000057
				},
				{
					"gamma": 1
				}
			]
		},
		{
			"featureType": "poi",
			"stylers": [
				{
					"hue": "#00FF6A"
				},
				{
					"saturation": -1.0989010989011234
				},
				{
					"lightness": 11.200000000000017
				},
				{
					"gamma": 1
				}
			]
		}
	]
};
var
	marker;
mapObject = new google.maps.Map(document.getElementById('map_listing'), mapOptions);
for (var key in markersData)
	markersData[key].forEach(function (item) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
			map: mapObject,
			icon: 'img/pins/' + key + '.png',
		});

		if ('undefined' === typeof markers[key])
			markers[key] = [];
		markers[key].push(marker);
		google.maps.event.addListener(marker, 'click', (function () {
			closeInfoBox();
			getInfoBox(item).open(mapObject, this);
			mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
		}));


	});

function hideAllMarkers() {
	for (var key in markers)
		markers[key].forEach(function (marker) {
			marker.setMap(null);
		});
};

function toggleMarkers(category) {
	hideAllMarkers();
	closeInfoBox();

	if ('undefined' === typeof markers[category])
		return false;
	markers[category].forEach(function (marker) {
		marker.setMap(mapObject);
		marker.setAnimation(google.maps.Animation.DROP);

	});
};

new MarkerClusterer(mapObject, markers[key]);

function hideAllMarkers() {
	for (var key in markers)
		markers[key].forEach(function (marker) {
			marker.setMap(null);
		});
};

function closeInfoBox() {
	$('div.infoBox').remove();
};

function getInfoBox(item) {
	return new InfoBox({
		content:
			'<div class="marker_info">' +
			'<figure><a href=' + item.url_detail + '><img src="' + item.map_image_url + '" alt="Image"></a></figure>' +
			'<small>' + item.type + '</small>' +
			'<h3><a href=' + item.url_detail + '>' + item.name_point + '</a></h3>' +
			'<span>' + item.description_point + '</span>' +
			'<div class="marker_tools">' +
			'<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="' + item.get_directions_start_address + '" type="hidden"><input type="hidden" name="daddr" value="' + item.location_latitude + ',' + item.location_longitude + '"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>' +
			'<a href="tel://' + item.phone + '" class="btn_infobox_phone">' + item.phone + '</a>' +
			'</div>' +
			'</div>',
		disableAutoPan: false,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(10, 105),
		closeBoxMargin: '',
		closeBoxURL: "img/close_infobox.png",
		isHidden: false,
		alignBottom: true,
		pane: 'floatPane',
		enableEventPropagation: true
	});
};

function onHtmlClick(location_type, key) {
	google.maps.event.trigger(markers[location_type][key], "click");
}