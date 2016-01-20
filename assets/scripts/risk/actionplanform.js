var apForm = function() {
	return {
		init: function() {
        	var me = this;
        	
        	if (jQuery().datepicker) {
        	    $('.date-picker').datepicker({
        	        rtl: Metronic.isRTL(),
        	        orientation: "left",
        	        autoclose: true,
        	        todayHighlight: true
        	    });
        	    //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        	};
        	
        	$('#risk-button-save').on('click', function() {
        		me.submitRiskData('draft');
        	});
        	
        	$('#risk-button-verify').on('click', function() {
        		me.submitRiskData('submit');
        	});

            $('#risk-button-cancel').on('click', function () {
                var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel  ? You will loose your unsaved data.');
                mod.find('button.btn-primary').one('click', function(){
                    location.href=site_url+'/main/mainpic';
                });
            });
        	
        },
        submitRiskData: function(submitMode) {
        	var me = this;
        	var param = $('#input-form').serializeArray();
        	
        	if (submitMode == 'draft') {
        		var url = site_url+'/main/mainpic/actionSaveDraft';
        		var vtext = 'Are You sure you want to Save as Draft this Action Plan ?';
        	} else {
        		var url = site_url+'/main/mainpic/actionSubmit';
        		var vtext = 'Are You sure you want to Submit this Action Plan ?';
        	}
        	
        	var mod = MainApp.viewGlobalModal('confirm', vtext);
        	mod.find('button.btn-primary').off('click');
        	mod.find('button.btn-primary').one('click', function(){
        		mod.modal('hide');
        		
        		Metronic.blockUI({ boxed: true });
        		$.post(
        			url,
        			$( "#input-form" ).serialize(),
        			function( data ) {
        				var ggid = $( "#form-action-id" ).val();
        				Metronic.unblockUI();
        				if(data.success) {
        					var mod = MainApp.viewGlobalModal('success', 'Success Updating Risk');
        					mod.find('button.btn-ok-success').one('click', function(){
        						if (submitMode == 'draft') {
        							location.href=site_url+'/main/mainpic/viewOwnedActionPlan/'+ggid;
        						} else {
        							location.href=site_url+'/main/mainpic#tab_action_plan';
        						}
        					});
        				} else {
        					 
                            //ubah
                            var mod = MainApp.viewGlobalModal('warning-maintenance', 'This Risk Is Under Maintenance by RAC you cannot modify this risk until the process done');
                            mod.find('button.btn-ok-success').one('click', function(){
                                location.href=site_url+'/main/mainpic';
                            });
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
}();