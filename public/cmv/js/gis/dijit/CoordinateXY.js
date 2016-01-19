define([
    "dojo/_base/declare",
    "dijit/_WidgetBase",
    "dijit/_TemplatedMixin",

    "dojo/dom",
    'dojo/_base/lang',
	'dojo/_base/array',


    'esri/layers/GraphicsLayer',
	'esri/graphic',
	'esri/renderers/SimpleRenderer',
	'esri/symbols/SimpleMarkerSymbol',
	'esri/symbols/SimpleLineSymbol',
	'esri/symbols/SimpleFillSymbol',
	'esri/graphicsUtils',
	"esri/geometry/Point", 
	"esri/SpatialReference",
    
    "dojo/text!./CoordinateXY/templates/CoordinateXY.html",
    'dojo/i18n!./CoordinateXY/nls/resource',

    'dijit/form/Form',
    'dijit/form/FilteringSelect',
    'dijit/form/ValidationTextBox',
    'dijit/form/NumberTextBox',
    'dijit/form/Button',
    'dijit/form/CheckBox',
    'dijit/ProgressBar',
    'dijit/form/DropDownButton',
    'dijit/TooltipDialog',
    'dijit/form/RadioButton',
    'xstyle/css!./CoordinateXY/css/CoordinateXY.css'
], function(declare, _WidgetBase, _TemplatedMixin,
	dom,lang, array,
	GraphicsLayer, Graphic, SimpleRenderer, SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, graphicsUtils,
	Point,SpatialReference,
	template,i18n) {
 
    return declare([_WidgetBase, _TemplatedMixin], {
    	widgetsInTemplate: true,
        templateString: template,
        i18n: i18n,
        
        spatialReference: null,
        baseClass: 'gis_CoordinateXYDijit',
        defaultSymbols: {
			point: {
				type: 'esriSMS',
				style: 'esriSMSCircle',
				size: 25,
				color: [0, 255, 100, 32],
				angle: 0,
				xoffset: 0,
				yoffset: 0,
				outline: {
					type: 'esriSLS',
					style: 'esriSLSSolid',
					color: [0, 255, 255, 255],
					width: 2
				}
			},
			
		},
        postCreate: function (argument) {
        	this.inherited(arguments);

			if (this.spatialReference === null) {
				this.spatialReference = this.map.spatialReference.wkid;
			}
			if (this.pointExtentSize === null) {
				if (this.spatialReference === 4326) { // special case for geographic lat/lng
					this.pointExtentSize = 0.0001;
				} else {
					this.pointExtentSize = 500; // could be feet or meters
				}
			}

			this.createGraphicLayers();

			
        },
        createGraphicLayers: function () {
			var pointSymbol = null
			var pointRenderer = null

			var symbols = lang.mixin({}, this.symbols);
			// handle each property to preserve as much of the object heirarchy as possible
			symbols = {
				point: lang.mixin(this.defaultSymbols.point, symbols.point),
				
			};

			// points
			this.pointGraphics = new GraphicsLayer({
				id: 'coordGraphics_point',
				title: 'Kordinat'
			});

			if (symbols.point) {
				pointSymbol = new SimpleMarkerSymbol(symbols.point);
				pointRenderer = new SimpleRenderer(pointSymbol);
				pointRenderer.label = 'Find Results (Points)';
				pointRenderer.description = 'Find results (Points)';
				this.pointGraphics.setRenderer(pointRenderer);
			}

			
			this.map.addLayer(this.pointGraphics);
		},
        coordinate: function () {
        	console.log('coordinate');
        	XText = this.XTextDijit.value;
        	YText = this.YTextDijit.value;
        	console.log('X'+XText+' Y'+YText);
        	maxZoom = this.map.getMaxZoom();
        	console.log(this.spatialReference)  
        	var point = new Point([XText,YText],new SpatialReference({ wkid:4326 }));
    		this.map.centerAndZoom(point,this.map.getZoom()+3); 
    		//centerAndZoom 
        },
        clearResults: function () {
			console.log(this.coordinateXYFormDijit);
			
			this.clearFeatures();
		},
		clearFeatures: function () {
			this.pointGraphics.clear();
			
		},

		highlightFeatures: function () {
			var unique = 0;
			array.forEach(this.results, function (result) {
				// add a unique key for the store
				result.id = unique;
				unique++;
				var graphic, feature = result.feature;
				switch (feature.geometry.type) {
				case 'point':
					// only add points to the map that have an X/Y
					if (feature.geometry.x && feature.geometry.y) {
						graphic = new Graphic(feature.geometry);
						this.pointGraphics.add(graphic);
					}
					break;
				case 'polyline':
					// only add polylines to the map that have paths
					if (feature.geometry.paths && feature.geometry.paths.length > 0) {
						graphic = new Graphic(feature.geometry);
						this.polylineGraphics.add(graphic);
					}
					break;
				case 'polygon':
					// only add polygons to the map that have rings
					if (feature.geometry.rings && feature.geometry.rings.length > 0) {
						graphic = new Graphic(feature.geometry, null, {
							ren: 1
						});
						this.polygonGraphics.add(graphic);
					}
					break;
				default:
				}
			}, this);

			// zoom to layer extent
			var zoomExtent = null;
			//If the layer is a single point then extents are null
			// if there are no features in the layer then extents are null
			// the result of union() to null extents is null

			if (this.pointGraphics.graphics.length > 0) {
				zoomExtent = this.getPointFeaturesExtent(this.pointGraphics.graphics);
			}
			if (this.polylineGraphics.graphics.length > 0) {
				if (zoomExtent === null) {
					zoomExtent = graphicsUtils.graphicsExtent(this.polylineGraphics.graphics);
				} else {
					zoomExtent = zoomExtent.union(graphicsUtils.graphicsExtent(this.polylineGraphics.graphics));
				}
			}
			if (this.polygonGraphics.graphics.length > 0) {
				if (zoomExtent === null) {
					zoomExtent = graphicsUtils.graphicsExtent(this.polygonGraphics.graphics);
				} else {
					zoomExtent = zoomExtent.union(graphicsUtils.graphicsExtent(this.polygonGraphics.graphics));
				}
			}

			if (zoomExtent) {
				this.zoomToExtent(zoomExtent);
			}
		},
    });
});