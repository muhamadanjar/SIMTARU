define({
	map: true,
	queries: [
		{
			description: 'Pencarian Lokasi',
			url: 'http://rsmm2104.com:6080/arcgis/rest/services/SIMTARU/PETA_SEBARAN_FASILITAS/MapServer',
			layerIds: [0],
			searchFields: ['poi_nama'],
			minChars: 2
		},
		{
			description: 'Pencarian Ijin Lokasi',
			url: 'http://rsmm2104.com:6080/arcgis/rest/services/SIMTARU/PETA_ILOK_KABUPATEN_BOGOR_2014/MapServer',
			layerIds: [0],
			searchFields: ['NAMA_PEMOHON','NAMA_PERUSAHAAN'],
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