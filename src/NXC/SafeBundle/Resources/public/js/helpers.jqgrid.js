function jqGridAutoSize(grid, baseElement) {
	if(baseElement == undefined)
		baseElement = $('.content:first'); // modify this according to layout

	$(window).resize(function () {
		setGridHeight(grid);
	});
	setGridHeight(grid);

	function setGridHeight(grid) {
		var of = $(baseElement).offset();
		var tableHeight = $(self).height() - of.top - ($(baseElement).outerHeight() - $(baseElement).height()) - 75;
		var tableWidth = $(self).width() - of.left - ($(baseElement).outerWidth() - $(baseElement).width());
		$(grid).jqGrid('setGridHeight', tableHeight);
		$(grid).jqGrid('setGridWidth', tableWidth);
	}
}
var jqgridDefaultEditOptions = {
	width:'auto',
	reloadAfterSubmit:false,
	closeAfterEdit:false,
	closeAfterAdd:true,
	closeOnEscape:true,
	modal:true,
	resize:false,
	beforeShowForm : jqgrid_center_dialog,
	afterSubmit: function(response) {
		var data = JSON.parse(response.responseText);
		return [data.result,data.val.message,data.id];
	}
};
var jqgridDefaultAddOptions = $.extend({}, jqgridDefaultEditOptions, { /*add custom editOptions here*/ });
var jqgridDefaultDelOptions = {
	modal: true,
    resize:false,
    closeOnEscape:true,
	beforeShowForm : jqgrid_center_dialog,
	afterSubmit: function(response) {
		var data = JSON.parse(response.responseText);
		return [data.result,data.val.message,data.id];
	}
};

function jqgrid_center_dialog(formId) {
    $(formId)
	.closest('div[id^="editmod"],div[id^="addmod"],div[id^="delmod"]')
	.css('left', '0px')
	.css('top', '0px')
	.children(':first')
	.parent('div')
	.position({
        my: "center",
        at: "center",
        of: window
    });
}
function jqgrid_select_first_row(jqgrid) {
    var ids = jqgrid_get_row_ids(jqgrid);
    if(ids.length > 0)
        $(jqgrid).jqGrid('setSelection', ids[0]);
}
function jqgrid_get_first_row_id(jqgrid) {
    var ids = $(jqgrid).jqGrid('getDataIDs');
    if(ids.length > 0)
       return ids[0];
   return null;
}
function jqgrid_reload(jqgrid, params) {
	var p = {datatype:'json'};
	if(params)
		$.extend(p, params);
    $(jqgrid).jqGrid('setGridParam', p).trigger('reloadGrid');
}
function jqgrid_trigger_filters() {
    setTimeout(function(){
        $('[id^="gs_"]').change();
    }, 20);
}
function jqgrid_set_params(jqgrid, params) {
    $(jqgrid).jqGrid('setGridParam', params);
}
function jqgrid_set_param(jqgrid, param, value) {
	var params = {};
	params[param] = value;
    jqgrid_set_params(jqgrid, params);
}
function jqgrid_set_selection(jqgrid, rowId) {
	$(jqgrid).jqGrid('setSelection', rowId);
}
function jqgrid_set_data(jqgrid, newData) {
	jqgrid_clear_data(jqgrid);
	jqgrid_reload(jqgrid, {datatype: 'local', data: newData});
}
function jqgrid_get_param(jqgrid, param) {
    return $(jqgrid).jqGrid('getGridParam', param)
}
function jqgrid_get_selected(jqgrid) {
    return jqgrid_get_param(jqgrid, 'selrow');
}
function jqgrid_get_selected_rows(jqgrid) {
    return jqgrid_get_param(jqgrid, 'selarrrow');
}
function jqgrid_get_cell(jqgrid, rowId, cellName) {
    return $(jqgrid).jqGrid('getCell', rowId, cellName);
}
function jqgrid_delete_row(jqgrid, row_id) {
    $(jqgrid).jqGrid('delRowData', row_id);
}
function jqgrid_delete_grid_row(jqgrid, row_id, delOptions) {
    $(jqgrid).jqGrid('delGridRow', row_id, delOptions);
}
function jqgrid_clear_data(jqgrid) {
	$(jqgrid).jqGrid('clearGridData');
}
function jqgrid_edit_row(jqgrid, rowId, editOptions) {
	$(jqgrid).jqGrid('editGridRow', rowId, editOptions);
}
function jqgrid_set_grouping(jqgrid, groupingState, groupingColName) {
	if(groupingState)
		$(jqgrid).jqGrid('groupingGroupBy', groupingColName);
	else
		$(jqgrid).jqGrid('groupingRemove');
}
function jqgrid_set_postdata(jqgrid, postData) {
	jqgrid_set_param(jqgrid, 'postData', postData);
}
function jqgrid_merge_postdata(jqgrid, postData) {
	var p = jqgrid_get_param(jqgrid, 'postData');
	if(!p) p = {};
	$.extend(p, postData);
	jqgrid_set_postdata(jqgrid, postData);
}
function jqgrid_get_row_ids(jqgrid) {
	return $(jqgrid).jqGrid('getDataIDs');
}
function jqgrid_get_row(jqgrid, rowId) {
	return $(jqgrid).jqGrid('getRowData', rowId);
}
function jqgrid_get_rows(jqgrid) {
	var ids = jqgrid_get_row_ids(jqgrid);
	var data = [];
	for(var i in ids)
		data[ids[i]] = jqgrid_get_row(jqgrid, ids[i]);
	return data;
}
function jqgrid_set_col_prop(jqgrid, colName, property, value) {
	var props = {};
	props[property] = value;
	if(typeof(colName) == 'object') {
		for(var i in colName)
			jqgrid_set_col_props(jqgrid, colName[i], props);
	} else
		jqgrid_set_col_props(jqgrid, colName, props);
}
function jqgrid_set_col_props(jqgrid, colName, properties) {
	if(typeof(colName) == 'object') {
		for(var i in colName)
			$(jqgrid).jqGrid('setColProp', colName[i], properties);
	} else
		$(jqgrid).jqGrid('setColProp', colName, properties);
}
function jqgrid_get_col_prop(jqgrid, colName, property) {
	return jqgrid_get_col_props(jqgrid, colName)[property];
}
function jqgrid_get_col_props(jqgrid, colName) {
	return $(jqgrid).jqGrid('getColProp', colName);
}

/** Formatters **/
function jqgrid_maxheight_format(cellvalue) {
	return $('<div/>').append($('<div class="__content"/>').html(cellvalue)).html();
//	var d2 = $('<div class="__content"/>').text(cellvalue);
//	d1.append(d2);
//	return d1.html();
}
function jqgrid_maxheight_unformat(cellvalue) {
	return cellvalue;
}