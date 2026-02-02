<?php

/**
Template Name: Giao diện
 */

get_header();
?>
<main>
	<!-- <?php
	if ( have_rows( 'template_components' ) )
	{
		while ( have_rows( 'template_components' ) ) :
			the_row();
			$module_name = get_row_layout();
			switch ( $module_name ) :
				case $module_name:
					get_template_part( 'components/' . $module_name );
			endswitch;
		endwhile;
	}
	?>
	<h1 class="hidden">
		<?php echo wp_title() ?>
	</h1> -->
<h1 class="d-none">Elite Tour - Công ty du lịch uy tín chuyên Tour, Du thuyền, Khách sạn</h1>
	<section class="awe-section-1">
		<div class="home-slider">
			<div class="item">
				<a href="<?php echo home_url('/'); ?>" class="clearfix" title="Công ty du lịch Elite Tour">
					<picture>
						<source media="(min-width: 1200px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/test.webp">
						<source media="(min-width: 992px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/test.webp">
						<source media="(min-width: 569px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/test.webp">
						<source media="(min-width: 480px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/test.webp">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/test.webp" alt="Công ty du lịch Elite Tour"
							class="lazy img-responsive mx-auto d-block">
					</picture>
				</a>
			</div>
		</div>
		<script>
			!function (a) { "function" == typeof define && define.amd ? define(["jquery", "./core"], a) : a(jQuery) }(function (a) {
				function b(a) { for (var b, c; a.length && a[0] !== document;) { if (b = a.css("position"), ("absolute" === b || "relative" === b || "fixed" === b) && (c = parseInt(a.css("zIndex"), 10), !isNaN(c) && 0 !== c)) return c; a = a.parent() } return 0 } function c() { this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = { closeText: "Done", prevText: "Prev", nextText: "Next", currentText: "Today", monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"], weekHeader: "Wk", dateFormat: "mm/dd/yy", firstDay: 0, isRTL: !1, showMonthAfterYear: !1, yearSuffix: "" }, this._defaults = { showOn: "focus", showAnim: "fadeIn", showOptions: {}, defaultDate: null, appendText: "", buttonText: "...", buttonImage: "", buttonImageOnly: !1, hideIfNoPrevNext: !1, navigationAsDateFormat: !1, gotoCurrent: !1, changeMonth: !1, changeYear: !1, yearRange: "c-10:c+10", showOtherMonths: !1, selectOtherMonths: !1, showWeek: !1, calculateWeek: this.iso8601Week, shortYearCutoff: "+10", minDate: null, maxDate: null, duration: "fast", beforeShowDay: null, beforeShow: null, onSelect: null, onChangeMonthYear: null, onClose: null, numberOfMonths: 1, showCurrentAtPos: 0, stepMonths: 1, stepBigMonths: 12, altField: "", altFormat: "", constrainInput: !0, showButtonPanel: !1, autoSize: !1, disabled: !1 }, a.extend(this._defaults, this.regional[""]), this.regional.en = a.extend(!0, {}, this.regional[""]), this.regional["en-US"] = a.extend(!0, {}, this.regional.en), this.dpDiv = d(a("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) } function d(b) { var c = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a"; return b.delegate(c, "mouseout", function () { a(this).removeClass("ui-state-hover"), this.className.indexOf("ui-datepicker-prev") !== -1 && a(this).removeClass("ui-datepicker-prev-hover"), this.className.indexOf("ui-datepicker-next") !== -1 && a(this).removeClass("ui-datepicker-next-hover") }).delegate(c, "mouseover", e) } function e() { a.datepicker._isDisabledDatepicker(g.inline ? g.dpDiv.parent()[0] : g.input[0]) || (a(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), a(this).addClass("ui-state-hover"), this.className.indexOf("ui-datepicker-prev") !== -1 && a(this).addClass("ui-datepicker-prev-hover"), this.className.indexOf("ui-datepicker-next") !== -1 && a(this).addClass("ui-datepicker-next-hover")) } function f(b, c) { a.extend(b, c); for (var d in c) null == c[d] && (b[d] = c[d]); return b } a.extend(a.ui, { datepicker: { version: "1.11.4" } }); var g; return a.extend(c.prototype, {
					markerClassName: "hasDatepicker", maxRows: 4, _widgetDatepicker: function () { return this.dpDiv }, setDefaults: function (a) { return f(this._defaults, a || {}), this }, _attachDatepicker: function (b, c) { var d, e, f; d = b.nodeName.toLowerCase(), e = "div" === d || "span" === d, b.id || (this.uuid += 1, b.id = "dp" + this.uuid), f = this._newInst(a(b), e), f.settings = a.extend({}, c || {}), "input" === d ? this._connectDatepicker(b, f) : e && this._inlineDatepicker(b, f) }, _newInst: function (b, c) { var e = b[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1"); return { id: e, input: b, selectedDay: 0, selectedMonth: 0, selectedYear: 0, drawMonth: 0, drawYear: 0, inline: c, dpDiv: c ? d(a("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) : this.dpDiv } }, _connectDatepicker: function (b, c) { var d = a(b); c.append = a([]), c.trigger = a([]), d.hasClass(this.markerClassName) || (this._attachments(d, c), d.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp), this._autoSize(c), a.data(b, "datepicker", c), c.settings.disabled && this._disableDatepicker(b)) }, _attachments: function (b, c) { var d, e, f, g = this._get(c, "appendText"), h = this._get(c, "isRTL"); c.append && c.append.remove(), g && (c.append = a("<span class='" + this._appendClass + "'>" + g + "</span>"), b[h ? "before" : "after"](c.append)), b.unbind("focus", this._showDatepicker), c.trigger && c.trigger.remove(), d = this._get(c, "showOn"), "focus" !== d && "both" !== d || b.focus(this._showDatepicker), "button" !== d && "both" !== d || (e = this._get(c, "buttonText"), f = this._get(c, "buttonImage"), c.trigger = a(this._get(c, "buttonImageOnly") ? a("<img/>").addClass(this._triggerClass).attr({ src: f, alt: e, title: e }) : a("<button type='button'></button>").addClass(this._triggerClass).html(f ? a("<img/>").attr({ src: f, alt: e, title: e }) : e)), b[h ? "before" : "after"](c.trigger), c.trigger.click(function () { return a.datepicker._datepickerShowing && a.datepicker._lastInput === b[0] ? a.datepicker._hideDatepicker() : a.datepicker._datepickerShowing && a.datepicker._lastInput !== b[0] ? (a.datepicker._hideDatepicker(), a.datepicker._showDatepicker(b[0])) : a.datepicker._showDatepicker(b[0]), !1 })) }, _autoSize: function (a) { if (this._get(a, "autoSize") && !a.inline) { var b, c, d, e, f = new Date(2009, 11, 20), g = this._get(a, "dateFormat"); g.match(/[DM]/) && (b = function (a) { for (c = 0, d = 0, e = 0; e < a.length; e++)a[e].length > c && (c = a[e].length, d = e); return d }, f.setMonth(b(this._get(a, g.match(/MM/) ? "monthNames" : "monthNamesShort"))), f.setDate(b(this._get(a, g.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - f.getDay())), a.input.attr("size", this._formatDate(a, f).length) } }, _inlineDatepicker: function (b, c) { var d = a(b); d.hasClass(this.markerClassName) || (d.addClass(this.markerClassName).append(c.dpDiv), a.data(b, "datepicker", c), this._setDate(c, this._getDefaultDate(c), !0), this._updateDatepicker(c), this._updateAlternate(c), c.settings.disabled && this._disableDatepicker(b), c.dpDiv.css("display", "block")) }, _dialogDatepicker: function (b, c, d, e, g) { var h, i, j, k, l, m = this._dialogInst; return m || (this.uuid += 1, h = "dp" + this.uuid, this._dialogInput = a("<input type='text' id='" + h + "' style='position: absolute; top: -100px; width: 0px;'/>"), this._dialogInput.keydown(this._doKeyDown), a("body").append(this._dialogInput), m = this._dialogInst = this._newInst(this._dialogInput, !1), m.settings = {}, a.data(this._dialogInput[0], "datepicker", m)), f(m.settings, e || {}), c = c && c.constructor === Date ? this._formatDate(m, c) : c, this._dialogInput.val(c), this._pos = g ? g.length ? g : [g.pageX, g.pageY] : null, this._pos || (i = document.documentElement.clientWidth, j = document.documentElement.clientHeight, k = document.documentElement.scrollLeft || document.body.scrollLeft, l = document.documentElement.scrollTop || document.body.scrollTop, this._pos = [i / 2 - 100 + k, j / 2 - 150 + l]), this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), m.settings.onSelect = d, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), a.blockUI && a.blockUI(this.dpDiv), a.data(this._dialogInput[0], "datepicker", m), this }, _destroyDatepicker: function (b) { var c, d = a(b), e = a.data(b, "datepicker"); d.hasClass(this.markerClassName) && (c = b.nodeName.toLowerCase(), a.removeData(b, "datepicker"), "input" === c ? (e.append.remove(), e.trigger.remove(), d.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)) : "div" !== c && "span" !== c || d.removeClass(this.markerClassName).empty(), g === e && (g = null)) }, _enableDatepicker: function (b) { var c, d, e = a(b), f = a.data(b, "datepicker"); e.hasClass(this.markerClassName) && (c = b.nodeName.toLowerCase(), "input" === c ? (b.disabled = !1, f.trigger.filter("button").each(function () { this.disabled = !1 }).end().filter("img").css({ opacity: "1.0", cursor: "" })) : "div" !== c && "span" !== c || (d = e.children("." + this._inlineClass), d.children().removeClass("ui-state-disabled"), d.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !1)), this._disabledInputs = a.map(this._disabledInputs, function (a) { return a === b ? null : a })) }, _disableDatepicker: function (b) { var c, d, e = a(b), f = a.data(b, "datepicker"); e.hasClass(this.markerClassName) && (c = b.nodeName.toLowerCase(), "input" === c ? (b.disabled = !0, f.trigger.filter("button").each(function () { this.disabled = !0 }).end().filter("img").css({ opacity: "0.5", cursor: "default" })) : "div" !== c && "span" !== c || (d = e.children("." + this._inlineClass), d.children().addClass("ui-state-disabled"), d.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !0)), this._disabledInputs = a.map(this._disabledInputs, function (a) { return a === b ? null : a }), this._disabledInputs[this._disabledInputs.length] = b) }, _isDisabledDatepicker: function (a) { if (!a) return !1; for (var b = 0; b < this._disabledInputs.length; b++)if (this._disabledInputs[b] === a) return !0; return !1 }, _getInst: function (b) { try { return a.data(b, "datepicker") } catch (c) { throw "Missing instance data for this datepicker" } }, _optionDatepicker: function (b, c, d) { var e, g, h, i, j = this._getInst(b); return 2 === arguments.length && "string" == typeof c ? "defaults" === c ? a.extend({}, a.datepicker._defaults) : j ? "all" === c ? a.extend({}, j.settings) : this._get(j, c) : null : (e = c || {}, "string" == typeof c && (e = {}, e[c] = d), void (j && (this._curInst === j && this._hideDatepicker(), g = this._getDateDatepicker(b, !0), h = this._getMinMaxDate(j, "min"), i = this._getMinMaxDate(j, "max"), f(j.settings, e), null !== h && void 0 !== e.dateFormat && void 0 === e.minDate && (j.settings.minDate = this._formatDate(j, h)), null !== i && void 0 !== e.dateFormat && void 0 === e.maxDate && (j.settings.maxDate = this._formatDate(j, i)), "disabled" in e && (e.disabled ? this._disableDatepicker(b) : this._enableDatepicker(b)), this._attachments(a(b), j), this._autoSize(j), this._setDate(j, g), this._updateAlternate(j), this._updateDatepicker(j)))) }, _changeDatepicker: function (a, b, c) { this._optionDatepicker(a, b, c) }, _refreshDatepicker: function (a) { var b = this._getInst(a); b && this._updateDatepicker(b) }, _setDateDatepicker: function (a, b) { var c = this._getInst(a); c && (this._setDate(c, b), this._updateDatepicker(c), this._updateAlternate(c)) }, _getDateDatepicker: function (a, b) { var c = this._getInst(a); return c && !c.inline && this._setDateFromField(c, b), c ? this._getDate(c) : null }, _doKeyDown: function (b) { var c, d, e, f = a.datepicker._getInst(b.target), g = !0, h = f.dpDiv.is(".ui-datepicker-rtl"); if (f._keyEvent = !0, a.datepicker._datepickerShowing) switch (b.keyCode) { case 9: a.datepicker._hideDatepicker(), g = !1; break; case 13: return e = a("td." + a.datepicker._dayOverClass + ":not(." + a.datepicker._currentClass + ")", f.dpDiv), e[0] && a.datepicker._selectDay(b.target, f.selectedMonth, f.selectedYear, e[0]), c = a.datepicker._get(f, "onSelect"), c ? (d = a.datepicker._formatDate(f), c.apply(f.input ? f.input[0] : null, [d, f])) : a.datepicker._hideDatepicker(), !1; case 27: a.datepicker._hideDatepicker(); break; case 33: a.datepicker._adjustDate(b.target, b.ctrlKey ? -a.datepicker._get(f, "stepBigMonths") : -a.datepicker._get(f, "stepMonths"), "M"); break; case 34: a.datepicker._adjustDate(b.target, b.ctrlKey ? +a.datepicker._get(f, "stepBigMonths") : +a.datepicker._get(f, "stepMonths"), "M"); break; case 35: (b.ctrlKey || b.metaKey) && a.datepicker._clearDate(b.target), g = b.ctrlKey || b.metaKey; break; case 36: (b.ctrlKey || b.metaKey) && a.datepicker._gotoToday(b.target), g = b.ctrlKey || b.metaKey; break; case 37: (b.ctrlKey || b.metaKey) && a.datepicker._adjustDate(b.target, h ? 1 : -1, "D"), g = b.ctrlKey || b.metaKey, b.originalEvent.altKey && a.datepicker._adjustDate(b.target, b.ctrlKey ? -a.datepicker._get(f, "stepBigMonths") : -a.datepicker._get(f, "stepMonths"), "M"); break; case 38: (b.ctrlKey || b.metaKey) && a.datepicker._adjustDate(b.target, -7, "D"), g = b.ctrlKey || b.metaKey; break; case 39: (b.ctrlKey || b.metaKey) && a.datepicker._adjustDate(b.target, h ? -1 : 1, "D"), g = b.ctrlKey || b.metaKey, b.originalEvent.altKey && a.datepicker._adjustDate(b.target, b.ctrlKey ? +a.datepicker._get(f, "stepBigMonths") : +a.datepicker._get(f, "stepMonths"), "M"); break; case 40: (b.ctrlKey || b.metaKey) && a.datepicker._adjustDate(b.target, 7, "D"), g = b.ctrlKey || b.metaKey; break; default: g = !1 } else 36 === b.keyCode && b.ctrlKey ? a.datepicker._showDatepicker(this) : g = !1; g && (b.preventDefault(), b.stopPropagation()) }, _doKeyPress: function (b) { var c, d, e = a.datepicker._getInst(b.target); if (a.datepicker._get(e, "constrainInput")) return c = a.datepicker._possibleChars(a.datepicker._get(e, "dateFormat")), d = String.fromCharCode(null == b.charCode ? b.keyCode : b.charCode), b.ctrlKey || b.metaKey || d < " " || !c || c.indexOf(d) > -1 }, _doKeyUp: function (b) { var c, d = a.datepicker._getInst(b.target); if (d.input.val() !== d.lastVal) try { c = a.datepicker.parseDate(a.datepicker._get(d, "dateFormat"), d.input ? d.input.val() : null, a.datepicker._getFormatConfig(d)), c && (a.datepicker._setDateFromField(d), a.datepicker._updateAlternate(d), a.datepicker._updateDatepicker(d)) } catch (e) { } return !0 }, _showDatepicker: function (c) { if (c = c.target || c, "input" !== c.nodeName.toLowerCase() && (c = a("input", c.parentNode)[0]), !a.datepicker._isDisabledDatepicker(c) && a.datepicker._lastInput !== c) { var d, e, g, h, i, j, k; d = a.datepicker._getInst(c), a.datepicker._curInst && a.datepicker._curInst !== d && (a.datepicker._curInst.dpDiv.stop(!0, !0), d && a.datepicker._datepickerShowing && a.datepicker._hideDatepicker(a.datepicker._curInst.input[0])), e = a.datepicker._get(d, "beforeShow"), g = e ? e.apply(c, [c, d]) : {}, g !== !1 && (f(d.settings, g), d.lastVal = null, a.datepicker._lastInput = c, a.datepicker._setDateFromField(d), a.datepicker._inDialog && (c.value = ""), a.datepicker._pos || (a.datepicker._pos = a.datepicker._findPos(c), a.datepicker._pos[1] += c.offsetHeight), h = !1, a(c).parents().each(function () { return h |= "fixed" === a(this).css("position"), !h }), i = { left: a.datepicker._pos[0], top: a.datepicker._pos[1] }, a.datepicker._pos = null, d.dpDiv.empty(), d.dpDiv.css({ position: "absolute", display: "block", top: "-1000px" }), a.datepicker._updateDatepicker(d), i = a.datepicker._checkOffset(d, i, h), d.dpDiv.css({ position: a.datepicker._inDialog && a.blockUI ? "static" : h ? "fixed" : "absolute", display: "none", left: i.left + "px", top: i.top + "px" }), d.inline || (j = a.datepicker._get(d, "showAnim"), k = a.datepicker._get(d, "duration"), d.dpDiv.css("z-index", b(a(c)) + 1), a.datepicker._datepickerShowing = !0, a.effects && a.effects.effect[j] ? d.dpDiv.show(j, a.datepicker._get(d, "showOptions"), k) : d.dpDiv[j || "show"](j ? k : null), a.datepicker._shouldFocusInput(d) && d.input.focus(), a.datepicker._curInst = d)) } }, _updateDatepicker: function (b) { this.maxRows = 4, g = b, b.dpDiv.empty().append(this._generateHTML(b)), this._attachHandlers(b); var c, d = this._getNumberOfMonths(b), f = d[1], h = 17, i = b.dpDiv.find("." + this._dayOverClass + " a"); i.length > 0 && e.apply(i.get(0)), b.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), f > 1 && b.dpDiv.addClass("ui-datepicker-multi-" + f).css("width", h * f + "em"), b.dpDiv[(1 !== d[0] || 1 !== d[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), b.dpDiv[(this._get(b, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), b === a.datepicker._curInst && a.datepicker._datepickerShowing && a.datepicker._shouldFocusInput(b) && b.input.focus(), b.yearshtml && (c = b.yearshtml, setTimeout(function () { c === b.yearshtml && b.yearshtml && b.dpDiv.find("select.ui-datepicker-year:first").replaceWith(b.yearshtml), c = b.yearshtml = null }, 0)) }, _shouldFocusInput: function (a) { return a.input && a.input.is(":visible") && !a.input.is(":disabled") && !a.input.is(":focus") }, _checkOffset: function (b, c, d) { var e = b.dpDiv.outerWidth(), f = b.dpDiv.outerHeight(), g = b.input ? b.input.outerWidth() : 0, h = b.input ? b.input.outerHeight() : 0, i = document.documentElement.clientWidth + (d ? 0 : a(document).scrollLeft()), j = document.documentElement.clientHeight + (d ? 0 : a(document).scrollTop()); return c.left -= this._get(b, "isRTL") ? e - g : 0, c.left -= d && c.left === b.input.offset().left ? a(document).scrollLeft() : 0, c.top -= d && c.top === b.input.offset().top + h ? a(document).scrollTop() : 0, c.left -= Math.min(c.left, c.left + e > i && i > e ? Math.abs(c.left + e - i) : 0), c.top -= Math.min(c.top, c.top + f > j && j > f ? Math.abs(f + h) : 0), c }, _findPos: function (b) { for (var c, d = this._getInst(b), e = this._get(d, "isRTL"); b && ("hidden" === b.type || 1 !== b.nodeType || a.expr.filters.hidden(b));)b = b[e ? "previousSibling" : "nextSibling"]; return c = a(b).offset(), [c.left, c.top] }, _hideDatepicker: function (b) { var c, d, e, f, g = this._curInst; !g || b && g !== a.data(b, "datepicker") || this._datepickerShowing && (c = this._get(g, "showAnim"), d = this._get(g, "duration"), e = function () { a.datepicker._tidyDialog(g) }, a.effects && (a.effects.effect[c] || a.effects[c]) ? g.dpDiv.hide(c, a.datepicker._get(g, "showOptions"), d, e) : g.dpDiv["slideDown" === c ? "slideUp" : "fadeIn" === c ? "fadeOut" : "hide"](c ? d : null, e), c || e(), this._datepickerShowing = !1, f = this._get(g, "onClose"), f && f.apply(g.input ? g.input[0] : null, [g.input ? g.input.val() : "", g]), this._lastInput = null, this._inDialog && (this._dialogInput.css({ position: "absolute", left: "0", top: "-100px" }), a.blockUI && (a.unblockUI(), a("body").append(this.dpDiv))), this._inDialog = !1) }, _tidyDialog: function (a) { a.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar") }, _checkExternalClick: function (b) { if (a.datepicker._curInst) { var c = a(b.target), d = a.datepicker._getInst(c[0]); (c[0].id === a.datepicker._mainDivId || 0 !== c.parents("#" + a.datepicker._mainDivId).length || c.hasClass(a.datepicker.markerClassName) || c.closest("." + a.datepicker._triggerClass).length || !a.datepicker._datepickerShowing || a.datepicker._inDialog && a.blockUI) && (!c.hasClass(a.datepicker.markerClassName) || a.datepicker._curInst === d) || a.datepicker._hideDatepicker() } }, _adjustDate: function (b, c, d) { var e = a(b), f = this._getInst(e[0]); this._isDisabledDatepicker(e[0]) || (this._adjustInstDate(f, c + ("M" === d ? this._get(f, "showCurrentAtPos") : 0), d), this._updateDatepicker(f)) }, _gotoToday: function (b) { var c, d = a(b), e = this._getInst(d[0]); this._get(e, "gotoCurrent") && e.currentDay ? (e.selectedDay = e.currentDay, e.drawMonth = e.selectedMonth = e.currentMonth, e.drawYear = e.selectedYear = e.currentYear) : (c = new Date, e.selectedDay = c.getDate(), e.drawMonth = e.selectedMonth = c.getMonth(), e.drawYear = e.selectedYear = c.getFullYear()), this._notifyChange(e), this._adjustDate(d) }, _selectMonthYear: function (b, c, d) { var e = a(b), f = this._getInst(e[0]); f["selected" + ("M" === d ? "Month" : "Year")] = f["draw" + ("M" === d ? "Month" : "Year")] = parseInt(c.options[c.selectedIndex].value, 10), this._notifyChange(f), this._adjustDate(e) }, _selectDay: function (b, c, d, e) { var f, g = a(b); a(e).hasClass(this._unselectableClass) || this._isDisabledDatepicker(g[0]) || (f = this._getInst(g[0]), f.selectedDay = f.currentDay = a("a", e).html(), f.selectedMonth = f.currentMonth = c, f.selectedYear = f.currentYear = d, this._selectDate(b, this._formatDate(f, f.currentDay, f.currentMonth, f.currentYear))) }, _clearDate: function (b) { var c = a(b); this._selectDate(c, "") }, _selectDate: function (b, c) { var d, e = a(b), f = this._getInst(e[0]); c = null != c ? c : this._formatDate(f), f.input && f.input.val(c), this._updateAlternate(f), d = this._get(f, "onSelect"), d ? d.apply(f.input ? f.input[0] : null, [c, f]) : f.input && f.input.trigger("change"), f.inline ? this._updateDatepicker(f) : (this._hideDatepicker(), this._lastInput = f.input[0], "object" != typeof f.input[0] && f.input.focus(), this._lastInput = null) }, _updateAlternate: function (b) { var c, d, e, f = this._get(b, "altField"); f && (c = this._get(b, "altFormat") || this._get(b, "dateFormat"), d = this._getDate(b), e = this.formatDate(c, d, this._getFormatConfig(b)), a(f).each(function () { a(this).val(e) })) }, noWeekends: function (a) { var b = a.getDay(); return [b > 0 && b < 6, ""] }, iso8601Week: function (a) { var b, c = new Date(a.getTime()); return c.setDate(c.getDate() + 4 - (c.getDay() || 7)), b = c.getTime(), c.setMonth(0), c.setDate(1), Math.floor(Math.round((b - c) / 864e5) / 7) + 1 }, parseDate: function (b, c, d) { if (null == b || null == c) throw "Invalid arguments"; if (c = "object" == typeof c ? c.toString() : c + "", "" === c) return null; var e, f, g, h, i = 0, j = (d ? d.shortYearCutoff : null) || this._defaults.shortYearCutoff, k = "string" != typeof j ? j : (new Date).getFullYear() % 100 + parseInt(j, 10), l = (d ? d.dayNamesShort : null) || this._defaults.dayNamesShort, m = (d ? d.dayNames : null) || this._defaults.dayNames, n = (d ? d.monthNamesShort : null) || this._defaults.monthNamesShort, o = (d ? d.monthNames : null) || this._defaults.monthNames, p = -1, q = -1, r = -1, s = -1, t = !1, u = function (a) { var c = e + 1 < b.length && b.charAt(e + 1) === a; return c && e++, c }, v = function (a) { var b = u(a), d = "@" === a ? 14 : "!" === a ? 20 : "y" === a && b ? 4 : "o" === a ? 3 : 2, e = "y" === a ? d : 1, f = new RegExp("^\\d{" + e + "," + d + "}"), g = c.substring(i).match(f); if (!g) throw "Missing number at position " + i; return i += g[0].length, parseInt(g[0], 10) }, w = function (b, d, e) { var f = -1, g = a.map(u(b) ? e : d, function (a, b) { return [[b, a]] }).sort(function (a, b) { return -(a[1].length - b[1].length) }); if (a.each(g, function (a, b) { var d = b[1]; if (c.substr(i, d.length).toLowerCase() === d.toLowerCase()) return f = b[0], i += d.length, !1 }), f !== -1) return f + 1; throw "Unknown name at position " + i }, x = function () { if (c.charAt(i) !== b.charAt(e)) throw "Unexpected literal at position " + i; i++ }; for (e = 0; e < b.length; e++)if (t) "'" !== b.charAt(e) || u("'") ? x() : t = !1; else switch (b.charAt(e)) { case "d": r = v("d"); break; case "D": w("D", l, m); break; case "o": s = v("o"); break; case "m": q = v("m"); break; case "M": q = w("M", n, o); break; case "y": p = v("y"); break; case "@": h = new Date(v("@")), p = h.getFullYear(), q = h.getMonth() + 1, r = h.getDate(); break; case "!": h = new Date((v("!") - this._ticksTo1970) / 1e4), p = h.getFullYear(), q = h.getMonth() + 1, r = h.getDate(); break; case "'": u("'") ? x() : t = !0; break; default: x() }if (i < c.length && (g = c.substr(i), !/^\s+/.test(g))) throw "Extra/unparsed characters found in date: " + g; if (p === -1 ? p = (new Date).getFullYear() : p < 100 && (p += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (p <= k ? 0 : -100)), s > -1) for (q = 1, r = s; ;) { if (f = this._getDaysInMonth(p, q - 1), r <= f) break; q++, r -= f } if (h = this._daylightSavingAdjust(new Date(p, q - 1, r)), h.getFullYear() !== p || h.getMonth() + 1 !== q || h.getDate() !== r) throw "Invalid date"; return h }, ATOM: "yy-mm-dd", COOKIE: "D, dd M yy", ISO_8601: "yy-mm-dd", RFC_822: "D, d M y", RFC_850: "DD, dd-M-y", RFC_1036: "D, d M y", RFC_1123: "D, d M yy", RFC_2822: "D, d M yy", RSS: "D, d M y", TICKS: "!", TIMESTAMP: "@", W3C: "yy-mm-dd", _ticksTo1970: 24 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)) * 60 * 60 * 1e7, formatDate: function (a, b, c) { if (!b) return ""; var d, e = (c ? c.dayNamesShort : null) || this._defaults.dayNamesShort, f = (c ? c.dayNames : null) || this._defaults.dayNames, g = (c ? c.monthNamesShort : null) || this._defaults.monthNamesShort, h = (c ? c.monthNames : null) || this._defaults.monthNames, i = function (b) { var c = d + 1 < a.length && a.charAt(d + 1) === b; return c && d++, c }, j = function (a, b, c) { var d = "" + b; if (i(a)) for (; d.length < c;)d = "0" + d; return d }, k = function (a, b, c, d) { return i(a) ? d[b] : c[b] }, l = "", m = !1; if (b) for (d = 0; d < a.length; d++)if (m) "'" !== a.charAt(d) || i("'") ? l += a.charAt(d) : m = !1; else switch (a.charAt(d)) { case "d": l += j("d", b.getDate(), 2); break; case "D": l += k("D", b.getDay(), e, f); break; case "o": l += j("o", Math.round((new Date(b.getFullYear(), b.getMonth(), b.getDate()).getTime() - new Date(b.getFullYear(), 0, 0).getTime()) / 864e5), 3); break; case "m": l += j("m", b.getMonth() + 1, 2); break; case "M": l += k("M", b.getMonth(), g, h); break; case "y": l += i("y") ? b.getFullYear() : (b.getYear() % 100 < 10 ? "0" : "") + b.getYear() % 100; break; case "@": l += b.getTime(); break; case "!": l += 1e4 * b.getTime() + this._ticksTo1970; break; case "'": i("'") ? l += "'" : m = !0; break; default: l += a.charAt(d) }return l }, _possibleChars: function (a) { var b, c = "", d = !1, e = function (c) { var d = b + 1 < a.length && a.charAt(b + 1) === c; return d && b++, d }; for (b = 0; b < a.length; b++)if (d) "'" !== a.charAt(b) || e("'") ? c += a.charAt(b) : d = !1; else switch (a.charAt(b)) { case "d": case "m": case "y": case "@": c += "0123456789"; break; case "D": case "M": return null; case "'": e("'") ? c += "'" : d = !0; break; default: c += a.charAt(b) }return c }, _get: function (a, b) { return void 0 !== a.settings[b] ? a.settings[b] : this._defaults[b] }, _setDateFromField: function (a, b) { if (a.input.val() !== a.lastVal) { var c = this._get(a, "dateFormat"), d = a.lastVal = a.input ? a.input.val() : null, e = this._getDefaultDate(a), f = e, g = this._getFormatConfig(a); try { f = this.parseDate(c, d, g) || e } catch (h) { d = b ? "" : d } a.selectedDay = f.getDate(), a.drawMonth = a.selectedMonth = f.getMonth(), a.drawYear = a.selectedYear = f.getFullYear(), a.currentDay = d ? f.getDate() : 0, a.currentMonth = d ? f.getMonth() : 0, a.currentYear = d ? f.getFullYear() : 0, this._adjustInstDate(a) } }, _getDefaultDate: function (a) { return this._restrictMinMax(a, this._determineDate(a, this._get(a, "defaultDate"), new Date)) }, _determineDate: function (b, c, d) { var e = function (a) { var b = new Date; return b.setDate(b.getDate() + a), b }, f = function (c) { try { return a.datepicker.parseDate(a.datepicker._get(b, "dateFormat"), c, a.datepicker._getFormatConfig(b)) } catch (d) { } for (var e = (c.toLowerCase().match(/^c/) ? a.datepicker._getDate(b) : null) || new Date, f = e.getFullYear(), g = e.getMonth(), h = e.getDate(), i = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, j = i.exec(c); j;) { switch (j[2] || "d") { case "d": case "D": h += parseInt(j[1], 10); break; case "w": case "W": h += 7 * parseInt(j[1], 10); break; case "m": case "M": g += parseInt(j[1], 10), h = Math.min(h, a.datepicker._getDaysInMonth(f, g)); break; case "y": case "Y": f += parseInt(j[1], 10), h = Math.min(h, a.datepicker._getDaysInMonth(f, g)) }j = i.exec(c) } return new Date(f, g, h) }, g = null == c || "" === c ? d : "string" == typeof c ? f(c) : "number" == typeof c ? isNaN(c) ? d : e(c) : new Date(c.getTime()); return g = g && "Invalid Date" === g.toString() ? d : g, g && (g.setHours(0), g.setMinutes(0), g.setSeconds(0), g.setMilliseconds(0)), this._daylightSavingAdjust(g) }, _daylightSavingAdjust: function (a) { return a ? (a.setHours(a.getHours() > 12 ? a.getHours() + 2 : 0), a) : null }, _setDate: function (a, b, c) { var d = !b, e = a.selectedMonth, f = a.selectedYear, g = this._restrictMinMax(a, this._determineDate(a, b, new Date)); a.selectedDay = a.currentDay = g.getDate(), a.drawMonth = a.selectedMonth = a.currentMonth = g.getMonth(), a.drawYear = a.selectedYear = a.currentYear = g.getFullYear(), e === a.selectedMonth && f === a.selectedYear || c || this._notifyChange(a), this._adjustInstDate(a), a.input && a.input.val(d ? "" : this._formatDate(a)) }, _getDate: function (a) { var b = !a.currentYear || a.input && "" === a.input.val() ? null : this._daylightSavingAdjust(new Date(a.currentYear, a.currentMonth, a.currentDay)); return b }, _attachHandlers: function (b) { var c = this._get(b, "stepMonths"), d = "#" + b.id.replace(/\\\\/g, "\\"); b.dpDiv.find("[data-handler]").map(function () { var b = { prev: function () { a.datepicker._adjustDate(d, -c, "M") }, next: function () { a.datepicker._adjustDate(d, +c, "M") }, hide: function () { a.datepicker._hideDatepicker() }, today: function () { a.datepicker._gotoToday(d) }, selectDay: function () { return a.datepicker._selectDay(d, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this), !1 }, selectMonth: function () { return a.datepicker._selectMonthYear(d, this, "M"), !1 }, selectYear: function () { return a.datepicker._selectMonthYear(d, this, "Y"), !1 } }; a(this).bind(this.getAttribute("data-event"), b[this.getAttribute("data-handler")]) }) }, _generateHTML: function (a) { var b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O = new Date, P = this._daylightSavingAdjust(new Date(O.getFullYear(), O.getMonth(), O.getDate())), Q = this._get(a, "isRTL"), R = this._get(a, "showButtonPanel"), S = this._get(a, "hideIfNoPrevNext"), T = this._get(a, "navigationAsDateFormat"), U = this._getNumberOfMonths(a), V = this._get(a, "showCurrentAtPos"), W = this._get(a, "stepMonths"), X = 1 !== U[0] || 1 !== U[1], Y = this._daylightSavingAdjust(a.currentDay ? new Date(a.currentYear, a.currentMonth, a.currentDay) : new Date(9999, 9, 9)), Z = this._getMinMaxDate(a, "min"), $ = this._getMinMaxDate(a, "max"), _ = a.drawMonth - V, aa = a.drawYear; if (_ < 0 && (_ += 12, aa--), $) for (b = this._daylightSavingAdjust(new Date($.getFullYear(), $.getMonth() - U[0] * U[1] + 1, $.getDate())), b = Z && b < Z ? Z : b; this._daylightSavingAdjust(new Date(aa, _, 1)) > b;)_--, _ < 0 && (_ = 11, aa--); for (a.drawMonth = _, a.drawYear = aa, c = this._get(a, "prevText"), c = T ? this.formatDate(c, this._daylightSavingAdjust(new Date(aa, _ - W, 1)), this._getFormatConfig(a)) : c, d = this._canAdjustMonth(a, -1, aa, _) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + c + "'><span class='ui-icon ui-icon-circle-triangle-" + (Q ? "e" : "w") + "'>" + c + "</span></a>" : S ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + c + "'><span class='ui-icon ui-icon-circle-triangle-" + (Q ? "e" : "w") + "'>" + c + "</span></a>", e = this._get(a, "nextText"), e = T ? this.formatDate(e, this._daylightSavingAdjust(new Date(aa, _ + W, 1)), this._getFormatConfig(a)) : e, f = this._canAdjustMonth(a, 1, aa, _) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + e + "'><span class='ui-icon ui-icon-circle-triangle-" + (Q ? "w" : "e") + "'>" + e + "</span></a>" : S ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + e + "'><span class='ui-icon ui-icon-circle-triangle-" + (Q ? "w" : "e") + "'>" + e + "</span></a>", g = this._get(a, "currentText"), h = this._get(a, "gotoCurrent") && a.currentDay ? Y : P, g = T ? this.formatDate(g, h, this._getFormatConfig(a)) : g, i = a.inline ? "" : "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(a, "closeText") + "</button>", j = R ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (Q ? i : "") + (this._isInRange(a, h) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + g + "</button>" : "") + (Q ? "" : i) + "</div>" : "", k = parseInt(this._get(a, "firstDay"), 10), k = isNaN(k) ? 0 : k, l = this._get(a, "showWeek"), m = this._get(a, "dayNames"), n = this._get(a, "dayNamesMin"), o = this._get(a, "monthNames"), p = this._get(a, "monthNamesShort"), q = this._get(a, "beforeShowDay"), r = this._get(a, "showOtherMonths"), s = this._get(a, "selectOtherMonths"), t = this._getDefaultDate(a), u = "", w = 0; w < U[0]; w++) { for (x = "", this.maxRows = 4, y = 0; y < U[1]; y++) { if (z = this._daylightSavingAdjust(new Date(aa, _, a.selectedDay)), A = " ui-corner-all", B = "", X) { if (B += "<div class='ui-datepicker-group", U[1] > 1) switch (y) { case 0: B += " ui-datepicker-group-first", A = " ui-corner-" + (Q ? "right" : "left"); break; case U[1] - 1: B += " ui-datepicker-group-last", A = " ui-corner-" + (Q ? "left" : "right"); break; default: B += " ui-datepicker-group-middle", A = "" }B += "'>" } for (B += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + A + "'>" + (/all|left/.test(A) && 0 === w ? Q ? f : d : "") + (/all|right/.test(A) && 0 === w ? Q ? d : f : "") + this._generateMonthYearHeader(a, _, aa, Z, $, w > 0 || y > 0, o, p) + "</div><table class='ui-datepicker-calendar'><thead><tr>", C = l ? "<th class='ui-datepicker-week-col'>" + this._get(a, "weekHeader") + "</th>" : "", v = 0; v < 7; v++)D = (v + k) % 7, C += "<th scope='col'" + ((v + k + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + "><span title='" + m[D] + "'>" + n[D] + "</span></th>"; for (B += C + "</tr></thead><tbody>", E = this._getDaysInMonth(aa, _), aa === a.selectedYear && _ === a.selectedMonth && (a.selectedDay = Math.min(a.selectedDay, E)), F = (this._getFirstDayOfMonth(aa, _) - k + 7) % 7, G = Math.ceil((F + E) / 7), H = X && this.maxRows > G ? this.maxRows : G, this.maxRows = H, I = this._daylightSavingAdjust(new Date(aa, _, 1 - F)), J = 0; J < H; J++) { for (B += "<tr>", K = l ? "<td class='ui-datepicker-week-col'>" + this._get(a, "calculateWeek")(I) + "</td>" : "", v = 0; v < 7; v++)L = q ? q.apply(a.input ? a.input[0] : null, [I]) : [!0, ""], M = I.getMonth() !== _, N = M && !s || !L[0] || Z && I < Z || $ && I > $, K += "<td class='" + ((v + k + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (M ? " ui-datepicker-other-month" : "") + (I.getTime() === z.getTime() && _ === a.selectedMonth && a._keyEvent || t.getTime() === I.getTime() && t.getTime() === z.getTime() ? " " + this._dayOverClass : "") + (N ? " " + this._unselectableClass + " ui-state-disabled" : "") + (M && !r ? "" : " " + L[1] + (I.getTime() === Y.getTime() ? " " + this._currentClass : "") + (I.getTime() === P.getTime() ? " ui-datepicker-today" : "")) + "'" + (M && !r || !L[2] ? "" : " title='" + L[2].replace(/'/g, "'") + "'") + (N ? "" : " data-handler='selectDay' data-event='click' data-month='" + I.getMonth() + "' data-year='" + I.getFullYear() + "'") + ">" + (M && !r ? " " : N ? "<span class='ui-state-default'>" + I.getDate() + "</span>" : "<a class='ui-state-default" + (I.getTime() === P.getTime() ? " ui-state-highlight" : "") + (I.getTime() === Y.getTime() ? " ui-state-active" : "") + (M ? " ui-priority-secondary" : "") + "' href='#'>" + I.getDate() + "</a>") + "</td>", I.setDate(I.getDate() + 1), I = this._daylightSavingAdjust(I); B += K + "</tr>" } _++, _ > 11 && (_ = 0, aa++), B += "</tbody></table>" + (X ? "</div>" + (U[0] > 0 && y === U[1] - 1 ? "<div class='ui-datepicker-row-break'></div>" : "") : ""), x += B } u += x } return u += j, a._keyEvent = !1, u }, _generateMonthYearHeader: function (a, b, c, d, e, f, g, h) {
						var i, j, k, l, m, n, o, p, q = this._get(a, "changeMonth"), r = this._get(a, "changeYear"), s = this._get(a, "showMonthAfterYear"), t = "<div class='ui-datepicker-title'>", u = ""; if (f || !q) u += "<span class='ui-datepicker-month'>" + g[b] + "</span>"; else {
							for (i = d && d.getFullYear() === c, j = e && e.getFullYear() === c, u += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>", k = 0; k < 12; k++)(!i || k >= d.getMonth()) && (!j || k <= e.getMonth()) && (u += "<option value='" + k + "'" + (k === b ? " selected='selected'" : "") + ">" + h[k] + "</option>"); u += "</select>"
						} if (s || (t += u + (!f && q && r ? "" : " ")), !a.yearshtml) if (a.yearshtml = "", f || !r) t += "<span class='ui-datepicker-year'>" + c + "</span>"; else { for (l = this._get(a, "yearRange").split(":"), m = (new Date).getFullYear(), n = function (a) { var b = a.match(/c[+\-].*/) ? c + parseInt(a.substring(1), 10) : a.match(/[+\-].*/) ? m + parseInt(a, 10) : parseInt(a, 10); return isNaN(b) ? m : b }, o = n(l[0]), p = Math.max(o, n(l[1] || "")), o = d ? Math.max(o, d.getFullYear()) : o, p = e ? Math.min(p, e.getFullYear()) : p, a.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>"; o <= p; o++)a.yearshtml += "<option value='" + o + "'" + (o === c ? " selected='selected'" : "") + ">" + o + "</option>"; a.yearshtml += "</select>", t += a.yearshtml, a.yearshtml = null } return t += this._get(a, "yearSuffix"), s && (t += (!f && q && r ? "" : " ") + u), t += "</div>"
					}, _adjustInstDate: function (a, b, c) { var d = a.drawYear + ("Y" === c ? b : 0), e = a.drawMonth + ("M" === c ? b : 0), f = Math.min(a.selectedDay, this._getDaysInMonth(d, e)) + ("D" === c ? b : 0), g = this._restrictMinMax(a, this._daylightSavingAdjust(new Date(d, e, f))); a.selectedDay = g.getDate(), a.drawMonth = a.selectedMonth = g.getMonth(), a.drawYear = a.selectedYear = g.getFullYear(), "M" !== c && "Y" !== c || this._notifyChange(a) }, _restrictMinMax: function (a, b) { var c = this._getMinMaxDate(a, "min"), d = this._getMinMaxDate(a, "max"), e = c && b < c ? c : b; return d && e > d ? d : e }, _notifyChange: function (a) { var b = this._get(a, "onChangeMonthYear"); b && b.apply(a.input ? a.input[0] : null, [a.selectedYear, a.selectedMonth + 1, a]) }, _getNumberOfMonths: function (a) { var b = this._get(a, "numberOfMonths"); return null == b ? [1, 1] : "number" == typeof b ? [1, b] : b }, _getMinMaxDate: function (a, b) { return this._determineDate(a, this._get(a, b + "Date"), null) }, _getDaysInMonth: function (a, b) { return 32 - this._daylightSavingAdjust(new Date(a, b, 32)).getDate() }, _getFirstDayOfMonth: function (a, b) { return new Date(a, b, 1).getDay() }, _canAdjustMonth: function (a, b, c, d) { var e = this._getNumberOfMonths(a), f = this._daylightSavingAdjust(new Date(c, d + (b < 0 ? b : e[0] * e[1]), 1)); return b < 0 && f.setDate(this._getDaysInMonth(f.getFullYear(), f.getMonth())), this._isInRange(a, f) }, _isInRange: function (a, b) { var c, d, e = this._getMinMaxDate(a, "min"), f = this._getMinMaxDate(a, "max"), g = null, h = null, i = this._get(a, "yearRange"); return i && (c = i.split(":"), d = (new Date).getFullYear(), g = parseInt(c[0], 10), h = parseInt(c[1], 10), c[0].match(/[+\-].*/) && (g += d), c[1].match(/[+\-].*/) && (h += d)), (!e || b.getTime() >= e.getTime()) && (!f || b.getTime() <= f.getTime()) && (!g || b.getFullYear() >= g) && (!h || b.getFullYear() <= h) }, _getFormatConfig: function (a) { var b = this._get(a, "shortYearCutoff"); return b = "string" != typeof b ? b : (new Date).getFullYear() % 100 + parseInt(b, 10), { shortYearCutoff: b, dayNamesShort: this._get(a, "dayNamesShort"), dayNames: this._get(a, "dayNames"), monthNamesShort: this._get(a, "monthNamesShort"), monthNames: this._get(a, "monthNames") } }, _formatDate: function (a, b, c, d) { b || (a.currentDay = a.selectedDay, a.currentMonth = a.selectedMonth, a.currentYear = a.selectedYear); var e = b ? "object" == typeof b ? b : this._daylightSavingAdjust(new Date(d, c, b)) : this._daylightSavingAdjust(new Date(a.currentYear, a.currentMonth, a.currentDay)); return this.formatDate(this._get(a, "dateFormat"), e, this._getFormatConfig(a)) }
				}), a.fn.datepicker = function (b) { if (!this.length) return this; a.datepicker.initialized || (a(document).mousedown(a.datepicker._checkExternalClick), a.datepicker.initialized = !0), 0 === a("#" + a.datepicker._mainDivId).length && a("body").append(a.datepicker.dpDiv); var c = Array.prototype.slice.call(arguments, 1); return "string" != typeof b || "isDisabled" !== b && "getDate" !== b && "widget" !== b ? "option" === b && 2 === arguments.length && "string" == typeof arguments[1] ? a.datepicker["_" + b + "Datepicker"].apply(a.datepicker, [this[0]].concat(c)) : this.each(function () { "string" == typeof b ? a.datepicker["_" + b + "Datepicker"].apply(a.datepicker, [this].concat(c)) : a.datepicker._attachDatepicker(this, b) }) : a.datepicker["_" + b + "Datepicker"].apply(a.datepicker, [this[0]].concat(c)) }, a.datepicker = new c, a.datepicker.initialized = !1, a.datepicker.uuid = (new Date).getTime(), a.datepicker.version = "1.11.4", a.datepicker
			});
			(function (factory) {
				if (typeof define === "function" && define.amd) {
					define(["../widgets/datepicker"], factory);
				} else {
					factory(jQuery.datepicker);
				}
			}(function (datepicker) {
				datepicker.regional.vi = {
					closeText: "Đóng",
					prevText: "Trước",
					nextText: "Tiếp",
					currentText: "Hôm nay",
					monthNames: ["Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu",
						"Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"],
					monthNamesShort: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
						"Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
					dayNames: ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"],
					dayNamesShort: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
					dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
					weekHeader: "Tu",
					dateFormat: "dd/mm/yy",
					firstDay: 0,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ""
				};
				datepicker.setDefaults(datepicker.regional.vi);
				return datepicker.regional.vi;
			}));
		</script>
		<div class="evo-tour-search-index">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-12 evo-tour-search-title">
						<h2>Đặt Tour du lịch, Khách sạn, Du thuyền!</h2>
						<p></p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="evo-main-search">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="input_group group_a">
										<img src="images/place-localizer.svg" alt="Địa điểm">
										<input type="text" aria-label="Bạn muốn đi đâu?" autocomplete="off"
											placeholder="Bạn muốn đi đâu?" id="name"
											class="form-control form-hai form-control-lg">
									</div>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad1">
									<div class="group-search abs">
										<div class="group-search-icon">
											<img src="images/date.svg" alt="Tìm kiếm">
										</div>
										<div class="group-search-content">
											<p>Ngày khởi hành</p>
											<input class="tourmaster-datepicker" id="dates" type="text"
												placeholder="Chọn Ngày khởi hành" data-date-format="dd MM yyyy"
												readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad2">
									<div class="group-search ab">
										<div class="group-search-icon">
											<img src="images/paper-plane.svg" alt="Tìm kiếm">
										</div>
										<div class="group-search-content">
											<p>Khởi hành từ</p>
											<select name="garden" class="tag-select" required="">
												<option value="">Tất cả</option>
												<option value="product_type:('Sài Gòn')">Sài Gòn</option>
												<option value="product_type:('Hà Nội')">Hà Nội</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-12 fix-ipad">
									<button class="hs-submit btn-style btn btn-default btn-blues"
										aria-label="Tìm">Tìm</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		// <script>
		// 	$(document).ready(function () {
		// 		var dateToday = new Date();
		// 		$(".tourmaster-datepicker").datepicker({
		// 			defaultDate: "",
		// 			changeMonth: true,
		// 			changeYear: true,
		// 			numberOfMonths: 1,
		// 			minDate: dateToday
		// 		});
		// 	});
		// 	jQuery(".hs-submit").click(function () {
		// 		var selectTag = jQuery(".tag-select");
		// 		var tagArray = [];
		// 		for (var i = 0; i < selectTag.length; i++) {
		// 			if (jQuery(selectTag[i]).val() != "") {
		// 				tagArray.push(jQuery(selectTag[i]).val());
		// 			}
		// 		};
		// 		var tag = tagArray.toString();
		// 		var a = $('.group_a input').val();
		// 		var date = $('.abs input').val();
		// 		date = date.substring(0, date.length - 5).replace('/', '/');
		// 		tag = tag.replace(/,/g, ')AND(');
		// 		if (tag != '') {
		// 			if (date != '') {
		// 				location.href = "/search?query=name:" + a + "(" + tag + ")" + "(tags:((" + date + ")OR(Hàng ngày)))";
		// 			} else {
		// 				location.href = "/search?query=name:" + a + "(" + tag + ")";
		// 			}
		// 		} else {
		// 			if (date != '') {
		// 				location.href = "/search?query=name:" + a + "(tags:((" + date + ")OR(Hàng ngày)))";
		// 			} else {
		// 				location.href = "/search?query=name:" + a;
		// 			}
		// 		}
		// 	});
		// </script>
	</section>
	<section class="awe-section-2" data-component="block_tour_policy">
		<div class="section_tour_policy">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="evo-tour-policy-item">
							<a href="#" title="Đảm bảo giá tốt nhất">
								<div class="icon">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_1.png?1768795562299"
										alt="Đảm bảo giá tốt nhất" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="caption">
									<h3>Đảm bảo giá tốt nhất</h3>
									<div>Chúng tôi đảm bảo khách hàng sẽ đặt được dịch vụ với giá tốt nhất, những chương
										trình khuyến mãi hấp dẫn nhất</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<div class="evo-tour-policy-item">
							<a href="#" title="Dịch vụ tin cậy - Giá trị đích thực">
								<div class="icon">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_2.png?1768795562299"
										alt="Dịch vụ tin cậy - Giá trị đích thực"
										class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="caption">
									<h3>Dịch vụ tin cậy - Giá trị đích thực</h3>
									<div>Đặt lợi ích khách hàng lên trên hết, chúng tôi hỗ trợ khách hàng nhanh và chính
										xác nhất với dịch vụ tin cậy, giá trị đích thực.</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<div class="evo-tour-policy-item">
							<a href="#" title="Đảm bảo chất lượng">
								<div class="icon">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_3.png?1768795562299"
										alt="Đảm bảo chất lượng" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="caption">
									<h3>Đảm bảo chất lượng</h3>
									<div>Chúng tôi liên kết chặt chẽ với các đối tác, khảo sát định kỳ để đảm bảo chất
										lượng tốt nhất của dịch vụ</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="awe-section-3" data-component="block_tour_last_hour">
		<div class="section_tour_last_hour evo-index-tour">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_tour_last_hour_title">
							<h2><a href="tour" title="Tour ưu đãi Giá tốt"><span>Tour ưu đãi</span> Giá tốt</a></h2>
							<p>Cùng Elite Tour điểm qua các địa điểm du lịch trong nước và ngoài nước thu hút du khách
								nhất nhé!</p>
						</div>
						<div class="row evo-tour-scroll">
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
											title="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d-4.jpg?v=1759566262400"
													alt="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">
											</span>
										</a>
										<span class="smart">- 18% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
												title="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">Tour
												Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="6 ngày 5 đêm"> Thời gian:
													<span>6 ngày 5 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												14.690.000₫
												<span class="compare-price">17.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
											title="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping-6.jpg?v=1759464295900"
													alt="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">
											</span>
										</a>
										<span class="smart">- 14% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
												title="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">Tour
												Thượng Hải - Hàng Châu – Ô Trấn 5N4Đ No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												17.990.000₫
												<span class="compare-price">20.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
											title="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-du-lich-tay-an-trung-quoc-3.jpg?v=1767339637157"
													alt="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">
											</span>
										</a>
										<span class="smart">- 19% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
												title="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">Tour Tây An
												Trung Quốc 5 ngày 4 đêm No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												16.990.000₫
												<span class="compare-price">20.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
											title="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-dai-loan-tet-2026-6-jpg.jpg?v=1762398810497"
													alt="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">
											</span>
										</a>
										<span class="smart">- 20% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
												title="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">[Tour
												Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title="Bay Vietjet Air">
														<img src="images/tag_icon_3.svg" alt="Bay Vietjet Air">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Mùng 1 Tết"> Lịch khởi hành:
													<span>Mùng 1 Tết</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												15.990.000₫
												<span class="compare-price">19.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-thuong-hai-nam-kinh-to-chau-6n5d-no-shopping"
											title="Tour Thượng Hải – Nam Kinh – Tô Châu 6N5Đ No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-thuong-hai-nam-kinh-to-chau-6n5d-no-shopping-1.jpg?v=1759477872007"
													alt="Tour Thượng Hải – Nam Kinh – Tô Châu 6N5Đ No Shopping">
											</span>
										</a>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-thuong-hai-nam-kinh-to-chau-6n5d-no-shopping"
												title="Tour Thượng Hải – Nam Kinh – Tô Châu 6N5Đ No Shopping">Tour
												Thượng Hải – Nam Kinh – Tô Châu 6N5Đ No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="6 ngày 5 đêm"> Thời gian:
													<span>6 ngày 5 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												17.690.000₫ </div>
											<div class="booking-box d-none">
												<a href="/tour-thuong-hai-nam-kinh-to-chau-6n5d-no-shopping"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
											title="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem-2-jpeg-jpg.jpg?v=1757470438083"
													alt="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">
											</span>
										</a>
										<span class="smart">- 13% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
												title="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">Tour
												Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Thứ 6 hàng tuần"> Lịch khởi
													hành: <span>Thứ 6 hàng tuần</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 2 đêm"> Thời gian:
													<span>3 ngày 2 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												3.480.000₫
												<span class="compare-price">4.000.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-noi-binh-bien-di-lac-kien-thuy-khai-vien-mong-tu-3n3d"
											title="Tour Hà Nội - Bình Biên - Di Lặc - Kiến Thủy - Khai Viễn - Mông Tự 3N3Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/binh-bien-13-jpg.jpg?v=1757304948247"
													alt="Tour Hà Nội - Bình Biên - Di Lặc - Kiến Thủy - Khai Viễn - Mông Tự 3N3Đ">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-binh-bien-di-lac-kien-thuy-khai-vien-mong-tu-3n3d"
												title="Tour Hà Nội - Bình Biên - Di Lặc - Kiến Thủy - Khai Viễn - Mông Tự 3N3Đ">Tour
												Hà Nội - Bình Biên - Di Lặc - Kiến Thủy - Khai Viễn - Mông Tự 3N3Đ</a>
										</h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Thứ 2 và thứ 5 hàng tuần">
													Lịch khởi hành: <span>Thứ 2 và thứ 5 hàng tuần</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 3 đêm"> Thời gian:
													<span>3 ngày 3 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												3.790.000₫
												<span class="compare-price">4.460.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-binh-bien-di-lac-kien-thuy-khai-vien-mong-tu-3n3d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
											title="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/nui-tuyet-kieu-tu-39-jpg.jpg?v=1757306088617"
													alt="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">
											</span>
										</a>
										<span class="smart">- 13% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
												title="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">Tour
												Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="4 ngày 4 đêm"> Thời gian:
													<span>4 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												6.990.000₫
												<span class="compare-price">7.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="awe-section-4" data-component="block_tour_slider">
		<!-- Swiper CSS -->
		<link rel="stylesheet" href="css/swiper-bundle.min.css">

		<style>
			/* =========================
     SECTION BANNER – CHUẨN TOUR
     ========================= */

			.section_banner {
				width: 100%;
			}

			/* Khoảng cách giữa tiêu đề và slider giống tour */
			.section_banner .swiper {
				width: 100%;
				position: relative;
				margin-top: 20px;
			}

			.section_banner .swiper-slide {
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.section_banner .swiper-slide img {
				width: 100%;
				height: auto;
				border-radius: 10px;
				object-fit: cover;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
				transition: transform 0.3s ease;
			}

			.section_banner .swiper-slide img:hover {
				transform: scale(1.02);
			}

			/* Navigation */
			.section_banner .swiper-button-next,
			.section_banner .swiper-button-prev {
				color: #fff;
				width: 40px;
				height: 40px;
				background: rgba(0, 0, 0, 0.3);
				border-radius: 50%;
			}

			.section_banner .swiper-button-next:after,
			.section_banner .swiper-button-prev:after {
				font-size: 18px;
			}

			.section_banner .swiper-button-next {
				right: 10px;
			}

			.section_banner .swiper-button-prev {
				left: 10px;
			}

			@media (max-width: 768px) {

				.section_banner .swiper-button-next,
				.section_banner .swiper-button-prev {
					width: 30px;
					height: 30px;
				}
			}
		</style>

		<!-- BỌC BẰNG SECTION TOUR ĐỂ ĐỒNG BỘ SPACING -->
		<div class="section_tour_inbound evo-index-tour">
			<div class="section_banner">
				<div class="container">

					<!-- TIÊU ĐỀ + MÔ TẢ (DÙNG CHUNG CSS TOUR) -->

					<div class="section_tour_last_hour_title">

						<h2>HÔM NAY CÓ GÌ?</h2>


						<p>Chỉ có tại Elite Tour, Ưu đãi lớn, Book ngay</p>

					</div>


					<!-- SLIDER BANNER -->
					<div class="swiper mySwiper">
						<div class="swiper-wrapper">


							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_1.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_2.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_3.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_4.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_5.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_6.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_7.jpg" alt="">
								</a>
							</div>

							<div class="swiper-slide">
								<a href="" title="">
									<img src="images/feature_menu_8.jpg" alt="">
								</a>
							</div>


						</div>

						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>

				</div>
			</div>
		</div>

		<!-- Swiper JS -->
		
		// <script src="js/swiper-bundle.min.js"></script>

		// <script>
		// 	var swiper = new Swiper(".mySwiper", {
		// 		slidesPerView: 1,
		// 		spaceBetween: 20,
		// 		loop: true,
		// 		autoplay: {
		// 			delay: 3000,
		// 			disableOnInteraction: false,
		// 		},
		// 		navigation: {
		// 			nextEl: ".swiper-button-next",
		// 			prevEl: ".swiper-button-prev",
		// 		}
		// 	});
		// </script>
	</section>
	<section class="awe-section-5" data-component="block_tour_inbound">
		<div class="section_tour_inbound evo-index-tour">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_tour_last_hour_title">
							<h2><a href="tour-trong-nuoc" title="Tour trong nước">Tour trong nước</a></h2>
							<p>Các tour du lịch trong nước HOT nhất</p>
						</div>
						<div class="row evo-tour-scroll">
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-mu-cang-chai-tram-tau-ban-cu-vai-mua-lua-chin-3n2d"
											title="Tour Mù Cang Chải - Trạm Tấu - Bản Cu Vai Mùa Lúa Chín 3N2Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-mu-cang-chai-jpg.jpg?v=1757487886753"
													alt="Tour Mù Cang Chải - Trạm Tấu - Bản Cu Vai Mùa Lúa Chín 3N2Đ">
											</span>
										</a>
										<span class="smart">- 20% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-mu-cang-chai-tram-tau-ban-cu-vai-mua-lua-chin-3n2d"
												title="Tour Mù Cang Chải - Trạm Tấu - Bản Cu Vai Mùa Lúa Chín 3N2Đ">Tour
												Mù Cang Chải - Trạm Tấu - Bản Cu Vai Mùa Lúa Chín 3N2Đ</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 2 đêm"> Thời gian:
													<span>3 ngày 2 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												2.290.000₫
												<span class="compare-price">2.860.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-mu-cang-chai-tram-tau-ban-cu-vai-mua-lua-chin-3n2d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-mu-cang-chai-ngoc-chien-ta-xua-mua-lua-chin-3-ngay-2-dem"
											title="Tour Mù Cang Chải - Ngọc Chiến - Tà Xùa Mùa Lúa Chín 3 Ngày 2 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/ban-lim-thai-jpg.jpg?v=1757487486103"
													alt="Tour Mù Cang Chải - Ngọc Chiến - Tà Xùa Mùa Lúa Chín 3 Ngày 2 Đêm">
											</span>
										</a>
										<span class="smart">- 16% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-mu-cang-chai-ngoc-chien-ta-xua-mua-lua-chin-3-ngay-2-dem"
												title="Tour Mù Cang Chải - Ngọc Chiến - Tà Xùa Mùa Lúa Chín 3 Ngày 2 Đêm">Tour
												Mù Cang Chải - Ngọc Chiến - Tà Xùa Mùa Lúa Chín 3 Ngày 2 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 2 đêm"> Thời gian:
													<span>3 ngày 2 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												2.480.000₫
												<span class="compare-price">2.950.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-mu-cang-chai-ngoc-chien-ta-xua-mua-lua-chin-3-ngay-2-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-noi-nha-trang-da-lat-5-ngay-4-dem"
											title="Tour Hà Nội - Nha Trang - Đà Lạt - 5 Ngày 4 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/du-lich-nha-trang-3-1-jpg.jpg?v=1757478834737"
													alt="Tour Hà Nội - Nha Trang - Đà Lạt - 5 Ngày 4 Đêm">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-nha-trang-da-lat-5-ngay-4-dem"
												title="Tour Hà Nội - Nha Trang - Đà Lạt - 5 Ngày 4 Đêm">Tour Hà Nội -
												Nha Trang - Đà Lạt - 5 Ngày 4 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												8.190.000₫
												<span class="compare-price">9.650.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-nha-trang-da-lat-5-ngay-4-dem" title="Đặt Tour"
													class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-noi-buon-me-thuot-dak-nong-4-ngay-3-dem"
											title="Tour Hà Nội - Buôn Mê Thuột - Dak Nông 4 Ngày 3 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/du-lich-dak-nong-jpg.jpg?v=1757477832427"
													alt="Tour Hà Nội - Buôn Mê Thuột - Dak Nông 4 Ngày 3 Đêm">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-buon-me-thuot-dak-nong-4-ngay-3-dem"
												title="Tour Hà Nội - Buôn Mê Thuột - Dak Nông 4 Ngày 3 Đêm">Tour Hà Nội
												- Buôn Mê Thuột - Dak Nông 4 Ngày 3 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="4 ngày 3 đêm"> Thời gian:
													<span>4 ngày 3 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												6.190.000₫
												<span class="compare-price">7.290.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-buon-me-thuot-dak-nong-4-ngay-3-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-buon-me-thuot-kontum-pleiku-5-ngay-4-dem"
											title="Tour Buôn Mê Thuột - KonTum - Pleiku 5 Ngày 4 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/bao-tang-cafe-buon-me-thuot-1-jpg.jpg?v=1757477116903"
													alt="Tour Buôn Mê Thuột - KonTum - Pleiku 5 Ngày 4 Đêm">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-buon-me-thuot-kontum-pleiku-5-ngay-4-dem"
												title="Tour Buôn Mê Thuột - KonTum - Pleiku 5 Ngày 4 Đêm">Tour Buôn Mê
												Thuột - KonTum - Pleiku 5 Ngày 4 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												7.290.000₫
												<span class="compare-price">8.600.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-buon-me-thuot-kontum-pleiku-5-ngay-4-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-noi-da-lat-buon-me-thuot-5-ngay-4-dem"
											title="Tour Hà Nội - Đà Lạt - Buôn Mê Thuột 5 Ngày 4 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/combo-du-lich-da-lat-5-jpg.jpg?v=1757475571687"
													alt="Tour Hà Nội - Đà Lạt - Buôn Mê Thuột 5 Ngày 4 Đêm">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-da-lat-buon-me-thuot-5-ngay-4-dem"
												title="Tour Hà Nội - Đà Lạt - Buôn Mê Thuột 5 Ngày 4 Đêm">Tour Hà Nội -
												Đà Lạt - Buôn Mê Thuột 5 Ngày 4 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												7.990.000₫
												<span class="compare-price">9.400.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-da-lat-buon-me-thuot-5-ngay-4-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-noi-da-lat-nha-trang-5-ngay-4-dem"
											title="Tour Hà Nội - Đà Lạt - Nha Trang 5 ngày 4 đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/du-lich-da-lat-jpg.jpg?v=1757475232477"
													alt="Tour Hà Nội - Đà Lạt - Nha Trang 5 ngày 4 đêm">
											</span>
										</a>
										<span class="smart">- 20% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-da-lat-nha-trang-5-ngay-4-dem"
												title="Tour Hà Nội - Đà Lạt - Nha Trang 5 ngày 4 đêm">Tour Hà Nội - Đà
												Lạt - Nha Trang 5 ngày 4 đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												7.290.000₫
												<span class="compare-price">9.112.500₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-da-lat-nha-trang-5-ngay-4-dem" title="Đặt Tour"
													class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover" href="/tour-ha-noi-dien-bien-3-ngay-2-dem"
											title="Tour Hà Nội - Điện Biên 3 Ngày 2 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/du-lich-dien-bien-jpg.jpg?v=1757474723507"
													alt="Tour Hà Nội - Điện Biên 3 Ngày 2 Đêm">
											</span>
										</a>
										<span class="smart">- 15% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-noi-dien-bien-3-ngay-2-dem"
												title="Tour Hà Nội - Điện Biên 3 Ngày 2 Đêm">Tour Hà Nội - Điện Biên 3
												Ngày 2 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 2 đêm"> Thời gian:
													<span>3 ngày 2 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												4.990.000₫
												<span class="compare-price">5.870.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-noi-dien-bien-3-ngay-2-dem" title="Đặt Tour"
													class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="evo-index-tour-more">
							<a href="tour-trong-nuoc" title="Xem tất cả Tour">Xem tất cả Tour</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="awe-section-6">
		<div class="section_tour_free evo-index-tour">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_tour_last_hour_title">
							<h2><a href="tour-nuoc-ngoai" title="Tour nước ngoài">Tour nước ngoài</a></h2>
							<p>Các tour nước ngoài đặc sắc nhất</p>
						</div>
						<div class="row evo-tour-scroll">
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
											title="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-du-lich-tay-an-trung-quoc-3.jpg?v=1767339637157"
													alt="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">
											</span>
										</a>
										<span class="smart">- 19% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
												title="Tour Tây An Trung Quốc 5 ngày 4 đêm No Shopping">Tour Tây An
												Trung Quốc 5 ngày 4 đêm No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												16.990.000₫
												<span class="compare-price">20.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-tay-an-trung-quoc-5-ngay-4-dem-no-shopping"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
											title="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-dai-loan-tet-2026-6-jpg.jpg?v=1762398810497"
													alt="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">
											</span>
										</a>
										<span class="smart">- 20% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
												title="[Tour Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ">[Tour
												Đài Loan Tết] Hà Nội – Đài Nam – Đài Bắc – Cao Hùng 5N4Đ</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title="Bay Vietjet Air">
														<img src="images/tag_icon_3.svg" alt="Bay Vietjet Air">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Mùng 1 Tết"> Lịch khởi hành:
													<span>Mùng 1 Tết</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												15.990.000₫
												<span class="compare-price">19.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-tet-dai-loan-ha-noi-dai-nam-dai-bac-cao-hung-5n4d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
											title="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping-6.jpg?v=1759464295900"
													alt="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">
											</span>
										</a>
										<span class="smart">- 14% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
												title="Tour Thượng Hải -  Hàng Châu – Ô Trấn 5N4Đ No Shopping">Tour
												Thượng Hải - Hàng Châu – Ô Trấn 5N4Đ No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												17.990.000₫
												<span class="compare-price">20.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-thuong-hai-hang-chau-o-tran-5n4d-no-shopping"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
											title="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d-4.jpg?v=1759566262400"
													alt="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">
											</span>
										</a>
										<span class="smart">- 18% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
												title="Tour Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ">Tour
												Hàng Châu – Thượng Hải (Disneyland) – Bộc Viện Cổ Trấn 6N5Đ</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="6 ngày 5 đêm"> Thời gian:
													<span>6 ngày 5 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												14.690.000₫
												<span class="compare-price">17.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-hang-chau-thuong-hai-disneyland-boc-vien-co-tran-6n5d"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
											title="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem-2-jpeg-jpg.jpg?v=1757470438083"
													alt="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">
											</span>
										</a>
										<span class="smart">- 13% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
												title="Tour Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm">Tour
												Đông Hưng – Thái Bình Cổ Trấn – Nam Ninh 3 ngày 2 đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Thứ 6 hàng tuần"> Lịch khởi
													hành: <span>Thứ 6 hàng tuần</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="3 ngày 2 đêm"> Thời gian:
													<span>3 ngày 2 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												3.480.000₫
												<span class="compare-price">4.000.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-dong-hung-thai-binh-co-tran-nam-ninh-3-ngay-2-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-du-lich-bac-kinh-trung-quoc-5-ngay-4-dem"
											title="Tour Du Lịch Bắc Kinh Mono 5N4Đ No Shopping">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/du-lich-bac-kinh-2-1-jpg.jpg?v=1757489370627"
													alt="Tour Du Lịch Bắc Kinh Mono 5N4Đ No Shopping">
											</span>
										</a>
										<span class="smart">- 14% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-du-lich-bac-kinh-trung-quoc-5-ngay-4-dem"
												title="Tour Du Lịch Bắc Kinh Mono 5N4Đ No Shopping">Tour Du Lịch Bắc
												Kinh Mono 5N4Đ No Shopping</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title=" Di chuyển bằng Máy bay">
														<img src="images/tag_icon_3.svg" alt=" Di chuyển bằng Máy bay">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="5 ngày 4 đêm"> Thời gian:
													<span>5 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												17.990.000₫
												<span class="compare-price">20.890.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-du-lich-bac-kinh-trung-quoc-5-ngay-4-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-thuong-hai-tay-duong-hang-chau-bac-kinh-6-ngay-5-dem-bay-vietnam-airline"
											title="Tour Bắc Kinh - Hàng Châu - Tây Đường - Thượng Hải 6 Ngày 5 Đêm (Bay Vietnam Airline)">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/dai-nam-cau-pho-thuong-hai-jpg.jpg?v=1757488341577"
													alt="Tour Bắc Kinh - Hàng Châu - Tây Đường - Thượng Hải 6 Ngày 5 Đêm (Bay Vietnam Airline)">
											</span>
										</a>
										<span class="smart">- 10% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-thuong-hai-tay-duong-hang-chau-bac-kinh-6-ngay-5-dem-bay-vietnam-airline"
												title="Tour Bắc Kinh - Hàng Châu - Tây Đường - Thượng Hải 6 Ngày 5 Đêm (Bay Vietnam Airline)">Tour
												Bắc Kinh - Hàng Châu - Tây Đường - Thượng Hải 6 Ngày 5 Đêm (Bay Vietnam
												Airline)</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
													<li data-toggle="tooltip" data-placement="top"
														title="Bay Vietnam Airlines">
														<img src="images/tag_icon_3.svg" alt="Bay Vietnam Airlines">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="6 ngày 5 đêm"> Thời gian:
													<span>6 ngày 5 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												22.490.000₫
												<span class="compare-price">24.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-thuong-hai-tay-duong-hang-chau-bac-kinh-6-ngay-5-dem-bay-vietnam-airline"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="evo-product-block-item">
									<div class="img-tour">
										<a class="imgWrap pt_67 img--cover"
											href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
											title="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">
											<span class="imgWrap-item">
												<img class="lazy"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
													data-src="//bizweb.dktcdn.net/thumb/large/100/562/154/products/nui-tuyet-kieu-tu-39-jpg.jpg?v=1757306088617"
													alt="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">
											</span>
										</a>
										<span class="smart">- 13% </span>
									</div>
									<div class="info-tour clearfix">
										<h3><a href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
												title="Tour Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm">Tour
												Hà Khẩu - Côn Minh - Núi Tuyết Kiệu Tử Sơn 4 Ngày 4 Đêm</a></h3>
										<div class="vote-box">
											<div class="meta-vote">
												<ul class="ct_course_list">
													<li data-toggle="tooltip" data-placement="top"
														title="Xe máy lạnh sử dụng theo chương trình">
														<img src="images/tag_icon_1.svg"
															alt="Xe máy lạnh sử dụng theo chương trình">
													</li>
												</ul>
											</div>
										</div>
										<div class="date-go">
											<ul class="ct_course_list">
												<li class="clearfix">
													<img src="images/tag_icon_4.svg" alt="Linh hoạt"> Lịch khởi hành:
													<span>Linh hoạt</span>
												</li>
												<li class="clearfix">
													<img src="images/tag_icon_5.svg" alt="4 ngày 4 đêm"> Thời gian:
													<span>4 ngày 4 đêm</span>
												</li>
											</ul>
										</div>
										<div class="action-box">
											<div class="price-box">
												6.990.000₫
												<span class="compare-price">7.990.000₫</span>

											</div>
											<div class="booking-box d-none">
												<a href="/tour-ha-khau-con-minh-nui-tuyet-kieu-tu-son-4-ngay-4-dem"
													title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="evo-index-tour-more">
							<a href="tour-nuoc-ngoai" title="Xem tất cả Tour">Xem tất cả Tour</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="awe-section-9" data-component="block_tour_destination">
		<div class="section_tour_destination">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_tour_last_hour_title">
							<h2>Điểm đến yêu thích</h2>
							<p>Các điểm đến du lịch trong nước và nước ngoài</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-6">
						<div class="pos-relative">
							<a href="/ha-long" title="Vịnh Hạ Long">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_1.jpg?1768795562299"
										alt="Vịnh Hạ Long" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Vịnh Hạ Long</div>
									<div class="destination-like">Đã có <span>1,600 +</span> lượt khách</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6">
						<div class="pos-relative">
							<a href="/sapa" title="Sapa">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_2.jpg?1768795562299"
										alt="Sapa" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Sapa</div>
									<div class="destination-like">Đã có <span>1,200 +</span> lượt khách</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6">
						<div class="pos-relative">
							<a href="/da-nang" title="Đà Nẵng">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_3.jpg?1768795562299"
										alt="Đà Nẵng" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Đà Nẵng</div>
									<div class="destination-like">Đã có <span>1,100 +</span> lượt khách</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6">
						<div class="pos-relative">
							<a href="/nha-trang" title="Nha Trang">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_4.jpg?1768795562299"
										alt="Nha Trang" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Nha Trang</div>
									<div class="destination-like">Đã có <span>2,600 +</span> lượt khách</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="row out-bound">
					<div class="col-lg-15 col-md-15 col-sm-3 col-6">
						<div class="pos-relative">
							<a href="/chau-au" title="Châu Âu">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_6.jpg?1768795562299"
										alt="Châu Âu" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Châu Âu</div>
									<div class="destination-like">Khám phá ngay <svg version="1.1"
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
											xml:space="preserve">
											<path
												d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z">
											</path>
										</svg></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-15 col-md-15 col-sm-3 col-6">
						<div class="pos-relative">
							<a href="/dong-nam-a" title="Đông Nam Á">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_7.jpg?1768795562299"
										alt="Đông Nam Á" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Đông Nam Á</div>
									<div class="destination-like">Khám phá ngay <svg version="1.1"
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
											xml:space="preserve">
											<path
												d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z">
											</path>
										</svg></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-15 col-md-15 col-sm-3 col-6">
						<div class="pos-relative">
							<a href="/chau-uc" title="Châu Úc">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_8.jpg?1768795562299"
										alt="Châu Úc" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Châu Úc</div>
									<div class="destination-like">Khám phá ngay <svg version="1.1"
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
											xml:space="preserve">
											<path
												d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z">
											</path>
										</svg></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-15 col-md-15 col-sm-3 col-6">
						<div class="pos-relative">
							<a href="/chau-my" title="Châu Mỹ">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_9.jpg?1768795562299"
										alt="Châu Mỹ" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Châu Mỹ</div>
									<div class="destination-like">Khám phá ngay <svg version="1.1"
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
											xml:space="preserve">
											<path
												d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z">
											</path>
										</svg></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-15 col-md-15 col-sm-3 col-12">
						<div class="pos-relative">
							<a href="/chau-phi" title="Châu Phi">
								<div class="destination-image">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
										data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/evo_tour_destination_image_10.jpg?1768795562299"
										alt="Châu Phi" class="lazy img-responsive mx-auto d-block">
								</div>
								<div class="frame-destination">
									<div class="destination-name">Châu Phi</div>
									<div class="destination-like">Khám phá ngay <svg version="1.1"
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
											xml:space="preserve">
											<path
												d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z">
											</path>
										</svg></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="awe-section-10" data-component="block_blogs">
		<div class="section_blogs">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_tour_last_hour_title">
							<h2><a href="kinh-nghiem-du-lich" title="Cảm hứng du lịch">Cảm hứng du lịch</a></h2>
							<p>Thông tin về du lịch, văn hóa, ẩm thực, các sự kiện và lễ hội tại các điểm đến Việt nam,
								Đông Nam Á và Thế Giới</p>
						</div>
						<div class="row ">
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover" href="/dai-lo-nam-kinh-thuong-hai"
										title="Đại lộ Nam Kinh ở đâu Thượng Hải? Có gì đặc biệt để khám phá?">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/nam-kinh.jpg?v=1769079212607"
												alt="Đại lộ Nam Kinh ở đâu Thượng Hải? Có gì đặc biệt để khám phá?"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp" href="/dai-lo-nam-kinh-thuong-hai"
										title="Đại lộ Nam Kinh ở đâu Thượng Hải? Có gì đặc biệt để khám phá?">Đại lộ Nam
										Kinh ở đâu Thượng Hải? Có gì đặc biệt để khám phá?</a></h3>
								<p>Đại lộ Nam Kinh là một trong những địa danh mang tính biểu tượng của Thượng Hải, tự
									hào sở hữu bề dày lịch ...</p>
							</div>
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover" href="/tan-thien-dia-thuong-hai"
										title="Kinh nghiệm Ăn - Chơi ở Tân Thiên Địa Thượng Hải từ A – Z">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/tan-thien-dia-thuong-hai-14.jpg?v=1768900900737"
												alt="Kinh nghiệm Ăn - Chơi ở Tân Thiên Địa Thượng Hải từ A – Z"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp" href="/tan-thien-dia-thuong-hai"
										title="Kinh nghiệm Ăn - Chơi ở Tân Thiên Địa Thượng Hải từ A – Z">Kinh nghiệm Ăn
										- Chơi ở Tân Thiên Địa Thượng Hải từ A – Z</a></h3>
								<p>Khu Tân Thiên Địa (Xintiandi Shanghai) là một trong những khu phố đi bộ nổi tiếng
									nhất Thượng Hải, nơi kết ...</p>
							</div>
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover"
										href="/to-chuc-tiec-su-kien-tai-khach-san-anya-premier-5-sao-quy-nhon"
										title="Tổ chức tiệc – sự kiện tại khách sạn Anya Premier 5 sao Quy Nhơn">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/su-kien-anya-quy-nhon-6.jpg?v=1768644477133"
												alt="Tổ chức tiệc – sự kiện tại khách sạn Anya Premier 5 sao Quy Nhơn"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp"
										href="/to-chuc-tiec-su-kien-tai-khach-san-anya-premier-5-sao-quy-nhon"
										title="Tổ chức tiệc – sự kiện tại khách sạn Anya Premier 5 sao Quy Nhơn">Tổ chức
										tiệc – sự kiện tại khách sạn Anya Premier 5 sao Quy Nhơn</a></h3>
								<p>Anya Premier Hotel Quy Nhơn là lựa chọn hàng đầu cho các sự kiện cao cấp tại miền
									Trung, từ tiệc cưới sang ...</p>
							</div>
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover" href="/du-lich-quy-nhon-thang-2"
										title="Du lịch Quy Nhơn tháng 2 có gì đẹp? Có nên đi không?">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/quy-nhon-thang-2-10.jpg?v=1768557620113"
												alt="Du lịch Quy Nhơn tháng 2 có gì đẹp? Có nên đi không?"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp" href="/du-lich-quy-nhon-thang-2"
										title="Du lịch Quy Nhơn tháng 2 có gì đẹp? Có nên đi không?">Du lịch Quy Nhơn
										tháng 2 có gì đẹp? Có nên đi không?</a></h3>
								<p>Du lịch Quy Nhơn tháng 2 có gì đẹp là câu hỏi được rất nhiều du khách quan tâm. Đặc
									biệt là trong dịp Tết b...</p>
							</div>
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover" href="/to-gioi-phap-thuong-hai"
										title="Kinh nghiệm tham quan Tô Giới Pháp Thượng Hải chi tiết nhất">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/khu-to-gioi-phap-6.jpg?v=1767951603837"
												alt="Kinh nghiệm tham quan Tô Giới Pháp Thượng Hải chi tiết nhất"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp" href="/to-gioi-phap-thuong-hai"
										title="Kinh nghiệm tham quan Tô Giới Pháp Thượng Hải chi tiết nhất">Kinh nghiệm
										tham quan Tô Giới Pháp Thượng Hải chi tiết nhất</a></h3>
								<p>Khu Tô Giới Pháp Thượng Hải là nơi lưu giữ trọn vẹn vẻ đẹp châu Âu giữa lòng đô thị
									hiện đại: Những con đườ...</p>
							</div>
							<div class="evo-item-blogs col-lg-4 col-md-4 col-12">
								<div class="evo-article-image">
									<a class="imgWrap pt_67  img--cover" href="/song-hoang-pho-thuong-hai"
										title="Sông Hoàng Phố Thượng Hải – Biểu tượng lịch sử văn hóa không thể bỏ lỡ">
										<span class="imgWrap-item">

											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
												data-src="//bizweb.dktcdn.net/thumb/grande/100/562/154/articles/thuong-hai-dem-11.png?v=1767870795820"
												alt="Sông Hoàng Phố Thượng Hải – Biểu tượng lịch sử văn hóa không thể bỏ lỡ"
												class="lazy img-responsive center-block">

										</span>
									</a>
								</div>
								<h3><a class="line-clamp" href="/song-hoang-pho-thuong-hai"
										title="Sông Hoàng Phố Thượng Hải – Biểu tượng lịch sử văn hóa không thể bỏ lỡ">Sông
										Hoàng Phố Thượng Hải – Biểu tượng lịch sử văn hóa không thể bỏ lỡ</a></h3>
								<p>Sông Hoàng Phố (Huangpu River) là một trong những biểu tượng lịch sử và văn hoá của
									thành phố Thượng Hải, m...</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="evo-index-tour-more">
									<a href="kinh-nghiem-du-lich" title="Xem tất cả tin tức">Xem tất cả tin tức</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();