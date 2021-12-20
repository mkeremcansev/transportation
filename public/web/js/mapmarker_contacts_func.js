		//set up markers 
		var myMarkers = {"markers": [
				{"latitude": "51.511732", "longitude":"-0.123270", "icon": "img/map-marker-contacts.png"}
			]
		};
		
		//set up map options
		$("#map_contact").mapmarker({
			zoom	: 13,
			center	: 'Covent Garden London',
			markers	: myMarkers
		});

