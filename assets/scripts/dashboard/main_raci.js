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
            "url": site_url+"/main/mainrac/getAllRisk" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var img = '';
                if (data == '0' || data == '1') {
                    img = 'draft.png';
                } else if (data == '2') {
                    img = 'submit.png';
                } else if (data == '3' || data == '4') {
                    img = 'verified.png';
                }else if (data == '5' || data == '6') {
                    img = 'treatment.png';
                }else if (data == '10') {
                    img = 'actplan.png';
                }else if (data == '20') {
                    img = 'executed.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                if (full.risk_status >= 3) {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/riskRegisterForm/'+full.risk_id+'/'+full.risk_input_by+'">'+data+'</a>';
                } 
                
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
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridRegister = new Datatable();
gridRegister.init({
    src: $("#datatable_risk_register"),
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
            "url": site_url+"/main/mainrac/getUserList" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var img = '';
                if (data == '0' || data == '1') {
                    img = 'draft.png';
                } else if (data == '2') {
                    img = 'submit.png';
                } else  {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "display_name",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/riskRegister/'+full.username+'">'+data+'</a>';
            }
        } ],
        "columns": [
            { "data": "risk_status" },
            { "data": "display_name" },
            { "data": "division_name" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});


var gridTreatment = new Datatable();
gridTreatment.init({
    src: $("#datatable_risk_treatment"),
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
            "url": site_url+"/main/mainrac/getTreatmentList" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var img = '';
                if (data == '5') {
                    img = 'submit.png';
                }else if (data == '3') {
                    img = 'draft.png';
                } else {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "risk_id",
            "render": function ( data, type, full, meta ) {
                if (full.risk_status == 5) {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/riskTreatmentForm/'+full.risk_id+'/'+full.risk_input_by+'">'+data+'</a>';
                }
                return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        } ],
        "columns": [
            { "data": "risk_status" },
            { "data": "risk_code" },
            { "data": "risk_event" },
            { "data": "risk_owner_v" },
            { "data": "suggested_risk_treatment_v" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridActionPlan = new Datatable();
gridActionPlan.init({
    src: $("#datatable_action_plan"),
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
            "url": site_url+"/main/mainrac/getActionPlan" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var img = 'default.png';
                if (data == 1) {
                    img = 'draft.png';
                } else if (data == 2) {
                    img = 'verified_head.png';
                } else if (data == 3) {
                    img = 'submit.png';
                }else if (data > 3) {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "risk_id",
            "render": function ( data, type, full, meta ) {
                if (full.action_plan_status == 3) {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanForm/'+full.id+'">'+data+'</a>';
                }
                return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanView/'+full.id+'">'+data+'</a>';
            }
        }, {
            "targets": 5,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        } ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "division_name" },
            { "data": "risk_code" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridActionExec = new Datatable();
gridActionExec.init({
    src: $("#datatable_action_plan_exec"),
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
            "url": site_url+"/main/mainrac/getActionPlanExec" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var img = 'default.png';
                if (data == 4) {
                    img = 'draft.png';
                } else if (data == 5) {
                    img = 'verified_head.png';
                } else if (data == 6) {
                    img = 'submit.png';
                }else if (data > 6) {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanView/'+full.id+'">'+data+'</a>';
            }
        }, {
            "targets": 6,
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 5,
            "data": "execution_status",
            "render": function ( data, type, full, meta ) {
                if(data == null){
                    return '';
                }else{                   
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanExecForm/'+full.id+'">'+data+'</a>';
                }
                
            }
        } ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "division_name" },
            { "data": "execution_status" },
            { "data": "risk_code" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var gridActionExec_adt = new Datatable();
gridActionExec_adt.init({
    src: $("#datatable_action_plan_exec_adt"),
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
            "url": site_url+"/main/mainrac/getActionPlanExec_adt" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var img = 'default.png';
                if (data == 4) {
                    img = 'draft.png';
                } else if (data == 5) {
                    img = 'verified_head.png';
                } else if (data == 6) {
                    img = 'submit.png';
                }else if (data > 6) {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanView/'+full.id+'">'+data+'</a>';
            }
        }, {
            "targets": 6,
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 5,
            "data": "execution_status",
             
            "render": function ( data, type, full, meta ) {
             
                if(data == null){
                    return '';
                }else if(full.action_plan_status == 6 ){                   
                   return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanExecForm/'+full.id+'">'+data+'</a>';
                }else{                   
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/actionPlanExecForm/'+full.id+'/view">'+data+'</a>';
                }
            }
        } ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "division_name" },
            { "data": "execution_status" },
            { "data": "risk_code" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid_kri = new Datatable();
grid_kri.init({
    src: $("#datatable_kri"),
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
            "url": site_url+"/main/mainrac/getKri" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "kri_status",
            "render": function ( data, type, full, meta ) {
                var img = 'default.png';
                if (data == 0) {
                    img = 'draft.png';
                } else if (data == 1) {
                    img = 'verified_head.png';
                } else if (data == 2) {
                    img = 'submit.png';
                }else if (data > 2) {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "kri_code",
            "render": function ( data, type, full, meta ) {
                var ret = full.kri_pic_v;
                var dat = '';
                if (ret == '' || ret == null) {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/viewKri/'+full.id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainrac/viewKri/'+full.id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 5,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainrac/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 6,
            "data": "kri_warning",
            "render": function ( data, type, full, meta ) {
                if (data != '' && data != null) {
                    var img = data.toLowerCase();
                    img = base_url+'assets/images/legend/kri_'+img+'.png';
                    return '<img src="'+img+'"/>';
                } 
                return '';
            }
        } ],
        "columns": [
            { "data": "kri_status" },
            { "data": "kri_code" },
            { "data": "key_risk_indicator" },
            { "data": "treshold" },
            { "data": "timing_pelaporan_v" },
            { "data": "risk_code" },
            { "data": "kri_warning" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid_cr = new Datatable();
grid_cr.init({
    src: $("#datatable_cr"),
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
            "url": site_url+"/main/mainrac/getChangeRequest" // ajax source
        },
        "columnDefs": [ {
            "targets": 1,
            "data": "cr_code",
            "render": function ( data, type, full, meta ) {
                var cls = 'font-green-jungle';
                if (full.cr_type == 'Risk Register') {
                    var vm = 'riski/RiskRegister/ChangeRequestRac';
                    return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.created_by+'?status=change">'+data+'</a>';
                }else if (full.cr_status == '1') {
                    var vm = 'maini/mainrac/ChangeRequestView';
                } else {
                    var vm = 'maini/mainrac/ChangeRequestVerify';
                }
                return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.id+'">'+data+'</a>';
            }
         },{
            "targets": 5,
            "data": null,
            "render": function ( data, type, full, meta ) {
                
                if (full.cr_status == '1') {
                    return '<div class="btn-group">'+
                    '<button type="button" class="btn btn-default btn-xs button-grid-delete"><i class="fa fa-trash-o font-red"></i></button>'+
                '</div>';
                }else if (full.cr_status == '0') {
                    return '---';
                } else {
                    return '---';
                }
            }
         },{
            "targets": 4,
            "data": "cr_status",
            "render": function ( data, type, full, meta ) {
                if (data == '1') return 'Complete';
                if (data == '0') return 'Pending';
                return 'Undefined';
            },
         }],
         "columns": [
                { "data": "GenRowNum" },
                { "data": "cr_code" },
                { "data": "cr_type" },
                { "data": "created_by_v" },
                { "data": "cr_status" },
                { 
            "data": null,
           // "orderable": false,
           // "defaultContent": '<div class="btn-group">'+
           // '<button type="button" class="btn btn-default btn-xs button-grid-delete"><i class="fa fa-trash-o font-red"></i></button>'+
           // '</div>'
           
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
            
             $('#datatable_cr').on('click', 'button.button-grid-delete', function(e) {
                    e.preventDefault();
                    
                    var r = this.parentNode.parentNode.parentNode;
                     
                    var data = grid_cr.getDataTable().row(r).data();
 
                    me.deleteData(data);
                });

            $('#tab_risk_register_list-filterButton').on('click', function() {
                
                me.filterDataGridRegister();
            });
            
            $('#tab_treatment_list-filterButton').on('click', function() {
                me.filterDataGridTreatment();
            });
            
            $('#tab_action_plan_list-filterButton').on('click', function() {
                me.filterDataGridActionplan();
            });
            
            $('#tab_action_plan_exec-filterButton').on('click', function() {
                me.filterDataGridActionplanexec();
            });

        },
        initUserChart: function() {
                        
            $.getJSON( site_url+"/main/mainrac/getSummaryCount/risk", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_rac_to_verify", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainrac/getSummaryCount2/riskregister", function( data ) {
                var series = data;
                var tick = [ [0, "User"], [1, ""], [2, ""] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_rr_to_verify", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainrac/getSummaryCount/treatment", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_tr_to_verify", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainrac/getSummaryCount/actionplan", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_ap_to_verify", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainrac/getSummaryCount/kri", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_kri_to_verify", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainrac/getSummaryCount/change", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_cr_to_verify", data, on_options);
            });
            
        },
          
        //fake
         deleteData: function(data) {
            
                var mod = MainApp.viewGlobalModal('warning', 'Are You sure you want to delete this data?');
                mod.find('button.btn-danger').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    var url = site_url+'/main/mainrac/crDeleteData';
                    $.post(
                        url,
                        { 'id':  data.id},
                        function(data) {
                            Metronic.unblockUI();
                            if(data.success) {
                                grid_cr.getDataTable().ajax.reload();
                                
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
        filterDataGridRiskList: function() {
            var fby = $('#tab_risk_list-filterBy').val();
            var fval = $('#tab_risk_list-filterValue').val();
            
            gridRiskList.clearAjaxParams();
            gridRiskList.setAjaxParam("filter_by", fby);
            gridRiskList.setAjaxParam("filter_value", fval);
            gridRiskList.getDataTable().ajax.reload();
        },
        filterDataGridRegister: function() {
            var fby = $('#tab_risk_register_list-filterBy').val();
            var fval = $('#tab_risk_register_list-filterValue').val();
             
            gridRegister.clearAjaxParams();
            gridRegister.setAjaxParam("filter_by", fby);
            gridRegister.setAjaxParam("filter_value", fval);
            gridRegister.getDataTable().ajax.reload();
        },
        filterDataGridTreatment: function() {
            var fby = $('#tab_treatment_list-filterBy').val();
            var fval = $('#tab_treatment_list-filterValue').val();
            
            gridTreatment.clearAjaxParams();
            gridTreatment.setAjaxParam("filter_by", fby);
            gridTreatment.setAjaxParam("filter_value", fval);
            gridTreatment.getDataTable().ajax.reload();
        },
         filterDataGridActionplan: function() {
            var fby = $('#tab_action_plan_list-filterBy').val();
            var fval = $('#tab_action_plan_list-filterValue').val();
            
            gridActionPlan.clearAjaxParams();
            gridActionPlan.setAjaxParam("filter_by", fby);
            gridActionPlan.setAjaxParam("filter_value", fval);
            gridActionPlan.getDataTable().ajax.reload();
        },
         filterDataGridActionplanexec: function() {
            var fby = $('#tab_action_plan_exec-filterBy').val();
            var fval = $('#tab_action_plan_exec-filterValue').val();
            
            gridActionExec.clearAjaxParams();
            gridActionExec.setAjaxParam("filter_by", fby);
            gridActionExec.setAjaxParam("filter_value", fval);
            gridActionExec.getDataTable().ajax.reload();
        },
       
    };  
}();


var Actionplan_adt = function() {
    return {
        init: function() {
            var me = this;
            
            // TAB CONTROL FOR BREADCRUMB
            $('ul.nav-tabs a[data-toggle=tab]').on('click', function() {
                var hrefa = $(this).attr('href');
                var ulid = hrefa.replace('#', '');
                var title = $(this).html().trim();
                $('#bread_tab_title').html(title);
            });
             
             $('#datatable_cr').on('click', 'button.button-grid-delete', function(e) {
                    e.preventDefault();
                    
                    var r = this.parentNode.parentNode.parentNode;
                    //alert(r);exit;
                    var data = gridRiskList.getDataTable().row(r).data();
 
                    me.deleteData(data);
                });
 
            $('#tab_action_plan_exec-filterButton').on('click', function() {
                me.filterDataGridActionplanexec();
            });

        },
       
         deleteData: function(data) {
            
                var mod = MainApp.viewGlobalModal('warning', 'Are You sure you want to delete this data?');
                mod.find('button.btn-danger').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    var url = site_url+'/admin/qna/qnaDeleteData';
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
        
         filterDataGridActionplan: function() {
            var fby = $('#tab_action_plan_list-filterBy').val();
            var fval = $('#tab_action_plan_list-filterValue').val();
            
            gridActionPlan.clearAjaxParams();
            gridActionPlan.setAjaxParam("filter_by", fby);
            gridActionPlan.setAjaxParam("filter_value", fval);
            gridActionPlan.getDataTable().ajax.reload();
        },
         filterDataGridActionplanexec: function() {
            var fby = $('#tab_action_plan_exec-filterBy').val();
            var fval = $('#tab_action_plan_exec-filterValue').val();
            
            gridActionExec.clearAjaxParams();
            gridActionExec.setAjaxParam("filter_by", fby);
            gridActionExec.setAjaxParam("filter_value", fval);
            gridActionExec.getDataTable().ajax.reload();
        },
       
    };  
}();


$('.nav-tabs a').click(function (e) {
     e.preventDefault();
     $('#tabactive').val($($(this).attr('href')).index());
  
});

$('#risk_list_export').on('click', function() {
    
        var tabactive = $('#tabactive').val();
         
        if(tabactive == "0"){   
            $('#modal-export').modal('show');
        }
        
        if(tabactive == "1"){   
            $('#modal-export-register').modal('show');
        }
        
        if(tabactive == "2"){   
            $('#modal-export-treatment').modal('show');
        }
        
        if(tabactive == "3"){   
            $('#modal-actionplanlist').modal('show');
        }
        
        if(tabactive == "6"){   
            $('#modal-executionlist').modal('show');
        }
        
        if(tabactive == "4"){   
            $('#modal-kri').modal('show');
        }
        
        if(tabactive == "5"){   
            $('#modal-changereq').modal('show');
        }
}); 
 

$('#risk_list_excel').on('click', function() {
      
            if($('#get_check_risklist').serialize() == ""){
                alert("Please field at least one ")
            }else{
                var search = $("#tab_risk_list-filterValue").val();
                if(search !=""){
                    var searchnya = "search="+search+"&";
                }else{
                    var searchnya = "";
                } 
                window.open(site_url+'/main/mainrac/getAllRisk_excel'+'?'+searchnya+$('#get_check_risklist').serialize());
            }                    
     
});

$('#risk_list_pdf').on('click', function() {
         
            if($('#get_check_risklist').serialize() == ""){
                alert("Please field at least one ")
            }else{
                    var search = $("#tab_risk_list-filterValue").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getAllRisk_pdf'+'?'+searchnya+$('#get_check_risklist').serialize());
            }                    
     
});
 
$('#risk_register_list_excel').on('click', function() {
      
            if($('#get_check_riskregisterlist').serialize() == ""){
                alert("Please field at least one ")
            }else{
                    var search = $("#tab_risk_register_list-filterValue").val();
                    var orderby = $("#tab_risk_register_list-filterBy").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&orderby="+orderby+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getAllRiskregister_excel'+'?'+searchnya+$('#get_check_riskregisterlist').serialize());
            }                    
     
});

$('#risk_register_list_pdf').on('click', function() {
         
            if($('#get_check_riskregisterlist').serialize() == ""){
                alert("Please field at least one ")
            }else{
                    var search = $("#tab_risk_register_list-filterValue").val();
                    var orderby = $("#tab_risk_register_list-filterBy").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&orderby="+orderby+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getAllRiskregister_pdf'+'?'+searchnya+$('#get_check_riskregisterlist').serialize());
            }                    
     
});

$('#treatment_list_excel').on('click', function() {
      
            if($('#get_check_risktreatment').serialize() == ""){
                alert("Please field at least one ")
            }else{
                 var search = $("#tab_treatment_list-filterValue").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getAllRisktreatment_excel'+'?'+searchnya+$('#get_check_risktreatment').serialize());
            }                    
     
});

$('#treatment_list_pdf').on('click', function() {
         
            if($('#get_check_risktreatment').serialize() == ""){
                alert("Please field at least one ")
            }else{
                 var search = $("#tab_treatment_list-filterValue").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getAllRisktreatment_pdf'+'?'+searchnya+$('#get_check_risktreatment').serialize());
            }                    
     
});


$('#actionplan_list_excel').on('click', function() {
      
            if($('#get_check_actionplan').serialize() == ""){
                alert("Please field at least one ")
            }else{
                var search = $("#tab_action_plan_list-filterValue").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getActionplan_excel'+'?'+searchnya+$('#get_check_actionplan').serialize());
            }                    
     
});
 
$('#actionplan_list_pdf').on('click', function() {
         
            if($('#get_check_actionplan').serialize() == ""){
                alert("Please field at least one ")
            }else{
                var search = $("#tab_action_plan_list-filterValue").val();
                    if(search !=""){
                        var searchnya = "search="+search+"&";
                    }else{
                        var searchnya = "";
                    } 
                window.open(site_url+'/main/mainrac/getActionplan_pdf'+'?'+searchnya+$('#get_check_actionplan').serialize());
            }                    
     
});
 
$('#execution_list_excel').on('click', function() {
      
            if($('#get_check_execution').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getExecution_excel'+'?'+$('#get_check_execution').serialize());
            }                    
     
});


$('#execution_list_pdf').on('click', function() {
         
            if($('#get_check_execution').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getExecution_pdf'+'?'+$('#get_check_execution').serialize());
            }                    
     
});


$('#kri_list_excel').on('click', function() {
      
            if($('#get_check_kri').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getKRI_excel'+'?'+$('#get_check_kri').serialize());
            }                    
     
});


$('#kri_list_pdf').on('click', function() {
         
            if($('#get_check_kri').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getKRI_pdf'+'?'+$('#get_check_kri').serialize());
            }                    
     
});


$('#changereq_list_excel').on('click', function() {
      
            if($('#get_check_changereq').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getChangereq_excel'+'?'+$('#get_check_changereq').serialize());
            }                    
     
});


$('#changereq_list_pdf').on('click', function() {
         
            if($('#get_check_changereq').serialize() == ""){
                alert("Please field at least one ")
            }else{
                window.open(site_url+'/main/mainrac/getChangereq_pdf'+'?'+$('#get_check_changereq').serialize());
            }                    
     
});