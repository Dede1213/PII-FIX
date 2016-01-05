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
            "url": site_url+"/risk/kri/getRiskForKri" // ajax source
        },
        "columns": [
        	{ "data": "checkboxColumn", "orderable": false  },
        	{ "data": "GenRowNum", "orderable": false },
			{ "data": "risk_code", "orderable": false },
			{ "data": "risk_event" },
			{ "data": "risk_level_v" }
       ],
        "order": [
            [2, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid = new Datatable();
grid.init({
    src: $("#datatable_ajax"),
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
        "pageLength": 25, // default record count per page
        "ajax": {
            "url": site_url+"/risk/kri/getRiskKri" // ajax source
        },
        "columns": [
			{ "data": "risk_code", "orderable": false },
			{ "data": "risk_event" },
			{ "data": "risk_level_v" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var Kri = function() {
	return {
		dataMode: null,
        //main function to initiate the module
        init: function() {
        	var me = this;
        	
        	$('#add-risk-button').on('click', function() {
        		gridLibrary.getDataTable().ajax.reload();
        		$('#modal-library').modal('show');
        		$('input.checkbox_selectClass').prop( "checked", false );
        		$.uniform.update($('input.checkbox_selectClass'));
        	});
        	
        	//checkbox_high
        	/*
        	var table = $('#library_table');
        	$('.checkbox_selectClass').change(function() {
        		var sval = $(this).val();
        	    var set = $('tbody > tr > td:nth-child(1) input[type="checkbox"][rtype="'+sval+'"]', table);
        	    var checked = $(this).is(":checked");
        	    $(set).each(function() {
        	        $(this).prop("checked", checked);
        	    });
        	    $.uniform.update(set);
        	});
        	*/
        	
        	$('#modal-library-filter-submit').on('click', function() {
        		me.filterLibrary();
        	});
        	
        	$('#library-modal-add').on('click', function() {
        		var selRow = gridLibrary.getSelectedRows();
        		if (selRow.length > 0) {
        			var subParam = {};
        			var ct = 0;
        			$.each(selRow, function(k, v) {
        				subParam['risk_id['+ct+']'] = v;
        				ct++;
        			});
        			
        			var mod = MainApp.viewGlobalModal('confirm', 'Add Selected Risk for KRI ?');
        			mod.find('button.btn-ok-success').one('click', function(){
        				$('#modal-library').modal('hide');
        				mod.modal('hide');
        				
        				var url = site_url+'/risk/kri/kriAddRisk';
        				
        				Metronic.blockUI({ boxed: true });
        				$.post(
        					url,
        					$.param(subParam),
        					function( data ) {
        						Metronic.unblockUI();
        						if(data.success) {
        							grid.getDataTable().ajax.reload();
        							gridLibrary.getDataTable().ajax.reload();
        							
        							MainApp.viewGlobalModal('success', 'Success Update Risk for KRI');
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
        		} else {
        			MainApp.viewGlobalModal('error', 'Please Select Risk');
        		}
        	});
        },
        filterLibrary: function() {
        	var fval = $('#modal-library div.inputs select[name=filter_search]').val();
        	gridLibrary.clearAjaxParams();
        	gridLibrary.setAjaxParam("filter_library", fval);
        	gridLibrary.getDataTable().ajax.reload();	
        },
	 }
}();