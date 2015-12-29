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
        	
        	$('#exec-button-cancel').on('click', function () {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Action Plan Verification ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main/mainrac#tab_action_plan_exec';
        		});
        	});
        	
        	$('#exec-button-submit').on('click', function () {
        		me.submitRiskData('verify')
        	});
        	
        	$('#exec-select-status').change(function() {
        		if ($( this ).val() == 'EXTEND') {
        			$('#fgroup-explain').hide();
        			$('#fgroup-evidence').hide();
        			$('#fgroup-reason').show();
        			$('#fgroup-date').show();
        		} else {
        			$('#fgroup-explain').show();
        			$('#fgroup-evidence').show();
        			$('#fgroup-reason').hide();
        			$('#fgroup-date').hide();
        		}
        	});
        	
        },
        submitRiskData: function(submitMode) {
        	var form1 = $('#input-form').validate();
        	var fvalid = form1.form();
        	if (fvalid) {
            	var me = this;
            	var param = $('#input-form').serializeArray();
            	
            	var url = site_url+'/main/mainrac/actionExecVerify';
            	
            	var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Verify this Action Plan ?');
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
            						location.href=site_url+'/main/mainrac#tab_action_plan_exec';
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