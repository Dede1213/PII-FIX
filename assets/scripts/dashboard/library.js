var gridRiskList = new Datatable();
gridRiskList.init({
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
            "url": site_url+"/library/getAllRisk" // ajax source
        },
        
        "columns": [
			 
			{ "data": "risk_code" },
			{ "data": "risk_event" },
			{ "data": "risk_description" },
			{ "data": "cat_name" }, 
			{ 
            "data": null,
            "orderable": false,
            "defaultContent": '<div class="btn-group">'+
                    '<button type="button" class="btn blue btn-xs button-grid-edit" > <i class="fa fa-pencil"></i></button>'+
					 
					'<button type="button" class="btn btn-default btn-xs button-grid-delete"><i class="fa fa-trash-o font-red"></i></button>'+
                '</div>'
               
           }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridRiskList_ap = new Datatable();
gridRiskList_ap.init({
    src: $("#datatableap_ajax"),
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
            "url": site_url+"/library/getAllRisk_ap" // ajax source
        },
		"columnDefs": [  {
        	"targets": 0,
        	"data": "id",
        	"render": function ( data, type, full, meta ) {
        		return 'AP.'+data+'';
        	}
        } ],
        
        "columns": [
			{ "data": "id" },
			{ "data": "action_plan" },
			{ "data": "due_date" },
			{ "data": "division" }, 
			{ 
            "data": null,
            "orderable": false,
            "defaultContent": '<div class="btn-group">'+
                    '<button type="button" class="btn blue btn-xs button-grid-edit" > <i class="fa fa-pencil"></i></button>'+
					 
					'<button type="button" class="btn btn-default btn-xs button-grid-delete"><i class="fa fa-trash-o font-red"></i></button>'+
                '</div>'
               
           }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});
 
      
var Dashboard = function() {
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
                }
        	
        	// TAB CONTROL FOR BREADCRUMB
        	$('ul.nav-tabs a[data-toggle=tab]').on('click', function() {
        		var hrefa = $(this).attr('href');
        		var ulid = hrefa.replace('#', '');
        		var title = $(this).html().trim();
        		$('#bread_tab_title').html(title);
        	});
        	
        	$('#tab_risk_list-filterButton').on('click', function() {
        		me.filterDataGridRiskList();
        	});
			 
             $('#datatable_ajax').on('click', 'button.button-grid-delete', function(e) {
			  
                    e.preventDefault();                    
                    var r = this.parentNode.parentNode.parentNode; 
                    var data = gridRiskList.getDataTable().row(r).data(); 
                    me.deleteData(data);
					
            });
			
			$('#datatableap_ajax').on('click', 'button.button-grid-delete', function(e) {
			  
                    e.preventDefault();                    
                    var r = this.parentNode.parentNode.parentNode; 
                    var data = gridRiskList_ap.getDataTable().row(r).data(); 
                    me.deleteData_ap(data);
					
            });
				
			$('#datatable_ajax').on('click', 'button.button-grid-edit', function(e) {
		   
		   
				e.preventDefault();
	            	
					var r = this.parentNode.parentNode.parentNode; 
                    var data = gridRiskList.getDataTable().row(r).data(); 
                    me.showriskform_ap(data);
				
			});
			
			$('#datatableap_ajax').on('click', 'button.button-grid-edit', function(e) {
		   
		   
				e.preventDefault();
	            	
					var r = this.parentNode.parentNode.parentNode; 
                    var data = gridRiskList_ap.getDataTable().row(r).data(); 
                    me.showriskform_ap(data);
				
			});
			
			$('#button-add').on('click' , function(e) {
		    
					e.preventDefault();
					
					 
                    me.showriskform_ap_add();

				
			});
			
			$('#library-modal-listrisk-update').click(function(e) {
	            	  
	            		e.preventDefault();
	            		var l = Ladda.create(this);
	            		l.start();
	            		
	            		 
	            			var url = site_url+'/library/listrisk_update';
	            			var tx = 'Insert';
	            		 
	            		$.post(
	            			url,
	            			$( "#modal-listrisk-form" ).serialize(),
	            			function( data ) {
	            				l.stop();
	            				if(data.success) {
	            					gridRiskList.getDataTable().ajax.reload();
	            					
	            					$('#modal_listrisk').modal('hide');
	            					
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
				
				$('#library-modal-listriskap-update').click(function(e) {
	            	  
	            		e.preventDefault();
	            		var l = Ladda.create(this);
	            		l.start();
	            		
	            		 
	            			var url = site_url+'/library/listriskap_update';
	            			var tx = 'Insert';
	            		 
	            		$.post(
	            			url,
	            			$( "#modal-listrisk-form" ).serialize(),
	            			function( data ) {
	            				l.stop();
	            				if(data.success) {
	            					gridRiskList_ap.getDataTable().ajax.reload();
	            					
	            					$('#modal_listrisk').modal('hide');
	            					
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
 
 
 

        },
		
		
		 
		
		 deleteData_ap: function(data) {
            
                var mod = MainApp.viewGlobalModal('warning', 'Are You sure you want to delete this data?');
                mod.find('button.btn-danger').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    var url = site_url+'/library/libraryriskDeleteData_ap';
                    $.post(
                        url,
                        { 'id':  data.DT_RowId},
                        function(data) {
                            Metronic.unblockUI();
                            if(data.success) {
                                gridRiskList_ap.getDataTable().ajax.reload();
                                
                                MainApp.viewGlobalModal('success', 'Success Delete Data');
                            } else {
                                MainApp.viewGlobalModal('error123', data.msg);
                            }
                            
                        },
                        "json"
                    ).fail(function() {
                        Metronic.unblockUI();
                        MainApp.viewGlobalModal('error', 'Error Submitting Data');
                     });
                });
        },
         
        deleteData: function(data) {
            
                var mod = MainApp.viewGlobalModal('warning', 'Are You sure you want to delete this data?');
                mod.find('button.btn-danger').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    var url = site_url+'/library/libraryriskDeleteData';
                    $.post(
                        url,
                        { 'id':  data.DT_RowId},
                        function(data) {
                            Metronic.unblockUI();
                            if(data.success) {
                                gridRiskList.getDataTable().ajax.reload();
                                
                                MainApp.viewGlobalModal('success', 'Success Delete Data');
                            } else {
                                MainApp.viewGlobalModal('error123', data.msg);
                            }
                            
                        },
                        "json"
                    ).fail(function() {
                        Metronic.unblockUI();
                        MainApp.viewGlobalModal('error', 'Error Submitting Data');
                     });
                });
        },
		showriskform: function(data) {
				var htmlopt = "";
				 
				
				
				 var url = site_url+'/library/getRiskCategory';
                    $.post(
                        url,
                        { 'id':  data.cat_name},
                        function(datax) {
						 	
							for (var i = '0'; i < datax.length; i++) {
								var datanya = datax[i];
								 
								var key = datanya.ref_value;
								var res = key.split(" - Category "); 
								 
								if(data.cat_name == res[1]){
								var select = "selected = selected";
							 
								}else{
								var select = "";
								 
								}
								htmlopt += "<option value = '"+datanya.ref_key+"' "+select+">"+datanya.ref_value+"</option>";
								 
							}	
							$("#cat_name").html(htmlopt);
			
                        },
                        "json"
                    ).fail(function() {                         
                        MainApp.viewGlobalModal('error', 'Error Submitting Data');
                     });
	         
	        	$('#modal-listrisk-form').find('input[name=risk_id]').attr('readonly', true).val(data.risk_code);
	        	$('#modal-listrisk-form').find('textarea[name=risk_event]').attr('readonly', false).val(data.risk_event);
				$('#modal-listrisk-form').find('textarea[name=risk_description]').attr('readonly', false).val(data.risk_description);
				 
				  
				$('#modal_listrisk').modal('show');
	        	this.dataMode = 'view';
	        },
			
			showriskform_ap: function(data) {
				var htmlopt = "";
				
				 var url = site_url+'/library/getDivision';
                    $.post(
                        url,
                        { 'id':  data.division},
                        function(datax) {
						 	
							for (var i = '0'; i < datax.length; i++) {
								var datanya = datax[i];
								  
								if(data.division == datanya.division_id){
								var select = "selected = selected";
							 
								}else{
								var select = "";
								 
								}
								htmlopt += "<option value = '"+datanya.division_id+"' "+select+">"+datanya.division_id+"</option>";
								 
							}	
							$("#division").html(htmlopt);
			
                        },
                        "json"
                    ).fail(function() {                         
                        MainApp.viewGlobalModal('error', 'Error Submitting Data');
                     });
				    
	        	$('#modal-listrisk-form').find('input[name=id]').attr('readonly', true).val("AP."+data.id);
	        	$('#modal-listrisk-form').find('input[name=action_plan]').attr('readonly', false).val(data.action_plan);
				$('#modal-listrisk-form').find('input[name=due_date]').attr('readonly', false).val(data.due_date);
				  
				$('#modal_listrisk').modal('show');
	        	this.dataMode = 'view';
	        },
			
			showriskform_ap_add: function(data) {
				var htmlopt = "";
				
				 var url = site_url+'/library/getDivision';
                    $.post(
                        url,
                        { 'id':  ""},
                        function(datax) {
						 	
							for (var i = '0'; i < datax.length; i++) {
								var datanya = datax[i];
								 
								htmlopt += "<option value = '"+datanya.division_id+"' >"+datanya.division_id+"</option>";
								 
							}	
							$("#division").html(htmlopt);
			
                        },
                        "json"
                    ).fail(function() {                         
                        MainApp.viewGlobalModal('error', 'Error Submitting Data');
                     });
				    
					$('#id').val('');
					$('#action_plan').val('');
					$('#due_date').val('');
					
					$('#modal_listrisk').modal('show');
					
	        	this.dataMode = 'view';
	        },
        filterDataGridRiskList: function() {
        	var fby = $('#tab_risk_list-filterBy').val();
        	var fval = $('#tab_risk_list-filterValue').val();
        	
        	gridRiskList.clearAjaxParams();
        	gridRiskList.setAjaxParam("filter_by", fby);
        	gridRiskList.setAjaxParam("filter_value", fval);
        	gridRiskList.getDataTable().ajax.reload();
        } ,
       
	};	
}();
  
 