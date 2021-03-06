var gridLibraryaction = new Datatable();
gridLibraryaction.init({
    src: $("#library_tableaction"),
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
            "url": site_url+"/risk/RiskRegister/getActionLibrary" // ajax source
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "action_plan",
        	"render": function ( data, type, full, meta ) {
        		var ret = '<div class="btn-group">'+
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskInput.selectLibraryaction('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
        		'</div>';
        		return ret;
        	}
        } ],
        "columns": [
			{ "data": "action_plan", "orderable": false },
			{ "data": "action_plan", "orderable": false } 
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

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
            "url": site_url+"/risk/RiskRegister/getRiskLibrary" // ajax source
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		var ret = '<div class="btn-group">'+
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskInput.selectLibrary('+full.risk_id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
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

var gridControl = new Datatable();
gridControl.init({
    src: $("#library_control_table"),
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
            "url": site_url+"/risk/RiskRegister/getControlLibrary" // ajax source
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		var ret = '<div class="btn-group">'+
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskInput.selectControlLibrary('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
        		'</div>';
        		return ret;
        	}
        } ],
        "columns": [
			{ "data": "id", "orderable": false },
			{ "data": "risk_existing_control"},
			{ "data": "risk_evaluation_control" },
			{ "data": "risk_control_owner" }
       ],
        "order": [
            [2, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridControlobjective = new Datatable();
gridControlobjective.init({
    src: $("#library_objective_table"),
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
            "url": site_url+"/risk/RiskRegister/getControlLibraryobjective" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "id",
            "render": function ( data, type, full, meta ) {
                var ret = '<div class="btn-group">'+
                '<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskInput.selectControlLibraryobjective('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
                '</div>';
                return ret;
            }
        } ],
        "columns": [
            { "data": "id", "orderable": false },
            { "data": "objective"}
       ],
        "order": [
            [0, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridControlExisting = new Datatable();
gridControlExisting.init({
    src: $("#library_control_table_existing"),
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
            "url": site_url+"/risk/RiskRegister/getControlLibraryexisting" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "risk_id",
            "render": function ( data, type, full, meta ) {
                var ret = '<div class="btn-group">'+
                '<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskInput.selectControlLibraryexisting('+full.id +')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
                '</div>';
                return ret;
            }
        } ],
        "columns": [
            { "data": "risk_id", "orderable": false },
            { "data": "existing_control"},
            { "data": "description" }
          
       ],
        "order": [
            [0, "asc"]
        ]// set first column as a default sort by asc
    }
});

var handleValidation = function() {
	// for more info visit the official plugin documentation: 
	// http://docs.jquery.com/Plugins/Validation
	
	var form1 = $('#input-form');
	//var error1 = $('.alert-danger', form1);
	//var success1 = $('.alert-success', form1);
	
	form1.validate({
	    errorElement: 'span', //default input error message container
	    errorClass: 'help-block help-block-error', // default input error message class
	    focusInvalid: true, // do not focus the last invalid input
	    ignore: "",  // validate all fields including form hidden input
	    rules: {
	        risk_event: {
	            minlength: 2,
	            required: true
	        },
	        risk_description: {
	            minlength: 2,
	            required: true
	        },
	        risk_cause: {
	            minlength: 2,
	            required: true
	        },
	        risk_impact: {
	            minlength: 2,
	            required: true
	        },
	        risk_impact_level_value: {
	            required: true
	        },
	        risk_likelihood_value: {
	            required: true
	        },
	        risk_level: {
	            required: true
	        },
            suggested_risk_treatment: {
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

var handleValidationControl = function() {
	var form1 = $('#input-form-control');
	
	form1.validate({
	    errorElement: 'span', //default input error message container
	    errorClass: 'help-block help-block-error', // default input error message class
	    focusInvalid: true, // do not focus the last invalid input
	    ignore: "",  // validate all fields including form hidden input
	    rules: {
	        risk_existing_control: {
	            required: true
	        },
	        risk_evaluation_control: {
	            required: true
	        },
	        risk_control_owner: {
	            required: true
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
	        return false;
	    }
	});
}

var handleValidationObjective = function() {
    var form1 = $('#input-form-control-objective');
    
    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        rules: {
            objective: {
                required: true
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
            return false;
        }
    });
}

var handleValidationAction = function() {
	// for more info visit the official plugin documentation: 
	// http://docs.jquery.com/Plugins/Validation
	
	var form1 = $('#input-form-action-plan');
	//var error1 = $('.alert-danger', form1);
	//var success1 = $('.alert-success', form1);
	
	form1.validate({
	    errorElement: 'span', //default input error message container
	    errorClass: 'help-block help-block-error', // default input error message class
	    focusInvalid: true, // do not focus the last invalid input
	    ignore: "",  // validate all fields including form hidden input
	    rules: {
	        action_plan: {
	            required: true
	        },
	        due_date: {
	            required: true
	        },
	        division: {
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
	        return false;
	    }
	});
}

var RiskInput = function() {
	return {
		dataMode: null,
        //main function to initiate the module
        dataControlobjective: {},
        dataControl: {},
        dataActionPlan: {},
        dataRiskImpact: {},
        dataControlCounter: 0,
        dataControlCounterobjective: 0,
        dataActionPlanCounter: 0,
        riskLevelList: null,
        riskLevelReference: null,
        impactLevelReference: null,
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
        	
        	$('#sel_risk_category').change(function() {
        		var val = $(this).val();
        		me.loadCategorySelect('sel_risk_sub_category', val);
        	});
        	
        	$('#sel_risk_sub_category').change(function() {
        		var val = $(this).val();
        		me.loadCategorySelect('sel_risk_2nd_sub_category', val);
        	});
        	
        	$('#modal-library-filter-submit').on('click', function() {
        		me.filterLibrary();
        	});
			
			$('#modal-libraryaction-filter-submit').on('click', function() {
        		me.filterLibraryAction();
        	});
        	
        	$('#modal-control-filter-submit').on('click', function() {
        		me.filterControl();
        	});

            $('#modal-control-filter-submit-objective').on('click', function() {
                me.filterControlobjective();
            });
        	
        	$('#btn_impact_list').on('click', function() {
        		me.showImpactList();
        	});
        	
        	$('#input-form-likelihood-button').on('click', function() {
        		var sel = $('#form-likelihood input[name=risk_likelihood]:checked').val();
        		var res = sel.split('|');
        		
        		$('#input-form input[name=risk_likelihood_id]').val(res[0]);
        		$('#input-form input[name=risk_likelihood_value]').val(res[1]);
        		
        		$('#modal-likelihood').modal('hide');
        		me.setRiskLevel();
        	});
        	
        	$('#input-control-add').on('click', function() {
        		var form1 = $('#input-form-control').validate();
        		var fvalid = form1.form();
				 
        		if (fvalid) {
        			var xcid = $('#input-form-control input[name=existing_control_id]').val();
	        		var xexis = $('#input-form-control input[name=risk_existing_control]').val();
	        		var xeval = $('#input-form-control input[name=risk_evaluation_control]').val();
	        		var xowner = $('#input-form-control select[name=risk_control_owner]').val();
					
					var tr_id = $('#form-control-revid').val();
					
					$("#tr_c"+tr_id).html("");
					 
	        		var nnode = {
						'tr_id' : tr_id,
	        			'existing_control_id' : xcid,
	        			'risk_existing_control' : xexis,
	        			'risk_evaluation_control' : xeval,
	        			'risk_control_owner' : xowner
	        		};
					
	        		me.controlAddRow(nnode);
	        		
	        		$('#form-control').modal('hide');
                    $('#form-control-2').modal('hide');
        		}
        	});

            $('#input-control-add-objective').on('click', function() {
                var form1 = $('#input-form-control-objective').validate();
                var fvalid = form1.form();
                 
                if (fvalid) {
                    var xcid = $('#input-form-control-objective input[name=objective_id]').val();
                    var xexis = $('#input-form-control-objective textarea[name=objective]').val();
                  
                    
                    var tr_idob = $('#form-control-revid-objective').val();
                    
                    $("#"+tr_idob).html("");
                    
                    var nnode = {
                        'tr_idob' : tr_idob,
                        'objective_id' : xcid,
                        'objective' : xexis,
                        
                    };
                    
                    me.controlAddRowobjective(nnode);
                    
                    $('#form-control-objective').modal('hide');
                }
            });
        	
        	$('#input-actionplan-add').on('click', function() {
        		var form1 = $('#input-form-action-plan').validate();
        		var fvalid = form1.form();
        		
        		if (fvalid) {
					//var tr_idnya2 = $('#tr_idnya2').val();
					var tr_idnya2 = $('#form-data-revid').val();

        			var xplan = $('#input-form-action-plan textarea[name=action_plan]').val();
        			var xdate = $('#input-form-action-plan input[name=due_date]').val();
        			var xdiv_view = $('#input-form-action-plan select[name=division] option:selected').text();
        			var xdiv_id = $('#input-form-action-plan select[name=division] option:selected').val();
                    
        			var nnode = {
						'tr_idnya2' : tr_idnya2,
        				'action_plan' : xplan,
        				'due_date' : xdate,
        				'division_v' : xdiv_view,
        				'division' : xdiv_id,
                      
        			};
        			
        			me.actionPlanAddRow(nnode);
        			
        			$('#form-data').modal('hide');
        		}
        	});
        	
        	$('#input-form-impact-button').on('click', function() {
        		var imp = {
        			'NA': 0, 'INSIGNIFICANT':1, 'MINOR':2,  
        			'MODERATE': 3, 'MAJOR' : 4, 'CATASTROPHIC': 5
        		};
        		
        		var all_na = true;
        		var max_idx = 0;
        		var max_val = 'NA';
        		
        		me.dataRiskImpact = {};
        		
        		var sel = $('#form-impact input[type=radio]:checked');
        		$.each(sel, function(idx, cmp) {
        			var val = $(cmp).val();
        			var name = $(cmp).attr('name');
        			if (val != 'NA') {
        				all_na = false;
        			}
        			if (imp[val] > max_idx) {
        				max_idx = imp[val];
        				max_val = val;
        			}
        			me.dataRiskImpact[name] = val;
        		});
        		
        		if (all_na) {
        			MainApp.viewGlobalModal('error', 'Cannot set all Not Available (N/A) on Risk Impact');
        		} else {
        			var xv = me.impactLevelReference[max_val];
        			$('#input-form input[name=risk_impact_level_id]').val(max_val);
        			$('#input-form input[name=risk_impact_level_value]').val(xv);
        			
        			$('#modal-impact').modal('hide');
        			me.setRiskLevel();
        		}
        	});
        	
        	 $('#button-form-control-open').on('click', function () {
                
                //$('#input-form-action-plan').reset();
                document.getElementById("input-form-control2").reset();
                
            });

            /*
            $('#button-form-control-open').on('click', function () {
                //$('#input-form-control')[0].reset();
                 
                document.getElementById("input-form-control").reset();
                 
                $('#form-control-revid').val("");
                $('#input-form-control textarea[name=risk_existing_control]').attr('readonly', false);
            });
            */

            $('#button-form-control-open-objective').on('click', function () {
				document.getElementById("input-form-control-objective").reset();
               // $('#input-form-control-objective')[0].reset();
			    $('#form-control-revid-objective').val("");
                $('#input-form-control-objective textarea[name=objective]').attr('readonly', false);
            });
        	
        	$('#button-form-data-open').on('click', function () {
				
        		//$('#input-form-action-plan').reset();
				document.getElementById("input-form-action-plan").reset();
				$('#form-data-revid').val('');
        	});
        	
        	$('#risk-button-submit').on('click', function() {
        		me.submitRiskData();
        	});
        	
        	$('#risk-button-save').on('click', function() {
        		me.submitRiskData();
        	});
        	
        	$('#risk-button-cancel').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Risk Register ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main/';
        		});
        	});

            $('#control_id').change(function() {
                var val = $(this).val();
                me.loadCategorySelectcontrol('control_status', val);
                });

            $('#input-control-add-3').on('click', function() {
                var form1 = $('#input-form-control-3').validate();
                var fvalid = form1.form();
                 
                if (fvalid) {
                    var xcid = $('#input-form-control-3 input[name=existing_control_id]').val();
                    var xexis = $('#input-form-control-3 input[name=risk_existing_control]').val();
                    var xeval = $('#input-form-control-3 input[name=risk_evaluation_control]').val();
                    var xowner = $('#input-form-control-3 select[name=risk_control_owner]').val();
                    
                    var tr_id = $('#form-control-revid-3').val();
                    
                    $("#tr_c"+tr_id).html("");
                     
                    var nnode = {
                        'tr_id' : tr_id,
                        'existing_control_id' : xcid,
                        'risk_existing_control' : xexis,
                        'risk_evaluation_control' : xeval,
                        'risk_control_owner' : xowner
                    };
                    
                    me.controlAddRow(nnode);
                    
                    $('#form-control-2').modal('hide');
                    $('#form-control-3').modal('hide');
                }
            });

          
        	
        	me.loadRiskLevelList();
        	me.loadRiskLevelReference();
        	me.loadImpactLevelReference();
        	handleValidation();
        	handleValidationControl();
            handleValidationObjective();
        	handleValidationAction();
        },

        loadCategorySelectcontrol: function(sel_id, parent) {
                if(parent == 1){
                $('#form-control').modal('show');
                $('#form-control-2').modal('hide');
            }else{ 
                $('#form-control-3').modal('show');
                 $('#form-control-2').modal('hide');
            }
             },
            

        initLoadCategory: function() {
        	// init Category select
        	var cnt1 = cnt2 = cnt3 = 0; 
        	
        	$.getJSON( site_url+"/risk/RiskRegister/getCategory/0", function( data ) {
        		$.each( data, function( key, val ) {
        			// GET INIT SUB CATEGORY
        			if (cnt1 == 0) {
        				$.getJSON( site_url+"/risk/RiskRegister/getCategory/"+val.ref_key, function( data1 ) {
        					$.each( data1, function( key2, val2 ) {
        						if (cnt2 == 0) {
        							// GET INIT 2ND SUB CATEGORY
        							$.getJSON( site_url+"/risk/RiskRegister/getCategory/"+val2.ref_key, function( data2 ) {
        								$.each( data2, function( key3, val3 ) {
        								    $('#sel_risk_2nd_sub_category').append($('<option>').text(val3.ref_value).attr('value', val3.ref_key));
        								});
        							});
        						}
        						
        					    $('#sel_risk_sub_category').append($('<option>').text(val2.ref_value).attr('value', val2.ref_key));
        						    
        					    cnt2++;
        					});
        				});
        			}
        			
        			$('#sel_risk_category').append($('<option>').text(val.ref_value).attr('value', val.ref_key));
        			    
        			cnt1++;
        		});
        	});
        },
        loadCategorySelect: function(sel_id, parent) {
        	$('#'+sel_id)[0].options.length = 0;
        	$.getJSON( site_url+"/risk/RiskRegister/getCategory/"+parent, function( data ) {
        		$.each( data, function( key, val ) {
        		    $('#'+sel_id).append($('<option>').text(val.ref_value).attr('value', val.ref_key));
        		});
        		$('#'+sel_id).trigger('change');
        	});
        },
        loadRiskLevelList: function() {
        	var me = this;
        	$.getJSON( site_url+"/risk/RiskRegister/getRiskLevelList", function( data ) {
        		me.riskLevelList = data;
        	});
        },
        loadRiskLevelReference: function() {
        	var me = this;
        	$.getJSON( site_url+"/risk/RiskRegister/getRiskLevelReference", function( data ) {
        		me.riskLevelReference = data;
        	});
        },
        loadImpactLevelReference: function() {
        	var me = this;
        	$.getJSON( site_url+"/risk/RiskRegister/getImpactLevelReference", function( data ) {
        		me.impactLevelReference = data;
        	});
        },
        getRiskLevel: function(impact, likelihood) {
        	var me = this;
        	if (me.riskLevelList != null) {
        		var xk = impact+'-'+likelihood;
        		return me.riskLevelList[xk];
        	} else {
        		return false;
        	}
        },
        setRiskLevel: function() {
        	var iv = $('#input-form input[name=risk_impact_level_id]').val();
        	var lv = $('#input-form input[name=risk_likelihood_id]').val();
        	//console.log(iv, lv);
        	var xv = iv+"-"+lv;
        	if (this.riskLevelList[xv] != undefined) {
        		var vv = this.riskLevelReference[this.riskLevelList[xv]];
        		$('#input-form input[name=risk_level_id]').val(this.riskLevelList[xv]);
        		$('#input-form input[name=risk_level]').val(vv);
        	}
        },
        setRiskImpact: function(data) {
        	this.dataRiskImpact = data;
        },
        controlTableDelete: function(xrow, dataId) {
        	//console.log(dataId);
        	var i=xrow.parentNode.parentNode.parentNode.rowIndex;
        	document.getElementById('control_table').deleteRow(i);
        	this.controlDelete(dataId);
        },
        controlTableDeleteobjective: function(xrow, dataId) {
            //console.log(dataId);
            var i=xrow.parentNode.parentNode.parentNode.rowIndex;
            document.getElementById('objective_table').deleteRow(i);
            this.controlDeleteobjective(dataId);
        },
        controlReset: function() {
        	this.dataControl = {};
        	this.dataControlCounter = 0;
        	$("#control_table > tbody").html("");
        },
        controlResetobjective: function() {
            this.dataControlobjective = {};
            this.dataControlCounterobjective = 0;
            $("#objective_table > tbody").html("");
        },
        controlAdd: function(data, dcounter) {
        	this.dataControl[dcounter] = data;
        },
        controlAddobjective: function(data, dcounter) {
            this.dataControlobjective[dcounter] = data;
        },
        controlDelete: function(id) {
        	delete this.dataControl[id];
        },
        controlDeleteobjective: function(id) {
            delete this.dataControlobjective[id];
        },
        controlAddRow: function(nnode) {
        	var me = this;
			
			var lastidrand = $('#form-control-revid').val();
			
			$('#tr_c'+lastidrand).remove();
			
			$('#tr_c'+lastidrand).html('');
        	
        	me.dataControlCounter++; 
			
			var idrand = Math.floor((Math.random() * 1000000) + 1); 

        	$('#control_table > tbody:last-child').append('<tr id = "tr_c'+me.dataControlCounter+'">'+
        		'<td><input type = "hidden" id = "existing_control_id'+me.dataControlCounter+'" value = "'+nnode.existing_control_id+'">'+nnode.existing_control_id+'</td>'+
        		'<td><textarea style="display:none;"  id = "risk_existing_control'+me.dataControlCounter+'" >'+nnode.risk_existing_control+'</textarea>'+nnode.risk_existing_control+'</td>'+
        		'<td><input type = "hidden" id = "risk_evaluation_control'+me.dataControlCounter+'" value = "'+nnode.risk_evaluation_control+'">'+nnode.risk_evaluation_control+'</td>'+
        		'<td><input type = "hidden" id = "risk_control_owner'+me.dataControlCounter+'" value = "'+nnode.risk_control_owner+'">'+nnode.risk_control_owner+'</td>'+
        		'<td>'+
        		'<div class="btn-group">'+
					'<button type="button" class="btn btn-default btn-xs" onclick = "modal_control_edit('+me.dataControlCounter+')" ><i class="fa fa-pencil font-blue"> Edit </i></button>'+
        			'<button type="button" class="btn btn-default btn-xs" onclick="RiskInput.controlTableDelete(this, '+me.dataControlCounter+')"><i class="fa fa-trash-o font-red"> Delete </i></button>'+
        		'</div>'+
        		'</td>'+
        	'</tr>');
			this.controlDelete(nnode.tr_id); 
        	me.controlAdd(nnode, me.dataControlCounter);
        },
        controlAddRowobjective: function(nnode) {
            var me = this;
            
            var lastidrand = $('#form-control-revid-objective').val();
			
			//alert(lastidrand);
            
            $('#'+lastidrand).html('');
			  
			$('#'+lastidrand).remove();
            
            me.dataControlCounterobjective++; 
            
            var idrand = Math.floor((Math.random() * 1000000) + 1); 

            $('#objective_table > tbody:last-child').append('<tr id = "'+me.dataControlCounterobjective+'">'+
                '<td><input type = "hidden" id = "objective_id'+me.dataControlCounterobjective+' " value = '+nnode.objective_id+'>'+nnode.objective_id+'</td>'+
                '<td><textarea style="display:none;" id = "objective'+me.dataControlCounterobjective+'">'+nnode.objective+'</textarea>'+nnode.objective+'</td>'+
                '<td>'+
                '<div class="btn-group">'+
                    '<button type="button" class="btn btn-default btn-xs" onclick = "modal_control_edit_objective('+me.dataControlCounterobjective+')" ><i class="fa fa-pencil font-blue"> Edit </i></button>'+
                    '<button type="button" class="btn btn-default btn-xs" onclick="RiskInput.controlTableDeleteobjective(this, '+me.dataControlCounterobjective+')"><i class="fa fa-trash-o font-red"> Delete </i></button>'+
                '</div>'+
                '</td>'+
            '</tr>');
            this.controlDeleteobjective(nnode.tr_idob); 
            me.controlAddobjective(nnode, me.dataControlCounterobjective);
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
			
			var lastidrand = $('#form-data-revid').val();
			
			var tr_id2 = $('#form-data-revid').val();
			 
			//$("#tr_z"+tr_id2).html("");
			$("#tr_z"+tr_id2).remove(); 
			
			$('#tr_z'+lastidrand).html('');
			
			var idrand = Math.floor((Math.random() * 1000000) + 1); 
        	
        	$('#action_plan_table > tbody:last-child').append('<tr id = "tr_z'+me.dataActionPlanCounter+'">'+
        		'<td><input type = "hidden" value = "'+nnode.action_plan+'" id = "action_plan'+me.dataActionPlanCounter+'">'+nnode.action_plan+'</td>'+
        		'<td><input type = "hidden" value = "'+nnode.due_date+'" id = "due_date'+me.dataActionPlanCounter+'">'+nnode.due_date+'</td>'+
        		'<td><input type = "hidden" value = "'+nnode.division_v+'" id = "division_v'+me.dataActionPlanCounter+'">'+nnode.division_v+'</td>'+
               
                
        		'<td>'+
        		'<div class="btn-group">'+
					'<button type="button" class="btn btn-default btn-xs" onclick="modal_ap_edit('+me.dataActionPlanCounter+')" ><i class="fa fa-pencil font-blue"> Edit </i></button>'+
        			'<button type="button" class="btn btn-default btn-xs" onclick="RiskInput.actionPlanTableDelete(this, '+me.dataActionPlanCounter+')"><i class="fa fa-trash-o font-red"> Delete </i></button>'+
        		'</div>'+
        		'</td>'+
        	'</tr>');
        	
			me.actionPlanDelete(nnode.tr_idnya2);
        	me.actionPlanAdd(nnode, me.dataActionPlanCounter);
        },
        showImpactList: function() {
        	$('#modal-impact').on('shown.bs.modal', function () {
        		$('#modal-impact.modal .modal-body').css('max-height', 400);
        		$('#modal-impact.modal .modal-body').css('overflow', 'none');
        		$('#modal-impact.modal .modal-body').css('overflow-y', 'auto');
        	});
        	
        	$('#modal-impact').modal('show');
        },
        selectLibrary: function(rid) {
        	var me = this;
        	
        	$('#modal-library').modal('hide');
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+"/risk/RiskRegister/loadRiskLibrary/"+rid, function( data_risk ) {
        		Metronic.unblockUI();
        		
        		data_risk['risk_library_id'] = data_risk['risk_id'];
        		data_risk['risk_library_code'] = data_risk['risk_code'];
        		data_risk['risk_level_id'] = data_risk['risk_level'];
        		data_risk['risk_level'] = data_risk['risk_level_v'];
        		
        		data_risk['risk_impact_level_id'] = data_risk['risk_impact_level'];
        		data_risk['risk_impact_level_value'] = data_risk['impact_level_v'];
        		data_risk['risk_likelihood_id'] = data_risk['risk_likelihood_key'];
        		data_risk['risk_likelihood_value'] = data_risk['likelihood_v'];
        		
        		me.populateRisk($('#input-form'), data_risk);
        		$('#risk_submitted_by').val(data_risk.risk_owner_v);
        		$('#risk_submitted_division').val(data_risk.division_v);
        		
        		//console.log(data_risk);
        		$('#sel_risk_category').find('option').remove();
        		$('#sel_risk_sub_category').find('option').remove();
        		$('#sel_risk_2nd_sub_category').find('option').remove();
        		
        		$.getJSON( site_url+"/risk/RiskRegister/getCategory/0", function( data ) {
        			$.each( data, function( key, val ) {
        				$('#sel_risk_category').append($('<option>').text(val.ref_value).attr('value', val.ref_key));
        			});
        			$('#sel_risk_category').val(data_risk['risk_category']);
        			
        			$.getJSON( site_url+"/risk/RiskRegister/getCategory/"+data_risk['risk_category'], function( data1 ) {
        				$.each( data1, function( key2, val2 ) {
        					$('#sel_risk_sub_category').append($('<option>').text(val2.ref_value).attr('value', val2.ref_key));
        				});
        				$('#sel_risk_sub_category').val(data_risk['risk_sub_category']);        				
        				
        				$.getJSON( site_url+"/risk/RiskRegister/getCategory/"+data_risk['risk_sub_category'], function( data2 ) {
        					$.each( data2, function( key3, val3 ) {
        					    $('#sel_risk_2nd_sub_category').append($('<option>').text(val3.ref_value).attr('value', val3.ref_key));
        					    $('#sel_risk_2nd_sub_category').val(data_risk['risk_2nd_sub_category']);
        					    Metronic.unblockUI();
        					});
        				});
        			});
        		});
        		
        		$('#form-likelihood').find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
        		$('#form-likelihood input:radio[name=risk_likelihood]').each(function(){
        			if($(this).attr('value') == data_risk['risk_likelihood_key']+'|'+data_risk['risk_likelihood_value']) {  
        				$(this).prop('checked', true).click();
        			}
        		});
        		
        		me.dataRiskImpact = {};
        		//$('#form-impact').find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
        		$.each( data_risk['impact_list'], function( key, val ) {
        			var gid = val.impact_id;
        			$('#form-impact input:radio[name=impactlevel_'+gid+']').each(function(){
        				if($(this).attr('value') == val.impact_level) {  
        					$(this).prop('checked', true).click();
        					me.dataRiskImpact[$(this).attr('name')] = val.impact_level;
        				}
        			});
        		});
        		
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
        		
        		me.controlReset();
        		$.each( data_risk['control_list'], function( key, val ) {
        			var ecid = val.existing_control_id;
        			if (val.existing_control_id == null || val.existing_control_id == '0') ecid = '';
        			var nnode = {
        				'existing_control_id' : ecid,
        				'risk_existing_control' : val.risk_existing_control,
        				'risk_evaluation_control' : val.risk_evaluation_control,
        				'risk_control_owner' : val.risk_control_owner
        			};
        			
        			me.controlAddRow(nnode);
        		});

                //objective
                me.controlResetobjective();
                $.each( data_risk['objective_list'], function( key, val ) {
                    var ecid = val.objective_id;
                    if (val.objective_id == null || val.objective_id == '0') ecid = '';
                    var nnode = {
                        'objective_id' : ecid,
                        'objective' : val.objective
                    };
                    
                    me.controlAddRowobjective(nnode);
                });

        	});
        },
        selectControlLibrary: function(rid) {
        	var me = this;
        	$('#input-form-control textarea[name=risk_existing_control]').attr('readonly', true);
        	
        	$('#modal-control').modal('hide');
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+"/risk/RiskRegister/loadControlLibrary/"+rid, function( data_risk ) {
        		Metronic.unblockUI();
        		
        		data_risk['existing_control_id'] = data_risk['id'];
        		
        		me.populateRisk($('#input-form-control'), data_risk);
        	});
        },
        selectControlLibraryobjective: function(rid) {
            var me = this;
            $('#input-form-control-objective textarea[name=objective]').attr('readonly', false);
            
            $('#modal-objective').modal('hide');
            Metronic.blockUI({ boxed: true });
            $.getJSON( site_url+"/risk/RiskRegister/loadControlLibraryobjective/"+rid, function( data_risk ) {
                Metronic.unblockUI();
                
                data_risk['objective_id'] = data_risk['id'];
                
                me.populateRisk($('#input-form-control-objective'), data_risk);
            });
        },
        selectControlLibraryexisting: function(rid) {
            var me = this;
            $('#input-form-control input[name=risk_existing_control]').attr('readonly', true);
            
            $('#modal-control-existing').modal('hide');
            Metronic.blockUI({ boxed: true });
            $.getJSON( site_url+"/risk/RiskRegister/loadControlLibraryexisting/"+rid, function( data_risk ) {
                Metronic.unblockUI();
                
                data_risk['risk_existing_control'] = data_risk['existing_control'];
                
                me.populateRisk($('#input-form-control'), data_risk);
            });
        },
		 selectLibraryaction: function(rid) {
        	var me = this;
			  
        	$('#modal-libraryaction').modal('hide');
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+"/risk/RiskRegister/loadactionLibrary/"+rid, function( data_risk ) {
        		Metronic.unblockUI();
        		
        		data_risk['action_plan'] = data_risk['action_plan'];
        		
        		me.populateRisk($('#input-form-action-plan'), data_risk);
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
		 filterLibraryAction: function() {
        	var fval = $('#modal-libraryaction div.inputs input[name=filter_search]')[0].value;
        	gridLibraryaction.clearAjaxParams();
        	gridLibraryaction.setAjaxParam("filter_library", fval);
        	gridLibraryaction.getDataTable().ajax.reload();	
        },
        filterControl: function() {
        	var fval = $('#modal-control div.inputs input[name=filter_search]')[0].value;
        	gridControl.clearAjaxParams();
        	gridControl.setAjaxParam("filter_library", fval);
        	gridControl.getDataTable().ajax.reload();	
        },
        filterControlobjective: function() {
            var fval = $('#modal-objective div.inputs input[name=filter_search]')[0].value;
            gridControlobjective.clearAjaxParams();
            gridControlobjective.setAjaxParam("filter_library", fval);
            gridControlobjective.getDataTable().ajax.reload();   
        },
        submitRiskData: function() {
        	var form1 = $('#input-form').validate();
        	var fvalid = form1.form();
        	if (fvalid) {
	        	var me = this;
	        	var param = $('#input-form').serializeArray();
	        	
	        	// prepare impact data
	        	var impact_param = {};
	        	var cnt = 0;
	        	$.each(me.dataRiskImpact, function(key, value) { 
	        		var ar = key.split('_', 2);
	        		impact_param['impact['+cnt+'][impact_id]'] = ar[1];
	        		impact_param['impact['+cnt+'][impact_level]'] = value;
	        		cnt++;
	        	});
	        	//console.log(impact_param);
	        	
	        	// prepare control data
	        	var control_param = {};
	        	var cnt = 0;
	        	$.each(me.dataControl, function(key, value) { 
	        		control_param['control['+cnt+'][existing_control_id]'] = value.existing_control_id;
	        		control_param['control['+cnt+'][risk_existing_control]'] = value.risk_existing_control;
	        		control_param['control['+cnt+'][risk_evaluation_control]'] = value.risk_evaluation_control;
	        		control_param['control['+cnt+'][risk_control_owner]'] = value.risk_control_owner;
	        		cnt++;
	        	});
	        	
	        	if (cnt < 1) {
	        		MainApp.viewGlobalModal('error', 'Please Input at least One Control for this Risk');
	        		return false;
	        	}

                // prepare Objective data
                var objective_param = {};
                var cnt = 0;
                $.each(me.dataControlobjective, function(key, value) { 
                    objective_param['objective['+cnt+'][objective_id]'] = value.objective_id;
                    objective_param['objective['+cnt+'][objective]'] = value.objective;
                    cnt++;
                });
                
                if (cnt < 1) {
                    MainApp.viewGlobalModal('error', 'Please Input at least One Objective for this Risk');
                    return false;
                }
	        	
	        	// prepare action plan data
	        	var actplan_param = {};
	        	var cnt = 0;
	        	$.each(me.dataActionPlan, function(key, value) { 
	        		actplan_param['actplan['+cnt+'][action_plan]'] = value.action_plan;
	        		actplan_param['actplan['+cnt+'][due_date]'] = value.due_date;
	        		actplan_param['actplan['+cnt+'][division]'] = value.division;
                    
	        		cnt++;
	        	});
	        	//console.log(impact_param);
	        	
	        	if (cnt < 1) {
	        		MainApp.viewGlobalModal('error', 'Please Input at least One Action Plan for this Risk');
	        		return false;
	        	}
	        	
	        	Metronic.blockUI({ boxed: true });
	        	var url = site_url+'/risk/RiskRegister/insertRiskDataRac/'+g_username_user;
	        	$.post(
	        		url,
	        		$( "#input-form" ).serialize()+ '&' + $.param(impact_param)+ '&' + $.param(actplan_param)+ '&' + $.param(control_param)+ '&' + $.param(objective_param),
	        		function( data ) {
	        			Metronic.unblockUI();
	        			if(data.success) {
	        				var mod = MainApp.viewGlobalModal('success', 'Success Inserting your Risk');
	        				mod.find('button.btn-ok-success').one('click', function(){
	        					//location.href=site_url+'/risk/RiskRegister/RiskRegisterInput/'+me.dataMode;
                                if(g_submit_mode = 'adhoc'){
                                location.href=site_url+'/main/mainrac/riskRegister/'+g_username_user;
                                }else{
                                location.href=site_url+'/main/mainrac/riskRegister/'+g_username_user;
                                 }
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

function modal_control_edit(a){
	 
$('#tr_idnya').val(a); 
$('#existing_control_id').val($('#existing_control_id'+a).val());
$('#risk_existing_control').val($('#risk_existing_control'+a).val());
$('#risk_evaluation_control').val($('#risk_evaluation_control'+a).val());
$('#risk_control_owner').val($('#risk_control_owner'+a).val());
$('#form-control-revid').val(a);

$('#form-control').modal('show'); 
}

function modal_control_edit_objective(a){
$('#tr_idnyaob').val(a); 
$('#objective_id').val($('#objective_id'+a).val());
$('#objective').val($('#objective'+a).val());
$('#form-control-revid-objective').val(a);

$('#form-control-objective').modal('show'); 
}

function modal_ap_edit(a){
	
//$('#form-data-revid').val(a);
$('#action_plan').val($('#action_plan'+a).val());
$('#due_date').val($('#due_date'+a).val());
$('#form-data-revid').val(a);

var b = $('#division_v'+a).val();
 
if(b == "Information Technology & Network Support"){
	var b = "IT";
}

$('#division').val(b);


$('#form-data').modal('show'); 
}