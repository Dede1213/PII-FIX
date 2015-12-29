var KriForm = function() {
	return {
		dataMode: null,
        //main function to initiate the module
        dataActionPlan: {},
        dataActionPlanCounter: 0,
        dataTreshold: {},
        dataTresholdCounter: 0,
        init: function() {
        	var me = this;
        	
        	$('#kri-button-verify').on('click', function() {
        		me.submitRiskData();
        	});
        	
        	$('#kri-button-cancel').on('click', function() {
        		var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to cancel your KRI Verification ? You will loose your unsaved data.');
        		mod.find('button.btn-primary').one('click', function(){
        			location.href=site_url+'/main';
        		});
        	}); 
        	
        	$('#owner_report').on('change', function() {        		
        		var img = me.recalculateWarning($(this).val());
        		img = img.toLowerCase();
        		img = base_url+'assets/images/legend/kri_'+img+'.png';

        		$('#warning_img').attr('src', img);
        	});
        },
        submitRiskData: function() {
        	if ($('#owner_report').val() == '') {
        		MainApp.viewGlobalModal('error', 'Please Fill the KRI Report');
        		return false;
        	} 
        	var fvalid = true;
        	if (fvalid) {
        		var me = this;
        		
        		Metronic.blockUI({ boxed: true });
        		var url = site_url+'/risk/kri/verifyKri';
        		$.post(
        			url,
        			{
        				'id' : $('#kri-id').val(), 
        				'owner_report' : $('#owner_report').val()
        			},
        			function( data ) {
        				Metronic.unblockUI();
        				if(data.success) {
        					var mod = MainApp.viewGlobalModal('success', 'Success Updating KRI');
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
        },
        recalculateWarning: function(nval) {
        	if (t_treshold_type != '' && t_treshold_list.length > 0 ) {
        		var def = 'default';
        		if (t_treshold_type == 'SELECTION') {
        			$.each(t_treshold_list, function(k, v) {
        				if (v['value_1'] == nval) {
        					def = v['result'];
        				}
        			});
        		} else {
        			var tt = 'NUMERIC';
        			if (nval <= 100) tt = 'PERCENTAGE';
        			
        			$.each(t_treshold_list, function(k, v) {
        				if (v['value_type'] == tt && v['operator'] == 'BELOW'
        					&& nval < v['value_1'] ) {
        					def = v['result'];
        				}
        				
        				if (v['value_type'] == tt && v['operator'] == 'BETWEEN' 
        					&& (nval >= v['value_1'] && nval <= v['value_2']) ) {
        					def = v['result'];
        				}
        				
        				if (v['value_type'] == tt && v['operator'] == 'ABOVE'
        					&& nval > v['value_1'] ) {
        					def = v['result'];
        				}
        			});

        		}
        		return def;
        	} else {
        		return 'default';
        	}
        }
	 }
}();