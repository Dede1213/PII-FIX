var ActionVerify = function() {
	return {
		init: function() {
        	var me = this;
        	
        	if (jQuery().datepicker) {
        	    $('.date-picker').datepicker({
        	        rtl: Metronic.isRTL(),
        	        orientation: "left",
        	        autoclose: true
        	    });
        	    //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        	};
        	
        	$('#changes-risk-set-as-primary').on('click', function () {
        		me.submitRiskData('setAsPrimary')
        	});
        	
        	$('#changes-risk-button-save').on('click', function () {
        		me.submitRiskData('save')
        	});
        	
        	$('#changes-risk-button-cancel').on('click', function () {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Risk Treatment ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main/mainrac#tab_action_plan_list';
        		});
        	});
        	
        	$('#primary-risk-button-submit').on('click', function () {
        		me.submitRiskData('verify')
        	});
        	
        },
        submitRiskData: function(submitMode) {
        	var form1 = $('#input-form').validate();
        	var fvalid = form1.form();
        	if (fvalid) {
            	var me = this;
            	var param = $('#input-form').serializeArray();
            	
            	if (submitMode == 'setAsPrimary') {
            		var url = site_url+'/main/mainrac/actionSetAsPrimary';
            		var text = 'Are You sure you want to Save and Set As Primary this Action Plan ?';
            	} else if (submitMode == 'verify') {
            		var url = site_url+'/main/mainrac/actionVerify';
            		var text = 'Are You sure you want to Verify this Action Plan ?';
            	} else {
            		var url = site_url+'/main/mainrac/actionSave';
            		var text = 'Are You sure you want to Save this Action Plan ?';
            	}
            	
            	var mod = MainApp.viewGlobalModal('confirm', text);
            	mod.find('button.btn-primary').off('click');
            	mod.find('button.btn-primary').one('click', function(){
            		mod.modal('hide');
            		var g_risk_id = $('#action-plan-id').val();
            		Metronic.blockUI({ boxed: true });
            		$.post(
            			url,
            			$( "#input-form" ).serialize(),
            			function( data ) {
            				Metronic.unblockUI();
            				if(data.success) {
            					var mod = MainApp.viewGlobalModal('success', 'Success Updating your Action Plan');
            					mod.find('button.btn-ok-success').one('click', function(){
            						if (submitMode == 'setAsPrimary') {
            							location.href=site_url+'/main/mainrac/actionPlanForm/'+g_risk_id;
            						} else if (submitMode == 'verify') {
            							location.href=site_url+'/main/mainrac#tab_action_plan_list';
            						} else {
            							location.href=site_url+'/main/mainrac/actionPlanForm/'+g_risk_id;
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