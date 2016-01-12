define({
	map: true,
	mapClickMode: true,
	mapRightClickMenu: true,
	identifyLayerInfos: true,
	identifyTolerance: 5,

	// config object definition:
	//	{<layer id>:{
	//		<sub layer number>:{
	//			<pop-up definition, see link below>
	//			}
	//		},
	//	<layer id>:{
	//		<sub layer number>:{
	//			<pop-up definition, see link below>
	//			}
	//		}
	//	}

	// for details on pop-up definition see: https://developers.arcgis.com/javascript/jshelp/intro_popuptemplate.html

	identifies: idn/*{

		'LKPP_Paket_Konstruksi_Publik':{
			0: {
				
				fieldInfos: [{
					fieldName: 'OBJECTID',
					label: 'ID',
					visible: true
				},{
					fieldName: 'ID_PAKET',
					label: 'No Paket',
					visible: true
				},{
					fieldName: 'Nama_Paket',
					label: 'Nama Paket',
					visible: true
				}],
				//showAttachments: true,	
				mediaInfos: [{
					title: 'Paket Konstruksi Publik',
					caption: '',
					type: 'image',
					value: {
						sourceURL: 'http://partmapservices.ina-sdi.or.id:6080/arcgis/rest/services/LKPP/LKPP_Paket_Konstruksi_Publik/MapServer/0/1/attachments/{OBJECTID}',
						linkURL: '{Location URL}'
					}
				}]
			}
		},
		
		
	}*/
});