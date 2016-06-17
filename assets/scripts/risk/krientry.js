var handleValidation = function() {
	// for more info visit the official plugin documentation: 
	// http://docs.jquery.com/Plugins/Validation
	
	var form1 = $('#kri-form');
	//var error1 = $('.alert-danger', form1);
	//var success1 = $('.alert-success', form1);
	
	form1.validate({
	    errorElement: 'span', //default input error message container
	    errorClass: 'help-block help-block-error', // default input error message class
	    focusInvalid: true, // do not focus the last invalid input
	    ignore: "",  // validate all fields including form hidden input
	    rules: {
	        key_risk_indicator: {
	            required: true
	        },
	        treshold: {
	            required: true
	        },
	        timing_pelaporan: {
	            required: true
	        }
	    },
		errorPlacement: function (error, element) { // render error placement for each input type
            if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) { 
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) { 
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) { 
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
	    invalidHandler: function (event, validator) { //display error alert on form submit              
	        MainApp.viewGlobalModal('error', 'Please Fill All Mandatory Field');
	    },
	
	    highlight: function (element) { // hightlight error inputs
	        $(element)
	            .closest('.form-group').addClass('has-error'); // set error class to the control group
	    },
	
	    unhighlight: function (element) { // revert the change done by hightlight
	        $(element)
	            .closest('.form-group').removeClass('has-error'); // set error class to the control group
	    },
	
	    success: function (label) {
	        label
	            .closest('.form-group').removeClass('has-error'); // set success class to the control group
	    },
	
	    submitHandler: function (form) {
	        console.log('validate submit');
	        return false;
	    }
	});
}

var gridLibrary = new Datatable();
gridLibrary.init({
    src: $("#library_table"),
    onSuccess: function (grid) {
        // execute some code after table records loaded
    },
    onError: function (grid) {
        // execute some code on network or other general error  
    },
    onDataLoad: function(grid) {
        // execute some code on ajax data load
    },
    loadingMessage: 'Loading...',
    dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
        // So when dropdowns used the scrollable div should be removed. 
        //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
        
		//"scrollX": true,
        "pageLength": 10, // default record count per page
        "lengthMenu": [[10], [10]],
        "ajax": {
            "url": site_url+"/risk/Kri/getRiskKri" // ajax source
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		var ret = '<div class="btn-group">'+
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: Kri.selectLibrary('+full.risk_id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
        		'</div>';
        		return ret;
        	}
        } ],
        "columns": [
			{ "data": "risk_code", "orderable": false },
			{ "data": "risk_code", "orderable": false },
			{ "data": "risk_event" },
			{ "data": "risk_description" }
       ],
        "order": [
            [2, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridKri = new Datatable();
gridKri.init({
    src: $("#kri_library_table"),
    onSuccess: function (grid) {
        // execute some code after table records loaded
    },
    onError: function (grid) {
        // execute some code on network or other general error  
    },
    onDataLoad: function(grid) {
        // execute some code on ajax data load
    },
    loadingMessage: 'Loading...',
    dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
        // So when dropdowns used the scrollable div should be removed. 
        //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
        
		//"scrollX": true,
        "pageLength": 10, // default record count per page
        "lengthMenu": [[10], [10]],
        "ajax": {
            "url": site_url+"/risk/Kri/getKriLibrary" // ajax source
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		var ret = '<div class="btn-group">'+
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: Kri.selectKriLibrary('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
        		'</div>';
        		return ret;
        	}
        } ],
        "columns": [
        	{ "data": "kri_code", "orderable": false },
			{ "data": "kri_code", "orderable": false },
			{ "data": "key_risk_indicator", "orderable": false },
			{ "data": "treshold" }
       ],
        "order": [
            [2, "asc"]
        ]// set first column as a default sort by asc
    }
});

var Kri = function() {
	return {
		dataMode: null,
        //main function to initiate the module
        dataActionPlan: {},
        dataActionPlanCounter: 0,
        dataTreshold: {},
        dataTresholdCounter: 0,
        operatorRef: {
        	'EQUAL': 'Equal To',
        	'BELOW': 'Below',
        	'BETWEEN': 'Between',
        	'ABOVE': 'Above',
        },
        levelRef: {
        	'GREEN': 'Green',
        	'YELLOW': 'Yellow',
        	'RED': 'Red'
        },
        init: function(mode) {
        	var me = this;
        	me.dataMode = mode;
        	
        	if (jQuery().datepicker) {
	            $('.date-picker').datepicker({
	                rtl: Metronic.isRTL(),
	                orientation: "left",
	                autoclose: true,
	                todayHighlight: true
	            });
	            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
	        };
        	
        	$('#modal-library-filter-submit').on('click', function() {
        		me.filterLibrary();
        	});
        	
        	$('#modal-kri-filter-submit').on('click', function() {
        		me.filterLibraryKri();
        	});
        	
        	$('#select-treshold-type').on('change', function() {
        		if (me.dataTresholdCounter > 0) {
        			var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to change the treshold type ? This will delete all previous treshold setting');
        			mod.find('button.btn-primary').one('click', function(){
        				mod.modal('hide');
        				me.tresholdReset();
        			});
        		} else {
        			me.tresholdReset();
        		}
        	});
        	
        	$('#is_percentage_treshold').on('click', function() {
        		$('#t-col-right-treshold').find('input[type=number]').prop('disabled', true);
        		$('#t-col-right-treshold').find('select').prop('disabled', true);
        		
        		if($(this).prop( "checked" )) {
        			$('#t-col-right-treshold').find('input[type=number]').prop('disabled', false);
        			$('#t-col-right-treshold').find('select').prop('disabled', false);
        			
        			//var p = this.parentNode;
        			//console.log($(p).find('input[type=number]'));
        			//console.log($(this).siblings('div').find('input[type=number]'));
        			//$(this).siblings('div').find('input[type=number]').prop('disabled', false);
        		} 
        	});
        	
        	$('#button-kri-open-treshold').on('click', function() {
        		var type = $('#select-treshold-type').val();
        		if (type == 'SELECTION') {
        			$('#modal-treshold-selection').modal('show');
        			me.initAddTresholdSelection();
        		} else {
        			$('#modal-treshold-value').modal('show');
        			me.initAddTresholdValue();
        		}
        	});
        	
        	$('#button-treshold-selection-add').on('click', function() {
				
				var val1 = $('#kri-form-selection').find('input[name=value-equal]').val();
				var result = $('#kri-form-selection').find('select[name=result]').val();
				var result_v = $('#kri-form-selection').find('select[name=result] option:selected').text();
				        		
        		var nnode = {
        			'operator_v': 'Equal to',
        			'operator': 'EQUAL',
        			'value_1': val1,
        			'value_2': '-',
        			'value_type': '-',
        			'result_v': result_v,
        			'result': result
        		};
        		//console.log(nnode);
        		me.tresholdAddRow(nnode);
        		
        		$('#modal-treshold-selection').modal('hide');
        	})
        	
        	$('#button-treshold-value-add').on('click', function() {
        		me.tresholdReset();
        		
        		if ($('#is_percentage_treshold').prop('checked')) {
	        		var iter = [
	        			'value-below', 'value-between', 'value-above', 
	        			'perc-below', 'perc-between', 'perc-above'
	        		];
        		} else {
        			var iter = [
        				'value-below', 'value-between', 'value-above'
        			];
        		}
        		
        		$.each(iter, function(idx, val) {
        		
        			var oper_v = $('#kri-form-value').find('input[name='+val+'-oper_v]').val();;
        			var oper = $('#kri-form-value').find('input[name='+val+'-oper]').val();;
        			var val1 = $('#kri-form-value').find('input[name='+val+'-1]').val();
        			var val2 = $('#kri-form-value').find('input[name='+val+'-2]').val();
        			var vt = $('#kri-form-value').find('input[name='+val+'-value_type]').val();
        			var result = $('#kri-form-value').find('select[name='+val+'-result]').val();
    				var result_v = $('#kri-form-value').find('select[name='+val+'-result] option:selected').text();
    				        		
    				var nnode = {
    					'operator_v': oper_v,
    					'operator': oper,
    					'value_1': val1,
    					'value_2': val2,
    					'value_type': vt,
    					'result_v': result_v,
    					'result': result
    				};
    				//console.log(nnode);
    				me.tresholdAddRow(nnode);
        		})
        		
        		
        		$('#modal-treshold-value').modal('hide');
        	})
        	
        	$('#kri-button-save').on('click', function() {
        		me.submitRiskData();
        	});
        	
        	$('#kri-button-cancel').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your KRI Entry ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main';
        		});
        	}); 
        	
        	handleValidation();       	
        },
        initAddTresholdValue: function() {
        	$('#kri-form-value')[0].reset();
        	$('#is_percentage_treshold').prop('checked', false).parent('span').removeClass('checked');
        	$('#t-col-right-treshold').find('input[type=number]').prop('disabled', true);
        	$('#t-col-right-treshold').find('select').prop('disabled', true);
        },
        initAddTresholdSelection: function() {
        	$('#kri-form-selection')[0].reset();
        },
        
        tresholdTableDelete: function(xrow, dataId) {
        	var i=xrow.parentNode.parentNode.parentNode.rowIndex;
        	document.getElementById('treshold_table').deleteRow(i);
        	this.tresholdDelete(dataId);
        },
        tresholdReset: function() {
        	this.dataTresholdCounter = 0;
        	this.dataTreshold = {};
        	$("#treshold_table > tbody").html("");
        },
        tresholdAdd: function(data, dcounter) {
        	this.dataTreshold[dcounter] = data;
        },
        tresholdDelete: function(id) {
        	delete this.dataTreshold[id];
        },
        tresholdAddRow: function(nnode) {
        	var me = this;

        	me.dataTresholdCounter++;
        	
        	$('#treshold_table > tbody:last-child').append('<tr>'+
        		'<td>'+nnode.operator_v+'</td>'+
        		'<td>'+nnode.value_1+'</td>'+
        		'<td>'+nnode.value_2+'</td>'+
        		'<td>'+nnode.value_type+'</td>'+
        		'<td>'+nnode.result_v+'</td>'+
        		
                '<td>'+'<div class="btn-group">'+
                    '<button type="button" class="btn btn-default btn-xs" onclick="Kri.tresholdTableDelete(this, '+me.dataTresholdCounter+')"><i class="fa fa-trash-o font-red"></i></button>'+
                '</div>'+
                '</td>'+
        	'</tr>');
        	
        	me.tresholdAdd(nnode, me.dataTresholdCounter);
        },
        
        actionPlanTableDelete: function(xrow, dataId) {
        	var i=xrow.parentNode.parentNode.parentNode.rowIndex;
        	document.getElementById('action_plan_table').deleteRow(i);
        	this.actionPlanDelete(dataId);
        },
        actionPlanReset: function() {
        	this.dataActionPlanCounter = 0;
        	this.dataActionPlan = {};
        	$("#action_plan_table > tbody").html("");
        },
        actionPlanAdd: function(data, dcounter) {
        	this.dataActionPlan[dcounter] = data;
        },
        actionPlanDelete: function(id) {
        	delete this.dataActionPlan[id];
        },
        actionPlanAddRow: function(nnode) {
        	var me = this;
        	
        	me.dataActionPlanCounter++;
        	
        	$('#action_plan_table > tbody:last-child').append('<tr>'+
        		'<td>'+nnode.action_plan+'</td>'+
        		'<td>'+nnode.due_date+'</td>'+
        		'<td>'+nnode.division_v+'</td>'+
        		'</td>'+
        	'</tr>');
        	
        	me.actionPlanAdd(nnode, me.dataActionPlanCounter);
        },
        
        selectLibrary: function(rid) {
        	var me = this;
        	
        	$('#modal-library').modal('hide');
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+"/risk/RiskRegister/loadRiskLibrary/"+rid, function( data_risk ) {
        		Metronic.unblockUI();
        		
        		data_risk['risk_library_id'] = data_risk['risk_id'];
        		data_risk['risk_library_code'] = data_risk['risk_code'];
        		data_risk['risk_level'] = data_risk['risk_level_v'];
        		data_risk['risk_treatment'] = data_risk['treatment_v'];
        		
        		me.populateRisk($('#input-form'), data_risk);
        		$('#kri-risk-id').val(data_risk['risk_id']);
        		
        		me.actionPlanReset();
        		$.each( data_risk['action_plan_list'], function( key, val ) {
        			var nnode = {
        				'action_plan' : val.action_plan,
        				'due_date' : val.due_date_v,
        				'division_v' : val.division_v,
        				'division' : val.division
        			}
        			me.actionPlanAddRow(nnode);
        		});
        	});
        },
        
        selectKriLibrary: function(rid) {
        	var me = this;
        	
        	$('#modal-kri').modal('hide');
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+"/risk/kri/getKri/"+rid, function( data_risk ) {
        		Metronic.unblockUI();
				var fdata_risk = {};
				
        		fdata_risk['kri_library_id'] = data_risk['id'];
        		fdata_risk['kri_library_code'] = data_risk['kri_code'];
        		fdata_risk['key_risk_indicator'] = data_risk['key_risk_indicator'];
        		fdata_risk['treshold'] = data_risk['treshold'];
        		fdata_risk['treshold_type'] = data_risk['treshold_type'];
        		fdata_risk['timing_pelaporan'] = data_risk['timing_pelaporan_v'];
        		fdata_risk['kri_owner'] = data_risk['kri_owner'];
        		
        		me.populateRisk($('#kri-form'), fdata_risk);
        		
        		me.tresholdReset();
        		$.each( data_risk['treshold_list'], function( key, val ) {
        			var nnode = {
        				'operator_v': me.operatorRef[val.operator],
        				'operator': val.operator,
        				'value_1': val.value_1,
        				'value_2': val.value_2,
        				'value_type': val.value_type,
        				'result_v': me.levelRef[val.result],
        				'result': val.result
        			};
        			
        			me.tresholdAddRow(nnode);
        		});
        	});
        },
        populateRisk: function(frm, data) {   
            $.each(data, function(key, value){  
            	var $ctrl = $('[name='+key+']', frm);  
                switch($ctrl.attr("type"))  
                {  
                    case "text" :   
                    case "hidden":  
                    case "textarea":
                    	$ctrl.val(value);   
                    	break;   
                    case "radio" : case "checkbox":   
                    $ctrl.each(function(){
                       if($(this).attr('value') == value) {  $(this).prop("checked",true); } });   
                    break;  
                    default:
                    $ctrl.val(value); 
                }  
            });  
        },
        filterLibrary: function() {
        	var fval = $('#modal-library div.inputs input[name=filter_search]')[0].value;
        	gridLibrary.clearAjaxParams();
        	gridLibrary.setAjaxParam("filter_library", fval);
        	gridLibrary.getDataTable().ajax.reload();	
        },
        filterLibraryKri: function() {
        	var fval = $('#modal-kri div.inputs input[name=filter_search]')[0].value;
        	gridKri.clearAjaxParams();
        	gridKri.setAjaxParam("filter_library", fval);
        	gridKri.getDataTable().ajax.reload();	
        },
        submitRiskData: function() {
        	if ($('#risk_library_id').val() == '') {
        		MainApp.viewGlobalModal('error', 'Please Select Risk');
        		return false;
        	}
        	
        	var form1 = $('#kri-form').validate();
        	var fvalid = form1.form();
        	if (fvalid) {
	        	var me = this;
	        	
	        	// prepare impact data
	        	var treshold = {};
	        	var cnt = 0;
	        	$.each(me.dataTreshold, function(key, value) { 
	        		treshold['treshold_list['+cnt+'][operator]'] = value.operator;
	        		treshold['treshold_list['+cnt+'][value_1]'] = value.value_1;
	        		treshold['treshold_list['+cnt+'][value_2]'] = value.value_2;
	        		treshold['treshold_list['+cnt+'][value_type]'] = value.value_type;
	        		treshold['treshold_list['+cnt+'][result]'] = value.result;
	        		cnt++;
	        	});
	        		        	
	        	if (cnt < 1) {
	        		MainApp.viewGlobalModal('error', 'Please Input at the Treshold Configuration');
	        		return false;
	        	}
	        		        	
	        	Metronic.blockUI({ boxed: true });
	        	var url = site_url+'/risk/Kri/insertKriData';
	        	$.post(
	        		url,
	        		$( "#kri-form" ).serialize()+ '&' + $.param(treshold),
	        		function( data ) {
	        			Metronic.unblockUI();
	        			if(data.success) {
	        				var mod = MainApp.viewGlobalModal('success', 'Success Inserting your Kri');
	        				mod.find('button.btn-ok-success').one('click', function(){
	        					location.href=site_url+'/main/mainrac#tab_kri_list';
	        				});
	        				
	        			} else {
	        				MainApp.viewGlobalModal('error', data.msg);
	        			}
	        		},
	        		"json"
	        	).fail(function() {
	        		Metronic.unblockUI();
	        		MainApp.viewGlobalModal('error', 'Error Submitting Data');
	        	 });
	        }
        }
	 }
}();