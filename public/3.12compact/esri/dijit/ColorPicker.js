// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.12/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/ColorPicker/templates/ColorPicker.html":'\x3cdiv class\x3d"${baseClass} ${baseClass}Container"\x3e\n  \x3cdiv class\x3d"${baseClass}Header" data-dojo-attach-point\x3d"dap_header"\x3e\n    \x3cspan class\x3d"${baseClass}SwatchPreview ${baseClass}Container"\x3e\n      \x3cspan class\x3d"${baseClass}Swatch ${baseClass}SwatchTransparencyBackground"\x3e\x3c/span\x3e\n      \x3cspan data-dojo-attach-point\x3d"dap_previewSwatch" class\x3d"${baseClass}Swatch"\x3e\x3c/span\x3e\n    \x3c/span\x3e\n  \x3c/div\x3e\n  \x3cdiv class\x3d"${baseClass}Middle"\x3e\n    \x3cdiv data-dojo-attach-point\x3d"dap_palette" class\x3d"${baseClass}Palette" title\x3d"${labels.paletteTooltip}"\x3e\x3c/div\x3e\n    \x3cdiv class\x3d"${baseClass}PaletteOptions"\x3e\n      \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/TextBox" data-dojo-attach-point\x3d"dap_hexInput" class\x3d"${baseClass}HexInput" title\x3d"${labels.hexInputTooltip}"/\x3e\n      \x3cinput class\x3d"${baseClass}PaletteToggle" type\x3d"button" data-dojo-type\x3d"dijit/form/ToggleButton" data-dojo-attach-point\x3d"dap_paletteToggle"/\x3e\n    \x3c/div\x3e\n  \x3c/div\x3e\n  \x3cdiv class\x3d"${baseClass}Footer" data-dojo-attach-point\x3d"dap_footer"\x3e\n    \x3cdiv data-dojo-attach-point\x3d"dap_recentColorSection"\x3e\n      \x3cdiv class\x3d"${baseClass}Label"\x3e${labels.recent}\x3c/div\x3e\n      \x3cdiv data-dojo-attach-point\x3d"dap_recentColorPalette" class\x3d"${baseClass}Palette"\x3e\x3c/div\x3e\n    \x3c/div\x3e\n\n    \x3cdiv data-dojo-attach-point\x3d"dap_transparencySection"\x3e\n      \x3cdiv class\x3d"${baseClass}Label"\x3e${labels.transparency}\x3c/div\x3e\n      \x3cdiv class\x3d"${baseClass}TransparencySlider"\n           data-dojo-attach-point\x3d"dap_transparencySlider"\n           data-dojo-type\x3d"esri/dijit/HorizontalSlider"\n           data-dojo-props\x3d"minimum: 0, maximum: 1, discreteValues: 100, labels: [\'0%\', \'50%\', \'100%\']"\x3e\n      \x3c/div\x3e\n    \x3c/div\x3e\n  \x3c/div\x3e\n\x3c/div\x3e\n'}});
define("esri/dijit/ColorPicker","../Color ../kernel ./ColorPicker/colorUtil ./ColorPicker/HexPalette dijit/_TemplatedMixin dijit/_WidgetBase dijit/_WidgetsInTemplateMixin dojo/_base/array dojo/_base/declare dojo/_base/lang dojo/dom-class dojo/dom-construct dojo/on dojo/query dojo/sniff dojo/dom-style dojo/i18n!../nls/jsapi dojo/text!./ColorPicker/templates/ColorPicker.html ../dijit/HorizontalSlider dijit/form/RadioButton dijit/form/TextBox dijit/form/ToggleButton dojo/NodeList-dom".split(" "),function(p,
u,f,s,m,v,w,l,x,g,h,q,n,r,t,k,y,z){m=x("esri.dijit.ColorPicker",[v,m,w],{_DEFAULT_COLORS_PER_ROW:13,templateString:z,labels:y.colorPicker,baseClass:"esriColorPicker",color:null,_required:!1,_activePalette:null,_recentColors:[],_showRecentColors:!0,_showTransparencySlider:!0,colorsPerRow:void 0,_brightsPalette:null,_pastelsPalette:null,_swatches:null,_colorInstance:null,_swatchCreator:null,_noColorSwatchNode:null,constructor:function(a,b){a=a||{};this._colorInstance=new p;this._brightsPalette=new s({colors:a.palette});
this._pastelsPalette=new s({colors:this._toPastels(this._brightsPalette.get("colors"))});this._activePalette=this._brightsPalette;this._swatchCreator=a.swatchCreator||this._createSwatch;a.hasOwnProperty("required")&&(this._required=a.required);a.hasOwnProperty("showRecentColors")&&(this._showRecentColors=a.showRecentColors);a.hasOwnProperty("showTransparencySlider")&&(this._showTransparencySlider=a.showTransparencySlider);a.color&&(a.color=f.normalizeColor(a.color));this.domNode=b;this.colorsPerRow=
0<a.colorsPerRow?a.colorsPerRow:this._DEFAULT_COLORS_PER_ROW;this._swatches=[]},_toPastels:function(a){var b=this._colorInstance,d=new p([238,238,238]);return l.map(a,function(a){return p.blendColors(b.setColor(a),d,0.2)},this)},_createSwatch:function(a){return q.create("span",{className:a.className,style:{background:a.hexColor||"transparent"}},a.paletteNode)},_createSwatches:function(){var a=this.baseClass+"Swatch",b=this.baseClass+"SwatchRow",d=this.dap_palette,c=this.colorsPerRow,e=this._activePalette.get("colors"),
f,g;l.forEach(e,function(e,h){0===h%c&&(f=q.create("div",{className:b},d));g=this._swatchCreator({className:a,hexColor:e,paletteNode:f});this._swatches.push(g)},this);if(this._showRecentColors)for(var e=this.baseClass+"Recent",h=q.create("div",{className:b+" "+e},this.dap_recentColorPalette),k=0;k<c;k++)g=this._swatchCreator({className:a+" "+e,paletteNode:h})},_selectColor:function(){var a=this.color||this._activePalette.get("colors")[0];this.set("color",a)},_updatePreviewSwatch:function(a){var b=
this.baseClass+"SwatchEmpty",d=this.dap_previewSwatch,c,e;"no-color"===a?(h.add(d,b),k.set(d,{backgroundColor:"",borderColor:""})):(c=f.getContrastingColor(a),e=8!==t("ie"),h.remove(d,b),b=a.toCss(e),c=c.toCss(e),c={backgroundColor:b,borderColor:c},e||(c.opacity=a.a),k.set(d,c))},_renderBrights:function(){this._renderColors(this._brightsPalette)},_renderColors:function(a){var b=a.get("colors"),d=this._swatches;l.forEach(b,function(a,b){b<d.length&&k.set(d[b],"backgroundColor",a)});this._activePalette=
a},_renderPastels:function(){this._renderColors(this._pastelsPalette)},_setColorFromSwatch:function(a){a=k.get(a,"backgroundColor");this.set("color",a)},_checkSelection:function(){var a=this.get("color");this._activePalette.hasColor(a)?this._highlightColor(a):this._clearSelection()},_addListeners:function(){var a="."+this.baseClass+"Swatch";this.own(n(this.dap_palette,n.selector(a,"click"),g.hitch(this,function(a){this._setColorFromSwatch(a.target)})));this.own(n(this.dap_recentColorPalette,n.selector(a,
"click"),g.hitch(this,function(a){this._setColorFromSwatch(a.target)})));this._required||this.own(n(this._noColorSwatchNode,"click",g.hitch(this,function(a){var b=a.target,e=this.baseClass+"Selected";this.set("color","no-color");h.add(b,e);this._silentlyUpdateHexInput("no-color");this.dap_transparencySlider.set("disabled",!0);a=this.on("color-change",g.hitch(this,function(){this.dap_transparencySlider.set("disabled",!1);h.remove(b,e)}));this.own(a)})));var b=this.dap_hexInput;b.on("blur",g.hitch(this,
function(){var a=f.normalizeHex(b.get("value"));this.set("color",a)}));b.on("change",g.hitch(this,function(){var a=f.normalizeHex(b.get("value"));f.isValidHex(a)&&(a=this._colorInstance.setColor(a),this._updatePreviewSwatch(a))}));this.dap_transparencySlider.on("change",g.hitch(this,function(a){var b=this.get("color");"no-color"!==b&&(b=f.normalizeColor(this._colorInstance.setColor(b)),b.a=1-a,this._updatePreviewSwatch(b),this._silentlyUpdateHexInput(b),this.set("color",b,!1))}));this.dap_paletteToggle.on("change",
g.hitch(this,function(a){a?this._renderPastels():this._renderBrights();this._checkSelection()}))},postCreate:function(){this.inherited(arguments);this._addListeners();this._selectColor();this.dap_transparencySlider.intermediateChanges=!0},startup:function(){this.inherited(arguments)},buildRendering:function(){this.inherited(arguments);this._createSwatches();var a=this.baseClass+"Swatch",b=this.baseClass+"SwatchEmpty";this._required||(this._noColorSwatchNode=q.create("div",{className:a+" "+b,title:this.labels.noColorTooltip},
this.dap_hexInput.domNode,"after"));a=this.baseClass+"DisplayNone";this._showTransparencySlider||h.add(this.dap_transparencySection,a);this._showRecentColors||h.add(this.dap_recentColorSection,a)},_silentlyUpdateHexInput:function(a){a="no-color"===a?"":a.toHex();this.dap_hexInput.set("value",a,!1)},_addRecentColor:function(a){if(a){var b=this._recentColors,d=l.indexOf(b,a);-1<d&&b.splice(d,1);b.unshift(a);b.length>this.colorsPerRow&&b.pop();this._renderRecentSwatches()}},_renderRecentSwatches:function(){if(this._recentColors){var a=
this.baseClass,b=r("."+(a+"Recent")+"."+(a+"Swatch"),this.dap_recentColorPalette);l.forEach(this._recentColors,function(a,c){c<b.length&&k.set(b[c],"backgroundColor",a)})}},_clearRecentSwatches:function(){var a=this.baseClass;r("."+(a+"Recent")+"."+(a+"Swatch"),this.dap_recentColorPalette).style("backgroundColor","")},_clearSelection:function(){var a=this.baseClass+"Selected";r("."+a,this.dap_palette).removeClass(a)},_highlightColor:function(a){var b=this.baseClass+"Selected",d=this._findColorSwatch(a);
d&&(a=f.normalizeColor(a),a=f.getContrastingColor(a),h.add(d,b),k.set(d,"borderColor",a.toHex()))},_findColorSwatch:function(a){var b=this._activePalette.get("colors");a=this._colorInstance.setColor(a).toHex();var b=l.indexOf(b,a),d;-1<b&&(d=this._swatches[b]);return d},_setColorAttr:function(a){if(a)if(!this._required&&"no-color"===a)this.dap_transparencySlider.set("disabled",!0),this._set("color","no-color"),this._clearSelection(),this._silentlyUpdateHexInput("no-color"),this._updatePreviewSwatch(a),
this.emit("color-change",{color:"no-color"});else{var b=f.normalizeColor(a),d=this._get("color"),c=this._colorInstance,e=this.baseClass+"Selected";if(d){c.setColor(d);if(f.equal(c,b))return;if(b=this._findColorSwatch(c))h.remove(b,e),k.set(b,"borderColor","")}c.setColor(a);a=c.toHex();this.dap_transparencySlider.set("value",1-c.a,!1);this._updatePreviewSwatch(c);this._highlightColor(c);this._silentlyUpdateHexInput(c);this._addRecentColor(a);this._set("color",c);this.emit("color-change",{color:new p(c)})}},
_setRecentAttr:function(a){this._recentColors=a||[];this._showRecentColors&&(this._recentColors=l.map(this._recentColors,function(a){return f.normalizeColor(a).toHex()}));0===this._recentColors.length?this._clearRecentSwatches():this._renderRecentSwatches()},_setPaletteAttr:function(a){var b=this._activePalette===this._brightsPalette;this._brightsPalette.set("colors",a);this._pastelsPalette.set("colors",this._toPastels(this._brightsPalette.get("colors")));this._activePalette=b?this._brightsPalette:
this._pastelsPalette;this._renderColors(this._activePalette)}});m.NO_COLOR="no-color";t("extend-esri")&&g.setObject("dijit.ColorPicker",m,u);return m});