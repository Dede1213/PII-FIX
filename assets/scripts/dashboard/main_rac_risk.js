var grid = new Datatable();
var grid2 = new Datatable();

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
            "url": site_url+"/main/mainrac/riskGetRollOver", // ajax source
            "data": function ( d ) {
                d.user_id = g_status_user_id;
            }
        },
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_status",
        	"render": function ( data, type, full, meta ) {
        		var img = 'default.png';
        		if (data > 1) {
        			if (data == '2') {
        				img = 'submit.png';
        			} else {
        				img = 'verified.png';
        			} 
        		} 
        		
        		return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
        	}
        }, {
        	"targets": 1,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		if (full.risk_status == 2) {
        			return '<a target="_self" href="'+site_url+'/main/mainrac/riskRegisterForm/'+full.risk_id+'">'+data+'</a>';
        		}
        		return '<a target="_self" href="'+site_url+'/main/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
        	}
        }, {
        	"targets": 7,
        	"data": "risk_status",
        	"render": function ( data, type, full, meta ) {
        		var val = 'undefined';
        		if (data > 1) {
        			if (data == '2') {
        				val = 'Submited To RAC';
        			} else {
        				val = ' Verified by RAC';
        			} 
        		} 
        		
        		return val;
        	}
        }],
        "columns": [
			{ "data": "risk_status", "orderable": false },
			{ "data": "risk_code" },
			{ "data": "risk_event" },
			{ "data": "risk_level_v" },
			{ "data": "impact_level_v" },
			{ "data": "likelihood_v" },
			{ "data": "risk_owner_v" },
			{ "data": "risk_status", "orderable": false  }
       ],
       "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       		if (aData.risk_library_id != null) {
       			$('td', nRow).css('background-color', '#e5f2ff');
       		}
        },
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

grid2.init({
    src: $("#datatable_ajax2"),
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
            "url": site_url+"/main/mainrac/riskGetDataUser", // ajax source
            "data": function ( d ) {
                d.user_id = g_status_user_id;
            }
        },    
        "columnDefs": [ {
        	"targets": 0,
        	"data": "risk_status",
        	"render": function ( data, type, full, meta ) {
        		var img = 'default.png';
        		if (data > 1) {
        			if (data == '2') {
        				img = 'submit.png';
        			} else {
        				img = 'verified.png';
        			} 
        		} 
        		
        		return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
        	}
        }, {
        	"targets": 1,
        	"data": "risk_code",
        	"render": function ( data, type, full, meta ) {
        		if (full.risk_status == 2) {
        			return '<a target="_self" href="'+site_url+'/main/mainrac/riskRegisterForm/'+full.risk_id+'">'+data+'</a>';
        		}
        		return '<a target="_self" href="'+site_url+'/main/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
        	}
        } ],    
        "columns": [
           { "data": "risk_status" },
           { "data": "risk_code" },
           { "data": "risk_event" },
           { "data": "risk_level_v" },
           { "data": "impact_level_v" },
           { "data": "likelihood_v" },
           { "data": "risk_owner_v" }
       ],
       "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       		if (aData.risk_library_id != null) {
       			$('td', nRow).css('background-color', '#e5f2ff');
       		}
        },
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var RiskList = function() {
	return {
			dataMode: null,
	        //main function to initiate the module
	        init: function() {
	        	var me = this;
	        	
	        },
	        filterDataGrid: function(fby, fval) {
	        	grid.clearAjaxParams();
	        	grid.setAjaxParam("filter_by", fby);
	        	grid.setAjaxParam("filter_value", fval);
	        	grid.getDataTable().ajax.reload();
	        }
	 }
}();