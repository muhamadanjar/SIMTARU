define({
	map: true,
    mapRightClickMenu: true,
    options: {
        //routeTaskUrl: 'http://partmapservices.ina-sdi.or.id:6080/arcgis/rest/services/KOTABOGOR/NetworkAnalystRute/NAServer/Route',
        routeTaskUrl: 'http://192.168.0.31:6080/arcgis/rest/services/SIMTARU/ROUTE/NAServer/Route',
        routeParams: {
            directionsLanguage: 'en-US',
            //directionsLengthUnits: units.KILOMETERS
        },
        active: false //for 3.12, starts active by default, which we dont want as it interfears with mapClickMode
    }
});