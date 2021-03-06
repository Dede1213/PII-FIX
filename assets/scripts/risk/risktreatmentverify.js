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
        		'<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskVerify.selectControlLibrary('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
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
                '<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskVerify.selectLibraryaction('+full.id+')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
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
            "data": "id",
            "render": function ( data, type, full, meta ) {
                var ret = '<div class="btn-group">'+
                '<button type="button" class="btn btn-default btn-xs" onclick="javascript: RiskVerify.selectControlLibraryexisting('+full.id +')"><i class="fa fa-check-circle font-blue"> Select </i></button>'+
                '</div>';
                return ret;
            }
        } ],
        "columns": [
            { "data": "id", "orderable": false },
            { "data": "existing_control"},
            { "data": "description" }
          
       ],
        "order": [
            [2, "asc"]
        ]// set first column as a default sort by asc
    }
});
var RiskVerify = function() {
	return {
		dataControl: {},
		dataActionPlan: {},
		dataRiskImpact: {},
		dataControlCounter: 0,
		dataActionPlanCounter: 0,
		riskLevelList: null,
		riskLevelReference: null,
		impactLevelReference: null,
		init: function() {
        	var me = this;
        	
        	me.loadRisk(g_risk_id,risk_input_by);
        	me.loadRiskLevelList();
        	me.loadRiskLevelReference();
        	me.loadImpactLevelReference();
        	
        	if (jQuery().datepicker) {
        	    $('.date-picker').datepicker({
        	        rtl: Metronic.isRTL(),
        	        orientation: "left",
        	        autoclose: true,
        	        todayHighlight: true
        	    });
        	    //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        	};
        	
        	$('#modal-control-filter-submit').on('click', function() {
        		me.filterControl();
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
                    var xeval = $('#input-form-control textarea[name=risk_evaluation_control]').val();
                    var xowner = $('#input-form-control select[name=risk_control_owner]').val();
                    
                    var tr_id = $('#form-control-revid').val();
                    
                    $("#"+tr_id).html("");
                     
                    var nnode = {
                        'tr_id' : tr_id,
                        'existing_control_id' : xcid,
                        'risk_existing_control' : xexis,
                        'risk_evaluation_control' : xeval,
                        'risk_control_owner' : xowner
                    };
                    
                    me.controlAddRow(nnode);
                    
                    $('#form-control').modal('hide');
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
                        'division' : xdiv_id
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
	    	
	    	$('#button-form-data-open').on('click', function () {
                
                //$('#input-form-action-plan').reset();
                document.getElementById("input-form-action-plan").reset();
                $('#form-data-revid').val('');
            });
        	
        	$('#changes-risk-set-as-primary').on('click', function () {
        		me.submitRiskData('setAsPrimary')
        	});
        	
        	$('#changes-risk-button-save').on('click', function () {
        		me.submitRiskData('save')
        	});
        	
        	$('#changes-risk-button-submit').on('click', function () {
        		me.submitRiskData('verifyChanges')
        	});
        	
        	
        	$('#changes-risk-button-cancel').on('click', function () {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Risk Treatment ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main/mainrac';
        		});
        	});

            $('#primary-risk-button-submit2').on('click', function () {
                me.submitRiskData2('verify')
            });
        	
        	$('#primary-risk-button-submit').on('click', function () {
        		me.submitRiskData('verify')
        	});

            $('#changes-risk-button-save-primary').on('click', function () {
                me.submitRiskData('save-primary')
            });
        	
        	
        	
        	/*
        	$('#div-portlet-page-caption').html('Verify Risk Information');
        	
        	$('#risk-button-verify').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Verify this risk ?');
        		mod.find('button.btn-primary').one('click', function(){
        			me.submitRiskData('verify');
        		});
        		
        	});
        	
        	$('#risk-button-draft').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Save this risk ?');
        		mod.find('button.btn-primary').one('click', function(){
        			me.submitRiskData('save');
        		});
        	});
        	
        	$('#risk-button-delete').on('click', function() {
        		var mod = MainApp.viewGlobalModal('warning', 'Are You sure you want to delete this Risk ?');
        		mod.find('button.btn-danger').one('click', function(){
        			mod.modal('hide');
        			
        			Metronic.blockUI({ boxed: true });
        			var url = site_url+'/main/mainrac/deleteRisk';
        			$.post(
        				url,
        				{ 'risk_id':  g_risk_id},
        				function( data ) {
        					Metronic.unblockUI();
        					if(data.success) {
        						var mod2 = MainApp.viewGlobalModal('success', 'Success Delete Data');
        						mod2.find('button.btn-ok-success').one('click', function(){
        							location.href=site_url+'/main/mainrac/riskRegister/'+g_username;
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
        		});
        	});
        	
        	$('#risk-button-cancel').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Risk Verification ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main/mainrac/riskRegister/'+g_username;
        		});
        	});
        	*/

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
                    var xeval = $('#input-form-control-3 textarea[name=risk_evaluation_control]').val();
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

        loadRisk: function(rid,risk_input_by) {
        	var me = this;
        	
        	Metronic.blockUI({ boxed: true });
        	$.getJSON( site_url+'/main/mainrac/loadTreatmentChange2/'+rid+'/'+risk_input_by, function( data_risk ) {
        		Metronic.unblockUI();
        		g_username = data_risk['risk_input_by'];
        		data_risk['risk_library_id'] = data_risk['risk_library_id'];
        		data_risk['risk_level_id'] = data_risk['risk_level'];
        		data_risk['risk_level'] = data_risk['risk_level_v'];
        		
        		data_risk['risk_impact_level_id'] = data_risk['risk_impact_level'];
        		data_risk['risk_impact_level_value'] = data_risk['impact_level_v'];
        		data_risk['risk_likelihood_id'] = data_risk['risk_likelihood_key'];
        		data_risk['risk_likelihood_value'] = data_risk['likelihood_v'];
        		
        		me.populateRisk($('#input-form'), data_risk);
        		$('#risk_submitted_by').val(data_risk.risk_input_by_v);
        		$('#risk_submitted_division').val(data_risk.risk_input_division_v);
        		
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
        			if (val.existing_control_id == null) ecid = '';
        			var nnode = {
        				'existing_control_id' : ecid,
        				'risk_existing_control' : val.risk_existing_control,
        				'risk_evaluation_control' : val.risk_evaluation_control,
        				'risk_control_owner' : val.risk_control_owner
        			};
        			
        			me.controlAddRow(nnode);
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
        controlReset: function() {
        	this.dataControl = {};
        	this.dataControlCounter = 0;
        	$("#control_table > tbody").html("");
        },
        controlAdd: function(data, dcounter) {
        	this.dataControl[dcounter] = data;
        },
        controlDelete: function(id) {
        	delete this.dataControl[id];
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
                    '<button type="button" class="btn btn-default btn-xs" onclick = "modal_control_edit('+me.dataControlCounter+')" ><i class="fa fa-pencil font-blue"></i></button>'+
                    '<button type="button" class="btn btn-default btn-xs" onclick="RiskVerify.controlTableDelete(this, '+me.dataControlCounter+')"><i class="fa fa-trash-o font-red"></i></button>'+
                '</div>'+
                '</td>'+
            '</tr>');
            this.controlDelete(nnode.tr_id); 
            me.controlAdd(nnode, me.dataControlCounter);
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
                    '<button type="button" class="btn btn-default btn-xs" onclick="modal_ap_edit('+me.dataActionPlanCounter+')" ><i class="fa fa-pencil font-blue"></i></button>'+
                    '<button type="button" class="btn btn-default btn-xs" onclick="RiskVerify.actionPlanTableDelete(this, '+me.dataActionPlanCounter+')"><i class="fa fa-trash-o font-red"></i></button>'+
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
        filterControl: function() {
        	var fval = $('#modal-control div.inputs input[name=filter_search]')[0].value;
        	gridControl.clearAjaxParams();
        	gridControl.setAjaxParam("filter_library", fval);
        	gridControl.getDataTable().ajax.reload();	
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
        submitRiskData2: function(submitMode) {
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
                
                if (submitMode == 'setAsPrimary') {
                    var url = site_url+'/main/mainrac/treatmentSetAsPrimary';
                    var text = 'Are You sure you want to Save and Set As Primary this Risk ?';
                } else if (submitMode == 'verify') {
                    var url = site_url+'/main/mainrac/treatmentVerify2';
                    var text = 'Are You sure you want to Verify with Primary Data for this Risk ?';
                } else if (submitMode == 'verifyChanges') {
                    var url = site_url+'/main/mainrac/treatmentVerifyChanges';
                    var text = 'Are You sure you want to Verify with Changes Data for this Risk ?';
                }else if (submitMode == 'save2') {
                    var url = site_url+'/main/mainrac/treatmentSaveprimary';
                    var text = 'Are You sure you want to Save this Risk ?';
                } else {
                    var url = site_url+'/main/mainrac/treatmentSave';
                    var text = 'Are You sure you want to Save this Risk ?';
                }
                
                var mod = MainApp.viewGlobalModal('confirm', text);
                mod.find('button.btn-primary').off('click');
                mod.find('button.btn-primary').one('click', function(){
                    mod.modal('hide');
                    Metronic.blockUI({ boxed: true });
                    $.post(
                        url,
                        $( "#input-form" ).serialize()+ '&' + $.param(impact_param)+ '&' + $.param(actplan_param)+ '&' + $.param(control_param),
                        function( data ) {
                            Metronic.unblockUI();
                            if(data.success) {
                                var mod = MainApp.viewGlobalModal('success', 'Success Updating your Risk');
                                mod.find('button.btn-ok-success').one('click', function(){
                                    //location.href=site_url+'/risk/RiskRegister/modifyRisk/'+g_risk_id;
                                    if (submitMode == 'setAsPrimary') {
                                        location.href=site_url+'/main/mainrac/riskTreatmentForm/'+g_risk_id;
                                    } else if (submitMode == 'verify' || submitMode == 'verifyChanges') {
                                        location.href=site_url+'/main/mainrac';
                                    }else if (submitMode == 'save2') {
                                        location.href=site_url+'/main/mainrac';
                                    } else {
                                        location.href=site_url+'/main/mainrac/riskTreatmentForm/'+g_risk_id;
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
                });
            }
        },
        submitRiskData: function(submitMode) {
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
            	
            	if (submitMode == 'setAsPrimary') {
            		var url = site_url+'/main/mainrac/treatmentSetAsPrimary';
            		var text = 'Are You sure you want to Save and Set As Primary this Risk ?';
            	} else if (submitMode == 'verify') {
            		var url = site_url+'/main/mainrac/treatmentVerify2';
            		var text = 'Are You sure you want to Verify with Primary Data for this Risk ?';
            	} else if (submitMode == 'verifyChanges') {
            		var url = site_url+'/main/mainrac/treatmentVerifyChanges';
            		var text = 'Are You sure you want to Verify with Changes Data for this Risk ?';
            	}else if (submitMode == 'save-primary') {
                    var url = site_url+'/main/mainrac/treatmentSaveprimary';
                    var text = 'Are You sure you want to Save this Risk ?';
                } else {
            		var url = site_url+'/main/mainrac/treatmentSave/'+risk_input_by;
            		var text = 'Are You sure you want to Save this Risk ?';
            	}
            	
            	var mod = MainApp.viewGlobalModal('confirm', text);
            	mod.find('button.btn-primary').off('click');
            	mod.find('button.btn-primary').one('click', function(){
            		mod.modal('hide');
            		Metronic.blockUI({ boxed: true });
            		$.post(
            			url,
            			$( "#input-form" ).serialize()+ '&' + $.param(impact_param)+ '&' + $.param(actplan_param)+ '&' + $.param(control_param),
            			function( data ) {
            				Metronic.unblockUI();
            				if(data.success) {
            					var mod = MainApp.viewGlobalModal('success', 'Success Updating your Risk');
            					mod.find('button.btn-ok-success').one('click', function(){
            						//location.href=site_url+'/risk/RiskRegister/modifyRisk/'+g_risk_id;
            						if (submitMode == 'setAsPrimary') {
            							location.href=site_url+'/main/mainrac/riskTreatmentForm/'+g_risk_id+'/'+risk_input_by;
            						} else if (submitMode == 'verify' || submitMode == 'verifyChanges') {
            							location.href=site_url+'/main/mainrac';
            						}else if (submitMode == 'save-primary') {
                                        location.href=site_url+'/main/mainrac/riskTreatmentForm/'+g_risk_id+'/'+risk_input_by;
                                    } else {
            							location.href=site_url+'/main/mainrac/riskTreatmentForm/'+g_risk_id+'/'+risk_input_by;
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