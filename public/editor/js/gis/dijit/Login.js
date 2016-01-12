define([
	'dojo/_base/declare',
    'dijit/_WidgetBase',
    'dijit/_TemplatedMixin',
    'dijit/_WidgetsInTemplateMixin',
    'gis/dijit/_FloatingWidgetMixin',
    'dojo/dom-construct',
    'dojo/on',
    'dojo/_base/lang',
    'dojo/aspect',
	'dojo/text!./Login/templates/LoginDialog.html',
    'dijit/form/Button',
	'dijit/layout/TabContainer',
	'dijit/layout/ContentPane',
	'xstyle/css!./Login/css/Login.css'
], function (declare, _WidgetBase, _TemplatedMixin, _WidgetsInTemplateMixin, _FloatingWidgetMixin, domConstruct, on, lang, aspect, template) {

	return declare([_WidgetBase, _TemplatedMixin, _WidgetsInTemplateMixin, _FloatingWidgetMixin], {
		widgetsInTemplate: true,
		templateString: template,
		title: 'Login',
		html: '<a href="cauth/login">Login</a>',
		domTarget: 'loginDijit',
		draggable: false,
		baseClass: 'loginDijit',
		postCreate: function () {
			this.inherited(arguments);
			this.parentWidget.draggable = this.draggable;
			if (this.parentWidget.toggleable) {
				this.own(aspect.after(this.parentWidget, 'toggle', lang.hitch(this, function () {
					this.containerNode.resize();
				})));
			} else {
				var login = domConstruct.place(this.html, this.domTarget);
				//on(login, 'click', lang.hitch(this.parentWidget, 'show'));
			}
		},
		onOpen: function () {
			//  Make sure the content is visible when the dialog
			//  is shown/opened. Something like this may be needed
			//  for all floating windows that don't open on startup?
			if (!this.openOnStartup) {
				this.containerNode.resize();
			}
		},
		close: function () {
			if (this.parentWidget.hide) {
				this.parentWidget.hide();
			}
		}
	});
});