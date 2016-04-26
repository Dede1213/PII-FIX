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
            "url": site_url+"/user/userGetData" // ajax source
        },
        "columns": [
           { "data": "GenRowNum", "orderable": false },
           { "data": "username" },
           { "data": "display_name" }, 		   
           { "data": "role_name" },
		    { "data": "role_status" },
		   { "data": "email" },
           { "data": "division_name" },
           { 
           	"data": null,
           	"orderable": false,
           	"defaultContent": '<div class="btn-group">'+

           			'<button type="button" class="btn btn-default btn-xs button-grid-edit"><i class="fa fa-pencil font-blue"></i></button>'+
           			'<button type="button" class="btn btn-default btn-xs button-grid-confirm"><i class="fa fa-thumbs-up font-green"></i></button>'+
           			'<button type="button" class="btn btn-default btn-xs button-grid-delete"><i class="fa fa-trash-o font-red"></i></button>'+
           		'</div>'
           }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var User = function() {
	return {
			dataMode: null,
	        //main function to initiate the module
	        init: function() {
	        	var me = this;
	        	
	        	 $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner = 
	              '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
	                '<div class="progress progress-striped active">' +
	                  '<div class="progress-bar" style="width: 100%;"></div>' +
	                '</div>' +
	              '</div>';
	
	            $.fn.modalmanager.defaults.resize = true;
	            
	            $('#input-form-submit-button').click(function(e) {
	                e.preventDefault();
	                var l = Ladda.create(this);
	                l.start();
	                
                	var url = site_url+'/user/userEditRac';
                	var tx = 'Update';

	                $.post(
	                	url,
	                	$( "#input-form" ).serialize(),
	                	function( data ) {
	                		l.stop();
	            			if(data.success) {
	            				grid.getDataTable().ajax.reload();
	            				
	            				$('#form-data').modal('hide');
	            				
	            				MainApp.viewGlobalModal('success', 'Success '+tx+' Data');
	            			} else {
	            				MainApp.viewGlobalModal('error', data.msg);
	            			}
							
	                	},
	                	"json"
	                ).fail(function() {
	                	l.stop();
	                	MainApp.viewGlobalModal('error', 'Error Submitting Data');
	                 });
	            });

	            //move user
	            $('#input-form-submit-button-move').click(function(e) {
	                e.preventDefault();
	                var l = Ladda.create(this);
	                l.start();
	                
                	var url = site_url+'/user/userMove';
                	var tx = 'Update';

	                $.post(
	                	url,
	                	$( "#input-form-move" ).serialize(),
	                	function( data ) {
	                		l.stop();
	            			if(data.success) {
	            				grid.getDataTable().ajax.reload();
	            				
	            				$('#form-data-move').modal('hide');
	            				
	            				MainApp.viewGlobalModal('success', 'Success '+tx+' Data');
	            			} else {
	            				MainApp.viewGlobalModal('error', data.msg);
	            			}
							
	                	},
	                	"json"
	                ).fail(function() {
	                	l.stop();
	                	MainApp.viewGlobalModal('error', 'Error Submitting Data');
	                 });
	            });
	            
	            // datatables filter button
	            $("#filterFormSubmit").click(function(e) {
	            	var fby = $("#filterFormBy").val();
	            	var fval = $("#filterFormValue").val();
	            	
	            	me.filterDataGrid(fby, fval);
	            });
	            
	            // datatables edit delete handler
	            $("#datatable_ajax").on('click', 'button.button-grid-edit', function(e) {
	            	e.preventDefault();
	            	
	            	var r = this.parentNode.parentNode.parentNode;
	            	var data = grid.getDataTable().row(r).data();
	            	
	            	me.editData(data);
	            });

	            $("#datatable_ajax").on('click', 'button.button-grid-delete', function(e) {
    	        	e.preventDefault();
    	        	
    	        	var r = this.parentNode.parentNode.parentNode;
    	        	var data = grid.getDataTable().row(r).data();
    	        	
    	        	me.deleteRisk(data);
    	        });

    	        $("#datatable_ajax").on('click', 'button.button-grid-confirm', function(e) {
    	        	e.preventDefault();
    	        	
    	        	var r = this.parentNode.parentNode.parentNode;
    	        	var data = grid.getDataTable().row(r).data();
    	        	
    	        	me.moveRisk(data);
    	        });

	        },

	        moveRisk: function(data) {
	        	$('#input-form-move')[0].reset();
	        	$('#input-form-move').find("input[name='username_id']").val(data.username).prop("readonly", true);
	        	$('#input-form-move').find("input[name='username_old']").val(data.display_name).prop("readonly", true);
	        	$('#form-data-move').find('h4.modal-title').html('Move User');
	        	$('#form-data-move').modal('show');
	        	this.dataMode = 'edit';
	        },

	        deleteRisk: function(data) {
	        	var mod = MainApp.viewGlobalModal('warning', 'Are you sure to <b>HIDE</b> User : <b>'+data.username+'</b> ?');
	        	mod.find('button.btn-danger').off('click');
	        	mod.find('button.btn-danger').one('click', function(){
	        		mod.modal('hide');
	        		var eparam = {
	        			'username' : data.username
	        		};
	        		var url = site_url+'/user/user/deleteRiskHide';
	        		
	        		Metronic.blockUI({ boxed: true });
	        		$.post(
	        			url,
	        			$.param(eparam),
	        			function( data ) {
	        				Metronic.unblockUI();
	        				if(data.success) {
	        					grid.getDataTable().ajax.reload();
	        					grid2.getDataTable().ajax.reload();
	        					
	        					MainApp.viewGlobalModal('success', 'Success Delete Risk');
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
	        },
	        filterDataGrid: function(fby, fval) {
	        	grid.clearAjaxParams();
	        	grid.setAjaxParam("filter_by", fby);
	        	grid.setAjaxParam("filter_value", fval);
	        	grid.getDataTable().ajax.reload();
	        },
	        editData: function(data) {
	        	$('#input-form')[0].reset();
	        	$('#input-form').find("input[name='username']").val(data.username).prop("readonly", true);
	        	$('#input-form').find("input[name='display_name']").val(data.display_name).prop("readonly", false);
				$('#input-form').find("input[name='email']").val(data.email).prop("readonly", false);
	        	$('#input-form').find("select[name='role_id']").val(data.role_id);
				$('#input-form').find("select[name='role_status']").val(data.role_status);
	        	$('#input-form').find("select[name='division_id']").val(data.division_id);
	        	
	        	
	        	$('#form-data').find('h4.modal-title').html('Edit User');
	        	$('#form-data').modal('show');
	        	this.dataMode = 'edit';
	        	
	        }
	 }
}();