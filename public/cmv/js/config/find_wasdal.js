define({
	map: true,
	queries: [
		{
			description: 'Sebaran Survey',
			url: 'http://silver-pc:6080/arcgis/rest/services/WASDAL/PETA_TEMATIK/MapServer',
			layerIds: [0],
			searchFields: ['Toponimi'],
			minChars: 2
		},
		{
			description: 'BANGUNAN',
			url: 'http://silver-pc:6080/arcgis/rest/services/WASDAL/PETA_TEMATIK/MapServer',
			layerIds: [0],
			searchFields: ['KECAMATAN','DESA '],
			minChars: 2
		},
		/*
		{
			description: 'Find Incident By Code/Description',
			url: 'http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/PublicSafety/PublicSafetyOperationalLayers/MapServer',
			layerIds: [15, 17, 18],
			searchFields: ['FCODE', 'DESCRIPTION'],
			minChars: 4
		}*/
	]
});