
/**
 * Initialize
 *
 * Adds a listener to be notified when the document is ready
 * (before onload and before images are loaded).
 * Shorthand of Ext.EventManager.onDocumentReady.
 *
 * @param {Function} fn The method the event invokes.
 * @param {Object} scope (optional) The scope (this reference) in which the handler function executes. Defaults to the browser window.
 * @param {Boolean} options (optional) Options object as passed to {@link Ext.Element#addListener}. It is recommended that the options
 * {single: true} be used so that the handler is removed on first invocation.
 *
 * @return void
 */
Ext.onReady(function() {
		// Instantiate new viewport
	var viewport = new TYPO3.Form.Wizard.Viewport({});
		// When the window is resized, the viewport has to be resized as well
	Ext.EventManager.onWindowResize(viewport.doLayout, viewport);
});

Ext.apply(Ext, {
	merge: function(o, c) {
		if (o && c && typeof c == 'object') {
			for (var p in c){
				if ((typeof o[p] == 'object') && (typeof c[p] == 'object')) {
					Ext.merge(o[p], c[p]);
				} else {
					o[p] = c[p];
				}
			}
		}
		return o;
	},
	mergeIf: function(o, c) {
		if (o && c && typeof c == 'object') {
			for (var p in c){
				if ((typeof o[p] == 'object') && (typeof c[p] == 'object')) {
					Ext.mergeIf(o[p], c[p]);
				} else if (typeof o[p] == 'undefined') {
					o[p] = c[p];
				}
			}
		}
		return o;
	}
});
Ext.apply(Ext, {
	isEmptyObject: function(o) {
		for(var p in o) {
			return false;
		};
		return true;
	}
});
/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
/**
 * @class Ext.ux.Spinner
 * @extends Ext.util.Observable
 * Creates a Spinner control utilized by Ext.ux.form.SpinnerField
 */
Ext.ux.Spinner = Ext.extend(Ext.util.Observable, {
	incrementValue: 1,
	alternateIncrementValue: 5,
	triggerClass: 'x-form-spinner-trigger',
	splitterClass: 'x-form-spinner-splitter',
	alternateKey: Ext.EventObject.shiftKey,
	defaultValue: 0,
	accelerate: false,

	constructor: function(config){
		Ext.ux.Spinner.superclass.constructor.call(this, config);
		Ext.apply(this, config);
		this.mimicing = false;
	},

	init: function(field){
		this.field = field;

		field.afterMethod('onRender', this.doRender, this);
		field.afterMethod('onEnable', this.doEnable, this);
		field.afterMethod('onDisable', this.doDisable, this);
		field.afterMethod('afterRender', this.doAfterRender, this);
		field.afterMethod('onResize', this.doResize, this);
		field.afterMethod('onFocus', this.doFocus, this);
		field.beforeMethod('onDestroy', this.doDestroy, this);
	},

	doRender: function(ct, position){
		var el = this.el = this.field.getEl();
		var f = this.field;

		if (!f.wrap) {
			f.wrap = this.wrap = el.wrap({
				cls: "x-form-field-wrap"
			});
		}
		else {
			this.wrap = f.wrap.addClass('x-form-field-wrap');
		}

		this.trigger = this.wrap.createChild({
			tag: "img",
			src: Ext.BLANK_IMAGE_URL,
			cls: "x-form-trigger " + this.triggerClass
		});

		if (!f.width) {
			this.wrap.setWidth(el.getWidth() + this.trigger.getWidth());
		}

		this.splitter = this.wrap.createChild({
			tag: 'div',
			cls: this.splitterClass,
			style: 'width:13px; height:2px;'
		});
		this.splitter.setRight((Ext.isIE) ? 1 : 2).setTop(10).show();

		this.proxy = this.trigger.createProxy('', this.splitter, true);
		this.proxy.addClass("x-form-spinner-proxy");
		this.proxy.setStyle('left', '0px');
		this.proxy.setSize(14, 1);
		this.proxy.hide();
		this.dd = new Ext.dd.DDProxy(this.splitter.dom.id, "SpinnerDrag", {
			dragElId: this.proxy.id
		});

		this.initTrigger();
		this.initSpinner();
	},

	doAfterRender: function(){
		var y;
		if (Ext.isIE && this.el.getY() != (y = this.trigger.getY())) {
			this.el.position();
			this.el.setY(y);
		}
	},

	doEnable: function(){
		if (this.wrap) {
			this.disabled = false;
			this.wrap.removeClass(this.field.disabledClass);
		}
	},

	doDisable: function(){
		if (this.wrap) {
			this.disabled = true;
			this.wrap.addClass(this.field.disabledClass);
			this.el.removeClass(this.field.disabledClass);
		}
	},

	doResize: function(w, h){
		if (typeof w == 'number') {
			this.el.setWidth(w - this.trigger.getWidth());
		}
		this.wrap.setWidth(this.el.getWidth() + this.trigger.getWidth());
	},

	doFocus: function(){
		if (!this.mimicing) {
			this.wrap.addClass('x-trigger-wrap-focus');
			this.mimicing = true;
			Ext.get(Ext.isIE ? document.body : document).on("mousedown", this.mimicBlur, this, {
				delay: 10
			});
			this.el.on('keydown', this.checkTab, this);
		}
	},

	// private
	checkTab: function(e){
		if (e.getKey() == e.TAB) {
			this.triggerBlur();
		}
	},

	// private
	mimicBlur: function(e){
		if (!this.wrap.contains(e.target) && this.field.validateBlur(e)) {
			this.triggerBlur();
		}
	},

	// private
	triggerBlur: function(){
		this.mimicing = false;
		Ext.get(Ext.isIE ? document.body : document).un("mousedown", this.mimicBlur, this);
		this.el.un("keydown", this.checkTab, this);
		this.field.beforeBlur();
		this.wrap.removeClass('x-trigger-wrap-focus');
		this.field.onBlur.call(this.field);
	},

	initTrigger: function(){
		this.trigger.addClassOnOver('x-form-trigger-over');
		this.trigger.addClassOnClick('x-form-trigger-click');
	},

	initSpinner: function(){
		this.field.addEvents({
			'spin': true,
			'spinup': true,
			'spindown': true
		});

		this.keyNav = new Ext.KeyNav(this.el, {
			"up": function(e){
				e.preventDefault();
				this.onSpinUp();
			},

			"down": function(e){
				e.preventDefault();
				this.onSpinDown();
			},

			"pageUp": function(e){
				e.preventDefault();
				this.onSpinUpAlternate();
			},

			"pageDown": function(e){
				e.preventDefault();
				this.onSpinDownAlternate();
			},

			scope: this
		});

		this.repeater = new Ext.util.ClickRepeater(this.trigger, {
			accelerate: this.accelerate
		});
		this.field.mon(this.repeater, "click", this.onTriggerClick, this, {
			preventDefault: true
		});

		this.field.mon(this.trigger, {
			mouseover: this.onMouseOver,
			mouseout: this.onMouseOut,
			mousemove: this.onMouseMove,
			mousedown: this.onMouseDown,
			mouseup: this.onMouseUp,
			scope: this,
			preventDefault: true
		});

		this.field.mon(this.wrap, "mousewheel", this.handleMouseWheel, this);

		this.dd.setXConstraint(0, 0, 10);
		this.dd.setYConstraint(1500, 1500, 10);
		this.dd.endDrag = this.endDrag.createDelegate(this);
		this.dd.startDrag = this.startDrag.createDelegate(this);
		this.dd.onDrag = this.onDrag.createDelegate(this);
	},

	onMouseOver: function(){
		if (this.disabled) {
			return;
		}
		var middle = this.getMiddle();
		this.tmpHoverClass = (Ext.EventObject.getPageY() < middle) ? 'x-form-spinner-overup' : 'x-form-spinner-overdown';
		this.trigger.addClass(this.tmpHoverClass);
	},

	//private
	onMouseOut: function(){
		this.trigger.removeClass(this.tmpHoverClass);
	},

	//private
	onMouseMove: function(){
		if (this.disabled) {
			return;
		}
		var middle = this.getMiddle();
		if (((Ext.EventObject.getPageY() > middle) && this.tmpHoverClass == "x-form-spinner-overup") ||
		((Ext.EventObject.getPageY() < middle) && this.tmpHoverClass == "x-form-spinner-overdown")) {
		}
	},

	//private
	onMouseDown: function(){
		if (this.disabled) {
			return;
		}
		var middle = this.getMiddle();
		this.tmpClickClass = (Ext.EventObject.getPageY() < middle) ? 'x-form-spinner-clickup' : 'x-form-spinner-clickdown';
		this.trigger.addClass(this.tmpClickClass);
	},

	//private
	onMouseUp: function(){
		this.trigger.removeClass(this.tmpClickClass);
	},

	//private
	onTriggerClick: function(){
		if (this.disabled || this.el.dom.readOnly) {
			return;
		}
		var middle = this.getMiddle();
		var ud = (Ext.EventObject.getPageY() < middle) ? 'Up' : 'Down';
		this['onSpin' + ud]();
	},

	//private
	getMiddle: function(){
		var t = this.trigger.getTop();
		var h = this.trigger.getHeight();
		var middle = t + (h / 2);
		return middle;
	},

	//private
	//checks if control is allowed to spin
	isSpinnable: function(){
		if (this.disabled || this.el.dom.readOnly) {
			Ext.EventObject.preventDefault(); //prevent scrolling when disabled/readonly
			return false;
		}
		return true;
	},

	handleMouseWheel: function(e){
		//disable scrolling when not focused
		if (this.wrap.hasClass('x-trigger-wrap-focus') == false) {
			return;
		}

		var delta = e.getWheelDelta();
		if (delta > 0) {
			this.onSpinUp();
			e.stopEvent();
		} else {
			if (delta < 0) {
				this.onSpinDown();
				e.stopEvent();
			}
		}
	},

	//private
	startDrag: function(){
		this.proxy.show();
		this._previousY = Ext.fly(this.dd.getDragEl()).getTop();
	},

	//private
	endDrag: function(){
		this.proxy.hide();
	},

	//private
	onDrag: function(){
		if (this.disabled) {
			return;
		}
		var y = Ext.fly(this.dd.getDragEl()).getTop();
		var ud = '';

		if (this._previousY > y) {
			ud = 'Up';
		} //up
		if (this._previousY < y) {
			ud = 'Down';
		} //down
		if (ud != '') {
			this['onSpin' + ud]();
		}

		this._previousY = y;
	},

	//private
	onSpinUp: function(){
		if (this.isSpinnable() == false) {
			return;
		}
		if (Ext.EventObject.shiftKey == true) {
			this.onSpinUpAlternate();
			return;
		}
		else {
			this.spin(false, false);
		}
		this.field.fireEvent("spin", this.field);
		this.field.fireEvent("spinup", this.field);
	},

	//private
	onSpinDown: function(){
		if (this.isSpinnable() == false) {
			return;
		}
		if (Ext.EventObject.shiftKey == true) {
			this.onSpinDownAlternate();
			return;
		}
		else {
			this.spin(true, false);
		}
		this.field.fireEvent("spin", this.field);
		this.field.fireEvent("spindown", this.field);
	},

	//private
	onSpinUpAlternate: function(){
		if (this.isSpinnable() == false) {
			return;
		}
		this.spin(false, true);
		this.field.fireEvent("spin", this);
		this.field.fireEvent("spinup", this);
	},

	//private
	onSpinDownAlternate: function(){
		if (this.isSpinnable() == false) {
			return;
		}
		this.spin(true, true);
		this.field.fireEvent("spin", this);
		this.field.fireEvent("spindown", this);
	},

	spin: function(down, alternate){
		var v = parseFloat(this.field.getValue());
		var incr = (alternate == true) ? this.alternateIncrementValue : this.incrementValue;
		(down == true) ? v -= incr : v += incr;

		v = (isNaN(v)) ? this.defaultValue : v;
		v = this.fixBoundaries(v);
		this.field.setRawValue(v);
	},

	fixBoundaries: function(value){
		var v = value;

		if (this.field.minValue != undefined && v < this.field.minValue) {
			v = this.field.minValue;
		}
		if (this.field.maxValue != undefined && v > this.field.maxValue) {
			v = this.field.maxValue;
		}

		return this.fixPrecision(v);
	},

	// private
	fixPrecision: function(value){
		var nan = isNaN(value);
		if (!this.field.allowDecimals || this.field.decimalPrecision == -1 || nan || !value) {
			return nan ? '' : value;
		}
		return parseFloat(parseFloat(value).toFixed(this.field.decimalPrecision));
	},

	doDestroy: function(){
		if (this.trigger) {
			this.trigger.remove();
		}
		if (this.wrap) {
			this.wrap.remove();
			delete this.field.wrap;
		}

		if (this.splitter) {
			this.splitter.remove();
		}

		if (this.dd) {
			this.dd.unreg();
			this.dd = null;
		}

		if (this.proxy) {
			this.proxy.remove();
		}

		if (this.repeater) {
			this.repeater.purgeListeners();
		}
		if (this.mimicing){
			Ext.get(Ext.isIE ? document.body : document).un("mousedown", this.mimicBlur, this);
		}
	}
});

//backwards compat
Ext.form.Spinner = Ext.ux.Spinner;
/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
Ext.ns('Ext.ux.form');

/**
 * @class Ext.ux.form.SpinnerField
 * @extends Ext.form.NumberField
 * Creates a field utilizing Ext.ux.Spinner
 * @xtype spinnerfield
 */
Ext.ux.form.SpinnerField = Ext.extend(Ext.form.NumberField, {
	actionMode: 'wrap',
	deferHeight: true,
	autoSize: Ext.emptyFn,
	// onBlur function shall use the inherited handler function
	// onBlur: Ext.emptyFn,
	adjustSize: Ext.BoxComponent.prototype.adjustSize,

	constructor: function(config) {
		var spinnerConfig = Ext.copyTo({}, config, 'incrementValue,alternateIncrementValue,accelerate,defaultValue,triggerClass,splitterClass');

		var spl = this.spinner = new Ext.ux.Spinner(spinnerConfig);

		var plugins = config.plugins
			? (Ext.isArray(config.plugins)
				? config.plugins.push(spl)
				: [config.plugins, spl])
			: spl;

		Ext.ux.form.SpinnerField.superclass.constructor.call(this, Ext.apply(config, {plugins: plugins}));
	},

	// private
	getResizeEl: function(){
		return this.wrap;
	},

	// private
	getPositionEl: function(){
		return this.wrap;
	},

	// private
	alignErrorIcon: function(){
		if (this.wrap) {
			this.errorIcon.alignTo(this.wrap, 'tl-tr', [2, 0]);
		}
	},

	validateBlur: function(){
		return true;
	}
});

Ext.reg('spinnerfield', Ext.ux.form.SpinnerField);

//backwards compat
Ext.form.SpinnerField = Ext.ux.form.SpinnerField;

/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
Ext.ns('Ext.ux.form');

/**
 * @class Ext.ux.form.TextFieldSubmit
 * @extends Ext.form.TriggerField
 * Creates a text field with a submit trigger button
 * @xtype textfieldsubmit
 */
Ext.ux.form.TextFieldSubmit = Ext.extend(Ext.form.TriggerField, {
	hideTrigger: true,

	triggerClass: 'x-form-submit-trigger',

	enableKeyEvents: true,

	onTriggerClick: function() {
		this.setHideTrigger(true);
		if (this.isValid()) {
			this.fireEvent('triggerclick', this);
		} else {
			this.setValue(this.startValue);
		}
	},

	initEvents: function() {
		Ext.ux.form.TextFieldSubmit.superclass.initEvents.call(this);
		this.on('keyup', function(field, event) {
			if (event.getKey() != event.ENTER && this.isValid()) {
				this.setHideTrigger(false);
			} else {
				this.setHideTrigger(true);
			}
		});
		this.on('keypress', function(field, event) {
			if (event.getKey() == event.ENTER) {
				event.stopEvent();
				this.onTriggerClick();
			}
		}, this);
	}
});

Ext.reg('textfieldsubmit', Ext.ux.form.TextFieldSubmit);

//backwards compat
Ext.form.TextFieldSubmit = Ext.ux.form.TextFieldSubmit;

Ext.ns('Ext.ux.form');

/**
 * @class Ext.ux.form.ValueCheckbox
 * @extends Ext.form.Checkbox
 * getValue returns inputValue when checked
 *
 * @see TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes.initComponent
 * @xtype typo3-form-wizard-valuecheckbox
 */
Ext.ux.form.ValueCheckbox = Ext.extend(Ext.form.Checkbox, {

	getValue : function(){
		var checked = Ext.ux.form.ValueCheckbox.superclass.getValue.call(this);
		if(this.inputValue !== undefined && checked)
			return this.inputValue;
		return checked;
	}
});

Ext.reg('typo3-form-wizard-valuecheckbox', Ext.ux.form.ValueCheckbox);

/*!
 * Ext JS Library 3.1.1
 * Copyright(c) 2006-2010 Ext JS, LLC
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.ns('Ext.ux.grid');

/**
 * @class Ext.ux.grid.CheckColumn
 * @extends Object
 * GridPanel plugin to add a column with check boxes to a grid.
 * <p>Example usage:</p>
 * <pre><code>
// create the column
var checkColumn = new Ext.grid.CheckColumn({
   header: 'Indoor?',
   dataIndex: 'indoor',
   id: 'check',
   width: 55
});

// add the column to the column model
var cm = new Ext.grid.ColumnModel([{
	   header: 'Foo',
	   ...
	},
	checkColumn
]);

// create the grid
var grid = new Ext.grid.EditorGridPanel({
	...
	cm: cm,
	plugins: [checkColumn], // include plugin
	...
});
 * </code></pre>
 * In addition to storing a Boolean value within the record data, this
 * class toggles a css class between <tt>'x-grid3-check-col'</tt> and
 * <tt>'x-grid3-check-col-on'</tt> to alter the background image used for
 * a column.
 */
Ext.ux.grid.CheckColumn = function(config){
	Ext.apply(this, config);
	if(!this.id){
		this.id = Ext.id();
	}
	this.renderer = this.renderer.createDelegate(this);
};

Ext.ux.grid.CheckColumn.prototype ={
	init : function(grid){
		this.grid = grid;
		this.grid.on('render', function(){
			var view = this.grid.getView();
			view.mainBody.on('mousedown', this.onMouseDown, this);
		}, this);
	},

	onMouseDown : function(e, t){
		if(Ext.fly(t).hasClass(this.createId())){
			e.stopEvent();
			var index = this.grid.getView().findRowIndex(t);
			var record = this.grid.store.getAt(index);
			record.set(this.dataIndex, !record.data[this.dataIndex]);
		}
	},

	renderer : function(v, p, record){
		p.css += ' x-grid3-check-col-td';
		return String.format('<div class="x-grid3-check-col{0} {1}">&#160;</div>', v ? '-on' : '', this.createId());
	},

	createId : function(){
		return 'x-grid3-cc-' + this.id;
	}
};

// register ptype
Ext.preg('checkcolumn', Ext.ux.grid.CheckColumn);

// backwards compat
Ext.grid.CheckColumn = Ext.ux.grid.CheckColumn;
Ext.ux.grid.SingleSelectCheckColumn = Ext.extend(Ext.ux.grid.CheckColumn, {
	onMouseDown : function(e, t){
		if(Ext.fly(t).hasClass('x-grid3-cc-'+this.id)){
			e.stopEvent();
			var index = this.grid.getView().findRowIndex(t),
				dataIndex = this.dataIndex;
			this.grid.store.each(function(record, i){
				var value = (i == index && record.get(dataIndex) != true);
				if(value != record.get(dataIndex)){
					record.set(dataIndex, value);
				}
			});
		}
	}
});
/**
 */
Ext.ns('Ext.ux.grid');

Ext.ux.grid.ItemDeleter = Ext.extend(Ext.grid.RowSelectionModel, {
	width: 25,
	sortable: false,
	dataIndex: 0, // this is needed, otherwise there will be an error

	menuDisabled: true,
	fixed: true,
	id: 'deleter',
	header: TYPO3.l10n.localize('fieldoptions_delete'),

	initEvents: function(){
		Ext.ux.grid.ItemDeleter.superclass.initEvents.call(this);
		this.grid.on('cellclick', function(grid, rowIndex, columnIndex, e){
			if(columnIndex==grid.getColumnModel().getIndexById('deleter')) {
				var record = grid.getStore().getAt(rowIndex);
				grid.getStore().remove(record);
				grid.getView().refresh();
			}
		});
	},

	renderer: function(v, p, record, rowIndex){
		return '<div class="remove">&nbsp;</div>';
	}
});

Ext.namespace('TYPO3.Form.Wizard.Helpers');

TYPO3.Form.Wizard.Helpers.History = Ext.extend(Ext.util.Observable, {
	/**
	 * @cfg {Integer} maximum
	 * Maximum steps to go back or forward in history
	 */
	maximum: 20,

	/**
	 * @cfg {Integer} marker
	 * The current step in the history
	 */
	marker: 0,

	/**
	 * @cfg {Array} history
	 * Holds the configuration for each step in history
	 */
	history: [],

	/**
	 * #cfg {String} undoButtonId
	 * The id of the undo button
	 */
	undoButtonId: 'formwizard-history-undo',

	/**
	 * #cfg {String} redoButtonId
	 * The id of the redo button
	 */
	redoButtonId: 'formwizard-history-redo',

	/**
	 * Constructor
	 *
	 * @param config
	 */
	constructor: function(config){
			// Call our superclass constructor to complete construction process.
		TYPO3.Form.Wizard.Helpers.History.superclass.constructor.call(this, config);
	},

	/**
	 * Called when a component is added to a container or there was a change in
	 * one of the form components
	 *
	 * Gets the configuration of all (nested) components, starting at
	 * viewport-right, and adds this configuration to the history
	 *
	 * @returns {void}
	 */
	setHistory: function() {
		var configuration = Ext.getCmp('formwizard-right').getConfiguration();
		this.addToHistory(configuration);
	},

	/**
	 * Add a snapshot to the history
	 *
	 * @param {Object} configuration The form configuration snapshot
	 * @return {void}
	 */
	addToHistory: function(configuration) {
		while (this.history.length > this.marker) {
			this.history.pop();
		}
		this.history.push(Ext.encode(configuration));
		while (this.history.length > this.maximum) {
			this.history.shift();
		}
		this.marker = this.history.length;
		this.buttons();
	},

	/**
	 * Get the current snapshot from the history
	 *
	 * @return {Object} The current snapshot
	 */
	refresh: function() {
		var refreshObject = Ext.decode(this.history[this.marker-1]);
		Ext.getCmp('formwizard-right').loadConfiguration(refreshObject);
	},

	/**
	 * Get the previous snapshot from the history if available
	 *
	 * Unsets the active element, because this element will not be available anymore
	 *
	 * @return {Object} The previous snapshot
	 */
	undo: function() {
		if (this.marker >= 1) {
			this.marker--;
			var undoObject = Ext.decode(this.history[this.marker-1]);
			this.buttons();
			Ext.getCmp('formwizard-right').loadConfiguration(undoObject);
			TYPO3.Form.Wizard.Helpers.Element.unsetActive();
		}
	},

	/**
	 * Get the next snapshot from the history if available
	 *
	 * Unsets the active element, because this element will not be available anymore
	 *
	 * @return {Object} The next snapshot
	 */
	redo: function() {
		if (this.history.length > this.marker) {
			this.marker++;
			var redoObject = Ext.decode(this.history[this.marker-1]);
			this.buttons();
			Ext.getCmp('formwizard-right').loadConfiguration(redoObject);
			TYPO3.Form.Wizard.Helpers.Element.unsetActive();
		}
	},

	/**
	 * Turn the undo/redo buttons on or off
	 * according to marker in the history
	 *
	 * @return {void}
	 */
	buttons: function() {
		var undoButton = Ext.get(this.undoButtonId);
		var redoButton = Ext.get(this.redoButtonId);
		if (this.marker > 1) {
			undoButton.show();
		} else {
			undoButton.hide();
		}
		if (this.history.length > this.marker) {
			redoButton.show();
		} else {
			redoButton.hide();
		}
	}
});

TYPO3.Form.Wizard.Helpers.History = new TYPO3.Form.Wizard.Helpers.History();
Ext.namespace('TYPO3.Form.Wizard.Helpers');

TYPO3.Form.Wizard.Helpers.Element = Ext.extend(Ext.util.Observable, {
	/**
	 * @cfg {Object} active
	 * The current active form element
	 */
	active: null,

	/**
	 * Constructor
	 *
	 * @param config
	 */
	constructor: function(config){
			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'setactive': true
		});

			// Call our superclass constructor to complete construction process.
		TYPO3.Form.Wizard.Helpers.Element.superclass.constructor.call(this, config);
	},

	/**
	 * Fires the setactive event when a component is set as active
	 *
	 * @param component
	 */
	setActive: function(component) {
		var optionsTabIsValid = Ext.getCmp('formwizard-left-options').tabIsValid();

		if (optionsTabIsValid) {
			if (component == this.active) {
				this.active = null;
			} else {
				this.active = component;
			}
			this.fireEvent('setactive', this.active);
		} else {
			Ext.MessageBox.show({
				title: TYPO3.l10n.localize('options_error'),
				msg: TYPO3.l10n.localize('options_error_message'),
				icon: Ext.MessageBox.ERROR,
				buttons: Ext.MessageBox.OK
			});
		}
	},

	/**
	 * Fires the setactive event when a component is unset.
	 *
	 * This means when the element is destroyed or when the form is reloaded
	 * using undo or redo
	 *
	 * @param component
	 */
	unsetActive: function(component) {
		if (
			this.active && (
				(component && component.getId() == this.active.getId()) ||
				!component
			)
		){
			this.active = null;
			this.fireEvent('setactive');
		}
	}
});

TYPO3.Form.Wizard.Helpers.Element = new TYPO3.Form.Wizard.Helpers.Element();
Ext.namespace('TYPO3.Form.Wizard');

/**
 * Button group to show on top of the form elements
 *
 * Most elements contain buttons to delete or edit the item. These buttons are
 * grouped in this component
 *
 * @class TYPO3.Form.Wizard.ButtonGroup
 * @extends Ext.Container
 */
TYPO3.Form.Wizard.ButtonGroup = Ext.extend(Ext.Container, {
	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'buttongroup',

	/**
	 * @cfg {Object|Function} defaults
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		xtype: 'button',
		template: new Ext.Template(
			'<span id="{4}"><button type="{0}" class="{3}"></button></span>'
		),
		tooltipType: 'title'
	},

	/** @cfg {Boolean} forceLayout
	 * If true the container will force a layout initially even if hidden or
	 * collapsed. This option is useful for forcing forms to render in collapsed
	 * or hidden containers. (defaults to false).
	 */
	forceLayout: true,

	/**
	 * Constructor
	 */
	initComponent: function() {
		var config = {
			items: [
				{
					iconCls: 't3-icon t3-icon-actions t3-icon-actions-edit t3-icon-edit-delete',
					tooltip: TYPO3.l10n.localize('elements_button_delete'),
					handler: this.removeElement,
					scope: this
				}, {
					iconCls: 't3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-open',
					tooltip: TYPO3.l10n.localize('elements_button_edit'),
					handler: this.setActive,
					scope: this
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.ButtonGroup.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Called by the click event of the remove button
	 *
	 * When clicking the remove button a confirmation will be asked by the
	 * container this button group is in.
	 */
	removeElement: function(button, event) {
		event.stopPropagation();
		this.ownerCt.confirmDeleteElement();
	},

	/**
	 * Called by the click event of the edit button
	 *
	 * Tells the element helper that this component is set as the active one
	 */
	setActive: function(button, event) {
		this.ownerCt.setActive(event, event.getTarget());
	}
});

Ext.reg('typo3-form-wizard-buttongroup', TYPO3.Form.Wizard.ButtonGroup);
Ext.namespace('TYPO3.Form.Wizard');

/**
 * Container abstract
 *
 * There are only two containers in a form, the form itself and fieldsets.
 *
 * @class TYPO3.Form.Wizard.Elements.Container
 * @extends Ext.Container
 */
TYPO3.Form.Wizard.Container = Ext.extend(Ext.Container, {
	/**
	 * @cfg {Mixed} autoEl
	 * A tag name or DomHelper spec used to create the Element which will
	 * encapsulate this Component.
	 */
	autoEl: 'ol',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'formwizard-container',

	/**
	 * @cfg {Object|Function} defaults
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		autoHeight: true
	},

	/**
	 * Constructor
	 *
	 * Add the dummy to the container
	 */
	constructor: function(config) {
		Ext.apply(this, {
			items: [
				{
					xtype: 'typo3-form-wizard-elements-dummy'
				}
			]
		});
		TYPO3.Form.Wizard.Container.superclass.constructor.apply(this, arguments);
	},


	/**
	 * Constructor
	 */
	initComponent: function() {
		var config = {};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Container.superclass.initComponent.apply(this, arguments);

			// Initialize the drag and drop zone after rendering
		if (this.hasDragAndDrop) {
			this.on('render', this.initializeDragAndDrop, this);
		}

		this.on('render', this.checkOnEmpty, this);

			// Initialize the remove event, which will be fired when a component is removed from this container
		this.on('remove', this.checkOnEmpty, this);
	},

	/**
	 * Initialize the drag and drop zones
	 *
	 * @param container
	 */
	initializeDragAndDrop: function(container) {
		/**
		 * Initialize the drag zone
		 *
		 * A container can contain elements which can be moved within this and
		 * other (nested) containers.
		 */
		container.dragZone = new Ext.dd.DragZone(container.getEl(), {
			/**
			 * Called when a mousedown occurs in this container. Looks in Ext.dd.Registry
			 * for a valid target to drag based on the mouse down. Override this method
			 * to provide your own lookup logic (e.g. finding a child by class name). Make sure your returned
			 * object has a "ddel" attribute (with an HTML Element) for other functions to work.
			 * @param {EventObject} element The mouse down event element
			 * @return {Object} The dragData
			 */
			getDragData: function(element) {
				var sourceElement = element.getTarget('.formwizard-element');
				var sourceComponent = Ext.getCmp(sourceElement.id);
				if (sourceElement && sourceComponent.isEditable) {
					clonedElement = sourceElement.cloneNode(true);
					clonedElement.id = Ext.id();
					return container.dragData = {
						sourceEl: sourceElement,
						repairXY: Ext.fly(sourceElement).getXY(),
						ddel: clonedElement
					};
				}
			},

			onStartDrag: function(x, y) {
				Ext.getCmp('formwizard').addClass('hover-move');
			},

			endDrag: function(event) {
				Ext.getCmp('formwizard').removeClass('hover-move');
			},

			/**
			 * Called before a repair of an invalid drop to get the XY to animate to.
			 * By default returns the XY of this.dragData.ddel
			 * @param {EventObject} e The mouse up event
			 * @return {Array} The xy location (e.g. [100, 200])
			 */
			getRepairXY: function(e) {
				return container.dragData.repairXY;
			}
		});

		/**
		 * Initialize the drop zone
		 *
		 * A container can receive other form elements or other (nested) containers.
		 */
		container.dropZone = new Ext.dd.DropZone(container.getEl(), {
			/**
			 * Returns a custom data object associated with the DOM node that is the target of the event.  By default
			 * this looks up the event target in the Ext.dd.Registry, although you can override this method to
			 * provide your own custom lookup.
			 *
			 * The override has been done here to define if we are having this event on the container or a form element.
			 *
			 * @param {Event} e The event
			 * @return {Object} data The custom data
			 */
			getTargetFromEvent: function(event) {

				var containerElement = container.getEl();
				var formElementTarget = event.getTarget('.formwizard-element', 10, true);
				var formContainerTarget = event.getTarget('.formwizard-container', 10, true);
				var placeholderTarget = event.getTarget('#element-placeholder', 10, false);

				if (placeholderTarget) {
					formElementTarget = Ext.DomQuery.selectNode('.target-hover');
				}

				if (
					container.hasDragAndDrop &&
					formContainerTarget &&
					formElementTarget &&
					formContainerTarget.findParentNode('li', 10, true) == formElementTarget &&
					formContainerTarget == containerElement
				) {
					return null;
					// We are having this event on a form element
				} else if (
					container.hasDragAndDrop &&
					formElementTarget
				) {
					if (placeholderTarget) {
						return formElementTarget;
					}
					return event.getTarget('.formwizard-element');
					// We are having this event on a container
				} else {
					return null;
				}
			},

			/**
			 * Called while the DropZone determines that a Ext.dd.DragSource is being dragged over it,
			 * but not over any of its registered drop nodes.  The default implementation returns this.dropNotAllowed, so
			 * it should be overridden to provide the proper feedback if necessary.
			 *
			 * And so we did ;-) We are not using containers which can receive different elements, so we always return
			 * Ext.dd.DropZone.prototype.dropAllowed CSS class.
			 *
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 * @return {String} status The CSS class that communicates the drop status back to the source so that the
			 * underlying Ext.dd.StatusProxy can be updated
			 */
			onContainerOver: function(dd, e, data) {
				if (Ext.get('element-placeholder')) {
					Ext.get('element-placeholder').remove();
				}
				return Ext.dd.DropZone.prototype.dropAllowed;
			},

			/**
			 * Called when the DropZone determines that a Ext.dd.DragSource has been dropped on it,
			 * but not on any of its registered drop nodes.  The default implementation returns false, so it should be
			 * overridden to provide the appropriate processing of the drop event if you need the drop zone itself to
			 * be able to accept drops.  It should return true when valid so that the drag source's repair action does not run.
			 *
			 * This is a tricky part. Because we are using multiple dropzones which are on top of each other, the event will
			 * be called multiple times, for each group one time. We cannot prevent this by disabling event bubbling and we
			 * dont't want to override the core of ExtJS. To prevent multiple creation of the same object, we add the variable
			 * 'processed' to the 'data' object. If it has been processed on drop, it will not be done a second time.
			 *
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 * @return {Boolean} True if the drop was valid, else false
			 */
			onContainerDrop: function(dd, e, data) {
				if (
					container.hasDragAndDrop &&
					!data.processed
				) {
					var dropComponent = Ext.getCmp(data.sourceEl.id);
					container.dropElement(dropComponent, 'container');
					data.processed = true;
				}
				return true;
			},

			/**
			 * Called when the DropZone determines that a Ext.dd.DragSource has entered a drop node
			 * that has either been registered or detected by a configured implementation of getTargetFromEvent.
			 * This method has no default implementation and should be overridden to provide
			 * node-specific processing if necessary.
			 *
			 * Our implementation adds a dummy placeholder before or after the element the user is hovering over.
			 * This placeholder will show the user where the dragged element will be dropped in the form.
			 *
			 * @param {Object} nodeData The custom data associated with the drop node (this is the same value returned from
			 * getTargetFromEvent for this node)
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 */
			onNodeEnter : function(target, dd, e, data) {
				if (
					Ext.get(data.sourceEl).hasClass('formwizard-element') &&
					target.id != data.sourceEl.id
				) {
					var dropPosition = this.getDropPosition(target, dd);
					if (dropPosition == 'above') {
						Ext.DomHelper.insertBefore(target, {
							tag: 'li',
							id: 'element-placeholder',
							html: '&nbsp;'
						});
					} else {
						Ext.DomHelper.insertAfter(target, {
							tag: 'li',
							id: 'element-placeholder',
							html: '&nbsp;'
						});
					}
					Ext.fly(target).addClass('target-hover');
				}
			},

			/**
			 * Called when the DropZone determines that a Ext.dd.DragSource has been dragged out of
			 * the drop node without dropping.  This method has no default implementation and should be overridden to provide
			 * node-specific processing if necessary.
			 *
			 * Removes the temporary placeholder and the hover class from the element
			 *
			 * @param {Object} nodeData The custom data associated with the drop node (this is the same value returned from
			 * getTargetFromEvent for this node)
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 */
			onNodeOut : function(target, dd, e, data) {
				if (
						Ext.get(data.sourceEl).hasClass('formwizard-element') &&
						target.id != data.sourceEl.id
					) {
					if (e.type != 'mouseup') {
						if (Ext.get('element-placeholder')) {
							Ext.get('element-placeholder').remove();
						}
						Ext.fly(target).removeClass('target-hover');
					}
				}
			},

			/**
			 * Called while the DropZone determines that a Ext.dd.DragSource is over a drop node
			 * that has either been registered or detected by a configured implementation of getTargetFromEvent.
			 * The default implementation returns this.dropNotAllowed, so it should be
			 * overridden to provide the proper feedback.
			 *
			 * Based on the cursor position on the node we are hovering over, the temporary placeholder will be put
			 * above or below this node. If the position changes, the placeholder will be removed and put at the
			 * right spot.
			 *
			 * @param {Object} nodeData The custom data associated with the drop node (this is the same value returned from
			 * getTargetFromEvent for this node)
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 * @return {String} status The CSS class that communicates the drop status back to the source so that the
			 * underlying Ext.dd.StatusProxy can be updated
			 */
			onNodeOver: function(target, dd, e, data) {
				if (
						Ext.get(data.sourceEl).hasClass('formwizard-element') &&
						target.id != data.sourceEl.id
				) {
					var dropPosition = this.getDropPosition(target, dd);
						// The position of the target moved to the top
					if (
						dropPosition == 'above' &&
						target.nextElementSibling &&
						target.nextElementSibling.id == 'element-placeholder'
					) {
						Ext.get('element-placeholder').remove();
						Ext.DomHelper.insertBefore(target, {
							tag: 'li',
							id: 'element-placeholder',
							html: '&nbsp;'
						});
					} else if (
						dropPosition == 'below' &&
						target.previousElementSibling &&
						target.previousElementSibling.id == 'element-placeholder'
					) {
						Ext.get('element-placeholder').remove();
						Ext.DomHelper.insertAfter(target, {
							tag: 'li',
							id: 'element-placeholder',
							html: '&nbsp;'
						});
					}
					return Ext.dd.DropZone.prototype.dropAllowed;
				} else {
					return Ext.dd.DropZone.prototype.dropNotAllowed;
				}
			},

			/**
			 * Called when the DropZone determines that a Ext.dd.DragSource has been dropped onto
			 * the drop node.  The default implementation returns false, so it should be overridden to provide the
			 * appropriate processing of the drop event and return true so that the drag source's repair action does not run.
			 *
			 * Like onContainerDrop this is a tricky part. Because we are using multiple dropzones which are on top of each other, the event will
			 * be called multiple times, for each group one time. We cannot prevent this by disabling event bubbling and we
			 * dont't want to override the core of ExtJS. To prevent multiple creation of the same object, we add the variable
			 * 'processed' to the 'data' object. If it has been processed on drop, it will not be done a second time.
			 *
			 *
			 * @param {Object} nodeData The custom data associated with the drop node (this is the same value returned from
			 * getTargetFromEvent for this node)
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @param {Event} e The event
			 * @param {Object} data An object containing arbitrary data supplied by the drag source
			 * @return {Boolean} True if the drop was valid, else false
			 */
			onNodeDrop : function(target, dd, e, data) {
				if (
					Ext.get(data.sourceEl).hasClass('formwizard-element') &&
					target.id != data.sourceEl.id &&
					!data.processed
				) {

					var dropPosition = this.getDropPosition(target, dd);
					var dropComponent = Ext.getCmp(data.sourceEl.id);
					container.dropElement(dropComponent, dropPosition, target);
					data.processed = true;
					return true;
				}
			},
			/**
			 * Defines whether we are hovering at the top or bottom half of a node
			 *
			 * @param {Object} nodeData The custom data associated with the drop node (this is the same value returned from
			 * getTargetFromEvent for this node)
			 * @param {Ext.dd.DragSource} source The drag source that was dragged over this drop zone
			 * @return {String} above when hovering over the top half, below if at the bottom half.
			 */
			getDropPosition: function(target, dd) {
				var top = Ext.lib.Dom.getY(target);
				var bottom = top + target.offsetHeight;
				var center = ((bottom - top) / 2) + top;
				var yPosition = dd.lastPageY + dd.deltaY;
				if (yPosition < center) {
					return 'above';
				} else if (yPosition >= center) {
					return 'below';
				}
			}
		});
	},

	/**
	 * Called by the dropzones onContainerDrop or onNodeDrop.
	 * Adds the component to the container.
	 *
	 * This function will look if it is a new element from the left buttons, if
	 * it is an existing element which is moved within this or from another
	 * container. It also decides if it is dropped within an empty container or
	 * if it needs a position within the existing elements of this container.
	 *
	 * @param component
	 * @param position
	 * @param target
	 */
	dropElement: function(component, position, target) {
			// Check if there are errors in the current active element
		var optionsTabIsValid = Ext.getCmp('formwizard-left-options').tabIsValid();

		var id = component.id;
		var droppedElement = {};

		if (Ext.get('element-placeholder')) {
			Ext.get('element-placeholder').remove();
		}
			// Only add or move an element when there is no error in the current active element
		if (optionsTabIsValid) {
				// New element in container
			if (position == 'container') {
					// Check if the dummy is present, which means there are no elements
				var dummy = this.findById('dummy');
				if (dummy) {
					this.remove(dummy, true);
				}
					// Add the new element to the container
				if (component.xtype != 'button') {
					droppedElement = this.add(
						component
					);
				} else {
					droppedElement = this.add({
						xtype: 'typo3-form-wizard-elements-' + id
					});
				}

				// Moved an element within this container
			} else if (this.findById(id)) {
				droppedElement = this.findById(id);
				var movedElementIndex = 0;
				var targetIndex = this.items.findIndex('id', target.id);

				if (position == 'above') {
					movedElementIndex = targetIndex;
				} else {
					movedElementIndex = targetIndex + 1;
				}

					// Tricky part, because this.remove does not remove the DOM element
					// See http://www.sencha.com/forum/showthread.php?102190
					// 1. remove component from container w/o destroying (2nd argument false)
					// 2. remove component's element from container and append it to body
					// 3. add/insert the component to the correct place back in the container
					// 4. call doLayout() on the container
				this.remove(droppedElement, false);
				var element = Ext.get(droppedElement.id);
				element.appendTo(Ext.getBody());

				this.insert(
					movedElementIndex,
					droppedElement
				);

				// New element for this container coming from another one
			} else {
				var index = 0;
				var targetIndex = this.items.findIndex('id', target.id);

				if (position == 'above') {
					index = targetIndex;
				} else {
					index = targetIndex + 1;
				}

					// Element moved
				if (component.xtype != 'button') {
					droppedElement = this.insert(
						index,
						component
					);
					// Coming from buttons
				} else {
					droppedElement = this.insert(
						index,
						{
							xtype: 'typo3-form-wizard-elements-' + id
						}
					);
				}
			}
			this.doLayout();
			TYPO3.Form.Wizard.Helpers.History.setHistory();
			TYPO3.Form.Wizard.Helpers.Element.setActive(droppedElement);

			// The current active element has errors, show it!
		} else {
			Ext.MessageBox.show({
				title: TYPO3.l10n.localize('options_error'),
				msg: TYPO3.l10n.localize('options_error_message'),
				icon: Ext.MessageBox.ERROR,
				buttons: Ext.MessageBox.OK
			});
		}
	},

	/**
	 * Remove the element from this container
	 *
	 * @param element
	 */
	removeElement: function(element) {
		this.remove(element);
		TYPO3.Form.Wizard.Helpers.History.setHistory();
	},

	/**
	 * Called by the 'remove' event of this container.
	 *
	 * If an item has been removed from this container, except for the dummy
	 * element, it will look if there are other items existing. If not, it will
	 * put the dummy in this container to tell the user the container needs items.
	 *
	 * @param container
	 * @param component
	 */
	checkOnEmpty: function(container, component) {
		if (component && component.id != 'dummy' || !component) {
			if (this.items.getCount() == 0) {
				this.add({
					xtype: 'typo3-form-wizard-elements-dummy'
				});
				this.doLayout();
			}
		}
	},

	/**
	 * Called by the parent of this component when a change has been made in the
	 * form.
	 *
	 * Constructs an array out of this component and the children to add it to
	 * the history or to use when saving the form
	 *
	 * @returns {Array}
	 */
	getConfiguration: function() {
		var historyConfiguration = {
			hasDragAndDrop: this.hasDragAndDrop
		};

		if (this.items) {
			historyConfiguration.items = [];
			this.items.each(function(item, index, length) {
				historyConfiguration.items.push(item.getConfiguration());
			}, this);
		}
		return historyConfiguration;
	}
});

Ext.reg('typo3-form-wizard-container', TYPO3.Form.Wizard.Container);
Ext.namespace('TYPO3.Form.Wizard.Elements');

/**
 * Elements abstract
 *
 * @class TYPO3.Form.Wizard.Elements
 * @extends Ext.Container
 */
TYPO3.Form.Wizard.Elements = Ext.extend(Ext.Container, {
	/**
	 * @cfg {Mixed} autoEl
	 * A tag name or DomHelper spec used to create the Element which will
	 * encapsulate this Component.
	 */
	autoEl: 'li',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'formwizard-element',

	/**
	 * @cfg {Object} buttonGroup
	 * Reference to the button group
	 */
	buttonGroup: null,

	/**
	 * @cfg {Boolean} isEditable
	 * Defines whether the element is editable. If the item is editable,
	 * a button group with remove and edit buttons will be added to this element
	 * and when the the element is clicked, an event is triggered to edit the
	 * element. Some elements, like the dummy, don't need this.
	 */
	isEditable: true,

	/**
	 * @cfg {Object} configuration
	 * The configuration of this element.
	 * This object contains the configuration of this component. It will be
	 * copied to the 'data' variable before rendering. 'data' is deleted after
	 * rendering the xtemplate, so we need a copy.
	 */
	configuration: {},

	/**
	 * Constructor
	 */
	initComponent: function() {
		this.addEvents({
			'configurationChange': true
		});

		var config = {};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Elements.superclass.initComponent.apply(this, arguments);

			// Add the elementClass to the component
		this.addClass(this.elementClass);

			// Add the listener setactive for the element helper
		TYPO3.Form.Wizard.Helpers.Element.on('setactive', this.toggleActive, this);

			// Set the data before rendering
		this.on('beforerender', this.beforeRender, this);

			// Initialize events after rendering
		this.on('afterrender', this.makeEditable, this);

			// Remove event listeners after the detruction of this component
		this.on('destroy', this.onDestroy, this);
	},

	/**
	 * Copy this.configuration to this.data before rendering
	 *
	 * When using tpl together with data, the data variable will be deleted
	 * after rendering the component. We do not want to lose this data, so we
	 * store it in a different variable 'configuration' which will be copied to
	 * data just before rendering
	 *
	 * All strings within the configuration object are HTML encoded first before
	 * displaying
	 *
	 * @param component This component
	 */
	beforeRender: function(component) {
		this.data = this.encodeConfiguration(this.configuration);
	},

	/**
	 * Html encode all strings in the configuration of an element
	 *
	 * @param unencodedData The configuration object
	 * @returns {Object}
	 */
	encodeConfiguration: function(unencodedData) {
		var encodedData = {};

		Ext.iterate(unencodedData, function (key, value, object) {
			if (Ext.isString(value)) {
				encodedData[key] = Ext.util.Format.htmlEncode(value);
			} else if (Ext.isObject(value)) {
				encodedData[key] = this.encodeConfiguration(value);
			} else {
				encodedData[key] = value;
			}
		}, this);

		return encodedData;
	},

	/**
	 * Add the buttongroup and a click event listener to this component when the
	 * component is editable.
	 */
	makeEditable: function() {
		if (this.isEditable) {
			if (!this.buttonGroup) {
				this.add({
					xtype: 'typo3-form-wizard-buttongroup',
					ref: 'buttonGroup'
				});
			}
			this.el.un('click', this.setActive, this);
			this.el.on('click', this.setActive, this);
				// Add hover class. Normally this would be done with overCls,
				// but this does not take bubbling (propagation) into account
			this.el.hover(
				function(){
					Ext.fly(this).addClass('hover');
				},
				function(){
					Ext.fly(this).removeClass('hover');
				},
				this.el,
				{
					stopPropagation: true
				}
			);
		}
	},

	/**
	 * Called on a click event of this component or when the element is added
	 *
	 * Tells the element helper that this component is set as the active one and
	 * swallows the click event to prevent bubbling
	 *
	 * @param event
	 * @param target
	 * @param object
	 */
	setActive: function(event, target, object) {
		TYPO3.Form.Wizard.Helpers.Element.setActive(this);
		event.stopPropagation();
	},

	/**
	 * Called when the element helper is firing the setactive event
	 *
	 * Adds an extra class 'active' to the element when the current component is
	 * the active one, otherwise removes the class 'active' when this component
	 * has this class
	 * @param component
	 */
	toggleActive: function(component) {
		if (this.isEditable) {
			var element = this.getEl();

			if (component && component.getId() == this.getId()) {
				if (!element.hasClass('active')) {
					element.addClass('active');
				}
			} else if (element.hasClass('active')) {
				element.removeClass('active');
			}
		}
	},

	/**
	 * Display a confirmation box when the delete button has been pressed.
	 *
	 * @param event
	 * @param target
	 * @param object
	 */
	confirmDeleteElement: function(event, target, object) {
		Ext.MessageBox.confirm(
			TYPO3.l10n.localize('elements_confirm_delete_title'),
			TYPO3.l10n.localize('elements_confirm_delete_description'),
			this.deleteElement,
			this
		);
	},

	/**
	 * Delete the component when the yes button of the confirmation box has been
	 * pressed.
	 *
	 * @param button The button which has been pressed (yes / no)
	 */
	deleteElement: function(button) {
		if (button == 'yes') {
			this.ownerCt.removeElement(this);
		}
	},

	/**
	 * Called by the parent of this component when a change has been made in the
	 * form.
	 *
	 * Constructs an array out of this component and the children to add it to
	 * the history or to use when saving the form
	 *
	 * @returns {Array}
	 */
	getConfiguration: function() {
		var historyConfiguration = {
			configuration: this.configuration,
			isEditable: this.isEditable,
			xtype: this.xtype
		};

		if (this.containerComponent) {
			historyConfiguration.elementContainer = this.containerComponent.getConfiguration();
		}
		return historyConfiguration;
	},

	/**
	 * Called when a configuration property has changed in the options tab
	 *
	 * Overwrites the configuration with the configuration from the form,
	 * adds a new snapshot to the history and renders this component again.
	 * @param formConfiguration
	 */
	setConfigurationValue: function(formConfiguration) {
		Ext.merge(this.configuration, formConfiguration);
		TYPO3.Form.Wizard.Helpers.History.setHistory();
		this.rendered = false;
		this.render();
		this.doLayout();
		this.fireEvent('configurationChange', this);
	},

	/**
	 * Remove a validation rule from this element
	 *
	 * @param type
	 */
	removeValidationRule: function(type) {
		if (this.configuration.validation[type]) {
			delete this.configuration.validation[type];
			TYPO3.Form.Wizard.Helpers.History.setHistory();
			if (this.xtype != 'typo3-form-wizard-elements-basic-form') {
				this.rendered = false;
				this.render();
				this.doLayout();
			}
		}
	},

	/**
	 * Remove a filter from this element
	 *
	 * @param type
	 */
	removeFilter: function(type) {
		if (this.configuration.filters[type]) {
			delete this.configuration.filters[type];
			TYPO3.Form.Wizard.Helpers.History.setHistory();
			if (this.xtype != 'typo3-form-wizard-elements-basic-form') {
				this.rendered = false;
				this.render();
				this.doLayout();
			}
		}
	},

	/**
	 * Fires after the component is destroyed.
	 *
	 * Removes the listener for the 'setactive' event of the element helper.
	 * Tells the element helper this element is destroyed and if set active,
	 * it should be unset as active.
	 */
	onDestroy: function() {
		TYPO3.Form.Wizard.Helpers.Element.un('setactive', this.toggleActive, this);
		TYPO3.Form.Wizard.Helpers.Element.unsetActive(this);
	}
});

Ext.reg('typo3-form-wizard-elements',TYPO3.Form.Wizard.Elements);
Ext.namespace('TYPO3.Form.Wizard.Elements');

/**
 * The dummy element
 *
 * This type will be shown when there is no element in a container which will be
 * form or fieldset and will be removed when there is an element added.
 *
 * @class TYPO3.Form.Wizard.Elements.Dummy
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Dummy = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'dummy',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'dummy typo3-message message-information',

	/**
	 * @cfg {Object} configuration
	 * The configuration of this element.
	 * This object contains the configuration of this component. It will be
	 * copied to the 'data' variable before rendering. 'data' is deleted after
	 * rendering the xtemplate, so we need a copy.
	 */
	configuration: {
		title: TYPO3.l10n.localize('elements_dummy_title'),
		description: TYPO3.l10n.localize('elements_dummy_description')
	},

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<p><strong>{title}</strong></p>',
		'<p>{description}</p>'
	),

	/**
	 * @cfg {Boolean} isEditable
	 * Defines whether the element is editable. If the item is editable,
	 * a button group with remove and edit buttons will be added to this element
	 * and when the the element is clicked, an event is triggered to edit the
	 * element. Some elements, like the dummy, don't need this.
	 */
	isEditable: false
});

Ext.reg('typo3-form-wizard-elements-dummy', TYPO3.Form.Wizard.Elements.Dummy);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The BUTTON element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Button
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Button = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'button',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'disabled': '',
					'name': '',
					'type': 'button',
					'value': TYPO3.l10n.localize('tx_form_domain_model_element_button.value')
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Button.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-button', TYPO3.Form.Wizard.Elements.Basic.Button);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The CHECKBOX element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Checkbox
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Checkbox = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'x-checkbox',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'checked': '',
					'disabled': '',
					'name': '',
					'readonly': '',
					'required': '',
					'type': 'checkbox',
					'value': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'back',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Checkbox.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-checkbox', TYPO3.Form.Wizard.Elements.Basic.Checkbox);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The FIELDSET element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Fieldset
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Fieldset = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'fieldset',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div>',
			'<fieldset {[this.getAttributes(values.attributes)]}>',
			'<tpl for="legend">',
				'<tpl if="value">',
					'<legend>{value}</legend>',
				'</tpl>',
			'</tpl>',
			'<ol></ol>',
			'</fieldset>',
		'</div>',
		{
			compiled: true,
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * @cfg {Array} elementContainer
	 * Configuration for the containerComponent
	 */
	elementContainer: {
		hasDragAndDrop: true
	},

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					"class": '',
					dir: '',
					id: '',
					lang: '',
					style: ''
				},
				legend: {
					value: TYPO3.l10n.localize('elements_legend')
				}
			}
		});

		TYPO3.Form.Wizard.Elements.Basic.Fieldset.superclass.constructor.apply(this, arguments);
	},

	/**
	 * Constructor
	 */
	initComponent: function() {
		var config = {};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// Initialize the container component
		this.containerComponent = new TYPO3.Form.Wizard.Container(this.elementContainer);

			// call parent
		TYPO3.Form.Wizard.Elements.Basic.Fieldset.superclass.initComponent.apply(this, arguments);

			// Initialize events after rendering
		this.on('afterrender', this.afterRender, this);
	},

	/**
	 * Called by the 'afterrender' event.
	 *
	 * Add the container component to this component
	 */
	afterRender: function() {
		this.addContainerAfterRender();

			// Call parent
		TYPO3.Form.Wizard.Elements.Basic.Form.superclass.afterRender.call(this);
	},

	/**
	 * Add the container component to this component
	 *
	 * Because we are using a XTemplate for rendering this component, we can
	 * only add the container after rendering, because the <ol> tag needs to be
	 * replaced with this container.
	 *
	 * The container needs to be rerendered when a configuration parameter
	 * (legend or attributes) of the ownerCt, for instance fieldset, has changed
	 * otherwise it will not show up
	 */
	addContainerAfterRender: function() {
		this.containerComponent.applyToMarkup(this.getEl().child('ol'));
		this.containerComponent.rendered = false;
		this.containerComponent.render();
		this.containerComponent.doLayout();
	}
});

Ext.reg('typo3-form-wizard-elements-basic-fieldset', TYPO3.Form.Wizard.Elements.Basic.Fieldset);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The FILEUPLOAD element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Fileupload
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Fileupload = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'fileupload',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'accept': '',
					'autofocus': '',
					'disabled': '',
					'multiple': '',
					'name': '',
					'readonly': '',
					'required': '',
					'type': 'file',
					'value': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Fileupload.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-fileupload', TYPO3.Form.Wizard.Elements.Basic.Fileupload);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The FORM element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Form
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Form = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {Mixed} autoEl
	 * A tag name or DomHelper spec used to create the Element which will
	 * encapsulate this Component.
	 */
	autoEl: 'li',

	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'form',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 *
	 * Adding novalidate attribute avoids HTML5 validation of elements.
	 */
	tpl: new Ext.XTemplate(
		'<form {[this.getAttributes(values.attributes)]} novalidate="novalidate">',
			'<ol></ol>',
		'</form>',
		{
			compiled: true,
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * @cfg {Boolean} isEditable
	 * Defines whether the element is editable. If the item is editable,
	 * a button group with remove and edit buttons will be added to this element
	 * and when the the element is clicked, an event is triggered to edit the
	 * element. Some elements, like the dummy, don't need this.
	 */
	isEditable: false,

	/**
	 * @cfg {Array} elementContainer
	 * Configuration for the containerComponent
	 */
	elementContainer: {
		hasDragAndDrop: true
	},

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'accept': '',
					'accept-charset': '',
					'action': '',
					'autocomplete': '',
					'enctype': 'application/x-www-form-urlencoded',
					'method': 'post',
					'novalidate': ''
				},
				prefix: 'tx_form',
				confirmation: true,
				postProcessor: {
					mail: {
						recipientEmail: '',
						senderEmail: ''
					},
					redirect: {
						destination: ''
					}
				}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Form.superclass.constructor.apply(this, arguments);
	},

	/**
	 * Constructor
	 */
	initComponent: function() {
		var config = {};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// Initialize the container component
		this.containerComponent = new TYPO3.Form.Wizard.Container(this.elementContainer);

			// Call parent
		TYPO3.Form.Wizard.Elements.Basic.Form.superclass.initComponent.apply(this, arguments);

			// Initialize events after rendering
		this.on('afterrender', this.afterRender, this);
	},

	/**
	 * Called by the 'afterrender' event.
	 *
	 * Add the container component to this component
	 * Stop the submit event of the form, because this form does not need to be
	 * submitted
	 */
	afterRender: function() {
		this.addContainerAfterRender();

		this.getEl().child('form').on(
			'submit',
			function(eventObject, htmlElement, object) {
				eventObject.stopEvent();
			}
		);

			// Call parent
		TYPO3.Form.Wizard.Elements.Basic.Form.superclass.afterRender.call(this);
	},

	/**
	 * Add the container component to this component
	 *
	 * Because we are using a XTemplate for rendering this component, we can
	 * only add the container after rendering, because the <ol> tag needs to be
	 * replaced with this container.
	 */
	addContainerAfterRender: function() {
		this.containerComponent.applyToMarkup(this.getEl().child('ol'));
		this.containerComponent.rendered = false;
		this.containerComponent.render();
		this.containerComponent.doLayout();
	},

	/**
	 * Remove a post processor from this element
	 *
	 * @param type
	 */
	removePostProcessor: function(type) {
		if (this.configuration.postProcessor[type]) {
			delete this.configuration.postProcessor[type];
			TYPO3.Form.Wizard.Helpers.History.setHistory();
		}
	}
});

Ext.reg('typo3-form-wizard-elements-basic-form', TYPO3.Form.Wizard.Elements.Basic.Form);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The HIDDEN element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Hidden
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Hidden = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'hidden-element',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<p class="hidden-dummy-element">{[this.getAttributes(values.attributes, \'name\')]}</p>',
			'<input {[this.getAttributes(values.attributes)]} />',
		'</div>',
		{
			compiled: true,
			getAttributes: function(attributes, filterBy) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (typeof filterBy != 'undefined') {
						if (key == filterBy) {
							attributesHtml = value;
							return;
						} else {
							return;
						}
					}

					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'name': '',
					'type': 'hidden',
					'value': ''
				},
				filters: {},
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Hidden.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-hidden', TYPO3.Form.Wizard.Elements.Basic.Hidden);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The PASSWORD element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Password
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Password = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'password',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autocomplete': '',
					'autofocus': '',
					'disabled': '',
					'maxlength': '',
					'minlength': '',
					'name': '',
					'pattern': '',
					'placeholder': '',
					'readonly': '',
					'required': '',
					'size': '',
					'type': 'password',
					'value': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Password.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-password', TYPO3.Form.Wizard.Elements.Basic.Password);

Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The RADIO element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Radio
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Radio = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'x-radio',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'checked': '',
					'disabled': '',
					'name': '',
					'readonly': '',
					'required': '',
					'type': 'radio',
					'value': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'back',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Radio.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-radio', TYPO3.Form.Wizard.Elements.Basic.Radio);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The RESET element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Reset
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Reset = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'reset',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'checked': '',
					'disabled': '',
					'name': '',
					'required': '',
					'type': 'reset',
					'value': TYPO3.l10n.localize('tx_form_domain_model_element_reset.value')
				},
				filters: {},
				label: {
					value: ''
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Reset.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-reset', TYPO3.Form.Wizard.Elements.Basic.Reset);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The SELECT element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Select
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Select = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'select',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<select {[this.getAttributes(values.attributes)]}>',
				'<tpl for="options">',
					'<option {[this.getAttributes(values.attributes)]}>{text}</option>',
				'</tpl>',
			'</select>',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'disabled': '',
					'multiple': '',
					'name': '',
					'required': '',
					'size': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				options: [
					{
						text: TYPO3.l10n.localize('elements_option_1'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_1')
						}
					}, {
						text: TYPO3.l10n.localize('elements_option_2'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_2')
						}
					}, {
						text: TYPO3.l10n.localize('elements_option_3'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_3')
						}
					}
				],
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Select.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-select', TYPO3.Form.Wizard.Elements.Basic.Select);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The SUBMIT element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Submit
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Submit = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'submit',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'disabled': '',
					'name': '',
					'type': 'submit',
					'value': TYPO3.l10n.localize('tx_form_domain_model_element_submit.value')
				},
				filters: {},
				label: {
					value: ''
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Submit.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-submit', TYPO3.Form.Wizard.Elements.Basic.Submit);
Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The TEXTAREA element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Textarea
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Textarea = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'textarea',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<textarea {[this.getAttributes(values.attributes)]}>{values.attributes.text}</textarea>',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autofocus': '',
					'cols': '40',
					'disabled': '',
					'inputmode': '',
					'maxlength': '',
					'minlength': '',
					'name': '',
					'placeholder': '',
					'readonly': '',
					'required': '',
					'rows': '5',
					'selectionDirection': '',
					'selectionEnd': '',
					'selectionStart': '',
					'text': '',
					'wrap': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Textarea.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-textarea', TYPO3.Form.Wizard.Elements.Basic.Textarea);

Ext.namespace('TYPO3.Form.Wizard.Elements.Basic');

/**
 * The TEXTLINE element
 *
 * @class TYPO3.Form.Wizard.Elements.Basic.Textline
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Basic.Textline = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'textline',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'front\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
			'<input {[this.getAttributes(values.attributes)]} />',
			'<tpl for="label">',
				'<tpl if="value && parent.layout == \'back\'">',
					'<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
				'</tpl>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					'accesskey': '',
					'class': '',
					'contenteditable': '',
					'contextmenu': '',
					'dir': '',
					'draggable': '',
					'dropzone': '',
					'hidden': '',
					'id': '',
					'lang': '',
					'spellcheck': '',
					'style': '',
					'tabindex': '',
					'title': '',
					'translate': '',

					'autocomplete': '',
					'autofocus': '',
					'disabled': '',
					'inputmode': '',
					'list': '',
					'maxlength': '',
					'minlength': '',
					'name': '',
					'pattern': '',
					'placeholder': '',
					'readonly': '',
					'required': '',
					'size': '',
					'type': 'text',
					'value': ''
				},
				filters: {},
				label: {
					value: TYPO3.l10n.localize('elements_label')
				},
				layout: 'front',
				validation: {}
			}
		});
		TYPO3.Form.Wizard.Elements.Basic.Textline.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-basic-textline', TYPO3.Form.Wizard.Elements.Basic.Textline);

Ext.namespace('TYPO3.Form.Wizard.Elements.Predefined');

/**
 * The predefined EMAIL element
 *
 * @class TYPO3.Form.Wizard.Elements.Predefined.Email
 * @extends TYPO3.Form.Wizard.Elements.Basic.Textline
 */
TYPO3.Form.Wizard.Elements.Predefined.Email = Ext.extend(TYPO3.Form.Wizard.Elements.Basic.Textline, {
	/**
	 * Initialize the component
	 */
	initComponent: function() {
		var config = {
			configuration: {
				attributes: {
					name: 'email',
					type: 'email'
				},
				label: {
					value: TYPO3.l10n.localize('elements_label_email')
				},
				validation: {
					required: {
						showMessage: 1,
						message: TYPO3.l10n.localize('tx_form_system_validate_required.message'),
						error: TYPO3.l10n.localize('tx_form_system_validate_required.error')
					},
					email: {
						showMessage: 1,
						message: TYPO3.l10n.localize('tx_form_system_validate_email.message'),
						error: TYPO3.l10n.localize('tx_form_system_validate_email.error')
					}
				}
			}
		};

			// MERGE config
		Ext.merge(this, config);

			// call parent
		TYPO3.Form.Wizard.Elements.Predefined.Email.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-predefined-email', TYPO3.Form.Wizard.Elements.Predefined.Email);
Ext.namespace('TYPO3.Form.Wizard.Elements.Predefined');

/**
 * The predefined CHECKBOX GROUP element
 *
 * @class TYPO3.Form.Wizard.Elements.Predefined.CheckboxGroup
 * @extends TYPO3.Form.Wizard.Elements.Basic.Fieldset
 */
TYPO3.Form.Wizard.Elements.Predefined.CheckboxGroup = Ext.extend(TYPO3.Form.Wizard.Elements.Basic.Fieldset, {
	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<fieldset {[this.getAttributes(values.attributes)]}>',
			'<tpl for="legend">',
				'<tpl if="value">',
					'<legend>{value}{[this.getMessage(parent.validation)]}</legend>',
				'</tpl>',
			'</tpl>',
			'<ol></ol>',
			'</fieldset>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Initialize the component
	 */
	initComponent: function() {
		var config = {
			elementContainer: {
				hasDragAndDrop: false
			},
			configuration: {
				attributes: {
					"class": 'fieldset-subgroup',
					dir: '',
					id: '',
					lang: '',
					style: ''
				},
				legend: {
					value: TYPO3.l10n.localize('elements_legend')
				},
				options: [
					{
						text: TYPO3.l10n.localize('elements_option_1'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_1')
						}
					},{
						text: TYPO3.l10n.localize('elements_option_2'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_2')
						}
					},{
						text: TYPO3.l10n.localize('elements_option_3'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_3')
						}
					}
				],
				various: {
					name: ''
				},
				validation: {}
			}
		};

			// apply config
		Ext.apply(this, Ext.apply(config, this.initialConfig));

			// call parent
		TYPO3.Form.Wizard.Elements.Predefined.CheckboxGroup.superclass.initComponent.apply(this, arguments);

		this.on('configurationChange', this.rebuild, this);

		this.on('afterrender', this.rebuild, this);
	},

	/**
	 * Add the radio buttons to the containerComponent of this fieldset,
	 * according to the configuration options.
	 *
	 * @param component
	 */
	rebuild: function(component) {
		this.containerComponent.removeAll();
		if (this.configuration.options.length > 0) {
			var dummy = this.containerComponent.findById('dummy');
			if (dummy) {
				this.containerComponent.remove(dummy, true);
			}
			Ext.each(this.configuration.options, function(option, index, length) {
				var checkbox = this.containerComponent.add({
					xtype: 'typo3-form-wizard-elements-basic-checkbox',
					isEditable: false,
					cls: ''
				});
				var optionValue = '';
				if (option.attributes && option.attributes.value) {
					optionValue = option.attributes.value;
				}
				var checkboxConfiguration = {
					label: {
						value: option.text
					},
					attributes: {
						value: optionValue
					}
				};
				if (
					option.attributes &&
					option.attributes.selected &&
					option.attributes.selected == 'selected'
				) {
					checkboxConfiguration.attributes.checked = 'checked';
				}
				Ext.merge(checkbox.configuration, checkboxConfiguration);
			}, this);
			this.containerComponent.doLayout();
		}
	}
});

Ext.reg('typo3-form-wizard-elements-predefined-checkboxgroup', TYPO3.Form.Wizard.Elements.Predefined.CheckboxGroup);
Ext.namespace('TYPO3.Form.Wizard.Elements.Predefined');

/**
 * The predefined NAME element
 *
 * @class TYPO3.Form.Wizard.Elements.Predefined.Name
 * @extends TYPO3.Form.Wizard.Elements.Basic.Fieldset
 */
TYPO3.Form.Wizard.Elements.Predefined.Name = Ext.extend(TYPO3.Form.Wizard.Elements.Basic.Fieldset, {
	/**
	 * Initialize the component
	 */
	initComponent: function() {
		var config = {
			configuration: {
				attributes: {
					"class": 'predefined-name fieldset-subgroup fieldset-horizontal label-below',
					dir: '',
					id: '',
					lang: '',
					style: ''
				},
				legend: {
					value: TYPO3.l10n.localize('elements_legend_name')
				},
				various: {
					prefix: true,
					suffix: true,
					middleName: true
				}
			}
		};

			// apply config
		Ext.apply(this, Ext.apply(config, this.initialConfig));

			// call parent
		TYPO3.Form.Wizard.Elements.Predefined.Name.superclass.initComponent.apply(this, arguments);

		this.on('configurationChange', this.rebuild, this);

		this.on('afterrender', this.rebuild, this);
	},

	/**
	 * Add the fields to the containerComponent of this fieldset,
	 * according to the configuration options.
	 *
	 * @param component
	 */
	rebuild: function(component) {
		this.containerComponent.removeAll();
		var dummy = this.containerComponent.findById('dummy');
		if (dummy) {
			this.containerComponent.remove(dummy, true);
		}
		if (this.configuration.various.prefix) {
			var prefix = this.containerComponent.add({
				xtype: 'typo3-form-wizard-elements-basic-textline',
				isEditable: false,
				cls: '',
				configuration: {
					label: {
						value: TYPO3.l10n.localize('elements_label_prefix')
					},
					attributes: {
						name: 'prefix',
						size: 4
					},
					layout: 'back'
				}
			});
		}
		var firstName = this.containerComponent.add({
			xtype: 'typo3-form-wizard-elements-basic-textline',
			isEditable: false,
			cls: '',
			configuration: {
				label: {
					value: TYPO3.l10n.localize('elements_label_firstname')
				},
				attributes: {
					name: 'firstName',
					size: 10
				},
				layout: 'back',
				validation: {
					required: {
						showMessage: true,
						message: '*',
						error: 'Required'
					}
				}
			}
		});
		if (this.configuration.various.middleName) {
			var middleName = this.containerComponent.add({
				xtype: 'typo3-form-wizard-elements-basic-textline',
				isEditable: false,
				cls: '',
				configuration: {
					label: {
						value: TYPO3.l10n.localize('elements_label_middlename')
					},
					attributes: {
						name: 'middleName',
						size: 6
					},
					layout: 'back'
				}
			});
		}
		var lastName = this.containerComponent.add({
			xtype: 'typo3-form-wizard-elements-basic-textline',
			isEditable: false,
			cls: '',
			configuration: {
				label: {
					value: TYPO3.l10n.localize('elements_label_lastname')
				},
				attributes: {
					name: 'lastName',
					size: 15
				},
				layout: 'back',
				validation: {
					required: {
						showMessage: true,
						message: '*',
						error: 'Required'
					}
				}
			}
		});
		if (this.configuration.various.suffix) {
			var suffix = this.containerComponent.add({
				xtype: 'typo3-form-wizard-elements-basic-textline',
				isEditable: false,
				cls: '',
				configuration: {
					label: {
						value: TYPO3.l10n.localize('elements_label_suffix')
					},
					attributes: {
						name: 'suffix',
						size: 4
					},
					layout: 'back'
				}
			});
		}
		this.containerComponent.doLayout();
	}
});

Ext.reg('typo3-form-wizard-elements-predefined-name', TYPO3.Form.Wizard.Elements.Predefined.Name);
Ext.namespace('TYPO3.Form.Wizard.Elements.Predefined');

/**
 * The predefined RADIO GROUP element
 *
 * @class TYPO3.Form.Wizard.Elements.Predefined.RadioGroup
 * @extends TYPO3.Form.Wizard.Elements.Basic.Fieldset
 */
TYPO3.Form.Wizard.Elements.Predefined.RadioGroup = Ext.extend(TYPO3.Form.Wizard.Elements.Basic.Fieldset, {
	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<fieldset {[this.getAttributes(values.attributes)]}>',
			'<tpl for="legend">',
				'<tpl if="value">',
					'<legend>{value}{[this.getMessage(parent.validation)]}</legend>',
				'</tpl>',
			'</tpl>',
			'<ol></ol>',
			'</fieldset>',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			},
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Initialize the component
	 */
	initComponent: function() {
		var config = {
			elementContainer: {
				hasDragAndDrop: false
			},
			configuration: {
				attributes: {
					"class": 'fieldset-subgroup',
					dir: '',
					id: '',
					lang: '',
					style: ''
				},
				legend: {
					value: TYPO3.l10n.localize('elements_legend')
				},
				options: [
					{
						text: TYPO3.l10n.localize('elements_option_1'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_1')
						}
					},{
						text: TYPO3.l10n.localize('elements_option_2'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_2')
						}
					},{
						text: TYPO3.l10n.localize('elements_option_3'),
						attributes: {
							value: TYPO3.l10n.localize('elements_value_3')
						}
					}
				],
				various: {
					name: ''
				},
				validation: {}
			}
		};

			// apply config
		Ext.apply(this, Ext.apply(config, this.initialConfig));

			// call parent
		TYPO3.Form.Wizard.Elements.Predefined.RadioGroup.superclass.initComponent.apply(this, arguments);

		this.on('configurationChange', this.rebuild, this);

		this.on('afterrender', this.rebuild, this);
	},

	/**
	 * Add the radio buttons to the containerComponent of this fieldset,
	 * according to the configuration options.
	 *
	 * @param component
	 */
	rebuild: function(component) {
		this.containerComponent.removeAll();
		if (this.configuration.options.length > 0) {
			var dummy = this.containerComponent.findById('dummy');
			if (dummy) {
				this.containerComponent.remove(dummy, true);
			}
			Ext.each(this.configuration.options, function(option, index, length) {
				var radio = this.containerComponent.add({
					xtype: 'typo3-form-wizard-elements-basic-radio',
					isEditable: false,
					cls: ''
				});
				var optionValue = '';
				if (option.attributes && option.attributes.value) {
					optionValue = option.attributes.value;
				}
				var radioConfiguration = {
					label: {
						value: option.text
					},
					attributes: {
						value: optionValue
					}
				};
				if (
					option.attributes &&
					option.attributes.selected &&
					option.attributes.selected == 'selected'
				) {
					radioConfiguration.attributes.checked = 'checked';
				}
				Ext.merge(radio.configuration, radioConfiguration);
			}, this);
			this.containerComponent.doLayout();
		}
	}
});

Ext.reg('typo3-form-wizard-elements-predefined-radiogroup', TYPO3.Form.Wizard.Elements.Predefined.RadioGroup);
Ext.namespace('TYPO3.Form.Wizard.Elements.Content');

/**
 * The content HEADER element
 *
 * @class TYPO3.Form.Wizard.Elements.Content.Header
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Content.Header = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'header',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="various">',
				'<{headingSize} {[this.getAttributes(parent.attributes)]}>',
				'{content}',
				'</{type}>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					"class": 'content-header',
					dir: '',
					id: '',
					lang: '',
					style: '',
					title: ''
				},
				various: {
					headingSize: 'h1',
					content: TYPO3.l10n.localize('elements_header_content')
				}
			}
		});
		TYPO3.Form.Wizard.Elements.Content.Header.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-content-header', TYPO3.Form.Wizard.Elements.Content.Header);
Ext.namespace('TYPO3.Form.Wizard.Elements.Content');

/**
 * The content HEADER element
 *
 * @class TYPO3.Form.Wizard.Elements.Content.Header
 * @extends TYPO3.Form.Wizard.Elements
 */
TYPO3.Form.Wizard.Elements.Content.Textblock = Ext.extend(TYPO3.Form.Wizard.Elements, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'textblock',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="various">',
				'<div {[this.getAttributes(parent.attributes)]}>',
				'{text:nl2br}',
				'</{type}>',
			'</tpl>',
		'</div>',
		{
			compiled: true,
			getAttributes: function(attributes) {
				var attributesHtml = '';
				Ext.iterate(attributes, function(key, value) {
					if (value) {
						attributesHtml += key + '="' + value + '" ';
					}
				}, this);
				return attributesHtml;
			}
		}
	),

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				attributes: {
					"class": '',
					dir: '',
					id: '',
					lang: '',
					style: '',
					title: ''
				},
				various: {
					text: TYPO3.l10n.localize('elements_textblock_content')
				}
			}
		});
		TYPO3.Form.Wizard.Elements.Content.Textblock.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-content-textblock', TYPO3.Form.Wizard.Elements.Content.Textblock);
Ext.namespace('TYPO3.Form', 'TYPO3.Form.Wizard');

/**
 * The viewport
 *
 * @class TYPO3.Form.Wizard.Viewport
 * @extends Ext.Container
 */
TYPO3.Form.Wizard.Viewport = Ext.extend(Ext.Container, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard',

	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Mixed} renderTo
	 * Specify the id of the element, a DOM element or an existing Element that
	 * this component will be rendered into.
	 */
	renderTo: 'typo3-inner-docbody',

	/**
	 * @cfg {String} layout
	 * In order for child items to be correctly sized and positioned, typically
	 * a layout manager must be specified through the layout configuration option.
	 *
	 * The sizing and positioning of child items is the responsibility of the
	 * Container's layout manager which creates and manages the type of layout
	 * you have in mind.
	 */
	layout: 'border',

	/**
	 * Constructor
	 *
	 * Add the left and right part to the viewport
	 * Add the history buttons
	 * @todo Move the buttons to the docheader
	 */
	initComponent: function() {
		var config = {
			items: [
				{
					xtype: 'typo3-form-wizard-viewport-left'
				},{
					xtype: 'typo3-form-wizard-viewport-right'
				}
			]
		};

			// Add the buttons to the docheader
		this.addButtonsToDocHeader();

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Add the buttons to the docheader
	 *
	 * All buttons except close will be handled by the form wizard javascript
	 * The save and history buttons are put into separate buttongroups, click
	 * event listeners are added.
	 */
	addButtonsToDocHeader: function() {
		var docHeaderRow1 = Ext.get('typo3-docheader');
		var docHeaderButtonsBar = docHeaderRow1.first('.typo3-docheader-buttons');
		var docHeaderRow1ButtonsLeft = docHeaderButtonsBar.first('.left');

		var saveButtonGroup = Ext.DomHelper.append(docHeaderRow1ButtonsLeft, {
			tag: 'div',
			cls: 'buttongroup'
		});

		var save = new Ext.Element(
			Ext.DomHelper.append(saveButtonGroup, {
				tag: 'span',
				cls: 't3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-save',
				id: 'formwizard-save',
				title: TYPO3.l10n.localize('save')
			})
		);

		var saveAndClose = new Ext.Element(
				Ext.DomHelper.append(saveButtonGroup, {
					tag: 'span',
					cls: 't3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-save-close',
					id: 'formwizard-saveandclose',
					title: TYPO3.l10n.localize('saveAndClose')
				})
			);

		save.on('click', this.save, this);
		saveAndClose.on('click', this.saveAndClose, this);

		var historyButtonGroup = Ext.DomHelper.append(docHeaderRow1ButtonsLeft, {
			tag: 'div',
			cls: 'buttongroup'
		});

		var undo = new Ext.Element(
			Ext.DomHelper.append(historyButtonGroup, {
				tag: 'span',
				cls: 't3-icon t3-icon-actions t3-icon-actions-document t3-icon-view-go-back',
				id: 'formwizard-history-undo',
				title: TYPO3.l10n.localize('history_undo')
			})
		);

		var redo = new Ext.Element(
			Ext.DomHelper.append(historyButtonGroup, {
				tag: 'span',
				cls: 't3-icon t3-icon-actions t3-icon-actions-document t3-icon-view-go-forward',
				id: 'formwizard-history-redo',
				title: TYPO3.l10n.localize('history_redo')
			})
		);

		undo.hide();
		undo.on('click', this.undo, this);

		redo.hide();
		redo.on('click', this.redo, this);
	},

	/**
	 * Save the form
	 *
	 * @param event
	 * @param element
	 * @param object
	 */
	save: function(event, element, object) {
		var configuration = Ext.getCmp('formwizard-right').getConfiguration();
		var url = document.location.href.substring(document.location.href.indexOf('&P'));
		url = TYPO3.settings.ajaxUrls['formwizard_save'] + url;

		Ext.Ajax.request({
			url: url,
			method: 'POST',
			params: {
				configuration: Ext.encode(configuration)
			},
			success: function(response, opts) {
				var responseObject = Ext.decode(response.responseText);
				Ext.MessageBox.alert(
					TYPO3.l10n.localize('action_save'),
					responseObject.message
				);
			},
			failure: function(response, opts) {
				Ext.MessageBox.alert(
					TYPO3.l10n.localize('action_save'),
					TYPO3.l10n.localize('action_save_error') + ' ' + response.status
				);
			},
			scope: this
		});
	},

	/**
	 * Save the form and close the wizard
	 *
	 * @param event
	 * @param element
	 * @param object
	 */
	saveAndClose: function(event, element, object) {
		var configuration = Ext.getCmp('formwizard-right').getConfiguration();
		var url = document.location.href.substring(document.location.href.indexOf('&P'));
		url = TYPO3.settings.ajaxUrls['formwizard_save'] + url;
		Ext.Ajax.request({
			url: url,
			method: 'POST',
			params: {
				configuration: Ext.encode(configuration)
			},
			success: function(response, opts) {
				var urlParameters = Ext.urlDecode(document.location.search.substring(1));
				document.location = urlParameters['P[returnUrl]'];
			},
			failure: function(response, opts) {
				Ext.MessageBox.alert(
					TYPO3.l10n.localize('action_save'),
					TYPO3.l10n.localize('action_save_error') + ' ' + response.status
				);
			},
			scope: this
		});
	},

	/**
	 * Get the previous snapshot from the history if available
	 *
	 * @param event
	 * @param element
	 * @param object
	 */
	undo: function(event, element, object) {
		TYPO3.Form.Wizard.Helpers.History.undo();
	},

	/**
	 * Get the next snapshot from the history if available
	 *
	 * @param event
	 * @param element
	 * @param object
	 */
	redo: function(event, element, object) {
		TYPO3.Form.Wizard.Helpers.History.redo();
	}
});

Ext.namespace('TYPO3.Form.Wizard.Viewport');

/**
 * The tabpanel on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left
 * @extends Ext.TabPanel
 */
TYPO3.Form.Wizard.Viewport.Left = Ext.extend(Ext.TabPanel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left',

	/**
	 * @cfg {Integer} width
	 * The width of this component in pixels (defaults to auto).
	 */
	width: 350,

	/**
	 * @cfg {String/Number} activeTab A string id or the numeric index of the tab that should be initially
	 * activated on render (defaults to undefined).
	 */
	activeTab: 0,

	/**
	 * @cfg {String} region
	 * Note: this config is only used when this BoxComponent is rendered
	 * by a Container which has been configured to use the BorderLayout
	 * layout manager (e.g. specifying layout:'border').
	 */
	region: 'west',

	/**
	 * @cfg {Boolean} autoScroll
	 * true to use overflow:'auto' on the components layout element and show
	 * scroll bars automatically when necessary, false to clip any overflowing
	 * content (defaults to false).
	 */
	autoScroll: true,

	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset border,
	 * but this can be further altered by setting {@link #bodyBorder} to false.
	 */
	border: false,

	/**
	 * @cfg {Object|Function} defaults
	 *
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		autoHeight: true,
		autoWidth: true
	},

	/**
	 * Constructor
	 *
	 * Add the tabs to the tabpanel
	 */
	initComponent: function() {
		var allowedTabs = TYPO3.Form.Wizard.Settings.defaults.showTabs.split(/[, ]+/);
		var tabs = [];

		Ext.each(allowedTabs, function(option, index, length) {
			var tabXtype = 'typo3-form-wizard-viewport-left-' + option;
			if (Ext.ComponentMgr.isRegistered(tabXtype)) {
				tabs.push({
					xtype: tabXtype
				});
			}
		}, this);

		var config = {
			items: tabs
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.superclass.initComponent.apply(this, arguments);

			// Set the focus when a tab has changed. We need this to remove focus from forms
		this.on('tabchange', this.setFocus, this);
	},

	/**
	 * Set the focus to a tab
	 *
	 * doLayout is necessary, because the tabs are sometimes emptied and filled
	 * again, for instance by the history. Otherwise after a history undo or redo
	 * the options and form tabs are empty.
	 *
	 * @param tabPanel
	 * @param tab
	 */
	setFocus: function(tabPanel, tab) {
		tabPanel.doLayout();
		tab.el.focus();
	},

	/**
	 * Set the options tab as active tab
	 *
	 * Called by the options panel when an element has been selected
	 */
	setOptionsTab: function() {
		this.setActiveTab('formwizard-left-options');
	}
});

Ext.reg('typo3-form-wizard-viewport-left', TYPO3.Form.Wizard.Viewport.Left);
Ext.namespace('TYPO3.Form.Wizard.Viewport');

/**
 * The form container on the right side
 *
 * @class TYPO3.Form.Wizard.Viewport.Right
 * @extends TYPO3.Form.Wizard.Elements.Container
 */
TYPO3.Form.Wizard.Viewport.Right = Ext.extend(Ext.Container, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-right',

	/**
	 * @cfg {Mixed} autoEl
	 * A tag name or DomHelper spec used to create the Element which will
	 * encapsulate this Component.
	 */
	autoEl: 'ol',

	/**
	 * @cfg {String} region
	 * Note: this config is only used when this BoxComponent is rendered
	 * by a Container which has been configured to use the BorderLayout
	 * layout manager (e.g. specifying layout:'border').
	 */
	region: 'center',

	/**
	 * @cfg {Boolean} autoScroll
	 * true to use overflow:'auto' on the components layout element and show
	 * scroll bars automatically when necessary, false to clip any overflowing
	 * content (defaults to false).
	 */
	autoScroll: true,

	/**
	 * Constructor
	 */
	initComponent: function() {
		var config = {
			items: [
				{
					xtype: 'typo3-form-wizard-elements-basic-form'
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Right.superclass.initComponent.apply(this, arguments);

			// Initialize the form after rendering
		this.on('afterrender', this.initializeForm, this);
	},

	/**
	 * Initialize the form after rendering
	 */
	initializeForm: function() {
		this.loadForm();
	},

	/**
	 * Load the form with an AJAX call
	 *
	 * Loads the configuration and initializes the history
	 */
	loadForm: function() {
		var url = document.location.href.substring(document.location.href.indexOf('&P'));
		url = TYPO3.settings.ajaxUrls['formwizard_load'] + url;
		Ext.Ajax.request({
			url: url,
			method: 'POST',
			success: function(response, opts) {
				var responseObject = Ext.decode(response.responseText);
				this.loadConfiguration(responseObject.configuration);
				this.initializeHistory();
			},
			failure: function(response, opts) {
				Ext.MessageBox.alert(
					'Loading form',
					'Server-side failure with status code ' + response.status
				);
			},
			scope: this
		});
	},

	/**
	 * Initialize the history
	 *
	 * After the form has been rendered for the first time, we need to add the
	 * initial configuration to the history, so it is possible to go back to the
	 * initial state of the form when it was loaded.
	 */
	initializeHistory: function() {
		TYPO3.Form.Wizard.Helpers.History.setHistory();
		this.setForm();
	},

	/**
	 * Called by the history class when a change has been made in the form
	 *
	 * Constructs an array out of this component and the children to add it to
	 * the history or to use when saving the form
	 *
	 * @returns {Array}
	 */
	getConfiguration: function() {
		var historyConfiguration = new Array;

		if (this.items) {
			this.items.each(function(item, index, length) {
				historyConfiguration.push(item.getConfiguration());
			}, this);
		}
		return historyConfiguration;
	},

	/**
	 * Load a previous configuration from the history
	 *
	 * Removes all the components from this container and adds the components
	 * from the history configuration depending on the 'undo' or 'redo' action.
	 *
	 * @param historyConfiguration
	 */
	loadConfiguration: function(historyConfiguration) {
		this.removeAll();
		this.add(historyConfiguration);
		this.doLayout();
		this.setForm();
	},

	/**
	 * Pass the form configuration to the left form tab
	 */
	setForm: function() {
		if (Ext.getCmp('formwizard-left-form')) {
			Ext.getCmp('formwizard-left-form').setForm(this.get(0));
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-right', TYPO3.Form.Wizard.Viewport.Right);

Ext.namespace('TYPO3.Form.Wizard.Viewport.Left');

/**
 * The elements panel in the elements tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Elements
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Elements = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-elements',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'x-tab-panel-body-content',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_elements'),

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var allowedAccordions = TYPO3.Form.Wizard.Settings.defaults.tabs.elements.showAccordions.split(/[, ]+/);
		var accordions = [];

		Ext.each(allowedAccordions, function(option, index, length) {
			var accordionXtype = 'typo3-form-wizard-viewport-left-elements-' + option;
			if (Ext.ComponentMgr.isRegistered(accordionXtype)) {
				accordions.push({
					xtype: accordionXtype
				});
			}
		}, this);

		var config = {
			items: [
				{
					xtype: 'container',
					id: 'formwizard-left-elements-intro',
					tpl: new Ext.XTemplate(
						'<tpl for=".">',
							'<p><strong>{title}</strong></p>',
							'<p>{description}</p>',
						'</tpl>'
					),
					data: [{
						title: TYPO3.l10n.localize('left_elements_intro_title'),
						description: TYPO3.l10n.localize('left_elements_intro_description')
					}],
					cls: 'formwizard-left-dummy typo3-message message-information'
				}, {
					xtype: 'panel',
					layout: 'accordion',
					border: false,
					padding: 0,
					defaults: {
						autoHeight: true,
						cls: 'x-panel-accordion'
					},
					items: accordions
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Elements.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-elements', TYPO3.Form.Wizard.Viewport.Left.Elements);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Elements');

/**
 * The button group abstract for the elements tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup
 * @extends Ext.ButtonGroup
 */
TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Object|Function} defaults
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		xtype: 'button',
		scale: 'small',
		width: 140,
		iconAlign: 'left',
		cls: 'formwizard-element'
	},

	cls: 'formwizard-buttongroup',

	/**
	 * @cfg {Boolean} autoHeight
	 * true to use height:'auto', false to use fixed height (defaults to false).
	 * Note: Setting autoHeight: true means that the browser will manage the panel's height
	 * based on its contents, and that Ext will not manage it at all. If the panel is within a layout that
	 * manages dimensions (fit, border, etc.) then setting autoHeight: true
	 * can cause issues with scrolling and will not generally work as expected since the panel will take
	 * on the height of its contents rather than the height required by the Ext layout.
	 */
	autoHeight: true,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} layout
	 * In order for child items to be correctly sized and positioned, typically
	 * a layout manager must be specified through the layout configuration option.
	 *
	 * The sizing and positioning of child items is the responsibility of the
	 * Container's layout manager which creates and manages the type of layout
	 * you have in mind.
	 */
	layout: 'table',

	/**
	 * @cfg {Object} layoutConfig
	 * This is a config object containing properties specific to the chosen
	 * layout if layout has been specified as a string.
	 */
	layoutConfig: {
		columns: 2
	},

	/**
	 * Constructor
	 *
	 * Add the buttons to the accordion
	 */
	initComponent: function() {
		var config = {};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup.superclass.initComponent.apply(this, arguments);

			// Initialize the dragzone after rendering
		this.on('render', this.initializeDrag, this);
	},

	/**
	 * Initialize the drag zone.
	 *
	 * @param buttonGroup
	 */
	initializeDrag: function(buttonGroup) {
		buttonGroup.dragZone = new Ext.dd.DragZone(buttonGroup.getEl(), {
			getDragData: function(element) {
				var sourceElement = element.getTarget('.formwizard-element');
				if (sourceElement) {
					clonedElement = sourceElement.cloneNode(true);
					clonedElement.id = Ext.id();
					return buttonGroup.dragData = {
						sourceEl: sourceElement,
						repairXY: Ext.fly(sourceElement).getXY(),
						ddel: clonedElement
					};
				}
			},
			getRepairXY: function() {
				return buttonGroup.dragData.repairXY;
			}
		});
	},

	/**
	 * Called when a button has been double clicked
	 *
	 * Tells the form in the right container to add a new element, according to
	 * the button which has been clicked.
	 *
	 * @param button
	 * @param event
	 */
	onDoubleClick: function(button, event) {
		var formContainer = Ext.getCmp('formwizard-right').get(0).containerComponent;
		formContainer.dropElement(button, 'container');
	}
});

Ext.reg('typo3-form-wizard-viewport-left-elements-buttongroup', TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Elements');

/**
 * The basic elements in the elements tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Elements.Basic
 * @extends TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup
 */
TYPO3.Form.Wizard.Viewport.Left.Elements.Basic = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-elements-basic',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_elements_basic'),

	/**
	 * Constructor
	 *
	 * Add the buttons to the accordion
	 */
	initComponent: function() {
		var allowedButtons = TYPO3.Form.Wizard.Settings.defaults.tabs.elements.accordions.basic.showButtons.split(/[, ]+/);
		var buttons = [];

		Ext.each(allowedButtons, function(option, index, length) {
			switch (option) {
				case 'button':
					buttons.push({
						text: TYPO3.l10n.localize('basic_button'),
						id: 'basic-button',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-button',
						scope: this
					});
					break;
				case 'checkbox':
					buttons.push({
						text: TYPO3.l10n.localize('basic_checkbox'),
						id: 'basic-checkbox',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-checkbox',
						scope: this
					});
					break;
				case 'fieldset':
					buttons.push({
						text: TYPO3.l10n.localize('basic_fieldset'),
						id: 'basic-fieldset',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-fieldset',
						scope: this
					});
					break;
				case 'fileupload':
					buttons.push({
						text: TYPO3.l10n.localize('basic_fileupload'),
						id: 'basic-fileupload',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-fileupload',
						scope: this
					});
					break;
				case 'hidden':
					buttons.push({
						text: TYPO3.l10n.localize('basic_hidden'),
						id: 'basic-hidden',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-hidden',
						scope: this
					});
					break;
				case 'password':
					buttons.push({
						text: TYPO3.l10n.localize('basic_password'),
						id: 'basic-password',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-password',
						scope: this
					});
					break;
				case 'radio':
					buttons.push({
						text: TYPO3.l10n.localize('basic_radio'),
						id: 'basic-radio',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-radio',
						scope: this
					});
					break;
				case 'reset':
					buttons.push({
						text: TYPO3.l10n.localize('basic_reset'),
						id: 'basic-reset',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-reset',
						scope: this
					});
					break;
				case 'select':
					buttons.push({
						text: TYPO3.l10n.localize('basic_select'),
						id: 'basic-select',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-select',
						scope: this
					});
					break;
				case 'submit':
					buttons.push({
						text: TYPO3.l10n.localize('basic_submit'),
						id: 'basic-submit',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-submit',
						scope: this
					});
					break;
				case 'textarea':
					buttons.push({
						text: TYPO3.l10n.localize('basic_textarea'),
						id: 'basic-textarea',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-textarea',
						scope: this
					});
					break;
				case 'textline':
					buttons.push({
						text: TYPO3.l10n.localize('basic_textline'),
						id: 'basic-textline',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-basic-textline',
						scope: this
					});
					break;
			}
		}, this);

		var config = {
			items: buttons
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Elements.Basic.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-elements-basic', TYPO3.Form.Wizard.Viewport.Left.Elements.Basic);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Elements');

/**
 * The predefined elements in the elements tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined
 * @extends TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup
 */
TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-elements-predefined',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_elements_predefined'),

	/**
	 * Constructor
	 *
	 * Add the buttons to the accordion
	 */
	initComponent: function() {
		var allowedButtons = TYPO3.Form.Wizard.Settings.defaults.tabs.elements.accordions.predefined.showButtons.split(/[, ]+/);
		var buttons = [];

		Ext.each(allowedButtons, function(option, index, length) {
			switch (option) {
				case 'email':
					buttons.push({
						text: TYPO3.l10n.localize('predefined_email'),
						id: 'predefined-email',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-predefined-email',
						scope: this
					});
					break;
				case 'radiogroup':
					buttons.push({
						text: TYPO3.l10n.localize('predefined_radiogroup'),
						id: 'predefined-radiogroup',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-predefined-radiogroup',
						scope: this
					});
					break;
				case 'checkboxgroup':
					buttons.push({
						text: TYPO3.l10n.localize('predefined_checkboxgroup'),
						id: 'predefined-checkboxgroup',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-predefined-checkboxgroup',
						scope: this
					});
					break;
				case 'name':
					buttons.push({
						text: TYPO3.l10n.localize('predefined_name'),
						id: 'predefined-name',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-predefined-name',
						scope: this
					});
					break;
			}
		}, this);

		var config = {
			items: buttons
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-elements-predefined', TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Elements');

/**
 * The content elements in the elements tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Elements.Content
 * @extends TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup
 */
TYPO3.Form.Wizard.Viewport.Left.Elements.Content = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Elements.ButtonGroup, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-elements-content',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_elements_content'),

	/**
	 * Constructor
	 *
	 * Add the buttons to the accordion
	 */
	initComponent: function() {
		var allowedButtons = TYPO3.Form.Wizard.Settings.defaults.tabs.elements.accordions.content.showButtons.split(/[, ]+/);
		var buttons = [];

		Ext.each(allowedButtons, function(option, index, length) {
			switch (option) {
				case 'header':
					buttons.push({
						text: TYPO3.l10n.localize('content_header'),
						id: 'content-header',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-content-header',
						scope: this
					});
					break;
				case 'textblock':
					buttons.push({
						text: TYPO3.l10n.localize('content_textblock'),
						id: 'content-textblock',
						clickEvent: 'dblclick',
						handler: this.onDoubleClick,
						iconCls: 'formwizard-left-elements-content-textblock',
						scope: this
					});
					break;
			}
		}, this);

		var config = {
			items: buttons
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Elements.Content.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-elements-content', TYPO3.Form.Wizard.Viewport.Left.Elements.Content);
Ext.namespace('TYPO3.Form.Wizard.Viewport.LeftTYPO3.Form.Wizard.Elements');

/**
 * The options tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-options',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'x-tab-panel-body-content',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_options'),

	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {Object} validAccordions
	 * Keeps track which accordions are valid. Accordions contain forms which
	 * do client validation. If there is a validation change in a form in the
	 * accordion, a validation event will be fired, which changes one of these
	 * values
	 */
	validAccordions: {
		attributes: true,
		filters: true,
		label: true,
		legend: true,
		options: true,
		validation: true,
		various: true
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var config = {
			items: [{
				xtype: 'typo3-form-wizard-viewport-left-options-dummy'
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.superclass.initComponent.apply(this, arguments);

			// if the active element changes in helper, this should be reflected here
		TYPO3.Form.Wizard.Helpers.Element.on('setactive', this.toggleActive, this);
	},

	/**
	 * Load options form according to element type
	 *
	 * This will be called whenever the current element changes
	 *
	 * @param component The current element
	 * @return void
	 */
	toggleActive: function(component) {
		if (component) {
			this.removeAll();
			this.add({
				xtype: 'typo3-form-wizard-viewport-left-options-panel',
				element: component,
				listeners: {
					'validation': {
						fn: this.validation,
						scope: this
					}
				}
			});
			this.ownerCt.setOptionsTab();
		} else {
			this.removeAll();
			this.add({
				xtype: 'typo3-form-wizard-viewport-left-options-dummy'
			});
		}
		Ext.get(this.tabEl).removeClass('validation-error');
		Ext.iterate(this.validAccordions, function(key, value) {
			this.validAccordions[key] = true;
		}, this);
		this.doLayout();
	},

	/**
	 * Checks if a tab is valid by iterating all accordions on validity
	 *
	 * @returns {Boolean}
	 */
	tabIsValid: function() {
		var valid = true;

		Ext.iterate(this.validAccordions, function(key, value) {
			if (!value) {
				valid = false;
			}
		}, this);

		return valid;
	},

	/**
	 * Called by the validation listeners of the accordions
	 *
	 * Checks if all accordions are valid. If not, adds a class to the tab
	 *
	 * @param {String} accordion The accordion which fires the event
	 * @param {Boolean} isValid Accordion is valid or not
	 */
	validation: function(accordion, isValid) {
		this.validAccordions[accordion] = isValid;
		var tabIsValid = this.tabIsValid();

		if (this.tabEl) {
			var tabEl = Ext.get(this.tabEl);
			if (tabIsValid && tabEl.hasClass('validation-error')) {
				tabEl.removeClass('validation-error');
			} else if (!tabIsValid && !tabEl.hasClass('validation-error')) {
				tabEl.addClass('validation-error');
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options', TYPO3.Form.Wizard.Viewport.Left.Options);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options');

/**
 * The options panel for a dummy item
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Dummy
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Dummy = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-options-dummy',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'formwizard-left-dummy typo3-message message-information',

	/**
	 * @cfg {Mixed} data
	 * The initial set of data to apply to the tpl to update the content area of
	 * the Component.
	 */
	data: [{
		title: TYPO3.l10n.localize('options_dummy_title'),
		description: TYPO3.l10n.localize('options_dummy_description')
	}],

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<tpl for=".">',
			'<p><strong>{title}</strong></p>',
			'<p>{description}</p>',
		'</tpl>'
	)
});

Ext.reg('typo3-form-wizard-viewport-left-options-dummy', TYPO3.Form.Wizard.Viewport.Left.Options.Dummy);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options');

/**
 * The options panel
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Panel
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Panel = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Object} element
	 * The element for the options form
	 */
	element: null,

	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Object|Function} defaults
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		autoHeight: true,
		border: false,
		padding: 0
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var accordions = this.getAccordionsBySettings();
		var accordionItems = new Array();

		// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(accordions, function(item, index, allItems) {
			var accordionXtype = 'typo3-form-wizard-viewport-left-options-forms-' + item;
			accordionItems.push({
				xtype: accordionXtype,
				element: this.element,
				listeners: {
					'validation': {
						fn: this.validation,
						scope: this
					}
				}
			});
		}, this);

		var config = {
			items: [{
				xtype: 'panel',
				layout: 'accordion',
				ref: 'accordion',
				defaults: {
					autoHeight: true,
					cls: 'x-panel-accordion'
				},
				items: accordionItems
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Panel.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Adds the accordions depending on the TSconfig settings
	 *
	 * It will first look at showAccordions for the tab, then it will filter it
	 * down with the accordions allowed for the element.
	 *
	 * @returns {Array}
	 */
	getAccordionsBySettings: function() {
		var accordions = [];
		if (this.element) {
			var elementType = this.element.xtype.split('-').pop();

			var allowedDefaultAccordions = [];
			try {
				allowedDefaultAccordions = TYPO3.Form.Wizard.Settings.defaults.tabs.options.showAccordions.split(/[, ]+/);
			} catch (error) {
				// The object has not been found
				allowedDefaultAccordions = [
					'legend',
					'label',
					'attributes',
					'options',
					'validation',
					'filters',
					'various'
				];
			}

			var allowedElementAccordions = [];
			try {
				allowedElementAccordions = TYPO3.Form.Wizard.Settings.elements[elementType].showAccordions.split(/[, ]+/);
			} catch (error) {
				// The object has not been found
				allowedElementAccordions = allowedDefaultAccordions;
			}

			Ext.iterate(allowedElementAccordions, function(item, index, allItems) {
				var accordionXtype = 'typo3-form-wizard-viewport-left-options-forms-' + item;
				if (
					Ext.isDefined(this.element.configuration[item]) &&
					allowedElementAccordions.indexOf(item) > -1 &&
					Ext.ComponentMgr.isRegistered(accordionXtype)
				) {
					accordions.push(item);
				}
			}, this);
		}

		return accordions;
	},

	/**
	 * Fire the validation event
	 *
	 * This is only a pass-through for the accordion validation events
	 *
	 * @param accordion
	 * @param valid
	 */
	validation: function(accordion, valid) {
		this.fireEvent('validation', accordion, valid);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-panel', TYPO3.Form.Wizard.Viewport.Left.Options.Panel);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The attributes properties of the element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_attributes'),

	/** @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfieldsubmit',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * Constructor
	 *
	 * @param config
	 */
	constructor: function(config){
			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

			// Call our superclass constructor to complete construction process.
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes.superclass.constructor.call(this, config);
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
		var attributes = this.getAttributesBySettings();
		var formItems = new Array();

		Ext.iterate(attributes, function(item, index, allItems) {
			switch(item) {
				case 'accept':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_accept'),
						name: 'accept',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'accept-charset':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_acceptcharset'),
						name: 'accept-charset',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'accesskey':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_accesskey'),
						name: 'accesskey',
						maxlength: 1,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'action':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_action'),
						name: 'action',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'alt':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_alt'),
						name: 'alt',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'autocomplete':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_autocomplete'),
						name: 'autocomplete',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'autocomplete',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_autocomplete_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_autocomplete_off'), value: 'off'},
								{label: TYPO3.l10n.localize('attributes_autocomplete_on'), value: 'on'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'autofocus':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_autofocus'),
						name: 'autofocus',
						inputValue: 'autofocus',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'checked':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_checked'),
						name: 'checked',
						inputValue: 'checked',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'class':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_class'),
						name: 'class',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'cols':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_cols'),
						name: 'cols',
						xtype: 'spinnerfield',
						allowBlank: false,
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'contenteditable':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_contenteditable'),
						name: 'contenteditable',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'contenteditable',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_contenteditable_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_contenteditable_true'), value: 'true'},
								{label: TYPO3.l10n.localize('attributes_contenteditable_false'), value: 'false'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'contextmenu':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_contextmenu'),
						name: 'contextmenu',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'dir':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_dir'),
						name: 'dir',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'dir',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_dir_ltr'), value: 'ltr'},
								{label: TYPO3.l10n.localize('attributes_dir_rtl'), value: 'rtl'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'disabled':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_disabled'),
						name: 'disabled',
						inputValue: 'disabled',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'draggable':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_draggable'),
						name: 'draggable',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'draggable',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_draggable_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_draggable_false'), value: 'false'},
								{label: TYPO3.l10n.localize('attributes_draggable_true'), value: 'true'},
								{label: TYPO3.l10n.localize('attributes_draggable_auto'), value: 'auto'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'dropzone':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_dropzone'),
						name: 'dropzone',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'enctype':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_enctype'),
						name: 'enctype',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'enctype',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_enctype_1'), value: 'application/x-www-form-urlencoded'},
								{label: TYPO3.l10n.localize('attributes_enctype_2'), value: 'multipart/form-data'},
								{label: TYPO3.l10n.localize('attributes_enctype_3'), value: 'text/plain'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'height':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_height'),
						name: 'height',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'hidden':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_hidden'),
						name: 'hidden',
						inputValue: 'hidden',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'id':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_id'),
						name: 'id',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'inputmode':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_inputmode'),
						name: 'inputmode',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'inputmode',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_inputmode_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_inputmode_verbatim'), value: 'verbatim'},
								{label: TYPO3.l10n.localize('attributes_inputmode_latin'), value: 'latin'},
								{label: TYPO3.l10n.localize('attributes_inputmode_latin-name'), value: 'latin-name'},
								{label: TYPO3.l10n.localize('attributes_inputmode_latin-prose'), value: 'latin-prose'},
								{label: TYPO3.l10n.localize('attributes_inputmode_full-width-latin'), value: 'full-width-latin'},
								{label: TYPO3.l10n.localize('attributes_inputmode_kana'), value: 'kana'},
								{label: TYPO3.l10n.localize('attributes_inputmode_kana-name'), value: 'kana-name'},
								{label: TYPO3.l10n.localize('attributes_inputmode_katakana'), value: 'katakana'},
								{label: TYPO3.l10n.localize('attributes_inputmode_numeric'), value: 'numeric'},
								{label: TYPO3.l10n.localize('attributes_inputmode_tel'), value: 'tel'},
								{label: TYPO3.l10n.localize('attributes_inputmode_email'), value: 'email'},
								{label: TYPO3.l10n.localize('attributes_inputmode_url'), value: 'url'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'label':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_label'),
						name: 'label',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'lang':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_lang'),
						name: 'lang',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'list':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_list'),
						name: 'list',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'max':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_max'),
						name: 'max',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'maxlength':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_maxlength'),
						name: 'maxlength',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'method':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_method'),
						name: 'method',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'method',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_method_get'), value: 'get'},
								{label: TYPO3.l10n.localize('attributes_method_post'), value: 'post'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'min':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_min'),
						name: 'min',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'minlength':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_minlength'),
						name: 'minlength',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'multiple':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_multiple'),
						name: 'multiple',
						inputValue: 'multiple',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'name':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_name'),
						name: 'name',
						allowBlank:false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'novalidate':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_novalidate'),
						name: 'novalidate',
						inputValue: 'novalidate',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'pattern':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_pattern'),
						name: 'pattern',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'placeholder':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_placeholder'),
						name: 'placeholder',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'readonly':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_readonly'),
						name: 'readonly',
						inputValue: 'readonly',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'required':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_required'),
						name: 'required',
						inputValue: 'required',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'rows':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_rows'),
						name: 'rows',
						xtype: 'spinnerfield',
						allowBlank: false,
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'selected':
					formItems.push({
						xtype: 'typo3-form-wizard-valuecheckbox',
						fieldLabel: TYPO3.l10n.localize('attributes_selected'),
						name: 'selected',
						inputValue: 'selected',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'selectionDirection':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_selectionDirection'),
						name: 'selectionDirection',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'selectionDirection',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_selectionDirection_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_selectionDirection_forward'), value: 'forward'},
								{label: TYPO3.l10n.localize('attributes_selectionDirection_backward'), value: 'backward'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'selectionEnd':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_selectionEnd'),
						name: 'selectionEnd',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'selectionStart':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_selectionStart'),
						name: 'selectionStart',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'size':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_size'),
						name: 'size',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'spellcheck':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_spellcheck'),
						name: 'spellcheck',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'spellcheck',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_spellcheck_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_spellcheck_true'), value: 'true'},
								{label: TYPO3.l10n.localize('attributes_spellcheck_false'), value: 'false'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'src':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_src'),
						name: 'src',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'step':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_step'),
						name: 'step',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'style':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_style'),
						name: 'style',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'tabindex':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_tabindex'),
						name: 'tabindex',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'text':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_text'),
						xtype: 'textarea',
						name: 'text',
						allowBlank: true,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'title':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_title'),
						name: 'title',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'translate':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_translate'),
						name: 'translate',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'translate',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_translate_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_translate_no'), value: 'no'},
								{label: TYPO3.l10n.localize('attributes_translate_yes'), value: 'yes'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'type':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_type'),
						name: 'type',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'type',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_type_color'), value: 'color'},
								{label: TYPO3.l10n.localize('attributes_type_date'), value: 'date'},
								{label: TYPO3.l10n.localize('attributes_type_datetime'), value: 'datetime'},
								{label: TYPO3.l10n.localize('attributes_type_datetime-local'), value: 'datetime-local'},
								{label: TYPO3.l10n.localize('attributes_type_email'), value: 'email'},
								{label: TYPO3.l10n.localize('attributes_type_month'), value: 'month'},
								{label: TYPO3.l10n.localize('attributes_type_number'), value: 'number'},
								{label: TYPO3.l10n.localize('attributes_type_search'), value: 'search'},
								{label: TYPO3.l10n.localize('attributes_type_tel'), value: 'tel'},
								{label: TYPO3.l10n.localize('attributes_type_text'), value: 'text'},
								{label: TYPO3.l10n.localize('attributes_type_time'), value: 'time'},
								{label: TYPO3.l10n.localize('attributes_type_url'), value: 'url'},
								{label: TYPO3.l10n.localize('attributes_type_week'), value: 'week'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'value':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_value'),
						name: 'value',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'width':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_width'),
						name: 'width',
						xtype: 'spinnerfield',
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'wrap':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('attributes_wrap'),
						name: 'wrap',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'wrap',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('attributes_wrap_none'), value: ''},
								{label: TYPO3.l10n.localize('attributes_wrap_soft'), value: 'soft'},
								{label: TYPO3.l10n.localize('attributes_wrap_hard'), value: 'hard'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
			}
		}, this);

		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				autoHeight: true,
				border: false,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'textfieldsubmit',
				items: formItems
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Fill the form with the configuration values
		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {attributes: {}};
			formConfiguration.attributes[fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues(this.element.configuration.attributes);
	},

	/**
	 * Get the attributes for the element
	 *
	 * Based on the elements attributes, the TSconfig general allowed attributes
	 * and the TSconfig allowed attributes for this type of element
	 *
	 * @returns object
	 */
	getAttributesBySettings: function() {
		var attributes = [];
		var elementAttributes = this.element.configuration.attributes;
		var elementType = this.element.xtype.split('-').pop();

		var allowedGeneralAttributes = [];
		try {
			allowedGeneralAttributes = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.attributes.showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedGeneralAttributes = [
				'accept',
				'acceptcharset',
				'accesskey',
				'action',
				'alt',
				'checked',
				'class',
				'cols',
				'dir',
				'disabled',
				'enctype',
				'id',
				'label',
				'lang',
				'maxlength',
				'method',
				'multiple',
				'name',
				'readonly',
				'rows',
				'selected',
				'size',
				'src',
				'style',
				'tabindex',
				'title',
				'type',
				'value'
			];
		}

		var allowedElementAttributes = [];
		try {
			allowedElementAttributes = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.attributes.showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found
			allowedElementAttributes = allowedGeneralAttributes;
		}

		Ext.iterate(allowedElementAttributes, function(item, index, allItems) {
			if (allowedGeneralAttributes.indexOf(item) > -1 && Ext.isDefined(elementAttributes[item])) {
				attributes.push(item);
			}
		}, this);

		return attributes;
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'attributes', valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'attributes', valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-attributes', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes);

Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The label properties and the layout of the element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Label
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Label = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_label'),

	/** @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'x-panel-accordion',

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
		var fields = this.getFieldsBySettings();
		var formItems = new Array();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(fields, function(item, index, allItems) {
			switch(item) {
				case 'label':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('label_label'),
						name: 'label',
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'layout':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('label_layout'),
						name: 'layout',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'layout',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('label_layout_front'), value: 'front'},
								{label: TYPO3.l10n.localize('label_layout_back'), value: 'back'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				default:
			}
		}, this);

		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				border: false,
				autoHeight: true,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'textfieldsubmit',
				items: formItems
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Label.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Fill the form with the configuration values
		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			if (fieldName == 'label') {
				var formConfiguration = {
					label: {
						value: field.getValue()
					}
				};
			} else {
				var formConfiguration = {};
				formConfiguration[fieldName] = field.getValue();
			}
			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @param record The current question
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues({
			label: this.element.configuration.label.value,
			layout: this.element.configuration.layout
		});
	},

	/**
	 * Get the fields for the element
	 *
	 * Based on the TSconfig general allowed fields
	 * and the TSconfig allowed fields for this type of element
	 *
	 * @returns object
	 */
	getFieldsBySettings: function() {
		var fields = [];
		var elementType = this.element.xtype.split('-').pop();

		var allowedGeneralFields = [];
		try {
			allowedGeneralFields = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.label.showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedGeneralFields = [
				'label',
				'layout'
			];
		}

		var allowedElementFields = [];
		try {
			allowedElementFields = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.label.showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedElementFields = allowedGeneralFields;
		}

		Ext.iterate(allowedElementFields, function(item, index, allItems) {
			if (allowedGeneralFields.indexOf(item) > -1) {
				fields.push(item);
			}
		}, this);

		return fields;
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'label', valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'label', valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-label', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Label);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The legend properties of the element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Legend
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Legend = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_legend'),

	/** @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'x-panel-accordion',

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				autoHeight: true,
				border: false,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'textfieldsubmit',
				items: [
					{
						fieldLabel: TYPO3.l10n.localize('legend_legend'),
						name: 'legend',
						enableKeyEvents: true,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					}
				]
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Legend.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Fill the form with the configuration values
		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			if (fieldName == 'legend') {
				var formConfiguration = {
					legend: {
						value: field.getValue()
					}
				};
			} else {
				var formConfiguration = {};
				formConfiguration[fieldName] = field.getValue();
			}
			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @param record The current question
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues({
			legend: this.element.configuration.legend.value
		});
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'legend', valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'legend', valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-legend', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Legend);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The options properties of the element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Options
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Options = Ext.extend(Ext.grid.EditorGridPanel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_fieldoptions'),

	/**
	 * @cfg {String} autoExpandColumn
	 * The id of a column in this grid that should expand to fill unused space.
	 * This value specified here can not be 0.
	 */
	autoExpandColumn: 'text',

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: '10px 0 10px 15px',

	/**
	 * @cfg {Number} clicksToEdit
	 * The number of clicks on a cell required to display the cell's editor (defaults to 2).
	 * Setting this option to 'auto' means that mousedown on the selected cell starts
	 * editing that cell.
	 */
	clicksToEdit: 1,

	/**
	 * @cfg {Object} viewConfig A config object that will be applied to the grid's UI view.  Any of
	 * the config options available for Ext.grid.GridView can be specified here. This option
	 * is ignored if view is specified.
	 */
	viewConfig: {
		forceFit: true,
		emptyText: TYPO3.l10n.localize('fieldoptions_emptytext'),
		scrollOffset: 0
	},

	/**
	 * Constructor
	 *
	 * Configure store and columns for the grid
	 */
	initComponent: function () {
		var optionRecord = Ext.data.Record.create([
			{
				name: 'text',
				mapping: 'text',
				type: 'string'
			}, {
				name: 'selected',
				convert: this.convertSelected,
				type: 'bool'
			}, {
				name: 'value',
				convert: this.convertValue,
				type: 'string'
			}
		]);

		var store = new Ext.data.JsonStore({
			idIndex: 1,
			fields: optionRecord,
			data: this.element.configuration.options,
			autoDestroy: true,
			autoSave: true,
			listeners: {
				'add': {
					scope: this,
					fn: this.storeOptions
				},
				'remove': {
					scope: this,
					fn: this.storeOptions
				},
				'update': {
					scope: this,
					fn: this.storeOptions
				}
			}
		});

		var checkColumn = new Ext.ux.grid.SingleSelectCheckColumn({
			id: 'selected',
			header: TYPO3.l10n.localize('fieldoptions_selected'),
			dataIndex: 'selected',
			width: 20
		});

		var itemDeleter = new Ext.ux.grid.ItemDeleter();

		var config = {
			store: store,
			cm: new Ext.grid.ColumnModel({
				defaults: {
					sortable: false
				},
				columns: [
					{
						width: 40,
						id: 'data',
						header: TYPO3.l10n.localize('fieldoptions_text'),
						dataIndex: 'text',
						editor: new Ext.ux.form.TextFieldSubmit({
							allowBlank: false,
							listeners: {
								'triggerclick': function (field) {
									field.gridEditor.record.set('text', field.getValue());
								}
							}
						})
					},
					checkColumn,
					{
						width: 40,
						id: 'value',
						header: TYPO3.l10n.localize('fieldoptions_value'),
						dataIndex: 'value',
						editor: new Ext.ux.form.TextFieldSubmit({
							allowBlank: true,
							listeners: {
								'triggerclick': function (field) {
									field.gridEditor.record.set('value', field.getValue());
								}
							}
						})
					},
					itemDeleter
				]
			}),
			selModel: itemDeleter,
			plugins: [checkColumn],
			tbar: [{
				text: TYPO3.l10n.localize('fieldoptions_button_add'),
				handler: this.addOption,
				scope: this
			}]
		};

		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

		// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Options.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Adds a new record to the grid
	 *
	 * Called when the button to add option in the top bar has been clicked
	 */
	addOption: function () {
		var option = this.store.recordType;
		var newOption = new option({
			text: TYPO3.l10n.localize('fieldoptions_new'),
			selected: false,
			value: TYPO3.l10n.localize('fieldoptions_value')
		});
		this.stopEditing();
		this.store.add(newOption);
		this.startEditing(0, 0);
	},

	/**
	 * Stores the options in the element whenever a change has been done to the
	 * grid, like add, remove or update
	 *
	 * @param store
	 * @param record
	 */
	storeOptions: function (store, record) {
		if (record && record.dirty) {
			record.commit();
		} else {
			var option = {};
			var options = [];
			this.store.each(function (record) {
				var option = {
					text: record.get('text')
				};
				if (record.get('selected')) {
					if (!option.attributes) {
						option.attributes = {};
					}
					option.attributes['selected'] = 'selected';
				}
				if (record.get('value')) {
					if (!option.attributes) {
						option.attributes = {};
					}
					option.attributes['value'] = record.get('value');
				}
				options.push(option);
			});
			this.element.configuration.options = [];
			var formConfiguration = {
				options: options
			};
			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Convert and remap the "selected" attribute. In HTML the attribute needs
	 * be as selected="selected", while the grid uses a boolean.
	 *
	 * @param v
	 * @param record
	 * @returns {Boolean}
	 */
	convertSelected: function (v, record) {
		if (record.attributes && record.attributes.selected) {
			if (record.attributes.selected == 'selected') {
				return true;
			}
		}
		return false;
	},

	/**
	 * Remap value from different locations
	 *
	 * @param v
	 * @param record
	 * @returns {string}
	 */
	convertValue: function (v, record) {
		if (record.attributes && record.attributes.value) {
			return record.attributes.value;
		} else if (record.data) {
			return record.data;
		}
		return '';
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-options', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Options);

Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The various properties of the element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Various
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Various = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_various'),

	/** @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
		var various = this.element.configuration.various;
		var formItems = new Array();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(various, function(key, value) {
			switch(key) {
				case 'name':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_name'),
						name: 'name',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'content':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_content'),
						xtype: 'textarea',
						name: 'content',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'text':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_text'),
						xtype: 'textarea',
						name: 'text',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'headingSize':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_headingsize'),
						name: 'headingSize',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'headingSize',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: 'H1', value: 'h1'},
								{label: 'H2', value: 'h2'},
								{label: 'H3', value: 'h3'},
								{label: 'H4', value: 'h4'},
								{label: 'H5', value: 'h5'}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'prefix':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_prefix'),
						name: 'prefix',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'prefix',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('yes'), value: true},
								{label: TYPO3.l10n.localize('no'), value: false}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'suffix':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_suffix'),
						name: 'suffix',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'suffix',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('yes'), value: true},
								{label: TYPO3.l10n.localize('no'), value: false}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'middleName':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('various_properties_middlename'),
						name: 'middleName',
						xtype: 'combo',
						mode: 'local',
						triggerAction: 'all',
						forceSelection: true,
						editable: false,
						hiddenName: 'middleName',
						displayField: 'label',
						valueField: 'value',
						store: new Ext.data.JsonStore({
							fields: ['label', 'value'],
							data: [
								{label: TYPO3.l10n.localize('yes'), value: true},
								{label: TYPO3.l10n.localize('no'), value: false}
							]
						}),
						listeners: {
							'select': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
			}
		}, this);

		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				autoHeight: true,
				border: false,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'textfieldsubmit',
				items: formItems
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Various.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Fill the form with the configuration values
		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {various: {}};
			formConfiguration.various[fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues(this.element.configuration.various);
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'various', valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'various', valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-various', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Various);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The filters accordion panel in the element options in the left tabpanel
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_filters'),

	/**
	 * @cfg {Object} validFilters
	 * Keeps track which filters are valid. Filters contain forms which
	 * do client validation. If there is a validation change in a form in the
	 * filter, a validation event will be fired, which changes one of these
	 * values
	 */
	validFilters: {
		alphabetic: true,
		alphanumeric: true,
		currency: true,
		digit: true,
		integer: true,
		lowercase: true,
		regexp: true,
		removexss: true,
		stripnewlines: true,
		titlecase: true,
		trim: true,
		uppercase: true
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
		var filters = this.getFiltersBySettings();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		var config = {
			items: [{
				xtype: 'typo3-form-wizard-viewport-left-options-forms-filters-dummy',
				ref: 'dummy'
			}],
			tbar: [
				{
					xtype: 'combo',
					hideLabel: true,
					name: 'filters',
					ref: 'filters',
					mode: 'local',
					triggerAction: 'all',
					forceSelection: true,
					editable: false,
					hiddenName: 'filters',
					emptyText: TYPO3.l10n.localize('filters_emptytext'),
					width: 150,
					displayField: 'label',
					valueField: 'value',
					store: new Ext.data.JsonStore({
						fields: ['label', 'value'],
						data: filters
					}),
					listeners: {
						'select': {
							scope: this,
							fn: this.addFilter
						}
					}
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.superclass.initComponent.apply(this, arguments);

			// Initialize the filters when they are available for this element
		this.initFilters();
	},

	/**
	 * Called when constructing the filters accordion
	 *
	 * Checks if the element already has filters and loads these instead of the dummy
	 */
	initFilters: function() {
		var filters = this.element.configuration.filters;
		if (!Ext.isEmptyObject(filters)) {
			this.remove(this.dummy);
			Ext.iterate(filters, function(key, value) {
				this.add({
					xtype: 'typo3-form-wizard-viewport-left-options-forms-filters-' + key,
					element: this.element,
					configuration: value,
					listeners: {
						'validation': {
							fn: this.validation,
							scope: this
						}
					}
				});
			}, this);
		}
	},

	/**
	 * Add a filter to the filters list
	 *
	 * @param comboBox
	 * @param record
	 * @param index
	 */
	addFilter: function(comboBox, record, index) {
		var filter = comboBox.getValue();
		var xtype = 'typo3-form-wizard-viewport-left-options-forms-filters-' + filter;

		if (!Ext.isEmpty(this.findByType(xtype))) {
			Ext.MessageBox.alert(TYPO3.l10n.localize('filters_alert_title'), TYPO3.l10n.localize('filters_alert_description'));
		} else {
			this.remove(this.dummy);

			this.add({
				xtype: xtype,
				element: this.element,
				listeners: {
					'validation': {
						fn: this.validation,
						scope: this
					}
				}
			});
			this.doLayout();
		}
	},

	/**
	 * Remove a filter from the filters list
	 *
	 * Shows dummy when there is no filter for this element
	 *
	 * @param component
	 */
	removeFilter: function(component) {
		this.remove(component);
		this.validation(component.filter, true);
		if (this.items.length == 0) {
			this.add({
				xtype: 'typo3-form-wizard-viewport-left-options-forms-filters-dummy',
				ref: 'dummy'
			});
		}
		this.doLayout();
	},

	/**
	 * Get the allowed filters by the TSconfig settings
	 *
	 * @returns {Array}
	 */
	getFiltersBySettings: function() {
		var filters = [];
		var elementType = this.element.xtype.split('-').pop();

		var allowedDefaultFilters = [];
		try {
			allowedDefaultFilters = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.filtering.showFilters.split(/[, ]+/);
		} catch (error) {
			// The object has not been found
			allowedDefaultFilters = [
				'alphabetic',
				'alphanumeric',
				'currency',
				'digit',
				'integer',
				'lowercase',
				'regexp',
				'removexss',
				'stripnewlines',
				'titlecase',
				'trim',
				'uppercase'
			];
		}

		var allowedElementFilters = [];
		try {
			allowedElementFilters = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.filtering.showFilters.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedElementFilters = allowedDefaultFilters;
		}

		Ext.iterate(allowedElementFilters, function(item, index, allItems) {
			if (allowedDefaultFilters.indexOf(item) > -1) {
				filters.push({label: TYPO3.l10n.localize('filters_' + item), value: item});
			}
		}, this);

		return filters;
	},

	/**
	 * Called by the validation listeners of the filters
	 *
	 * Checks if all filters are valid. If not, adds a class to the accordion
	 *
	 * @param {String} filter The filter which fires the event
	 * @param {Boolean} isValid Rule is valid or not
	 */
	validation: function(filter, isValid) {
		this.validFilters[filter] = isValid;
		var accordionIsValid = true;
		Ext.iterate(this.validFilters, function(key, value) {
			if (!value) {
				accordionIsValid = false;
			}
		}, this);
		if (this.el) {
			if (accordionIsValid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'filters', isValid);
			} else if (!accordionIsValid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'filters', isValid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The filter abstract
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * @cfg {Object} Default filter configuration
	 */
	configuration: {},

	/**
	 * Constructor
	 */
	initComponent: function() {
		var fields = this.getFieldsBySettings();
		var formItems = new Array();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(fields, function(item, index, allItems) {
			switch(item) {
				case 'allowWhiteSpace':
					formItems.push({
						xtype: 'checkbox',
						fieldLabel: TYPO3.l10n.localize('filters_properties_allowwhitespace'),
						name: 'allowWhiteSpace',
						inputValue: '1',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'decimalPoint':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('filters_properties_decimalpoint'),
						name: 'decimalPoint',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'thousandSeparator':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('filters_properties_thousandseparator'),
						name: 'thousandSeparator',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'expression':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('filters_properties_expression'),
						name: 'expression',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'characterList':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('filters_properties_characterlist'),
						name: 'characterList',
						allowBlank: true,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
			}
		}, this);

		if (Ext.isEmpty(formItems)) {
			formItems.push({
				xtype: 'box',
				autoEl: {
					tag: 'div'
				},
				width: 256,
				cls: 'typo3-message message-information',
				data: [{
					title: TYPO3.l10n.localize('filters_properties_none_title'),
					description: TYPO3.l10n.localize('filters_properties_none')
				}],
				tpl: new Ext.XTemplate(
					'<tpl for=".">',
						'<p><strong>{title}</strong></p>',
						'<p>{description}</p>',
					'</tpl>'
				)

			});
		}

		formItems.push({
			xtype: 'button',
			text: TYPO3.l10n.localize('button_remove'),
			handler: this.removeFilter,
			scope: this
		});

		var config = {
			items: [
				{
					xtype: 'fieldset',
					title: this.filter,
					autoHeight: true,
					defaults: {
						width: 128,
						msgTarget: 'side'
					},
					defaultType: 'textfieldsubmit',
					items: formItems
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Strange, but we need to call doLayout() after render
		this.on('afterrender', this.newOrExistingFilter, this);
	},

	/**
	 * Decide whether this is a new or an existing one
	 *
	 * If new, the default configuration has to be added to the filters
	 * of the element, otherwise we can fill the form with the existing configuration
	 */
	newOrExistingFilter: function() {
		this.doLayout();
			// Existing filter
		if (this.element.configuration.filters[this.filter]) {
			this.fillForm();
			// New filter
		} else {
			this.addFilterToElement();
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * When filling, the events of all form elements should be suspended,
	 * otherwise the values are written back to the element, for instance on a
	 * check event on a checkbox.
	 */
	fillForm: function() {
		this.suspendEventsBeforeFilling();
		this.getForm().setValues(this.element.configuration.filters[this.filter]);
		this.resumeEventsAfterFilling();
	},

	/**
	 * Suspend the events on all items within this component
	 */
	suspendEventsBeforeFilling: function() {
		this.cascade(function(item) {
			item.suspendEvents();
		});
	},

	/**
	 * Resume the events on all items within this component
	 */
	resumeEventsAfterFilling: function() {
		this.cascade(function(item) {
			item.resumeEvents();
		});
	},

	/**
	 * Add this filter to the element
	 */
	addFilterToElement: function() {
		var formConfiguration = {filters: {}};
		formConfiguration.filters[this.filter] = this.configuration;

		this.element.setConfigurationValue(formConfiguration);

		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {filters: {}};
			formConfiguration.filters[this.filter] = {};
			formConfiguration.filters[this.filter][fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Remove the filter
	 *
	 * Called when the remove button of this filter has been clicked
	 */
	removeFilter: function() {
		this.ownerCt.removeFilter(this);
		this.element.removeFilter(this.filter);
	},

	/**
	 * Get the fields for the element
	 *
	 * Based on the TSconfig general allowed fields
	 * and the TSconfig allowed fields for this type of element
	 *
	 * @returns object
	 */
	getFieldsBySettings: function() {
		var fields = [];
		var filterFields = this.configuration;
		var elementType = this.element.xtype.split('-').pop();

		var allowedGeneralFields = [];
		try {
			allowedGeneralFields = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.filtering.filters[this.filter].showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedGeneralFields = [
				'allowWhiteSpace',
				'decimalPoint',
				'thousandSeparator',
				'expression',
				'characterList'
			];
		}

		var allowedElementFields = [];
		try {
			allowedElementFields = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.filtering.filters[this.filter].showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedElementFields = allowedGeneralFields;
		}

		Ext.iterate(allowedElementFields, function(item, index, allItems) {
			if (allowedGeneralFields.indexOf(item) > -1 && Ext.isDefined(filterFields[item])) {
				fields.push(item);
			}
		}, this);

		return fields;
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', this.filter, valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', this.filter, valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-filter', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The dummy item when no filter is defined for an element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Dummy
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Dummy = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'formwizard-left-dummy typo3-message message-information',

	/**
	 * @cfg {Mixed} data
	 * The initial set of data to apply to the tpl to update the content area of
	 * the Component.
	 */
	data: [{
		title: TYPO3.l10n.localize('filters_dummy_title'),
		description: TYPO3.l10n.localize('filters_dummy_description')
	}],

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<tpl for=".">',
			'<p><strong>{title}</strong></p>',
			'<p>{description}</p>',
		'</tpl>'
	)
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-dummy', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Dummy);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The alphabetic filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphabetic
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphabetic = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'alphabetic',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				allowWhiteSpace: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphabetic.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-alphabetic', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphabetic);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The alphanumeric filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphanumeric
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphanumeric = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'alphanumeric',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				allowWhiteSpace: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphanumeric.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-alphanumeric', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Alphanumeric);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The currency filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Currency
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Currency = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'currency',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				decimalPoint: '.',
				thousandSeparator: ','
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Currency.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-currency', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Currency);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The digit filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Digit
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Digit = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'digit'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-digit', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Digit);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The integer filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Integer
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Integer = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'integer'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-integer', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Integer);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The lower case filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.LowerCase
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.LowerCase = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'lowercase'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-lowercase', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.LowerCase);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The regular expression filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RegExp
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RegExp = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'regexp',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				expression: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RegExp.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-regexp', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RegExp);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The remove XSS filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RemoveXSS
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RemoveXSS = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'removexss'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-removexss', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.RemoveXSS);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The strip new lines filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.StripNewLines
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.StripNewLines = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'stripnewlines'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-stripnewlines', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.StripNewLines);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The title case filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.TitleCase
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.TitleCase = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'titlecase'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-titlecase', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.TitleCase);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The trim filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Trim
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Trim = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'trim',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				characterList: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Trim.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-trim', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Trim);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters');

/**
 * The upper case filter
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.UpperCase
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.UpperCase = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.Filter, {
	/**
	 * @cfg {String} filter
	 *
	 * The name of this filter
	 */
	filter: 'uppercase'
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-filters-uppercase', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Filters.UpperCase);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms');

/**
 * The validation accordion panel in the element options in the left tabpanel
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('options_validation'),

	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-options-validation',

	/**
	 * @cfg {Object} validRules
	 * Keeps track which rules are valid. Rules contain forms which
	 * do client validation. If there is a validation change in a form in the
	 * rule, a validation event will be fired, which changes one of these
	 * values
	 */
	validRules: {
		alphabetic: true,
		alphanumeric: true,
		between: true,
		date: true,
		digit: true,
		email: true,
		equals: true,
		fileallowedtypes: true,
		float: true,
		greaterthan: true,
		inarray: true,
		integer: true,
		ip: true,
		length: true,
		lessthan: true,
		regexp: true,
		required: true,
		uri: true
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the accordion
	 */
	initComponent: function() {
		var rules = this.getRulesBySettings();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		var config = {
			items: [{
				xtype: 'typo3-form-wizard-viewport-left-options-forms-validation-dummy',
				ref: 'dummy'
			}],
			tbar: [
				{
					xtype: 'combo',
					hideLabel: true,
					name: 'rules',
					ref: 'rules',
					mode: 'local',
					triggerAction: 'all',
					forceSelection: true,
					editable: false,
					hiddenName: 'rules',
					emptyText: TYPO3.l10n.localize('validation_emptytext'),
					width: 150,
					displayField: 'label',
					valueField: 'value',
					store: new Ext.data.JsonStore({
						fields: ['label', 'value'],
						data: rules
					}),
					listeners: {
						'select': {
							scope: this,
							fn: this.addRule
						}
					}
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.superclass.initComponent.apply(this, arguments);

			// Initialize the rules when they are available for this element
		this.initRules();
	},

	/**
	 * Called when constructing the validation accordion
	 *
	 * Checks if the element already has rules and loads these instead of the dummy
	 */
	initRules: function() {
		var rules = this.element.configuration.validation;
		if (!Ext.isEmptyObject(rules)) {
			this.remove(this.dummy);
			Ext.iterate(rules, function(key, value) {
				var xtype = 'typo3-form-wizard-viewport-left-options-forms-validation-' + key;
				if (Ext.ComponentMgr.isRegistered(xtype)) {
					this.add({
						xtype: xtype,
						element: this.element,
						configuration: value,
						listeners: {
							'validation': {
								fn: this.validation,
								scope: this
							}
						}
					});
				}
			}, this);
		}
	},

	/**
	 * Add a rule to the validation list
	 *
	 * @param comboBox
	 * @param record
	 * @param index
	 */
	addRule: function(comboBox, record, index) {
		var rule = comboBox.getValue();
		var xtype = 'typo3-form-wizard-viewport-left-options-forms-validation-' + rule;

		if (!Ext.isEmpty(this.findByType(xtype))) {
			Ext.MessageBox.alert(TYPO3.l10n.localize('validation_alert_title'), TYPO3.l10n.localize('validation_alert_description'));
		} else {
			this.remove(this.dummy);

			this.add({
				xtype: xtype,
				element: this.element,
				listeners: {
					'validation': {
						fn: this.validation,
						scope: this
					}
				}
			});
			this.doLayout();
		}
	},

	/**
	 * Remove a rule from the validation list
	 *
	 * Shows dummy when there is no validation rule for this element
	 *
	 * @param component
	 */
	removeRule: function(component) {
		this.remove(component);
		this.validation(component.rule, true);
		if (this.items.length == 0) {
			this.add({
				xtype: 'typo3-form-wizard-viewport-left-options-forms-validation-dummy',
				ref: 'dummy'
			});
		}
		this.doLayout();
	},

	/**
	 * Get the rules by the TSconfig settings
	 *
	 * @returns {Array}
	 */
	getRulesBySettings: function() {
		var rules = [];
		var elementType = this.element.xtype.split('-').pop();

		var allowedDefaultRules = [];
		try {
			allowedDefaultRules = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.validation.showRules.split(/[, ]+/);
		} catch (error) {
			// The object has not been found
			allowedDefaultRules = [
				'alphabetic',
				'alphanumeric',
				'between',
				'date',
				'digit',
				'email',
				'equals',
				'fileallowedtypes',
				'float',
				'greaterthan',
				'inarray',
				'integer',
				'ip',
				'length',
				'lessthan',
				'regexp',
				'required',
				'uri'
			];
		}

		var allowedElementRules = [];
		try {
			allowedElementRules = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.validation.showRules.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedElementRules = allowedDefaultRules;
		}

		Ext.iterate(allowedElementRules, function(item, index, allItems) {
			if (allowedDefaultRules.indexOf(item) > -1) {
				rules.push({label: TYPO3.l10n.localize('validation_' + item), value: item});
			}
		}, this);

		return rules;
	},

	/**
	 * Called by the validation listeners of the rules
	 *
	 * Checks if all rules are valid. If not, adds a class to the accordion
	 *
	 * @param {String} rule The rule which fires the event
	 * @param {Boolean} isValid Rule is valid or not
	 */
	validation: function(rule, isValid) {
		this.validRules[rule] = isValid;
		var accordionIsValid = true;
		Ext.iterate(this.validRules, function(key, value) {
			if (!value) {
				accordionIsValid = false;
			}
		}, this);
		if (this.el) {
			if (accordionIsValid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'validation', isValid);
			} else if (!accordionIsValid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'validation', isValid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The validation rules abstract
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: '',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * Constructor
	 */
	initComponent: function() {
		var fields = this.getFieldsBySettings();
		var formItems = new Array();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(fields, function(item, index, allItems) {
			switch(item) {
				case 'message':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_message'),
						name: 'message',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'error':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_error'),
						name: 'error',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'showMessage':
					formItems.push({
						xtype: 'checkbox',
						fieldLabel: TYPO3.l10n.localize('validation_properties_showmessage'),
						name: 'showMessage',
						inputValue: '1',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'allowWhiteSpace':
					formItems.push({
						xtype: 'checkbox',
						fieldLabel: TYPO3.l10n.localize('validation_properties_allowwhitespace'),
						name: 'allowWhiteSpace',
						inputValue: '1',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'minimum':
					formItems.push({
						xtype: 'spinnerfield',
						fieldLabel: TYPO3.l10n.localize('validation_properties_minimum'),
						name: 'minimum',
						minValue: 0,
						accelerate: true,
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'maximum':
					formItems.push({
						xtype: 'spinnerfield',
						fieldLabel: TYPO3.l10n.localize('validation_properties_maximum'),
						name: 'maximum',
						minValue: 0,
						accelerate: true,
						listeners: {
							'spin': {
								scope: this,
								fn: this.storeValue
							},
							'blur': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'inclusive':
					formItems.push({
						xtype: 'checkbox',
						fieldLabel: TYPO3.l10n.localize('validation_properties_inclusive'),
						name: 'inclusive',
						inputValue: '1',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'format':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_format'),
						name: 'format',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'field':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_field'),
						name: 'field',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'array':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_array'),
						name: 'array',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'expression':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_expression'),
						name: 'expression',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
				case 'types':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('validation_properties_types'),
						name: 'types',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
			}
		}, this);

		formItems.push({
			xtype: 'button',
			text: TYPO3.l10n.localize('button_remove'),
			handler: this.removeRule,
			scope: this
		});

		var config = {
			items: [
				{
					xtype: 'fieldset',
					title: TYPO3.l10n.localize('validation_' + this.rule),
					autoHeight: true,
					defaults: {
						width: 128,
						msgTarget: 'side'
					},
					defaultType: 'textfieldsubmit',
					items: formItems
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Strange, but we need to call doLayout() after render
		this.on('afterrender', this.newOrExistingRule, this);
	},

	/**
	 * Decide whether this is a new or an existing one
	 *
	 * If new, the default configuration has to be added to the validation rules
	 * of the element, otherwise we can fill the form with the existing configuration
	 */
	newOrExistingRule: function() {
		this.doLayout();
			// Existing rule
		if (this.element.configuration.validation[this.rule]) {
			this.fillForm();
			// New rule
		} else {
			this.addRuleToElement();
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * When filling, the events of all form elements should be suspended,
	 * otherwise the values are written back to the element, for instance on a
	 * check event on a checkbox.
	 */
	fillForm: function() {
		this.suspendEventsBeforeFilling();
		this.getForm().setValues(this.element.configuration.validation[this.rule]);
		this.resumeEventsAfterFilling();
	},

	/**
	 * Suspend the events on all items within this component
	 */
	suspendEventsBeforeFilling: function() {
		this.cascade(function(item) {
			item.suspendEvents();
		});
	},

	/**
	 * Resume the events on all items within this component
	 */
	resumeEventsAfterFilling: function() {
		this.cascade(function(item) {
			item.resumeEvents();
		});
	},

	/**
	 * Add this rule to the element
	 */
	addRuleToElement: function() {
		var formConfiguration = {validation: {}};
		formConfiguration.validation[this.rule] = this.configuration;

		this.element.setConfigurationValue(formConfiguration);

		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {validation: {}};
			formConfiguration.validation[this.rule] = {};
			formConfiguration.validation[this.rule][fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Remove the rule
	 *
	 * Called when the remove button of this rule has been clicked
	 */
	removeRule: function() {
		this.ownerCt.removeRule(this);
		this.element.removeValidationRule(this.rule);
	},

	/**
	 * Get the fields for the element
	 *
	 * Based on the TSconfig general allowed fields
	 * and the TSconfig allowed fields for this type of element
	 *
	 * @returns object
	 */
	getFieldsBySettings: function() {
		var fields = [];
		var ruleFields = this.configuration;
		var elementType = this.element.xtype.split('-').pop();

		var allowedGeneralFields = [];
		try {
			allowedGeneralFields = TYPO3.Form.Wizard.Settings.defaults.tabs.options.accordions.validation.rules[this.rule].showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedGeneralFields = [
				'message',
				'error',
				'showMessage',
				'allowWhiteSpace',
				'minimum',
				'maximum',
				'inclusive',
				'format',
				'field',
				'array',
				'strict',
				'expression'
			];
		}

		var allowedElementFields = [];
		try {
			allowedElementFields = TYPO3.Form.Wizard.Settings.elements[elementType].accordions.validation.rules[this.rule].showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedElementFields = allowedGeneralFields;
		}

		Ext.iterate(allowedElementFields, function(item, index, allItems) {
			if (allowedGeneralFields.indexOf(item) > -1 && Ext.isDefined(ruleFields[item])) {
				fields.push(item);
			}
		}, this);

		return fields;
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', this.rule, valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', this.rule, valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-rule', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The dummy item when no validation rule is defined for an element
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Dummy
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Dummy = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'formwizard-left-dummy typo3-message message-information',

	/**
	 * @cfg {Mixed} data
	 * The initial set of data to apply to the tpl to update the content area of
	 * the Component.
	 */
	data: [{
		title: TYPO3.l10n.localize('validation_dummy_title'),
		description: TYPO3.l10n.localize('validation_dummy_description')
	}],

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<tpl for=".">',
			'<p><strong>{title}</strong></p>',
			'<p>{description}</p>',
		'</tpl>'
	)
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-dummy', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Dummy);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The alphabetic validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphabetic
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphabetic = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'alphabetic',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_alphabetic.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_alphabetic.error'),
				allowWhiteSpace: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphabetic.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-alphabetic', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphabetic);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The alphanumeric validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphanumeric
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphanumeric = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'alphanumeric',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_alphanumeric.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_alphanumeric.error'),
				allowWhiteSpace: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphanumeric.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-alphanumeric', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Alphanumeric);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The between validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Between
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Between = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'between',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_between.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_between.error'),
				minimum: 0,
				maximum: 0,
				inclusive: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Between.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-between', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Between);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The date validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Date
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Date = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'date',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_date.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_date.error'),
				format: '%e-%m-%Y'
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Date.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-date', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Date);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The digit validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Digit
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Digit = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'digit',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_digit.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_digit.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Digit.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-digit', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Digit);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The email validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Email
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Email = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'email',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_email.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_email.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Email.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-email', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Email);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The equals validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Email
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Equals = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'equals',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_equals.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_equals.error'),
				field: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Equals.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-equals', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Equals);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.FileAllowedTypes');

/**
 * The allowed file types rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileAllowedTypes
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileAllowedTypes = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'fileallowedtypes',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_fileallowedtypes.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_fileallowedtypes.error'),
				types: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileAllowedTypes.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-fileallowedtypes', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileAllowedTypes);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.FileMaximumSize');

/**
 * The maximum file size rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMaximumSize
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMaximumSize = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'filemaximumsize',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_filemaximumsize.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_filemaximumsize.error'),
				maximum: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMaximumSize.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-filemaximumsize', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMaximumSize);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.FileMinimumSize');

/**
 * The minimum file size rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMinimumSize
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMinimumSize = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'fileminimumsize',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_fileminimumsize.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_fileminimumsize.error'),
				minimum: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMinimumSize.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-fileminimumsize', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.FileMinimumSize);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The float validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Float
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Float = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'float',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_float.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_float.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Float.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-float', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Float);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The greater than validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.GreaterThan
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.GreaterThan = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'greaterthan',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_greaterthan.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_greaterthan.error'),
				minimum: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.GreaterThan.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-greaterthan', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.GreaterThan);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The in arrayt validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.InArray
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.InArray = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'inarray',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_inarray.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_inarray.error'),
				array: '',
				strict: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.InArray.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-inarray', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.InArray);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The integer validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Integer
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Integer = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'integer',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_integer.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_integer.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Integer.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-integer', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Integer);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The IP validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Ip
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Ip = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'ip',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_ip.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_ip.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Ip.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-ip', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Ip);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The length validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Length
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Length = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'length',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_length.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_length.error'),
				minimum: 0,
				maximum: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Length.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-length', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Length);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The less than validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.LessThan
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.LessThan = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'lessthan',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_lessthan.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_lessthan.error'),
				maximum: 0
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.LessThan.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-lessthan', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.LessThan);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The regular expression validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.RegExp
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.RegExp = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'regexp',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_regexp.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_regexp.error'),
				expression: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.RegExp.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-regexp', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.RegExp);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The required validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Required
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Required = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'required',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_required.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_required.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Required.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-required', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Required);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The uri validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Uri
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Uri = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'uri',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				showMessage: 1,
				message: TYPO3.l10n.localize('tx_form_system_validate_uri.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_uri.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Uri.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-uri', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Uri);
Ext.namespace('TYPO3.Form.Wizard.Viewport.LeftTYPO3.Form.Wizard.Elements');

/**
 * The form tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Form = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-form',

	/**
	 * @cfg {String} cls
	 * An optional extra CSS class that will be added to this component's
	 * Element (defaults to ''). This can be useful for adding customized styles
	 * to the component or any of its children using standard CSS rules.
	 */
	cls: 'x-tab-panel-body-content',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('left_form'),

	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Object|Function} defaults
	 * This option is a means of applying default settings to all added items
	 * whether added through the items config or via the add or insert methods.
	 */
	defaults: {
		//autoHeight: true,
		border: false,
		padding: 0
	},

	/**
	 * @cfg {Object} validAccordions
	 * Keeps track which accordions are valid. Accordions contain forms which
	 * do client validation. If there is a validation change in a form in the
	 * accordion, a validation event will be fired, which changes one of these
	 * values
	 */
	validAccordions: {
		behaviour: true,
		prefix: true,
		attributes: true,
		postProcessor: true
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var config = {
			items: [{
				xtype: 'panel',
				layout: 'accordion',
				ref: 'accordion',
				defaults: {
					autoHeight: true,
					cls: 'x-panel-accordion'
				}
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Form.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Called whenever a form has been added to the right container
	 *
	 * Sets element to the form component and calls the function to add the
	 * attribute fields
	 *
	 * @param form
	 */
	setForm: function(form) {
		var allowedAccordions = TYPO3.Form.Wizard.Settings.defaults.tabs.form.showAccordions.split(/[, ]+/);

		this.accordion.removeAll();
		if (form) {
			Ext.each(allowedAccordions, function(option, index, length) {
				switch (option) {
					case 'behaviour':
						this.accordion.add({
							xtype: 'typo3-form-wizard-viewport-left-form-behaviour',
							element: form,
							listeners: {
								'validation': {
									fn: this.validation,
									scope: this
								}
							}
						});
						break;
					case 'prefix':
						this.accordion.add({
							xtype: 'typo3-form-wizard-viewport-left-form-prefix',
							element: form,
							listeners: {
								'validation': {
									fn: this.validation,
									scope: this
								}
							}
						});
						break;
					case 'attributes':
						this.accordion.add({
							xtype: 'typo3-form-wizard-viewport-left-form-attributes',
							element: form,
							listeners: {
								'validation': {
									fn: this.validation,
									scope: this
								}
							}
						});
						break;
					case 'postProcessor':
						this.accordion.add({
							xtype: 'typo3-form-wizard-viewport-left-form-postprocessor',
							element: form,
							listeners: {
								'validation': {
									fn: this.validation,
									scope: this
								}
							}
						});
						break;
				}
			}, this);
		}
		this.doLayout();
	},

	/**
	 * Called by the validation listeners of the accordions
	 *
	 * Checks if all accordions are valid. If not, adds a class to the tab
	 *
	 * @param {String} accordion The accordion which fires the event
	 * @param {Boolean} isValid Accordion is valid or not
	 */
	validation: function(accordion, isValid) {
		this.validAccordions[accordion] = isValid;
		var tabIsValid = true;
		Ext.iterate(this.validAccordions, function(key, value) {
			if (!value) {
				tabIsValid = false;
			}
		}, this);
		if (this.tabEl) {
			var tabEl = Ext.get(this.tabEl);
			if (tabIsValid && tabEl.hasClass('validation-error')) {
				tabEl.removeClass('validation-error');
			} else if (!tabIsValid && !tabEl.hasClass('validation-error')) {
				tabEl.addClass('validation-error');
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form', TYPO3.Form.Wizard.Viewport.Left.Form);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form');

/**
 * The behaviour panel in the accordion of the form tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.Behaviour
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Form.Behaviour = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-form-behaviour',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('form_behaviour'),

	/**
	 * @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Object} element
	 * The form component
	 */
	element: null,

	/**
	 * Constructor
	 *
	 * @param config
	 */
	constructor: function(config){
		// Call our superclass constructor to complete construction process.
		TYPO3.Form.Wizard.Viewport.Left.Form.Behaviour.superclass.constructor.call(this, config);
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				ref: 'fieldset',
				autoHeight: true,
				border: false,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'checkbox',
				items: [
					{
						fieldLabel: TYPO3.l10n.localize('behaviour_confirmation_page'),
						name: 'confirmation',
						listeners: {
							'check': {
								scope: this,
								fn: this.storeValue
							}
						}
					}
				]
			}]
		};

		// Apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

		// Call parent
		TYPO3.Form.Wizard.Viewport.Left.Form.Behaviour.superclass.initComponent.apply(this, arguments);

		// Fill the form with the configuration values
		this.fillForm();
	},


	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		var fieldName = field.getName();

		var formConfiguration = {};
		formConfiguration[fieldName] = field.getValue();

		this.element.setConfigurationValue(formConfiguration);
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues(this.element.configuration);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-behaviour', TYPO3.Form.Wizard.Viewport.Left.Form.Behaviour);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form');

/**
 * The attributes panel in the accordion of the form tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.Attributes
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes
 */
TYPO3.Form.Wizard.Viewport.Left.Form.Attributes = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Attributes, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-form-attributes'
});

Ext.reg('typo3-form-wizard-viewport-left-form-attributes', TYPO3.Form.Wizard.Viewport.Left.Form.Attributes);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form');

/**
 * The prefix panel in the accordion of the form tab on the left side
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.Prefix
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Form.Prefix = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {String} id
	 * The unique id of this component (defaults to an auto-assigned id).
	 * You should assign an id if you need to be able to access the component
	 * later and you do not have an object reference available
	 * (e.g., using Ext.getCmp).
	 *
	 * Note that this id will also be used as the element id for the containing
	 * HTML element that is rendered to the page for this component.
	 * This allows you to write id-based CSS rules to style the specific
	 * instance of this component uniquely, and also to select sub-elements
	 * using this component's id as the parent.
	 */
	id: 'formwizard-left-form-prefix',

	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('form_prefix'),

	/** @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {Object} element
	 * The form component
	 */
	element: null,

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * Constructor
	 *
	 * @param config
	 */
	constructor: function(config){
			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

			// Call our superclass constructor to complete construction process.
		TYPO3.Form.Wizard.Viewport.Left.Form.Prefix.superclass.constructor.call(this, config);
	},

	/**
	 * Constructor
	 *
	 * Add the form elements to the tab
	 */
	initComponent: function() {
		var config = {
			items: [{
				xtype: 'fieldset',
				title: '',
				ref: 'fieldset',
				autoHeight: true,
				border: false,
				defaults: {
					width: 150,
					msgTarget: 'side'
				},
				defaultType: 'textfieldsubmit',
				items: [
					{
						fieldLabel: TYPO3.l10n.localize('prefix_prefix'),
						name: 'prefix',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					}
				]
			}]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Form.Prefix.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Fill the form with the configuration values
		this.fillForm();
	},


	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {};
			formConfiguration[fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * @param record The current question
	 * @return void
	 */
	fillForm: function() {
		this.getForm().setValues(this.element.configuration);
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'prefix', valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'prefix', valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-prefix', TYPO3.Form.Wizard.Viewport.Left.Form.Prefix);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form');

/**
 * The post processor accordion panel in the form options in the left tabpanel
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessor
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessor = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {String} title
	 * The title text to be used as innerHTML (html tags are accepted) to
	 * display in the panel header (defaults to '').
	 */
	title: TYPO3.l10n.localize('form_postprocessor'),

	/**
	 * @cfg {Object} validPostProcessors
	 * Keeps track which post processors are valid. Post processors contain forms which
	 * do client validation. If there is a validation change in a form in the
	 * post processor, a validation event will be fired, which changes one of these
	 * values
	 */
	validPostProcessors: {
		mail: true
	},

	/**
	 * Constructor
	 *
	 * Add the post processors to the accordion
	 */
	initComponent: function() {
		var postProcessors = this.getPostProcessorsBySettings();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		var config = {
			items: [{
				xtype: 'typo3-form-wizard-viewport-left-form-postprocessors-dummy',
				ref: 'dummy'
			}],
			tbar: [
				{
					xtype: 'combo',
					hideLabel: true,
					name: 'postprocessor',
					ref: 'postprocessor',
					mode: 'local',
					triggerAction: 'all',
					forceSelection: true,
					editable: false,
					hiddenName: 'postprocessor',
					emptyText: TYPO3.l10n.localize('postprocessor_emptytext'),
					width: 150,
					displayField: 'label',
					valueField: 'value',
					store: new Ext.data.JsonStore({
						fields: ['label', 'value'],
						data: postProcessors
					}),
					listeners: {
						'select': {
							scope: this,
							fn: this.addPostProcessor
						}
					}
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessor.superclass.initComponent.apply(this, arguments);

			// Initialize the post processors when they are available for this element
		this.initPostProcessors();
	},

	/**
	 * Called when constructing the post processor accordion
	 *
	 * Checks if the form already has post processors and loads these instead of the dummy
	 */
	initPostProcessors: function() {
		var postProcessors = this.element.configuration.postProcessor;
		if (!Ext.isEmptyObject(postProcessors)) {
			this.remove(this.dummy);
			Ext.iterate(postProcessors, function(key, value) {
				var xtype = 'typo3-form-wizard-viewport-left-form-postprocessors-' + key;
				if (Ext.ComponentMgr.isRegistered(xtype)) {
					this.add({
						xtype: xtype,
						element: this.element,
						configuration: value,
						listeners: {
							'validation': {
								fn: this.validation,
								scope: this
							}
						}
					});
				}
			}, this);
		}
	},

	/**
	 * Add a post processor to the list
	 *
	 * @param comboBox
	 * @param record
	 * @param index
	 */
	addPostProcessor: function(comboBox, record, index) {
		var postProcessor = comboBox.getValue();
		var xtype = 'typo3-form-wizard-viewport-left-form-postprocessors-' + postProcessor;

		if (!Ext.isEmpty(this.findByType(xtype))) {
			Ext.MessageBox.alert(TYPO3.l10n.localize('postprocessor_alert_title'), TYPO3.l10n.localize('postprocessor_alert_description'));
		} else {
			this.remove(this.dummy);

			this.add({
				xtype: xtype,
				element: this.element,
				listeners: {
					'validation': {
						fn: this.validation,
						scope: this
					}
				}
			});
			this.doLayout();
		}
	},

	/**
	 * Remove a post processor from the list
	 *
	 * Shows dummy when there is no post processor for the form
	 *
	 * @param component
	 */
	removePostProcessor: function(component) {
		this.remove(component);
		this.validation(component.processor, true);
		if (this.items.length == 0) {
			this.add({
				xtype: 'typo3-form-wizard-viewport-left-form-postprocessors-dummy',
				ref: 'dummy'
			});
		}
		this.doLayout();
	},

	getPostProcessorsBySettings: function() {
		var postProcessors = [];

		var allowedPostProcessors = [];
		try {
			allowedPostProcessors = TYPO3.Form.Wizard.Settings.defaults.tabs.form.accordions.postProcessor.showPostProcessors.split(/[, ]+/);
		} catch (error) {
			// The object has not been found
			allowedPostProcessors = [
				'mail'
			];
		}

		Ext.iterate(allowedPostProcessors, function(item, index, allItems) {
			postProcessors.push({label: TYPO3.l10n.localize('postprocessor_' + item), value: item});
		}, this);

		return postProcessors;
	},

	/**
	 * Called by the validation listeners of the post processors
	 *
	 * Checks if all post processors are valid. If not, adds a class to the accordion
	 *
	 * @param {String} postProcessor The post processor which fires the event
	 * @param {Boolean} isValid Post processor is valid or not
	 */
	validation: function(postProcessor, isValid) {
		this.validPostProcessors[postProcessor] = isValid;
		var accordionIsValid = true;
		Ext.iterate(this.validPostProcessors, function(key, value) {
			if (!value) {
				accordionIsValid = false;
			}
		}, this);
		if (this.el) {
			if (accordionIsValid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', 'postProcessor', accordionIsValid);
			} else if (!accordionIsValid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', 'postProcessor', accordionIsValid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-postprocessor', TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessor);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors');

/**
 * The post processor abstract
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor
 * @extends Ext.FormPanel
 */
TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor = Ext.extend(Ext.FormPanel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	/**
	 * @cfg {String} defaultType
	 *
	 * The default xtype of child Components to create in this Container when
	 * a child item is specified as a raw configuration object,
	 * rather than as an instantiated Component.
	 *
	 * Defaults to 'panel', except Ext.menu.Menu which defaults to 'menuitem',
	 * and Ext.Toolbar and Ext.ButtonGroup which default to 'button'.
	 */
	defaultType: 'textfield',

	/**
	 * @cfg {String} processor
	 *
	 * The name of this processor
	 */
	processor: '',

	/**
	 * @cfg {Boolean} monitorValid If true, the form monitors its valid state client-side and
	 * regularly fires the clientvalidation event passing that state.
	 * When monitoring valid state, the FormPanel enables/disables any of its configured
	 * buttons which have been configured with formBind: true depending
	 * on whether the form is valid or not. Defaults to false
	 */
	monitorValid: true,

	/**
	 * Constructor
	 */
	initComponent: function() {
		var fields = this.getFieldsBySettings();
		var formItems = new Array();

			// Adds the specified events to the list of events which this Observable may fire.
		this.addEvents({
			'validation': true
		});

		Ext.iterate(fields, function(item, index, allItems) {
			switch(item) {
				case 'recipientEmail':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('postprocessor_properties_recipientemail'),
						name: 'recipientEmail',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'senderEmail':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('postprocessor_properties_senderemail'),
						name: 'senderEmail',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'subject':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('postprocessor_properties_subject'),
						name: 'subject',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
				case 'destination':
					formItems.push({
						fieldLabel: TYPO3.l10n.localize('postprocessor_properties_destination'),
						name: 'destination',
						allowBlank: false,
						listeners: {
							'triggerclick': {
								scope: this,
								fn: this.storeValue
							}
						}
					});
					break;
			}
		}, this);

		formItems.push({
			xtype: 'button',
			text: TYPO3.l10n.localize('button_remove'),
			handler: this.removePostProcessor,
			scope: this
		});

		var config = {
			items: [
				{
					xtype: 'fieldset',
					title: TYPO3.l10n.localize('postprocessor_' + this.processor),
					autoHeight: true,
					defaults: {
						width: 128,
						msgTarget: 'side'
					},
					defaultType: 'textfieldsubmit',
					items: formItems
				}
			]
		};

			// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));

			// call parent
		TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor.superclass.initComponent.apply(this, arguments);

			// Initialize clientvalidation event
		this.on('clientvalidation', this.validation, this);

			// Strange, but we need to call doLayout() after render
		this.on('afterrender', this.newOrExistingPostProcessor, this);
	},

	/**
	 * Decide whether this is a new or an existing one
	 *
	 * If new, the default configuration has to be added to the processors
	 * of the form, otherwise we can fill the form with the existing configuration
	 */
	newOrExistingPostProcessor: function() {
		this.doLayout();
			// Existing processor
		if (this.element.configuration.postProcessor[this.processor]) {
			this.fillForm();
			// New processor
		} else {
			this.addProcessorToElement();
		}
	},

	/**
	 * Fill the form with the configuration of the element
	 *
	 * When filling, the events of all form elements should be suspended,
	 * otherwise the values are written back to the element, for instance on a
	 * check event on a checkbox.
	 */
	fillForm: function() {
		this.suspendEventsBeforeFilling();
		this.getForm().setValues(this.element.configuration.postProcessor[this.processor]);
		this.resumeEventsAfterFilling();
	},

	/**
	 * Suspend the events on all items within this component
	 */
	suspendEventsBeforeFilling: function() {
		this.cascade(function(item) {
			item.suspendEvents();
		});
	},

	/**
	 * Resume the events on all items within this component
	 */
	resumeEventsAfterFilling: function() {
		this.cascade(function(item) {
			item.resumeEvents();
		});
	},

	/**
	 * Add this processor to the element
	 */
	addProcessorToElement: function() {
		var formConfiguration = {postProcessor: {}};
		formConfiguration.postProcessor[this.processor] = this.configuration;

		this.element.setConfigurationValue(formConfiguration);

		this.fillForm();
	},

	/**
	 * Store a changed value from the form in the element
	 *
	 * @param {Object} field The field which has changed
	 */
	storeValue: function(field) {
		if (field.isValid()) {
			var fieldName = field.getName();

			var formConfiguration = {postProcessor: {}};
			formConfiguration.postProcessor[this.processor] = {};
			formConfiguration.postProcessor[this.processor][fieldName] = field.getValue();

			this.element.setConfigurationValue(formConfiguration);
		}
	},

	/**
	 * Remove the processor
	 *
	 * Called when the remove button of this processor has been clicked
	 */
	removePostProcessor: function() {
		this.ownerCt.removePostProcessor(this);
		this.element.removePostProcessor(this.processor);
	},

	/**
	 * Get the fields for the element
	 *
	 * Based on the TSconfig general allowed fields
	 * and the TSconfig allowed fields for this type of element
	 *
	 * @returns object
	 */
	getFieldsBySettings: function() {
		var fields = [];
		var processorFields = this.configuration;

		var allowedFields = [];
		try {
			allowedFields = TYPO3.Form.Wizard.Settings.defaults.tabs.form.accordions.postProcessor.postProcessors[this.processor].showProperties.split(/[, ]+/);
		} catch (error) {
			// The object has not been found or constructed wrong
			allowedFields = [
				'recipientEmail',
				'senderEmail'
			];
		}

		Ext.iterate(allowedFields, function(item, index, allItems) {
			fields.push(item);
		}, this);

		return fields;
	},

	/**
	 * Called by the clientvalidation event
	 *
	 * Adds or removes the error class if the form is valid or not
	 *
	 * @param {Object} formPanel This formpanel
	 * @param {Boolean} valid True if the client validation is true
	 */
	validation: function(formPanel, valid) {
		if (this.el) {
			if (valid && this.el.hasClass('validation-error')) {
				this.removeClass('validation-error');
				this.fireEvent('validation', this.processor, valid);
			} else if (!valid && !this.el.hasClass('validation-error')) {
				this.addClass('validation-error');
				this.fireEvent('validation', this.processor, valid);
			}
		}
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-postprocessors-postprocessor', TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors');

/**
 * The dummy item when no post processor is defined for the form
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Dummy
 * @extends Ext.Panel
 */
TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Dummy = Ext.extend(Ext.Panel, {
	/**
	 * @cfg {Boolean} border
	 * True to display the borders of the panel's body element, false to hide
	 * them (defaults to true). By default, the border is a 2px wide inset
	 * border, but this can be further altered by setting bodyBorder to false.
	 */
	border: false,

	/**
	 * @cfg {Number/String} padding
	 * A shortcut for setting a padding style on the body element. The value can
	 * either be a number to be applied to all sides, or a normal css string
	 * describing padding.
	 */
	padding: 0,

	cls: 'formwizard-left-dummy typo3-message message-information',

	/**
	 * @cfg {Mixed} data
	 * The initial set of data to apply to the tpl to update the content area of
	 * the Component.
	 */
	data: [{
		title: TYPO3.l10n.localize('postprocessor_dummy_title'),
		description: TYPO3.l10n.localize('postprocessor_dummy_description')
	}],

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<tpl for=".">',
			'<p><strong>{title}</strong></p>',
			'<p>{description}</p>',
		'</tpl>'
	)
});

Ext.reg('typo3-form-wizard-viewport-left-form-postprocessors-dummy', TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Dummy);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors');

/**
 * The mail post processor
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Mail
 * @extends TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor
 */
TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Mail = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor, {
	/**
	 * @cfg {String} processor
	 *
	 * The name of this processor
	 */
	processor: 'mail',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				recipientEmail: '',
				senderEmail: ''
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Mail.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-postprocessors-mail', TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Mail);
Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors');

/**
 * The redirect post processor
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Redirect
 * @extends TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor
 */
TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Redirect = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.PostProcessor, {
	/**
	 * @cfg {String} processor
	 *
	 * The name of this processor
	 */
	processor: 'redirect',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				destination: '',
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Redirect.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-form-postprocessors-redirect', TYPO3.Form.Wizard.Viewport.Left.Form.PostProcessors.Redirect);

/*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under the MIT license
 *
 * modified by bmack to wrap it as jQuery module for the backend, will be dropped for twbs 4.0
 * please do not reference outside of the TYPO3 Core (not in your own extensions)
 * as this is preliminary as long as twbs does not support AMD modules
 * this file will be deleted once twbs 4 is included
 */
// IIFE for faster access to jQuery and save $use

;(function(factory) {
	if (typeof define === 'function' && define.amd) {
		// register bootstrap as requirejs module
		define("bootstrap", ["jquery"], function($) {
			factory($);
		});
	} else {
		factory(TYPO3.jQuery || jQuery);
	}
})(function(jQuery) {
	if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1||b[0]>2)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.6",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.6",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")?(c.prop("checked")&&(a=!1),b.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==c.prop("type")&&(c.prop("checked")!==this.$element.hasClass("active")&&(a=!1),this.$element.toggleClass("active")),c.prop("checked",this.$element.hasClass("active")),a&&c.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),a(c.target).is('input[type="radio"]')||a(c.target).is('input[type="checkbox"]')||c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.6",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.6",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function c(c){c&&3===c.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=b(d),f={relatedTarget:this};e.hasClass("open")&&(c&&"click"==c.type&&/input|textarea/i.test(c.target.tagName)&&a.contains(e[0],c.target)||(e.trigger(c=a.Event("hide.bs.dropdown",f)),c.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger(a.Event("hidden.bs.dropdown",f)))))}))}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.6",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=b(e),g=f.hasClass("open");if(c(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click",c);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger(a.Event("shown.bs.dropdown",h))}return!1}},g.prototype.keydown=function(c){if(/(38|40|27|32)/.test(c.which)&&!/input|textarea/i.test(c.target.tagName)){var d=a(this);if(c.preventDefault(),c.stopPropagation(),!d.is(".disabled, :disabled")){var e=b(d),g=e.hasClass("open");if(!g&&27!=c.which||g&&27==c.which)return 27==c.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find(".dropdown-menu"+h);if(i.length){var j=i.index(c.target);38==c.which&&j>0&&j--,40==c.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",c).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.6",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in"),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a(document.createElement("div")).addClass("modal-backdrop "+e).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",a,b)};c.VERSION="3.3.6",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(a.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusin"==b.type?"focus":"hover"]=!0),c.tip().hasClass("in")||"in"==c.hoverState?void(c.hoverState="in"):(clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.isInStateTrue=function(){for(var a in this.inState)if(this.inState[a])return!0;return!1},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusout"==b.type?"focus":"hover"]=!1),c.isInStateTrue()?void 0:(clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide())},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.getPosition(this.$viewport);h="bottom"==h&&k.bottom+m>o.bottom?"top":"top"==h&&k.top-m<o.top?"bottom":"right"==h&&k.right+l>o.width?"left":"left"==h&&k.left-l<o.left?"right":h,f.removeClass(n).addClass(h)}var p=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(p,h);var q=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",q).emulateTransitionEnd(c.TRANSITION_DURATION):q()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top+=g,b.left+=h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.right&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){if(!this.$tip&&(this.$tip=a(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),b?(c.inState.click=!c.inState.click,c.isInStateTrue()?c.enter(c):c.leave(c)):c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type),a.$tip&&a.$tip.detach(),a.$tip=null,a.$arrow=null,a.$viewport=null})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.6",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.6",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");
		d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.6",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.6",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=Math.max(a(document).height(),a(document.body).height());"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);
});