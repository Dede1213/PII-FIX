var ChangeRequest = function() {
	return {
		init: function() {
        	var me = this;
        	
        	$('#risk-button-submit').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Verify your Change Request ?');
        		mod.find('button.btn-primary').off('click');
        		mod.find('button.btn-primary').one('click', function(){
        			mod.modal('hide');
        			me.submitRiskData();
        		});
        	});
        	
        	$('#verify-risk-button-cancel').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your Change Request ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').off('click');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/maini#tab_change_request_list';
        		});
        	});
        },
	    submitRiskData: function() {
        	var me = this;
	        
        	Metronic.blockUI({ boxed: true });
        	var url = site_url+'/main/mainrac/changeRequestVerifyKri';

        	$.post(
        		url,
        		$( "#kri-form" ).serialize(),
        		function( data ) {
        			Metronic.unblockUI();
        			if(data.success) {
        				var mod = MainApp.viewGlobalModal('success', 'Success Submitting Change Request');
        				mod.find('button.btn-ok-success').one('click', function(){
        					location.href=site_url+'/maini#tab_change_request_list';
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
}();