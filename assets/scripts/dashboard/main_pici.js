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
            "url": site_url+"/main/getMyRiskRegister" // ajax source
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
                var cls = 'font-green-jungle';
                var vm = 'maini/mainpic/viewRisk';
                if (full.risk_status == '0' || full.risk_status == '1') {
                    cls = '';
                    vm = 'riski/RiskRegister/modifyRisk';
                } 
                return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 7,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 2) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/riski/RiskRegister/ChangeRequestInput/'+full.risk_id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } ],
        "columns": [
            { "data": "risk_status" },
            { "data": "risk_code" },
            { "data": "risk_event" },
            { "data": "risk_level_v" },
            { "data": "impact_level_v" },
            { "data": "likelihood_v" },
            { "data": "risk_owner_v" },
            { "data": "risk_status" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid_owned = new Datatable();
grid_owned.init({
    src: $("#datatable_grid_owned"),
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
            "url": site_url+"/maini/mainpic/getOwnedRisk" // ajax source
        },
        "columnDefs": [ {
            "targets": 0,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var img = 'default.png';
                if (data == 3) {
                    img = 'draft.png';
                } else if (data == 4) {
                    img = 'verified_head.png';
                } else if (data == 5) {
                    img = 'submit.png';
                }else if (data > 5) {
                    img = 'verified.png';
                }
                return '<center><img src="'+base_url+'assets/images/legend/'+img+'"/></center>';
            }
        }, {
            "targets": 1,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                var ret = full.risk_treatment_owner_v;
                var dat = '';
                if (ret == '' || ret == null) {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedRisk/'+full.risk_id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedRisk/'+full.risk_id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 4,
            "data": "risk_treatment_owner_v",
            "render": function ( data, type, full, meta ) {
                var ret = full.risk_treatment_owner_v;
                if (data == '' || data == null) {
                    ret = '<span>Unasigned</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.risk_id+', \'treatment\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                }else{
                    ret = '<span>'+full.risk_treatment_owner_v+'</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.risk_id+', \'treatment\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                    
                }
                return ret;
            }
        }, {
            "targets": 6,
            "data": "risk_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 5) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/riski/RiskRegister/ChangeRequestOwned/'+full.risk_id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } ],
        "columns": [
            { "data": "risk_status" },
            { "data": "risk_code" },
            { "data": "risk_event" },
            { "data": "risk_level_v" },
            { "data": "risk_treatment_owner_v" },
            { "data": "suggested_risk_treatment_v" },
            { "data": "risk_status" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid_action = new Datatable();
grid_action.init({
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
            "url": site_url+"/main/mainpic/getOwnedActionPlan" // ajax source
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
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                var ret = full.assigned_to_v;
                var dat = '';
                if (ret == '' || ret == null) {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 4,
            "data": "assigned_to_v",
            "render": function ( data, type, full, meta ) {
                var ret = data;
                if (data == '' || data == null) {
                    ret = '<span>Unasigned</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.id+', \'actionplan\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                }else{
                    ret = '<span>'+data+'</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.id+', \'actionplan\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                }
                return ret;
            }
        }, {
            "targets": 5,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedRisk/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 6,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 3) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/riski/RiskRegister/ChangeRequestAction/'+full.id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "assigned_to_v" },
            { "data": "risk_code" },
            { "data": "action_plan_status" } 
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});


var grid_exec = new Datatable();
grid_exec.init({
    src: $("#datatable_action_exec"),
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
            "url": site_url+"/main/mainpic/getOwnedActionPlanExec" // ajax source
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
                var ret = full.assigned_to_v;
                var dat = '';
                if (ret == '' || ret == null) {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 6,
            "data": "act_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainpic/viewRisk/'+full.risk_id+'">'+data+'</a>';
            }
        },{
            "targets": 5,
            "data": "execution_status",
            "render": function ( data, type, full, meta ) {
                var ext = '';
                var search = false;
                var submit = false;
                
                var search_text = '<button type="button" class="btn blue btn-xs button-grid-search"><i class="fa fa-search"></i></button>';
                var submit_text = '<button type="button" class="btn blue btn-xs button-grid-submit"><i class="fa fa-check-circle"></i> Submit</button>';
                
                data_v = '';
                if (data == 'EXTEND') data_v = 'Extend';
                if (data == 'COMPLETE') data_v = 'Complete';
                if (data == 'ONGOING') data_v = 'On Going';
                
                if (full.is_owner == 1) {
                    search = true;
                    if (data_v != '' && full.action_plan_status == 4) submit = true;
                    if (data_v != '' && full.action_plan_status == 5 && full.is_head == 1) submit = true;
                } else {
                    if (data_v != '') search = true;
                    if (data_v != '' && full.action_plan_status == 5) submit = true;
                }
                 
                
                if (!search) search_text = '';
                if (!submit) submit_text = '';
                
                var ret = data_v+' &nbsp; <div class="btn-group">'+
                        search_text+
                        submit_text+
                    '</div>'
                return ret;
                
            }
        }
        /*, {
            "targets": 6,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 3) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/risk/RiskRegister/ChangeRequestAction/'+full.id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } */
         ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "assigned_to_v" },
            { "data": "execution_status" },
            { "data": "risk_code" }
            //,{ "data": "action_plan_status" }
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
            "url": site_url+"/main/mainpic/getOwnedKri" // ajax source
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
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedKri/'+full.id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedKri/'+full.id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 5,
            "data": "kri_pic_v",
            "render": function ( data, type, full, meta ) {
                var ret = full.kri_pic_v;
                
                if (data == '' || data == null) {
                    ret = '<span>Unasigned</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.id+', \'kri\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                }else{
                    ret = '<span>'+data+'</span> &nbsp; '+
                          '<button onclick="javascript: Dashboard.viewOwnedAssignForm('+full.id+', \'kri\')" type="button" class="btn blue btn-xs button-grid-edit"><i class="fa fa-search"></i></button>';
                }
                
                
                return ret;
            }
        }, {
            "targets": 6,
            "data": "risk_code",
            "render": function ( data, type, full, meta ) {
                return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedRisk/'+full.risk_id+'">'+data+'</a>';
            }
        }, {
            "targets": 7,
            "data": "kri_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 2) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/riski/RiskRegister/ChangeRequestKri/'+full.id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } ],
        "columns": [
            { "data": "kri_status" },
            { "data": "kri_code" },
            { "data": "key_risk_indicator" },
            { "data": "treshold" },
            { "data": "timing_pelaporan_v" },
            { "data": "kri_pic_v" },
            { "data": "risk_code" },
            { "data": "kri_status" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

var grid_change = new Datatable();
grid_change.init({
    src: $("#datatable_ajax_change"),
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
            "url": site_url+"/main/getMyChangeRequest" // ajax source
        },
        "columnDefs": [ {
            "targets": 1,
            "data": "cr_code",
            "render": function ( data, type, full, meta ) {
                var cls = 'font-green-jungle';
                if (full.cr_type == 'Risk Register') {
                    var vm = 'risk/RiskRegister';
                    return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'">'+data+'</a>';
                }else if (full.cr_status == '1') {
                    var vm = 'riski/riskregister/ChangeRequestView';
                } else {
                    var vm = 'riski/riskregister/ChangeRequestView2';
                }
                return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.id+'">'+data+'</a>';
                //var vm = 'risk/riskregister/ChangeRequestView';
                //return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.id+'">'+data+'</a>';
            }
        }, {
            "targets": 4,
            "data": "cr_status",
            "render": function ( data, type, full, meta ) {
                if (data == '1') return 'Complete';
                if (data == '0') return 'Pending';
                return 'Undefined';
            }
        }],
        "columns": [
            { "data": "GenRowNum" },
            { "data": "cr_code" },
            { "data": "risk_code" },
            { "data": "risk_event" },
            { "data": "cr_status" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

$("#pic_list_table").DataTable();

var Dashboard = function() {
    return {
        tmpRiskId: null,
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
            
            // TAB CONTROL FOR BREADCRUMB
            $('ul.nav-tabs a[data-toggle=tab]').on('click', function() {
                var hrefa = $(this).attr('href');
                var ulid = hrefa.replace('#', '');
                var title = $(this).html().trim();
                $('#bread_tab_title').html(title);
            });
            
            var cnt1 = cnt2 = cnt3 = 0; 
            $.getJSON( site_url+"/risk/RiskRegister/getCategory/0", function( data ) {
                $.each( data, function( key, val ) {
                    // GET INIT SUB CATEGORY
                    if (cnt1 == 0) {
                        $.getJSON( site_url+"/risk/RiskRegister/getCategory/"+val.ref_key, function( data1 ) {
                            $.each( data1, function( key2, val2 ) {
                                if (cnt2 == 0) {
                                    // GET INIT 2ND SUB CATEGORY
                                    $.getJSON( site_url+"/risk/RiskRegister/getCategory/"+val2.ref_key, function( data2 ) {
                                        $.each( data2, function( key3, val3 ) {
                                            $('#sel_risk_2nd_sub_category').append($('<option>').text(val3.ref_value).attr('value', val3.ref_key));
                                        });
                                    });
                                }
                                
                                $('#sel_risk_sub_category').append($('<option>').text(val2.ref_value).attr('value', val2.ref_key));
                                    
                                cnt2++;
                            });
                        });
                    }
                    
                    $('#sel_risk_category').append($('<option>').text(val.ref_value).attr('value', val.ref_key));
                        
                    cnt1++;
                });
            });
            
            $('#sel_risk_category').change(function() {
                var val = $(this).val();
                me.loadCategorySelect('sel_risk_sub_category', val);
            });
            
            $('#sel_risk_sub_category').change(function() {
                var val = $(this).val();
                me.loadCategorySelect('sel_risk_2nd_sub_category', val);
            });
            
            // FILTER BUTTON
            $('#button-filter-category').on('click', function() {
                var cat = $("#sel_risk_2nd_sub_category").val();
                me.filterMyRisk('risk_2nd_sub_category', cat);
            });
            
            $('#button-filter-clear').on('click', function() {
                me.filterMyRisk('risk_2nd_sub_category', false);
            });
            
            $('#pic_list_table button.button-assign-pic').on('click', function() {
                var xx = $(this).attr("value");
                var idx = $(this).attr("value_idx");
                var mode = me.tmpRiskMode;
                
                var vv = $('#modal-pic-tr-'+idx+' > td.col_display_name').html();
                
                var text = 'Are You sure you want to Assign <b>'+vv+'</b> for this risk ?';
                if (mode == 'actionplan') {
                    var text = 'Are You sure you want to Assign <b>'+vv+'</b> for this Action Plan ?';
                }
                
                if (mode == 'kri') {
                    var text = 'Are You sure you want to Assign <b>'+vv+'</b> for this KRI ?';
                }
                
                var mod = MainApp.viewGlobalModal('confirm', text);
                mod.find('button.btn-primary').one('click', function(){
                    mod.modal('hide');
                    $('#modal-pic').modal('hide');
                    me.ownedAssignPic(me.tmpRiskId, xx, mode);
                });
            });
            
            $('#exec-select-status').change(function() {
                if ($( this ).val() == 'EXTEND') {
                    $('#fgroup-explain').hide();
                    $('#fgroup-evidence').hide();
                    $('#fgroup-reason').show();
                    $('#fgroup-date').show();
                    $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                } else if ($( this ).val() == 'COMPLETE') {
                    $('#fgroup-explain').show();
                    $('#fgroup-evidence').show();
                    $('#fgroup-reason').hide();
                    $('#fgroup-date').hide();
                    $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                    $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                }
                else  {
                    $('#fgroup-explain').show();
                    $('#fgroup-evidence').hide();
                    $('#fgroup-reason').hide();
                    $('#fgroup-date').hide();
                    $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                    $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                }
            });
            
            $("#datatable_action_exec").on('click', 'button.button-grid-search', function(e) {
                e.preventDefault();
                
                var r = this.parentNode.parentNode.parentNode;
                var data = grid_exec.getDataTable().row(r).data();
                me.viewExecutionForm(data);
            });
            
            $("#datatable_action_exec").on('click', 'button.button-grid-submit', function(e) {
                e.preventDefault();
                
                var r = this.parentNode.parentNode.parentNode;
                var data = grid_exec.getDataTable().row(r).data();
                
                var url = site_url+'/main/mainpic/execSubmit';
                
                var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Submit this Action Plan Execution?');
                mod.find('button.btn-primary').off('click');
                mod.find('button.btn-primary').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    $.post(
                        url,
                        {action_id: data.id},
                        function( data ) {
                            Metronic.unblockUI();
                            if(data.success) {
                                grid_exec.getDataTable().ajax.reload();
                                
                                MainApp.viewGlobalModal('success', 'Success Updating Action Plan Execution');
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
            });
            
            $('#exec-button-save').on('click', function() {
                var me = this;
                var url = site_url+'/main/mainpic/execSaveDraft';
                var valid = false;
                
                if ($('#exec-select-status').val() == 'COMPLETE') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_explain]').val() != ''
                        //&& $( "#exec-form" ).find('textarea[name=execution_evidence]').val() != ''
                    ) valid = true
                }
                
                if ($('#exec-select-status').val() == 'EXTEND') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_reason]').val() != ''
                        && $( "#exec-form" ).find('input[name=revised_date]').val() != ''
                    ) valid = true
                }
                
                if ($('#exec-select-status').val() == 'ONGOING') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_explain]').val() != ''
                         
                    ) valid = true
                }
                
                if (valid) {
                    var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to save this Action Plan Execution ?');
                    mod.find('button.btn-primary').off('click');
                    mod.find('button.btn-primary').one('click', function(){
                        mod.modal('hide');
                        $('#modal-exec').modal('hide');
                        
                        Metronic.blockUI({ boxed: true });
                        $.post(
                            url,
                            $( "#exec-form" ).serialize(),
                            function( data ) {
                                Metronic.unblockUI();
                                if(data.success) {
                                    grid_exec.getDataTable().ajax.reload();
                                    
                                    MainApp.viewGlobalModal('success', 'Success Updating Action Plan Execution');
                                } else {
                                     
                            //ubah
                            var mod = MainApp.viewGlobalModal('warning-maintenance', 'This Risk Is Under Maintenance by RAC you cannot modify this risk until the process done');
                            mod.find('button.btn-ok-success').one('click', function(){
                                location.href=site_url+'/maini/mainpic';
                            });
                                }
                            },
                            "json"
                        ).fail(function() {
                            Metronic.unblockUI();
                            MainApp.viewGlobalModal('error', 'Error Submitting Data');
                         });
                    });
                } else {
                    MainApp.viewGlobalModal('error', 'Please Fill All Action Plan Execution data');
                }
            });
            
            $("<div id='tooltip'></div>").css({
                position: "absolute",
                display: "none",
                border: "1px solid #fdd",
                padding: "2px",
                "background-color": "#fee",
                opacity: 0.80
            }).appendTo("body");
        },
        initUserChart: function() {
            $.getJSON( site_url+"/main/mainpic/getSummaryCount/myrisk", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_user", data, on_options);
                /*
                $("#chart_user").bind("plothover", function (event, pos, item) {
                    if (item) {
                        var x = item.datapoint[0].toFixed(0)
    
                        $("#tooltip").html(x)
                            .css({top: item.pageY+5, left: item.pageX+5})
                            .fadeIn(200);
                    } else {
                        $("#tooltip").hide();
                    }
                });
                */
            });
            
            $.getJSON( site_url+"/main/mainpic/getSummaryCount/myriskowned", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_owned", data, on_options);
                
            });
            
            $.getJSON( site_url+"/main/mainpic/getSummaryCount/myactionplan", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_action_plan", data, on_options);
            });
            
            $.getJSON( site_url+"/main/mainpic/getSummaryCount/kri", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_kri", data, on_options);
            });
            
        },
        loadCategorySelect: function(sel_id, parent) {
            $('#'+sel_id)[0].options.length = 0;
            $.getJSON( site_url+"/risk/RiskRegister/getCategory/"+parent, function( data ) {
                $.each( data, function( key, val ) {
                    $('#'+sel_id).append($('<option>').text(val.ref_value).attr('value', val.ref_key));
                });
                $('#'+sel_id).trigger('change');
            });
        },
        filterMyRisk: function(fby, fval) {
            grid.clearAjaxParams();
            if (fval) {
                grid.setAjaxParam("risk_cat", fval);
            }
            grid.getDataTable().ajax.reload();
        },
        viewOwnedAssignForm: function(risk_id, mode) {
            var me = this;
            me.tmpRiskId = risk_id;
            me.tmpRiskMode = mode;
            
            $('#modal-pic').modal('show');
        },
        ownedAssignPic: function(risk_id, pic, mode) {
            Metronic.blockUI({ boxed: true });
            var url = site_url+'/main/mainpic/assignPic';
            $.post(
                url,
                { 'risk_id':  risk_id, 'pic':  pic, 'mode': mode },
                function( data ) {
                    Metronic.unblockUI();
                    if(data.success) {
                        if (mode == 'treatment') {
                            grid_owned.getDataTable().ajax.reload();
                        } else if (mode == 'kri') {
                            grid_kri.getDataTable().ajax.reload();
                        } else {
                            grid_action.getDataTable().ajax.reload();
                        }
                        MainApp.viewGlobalModal('success', 'Success Assign PIC');
                    } else {
                        MainApp.viewGlobalModal('error', data.msg);
                    }
                    
                },
                "json"
            ).fail(function() {
                Metronic.unblockUI();
                MainApp.viewGlobalModal('error', 'Error Submitting Data');
             });
            
        },
        viewExecutionForm: function(data) {
            var me = this;
            var act_id = data.id;
            
            $('#exec-form')[0].reset();
            
            $('#form-action-id').val(act_id);
            
            $('#fgroup-explain').hide();
            $('#fgroup-evidence').hide();
            $('#fgroup-reason').hide();
            $('#fgroup-date').hide();
            
            $( '#exec-select-status' ).prop('disabled', true);
            $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', true);
            $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', true);
            $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', true);
            
            $('#exec-button-save').hide();
            
            if (data.execution_status == 'COMPLETE') {
                $( '#exec-select-status' ).val(data.execution_status);
                $( "#exec-form" ).find('textarea[name=execution_explain]').val(data.execution_explain);
                $( "#exec-form" ).find('textarea[name=execution_evidence]').val(data.execution_evidence);
                
                $('#fgroup-explain').show();
                $('#fgroup-evidence').show();
                if (data.is_owner == 1) {
                    if (data.action_plan_status == 4) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                    if (data.is_head == '1' && data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                } else {
                    if (data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                }
            } else if (data.execution_status == 'EXTEND') {
                $( '#exec-select-status' ).val(data.execution_status);
                $( "#exec-form" ).find('textarea[name=execution_reason]').val(data.execution_reason);
                $( "#exec-form" ).find('input[name=revised_date]').val(data.revised_date_v);
                
                $('#fgroup-reason').show();
                $('#fgroup-date').show();
                
                if (data.is_owner == 1) {
                    if (data.action_plan_status == 4) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                    if (data.is_head == '1' && data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                } else {
                    if (data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                }
            } else {
                $( '#exec-select-status' ).val('COMPLETE');
                $('#fgroup-explain').show();
                $('#fgroup-evidence').show();
                $( '#exec-select-status' ).prop('disabled', false);
                $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                $('#exec-button-save').show();
            }
            
            //
            //if (data.is_owner == 1 && (data.action_plan_status == 4 || data.action_plan_status == 5)) {
            //  $('#exec-button-save').show();
            //}
            
            $('#modal-exec').modal('show');
            
        }
    };  
}();


var grid_exec_adt = new Datatable();
grid_exec_adt.init({
    src: $("#datatable_action_exec_adt"),
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
            "url": site_url+"/main/mainpic/getOwnedActionPlanExec_adt" // ajax source
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
                var ret = full.assigned_to_v;
                var dat = '';
                if (ret == '' || ret == null) {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                } else {
                    return '<a target="_self" href="'+site_url+'/maini/mainpic/viewOwnedActionPlan/'+full.id+'">'+data+'</a>';
                }
                return dat;
            }
        }, {
            "targets": 5,
            "data": "execution_status",
            "render": function ( data, type, full, meta ) {
                var ext = '';
                var search = false;
                var submit = false;
                
                var search_text = '<button type="button" class="btn blue btn-xs button-grid-search"><i class="fa fa-search"></i></button>';
                var submit_text = '<button type="button" class="btn blue btn-xs button-grid-submit"><i class="fa fa-check-circle"></i> Submit</button>';
                
                data_v = '';
                if (data == 'EXTEND') data_v = 'Extend';
                if (data == 'COMPLETE') data_v = 'Complete';
                if (data == 'ONGOING') data_v = 'On Going';
                
                if (full.is_owner == 1) {
                    search = true;
                    if (data_v != '' && full.action_plan_status == 4) submit = true;
                    if (data_v != '' && full.action_plan_status == 5 && full.is_head == 1) submit = true;
                } else {
                    if (data_v != '') search = true;
                    if (data_v != '' && full.action_plan_status == 5) submit = true;
                }
                 
                
                if (!search) search_text = '';
                if (!submit) submit_text = '';
                
                var ret = data_v+' &nbsp; <div class="btn-group">'+
                        search_text+
                        submit_text+
                    '</div>'
                return ret;
                
            }
        }
        /*, {
            "targets": 6,
            "data": "action_plan_status",
            "render": function ( data, type, full, meta ) {
                var tt = '';
                if (data >= 3) {
                    tt = '<div class="btn-group">'+
                            '<button type="button" class="btn blue btn-xs button-grid-edit" onclick="location.href=\''+site_url+'/risk/RiskRegister/ChangeRequestAction/'+full.id+'\'"><i class="fa fa-pencil"></i></button>'+
                        '</div>';
                }
                return tt;
            }
        } */
         ],
        "columns": [
            { "data": "action_plan_status" },
            { "data": "act_code" },
            { "data": "action_plan" },
            { "data": "due_date_v" },
            { "data": "assigned_to_v" },
            { "data": "execution_status" }
            //,{ "data": "action_plan_status" }
       ],
        "order": [
            [1, "asc"]
        ]// set first column as a default sort by asc
    }
});

//---------------------------------fake-------------

var Actionplan_adt = function() {
    return {
        tmpRiskId: null,
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
             
            $('#exec-select-status').change(function() {
                if ($( this ).val() == 'EXTEND') {
                    $('#fgroup-explain').hide();
                    $('#fgroup-evidence').hide();
                    $('#fgroup-reason').show();
                    $('#fgroup-date').show();
                    $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                } else if ($( this ).val() == 'COMPLETE') {
                    $('#fgroup-explain').show();
                    $('#fgroup-evidence').show();
                    $('#fgroup-reason').hide();
                    $('#fgroup-date').hide();
                    $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                    $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                }
                else  {
                    $('#fgroup-explain').show();
                    $('#fgroup-evidence').hide();
                    $('#fgroup-reason').hide();
                    $('#fgroup-date').hide();
                    $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                    $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                }
            });
            
            $("#datatable_action_exec_adt").on('click', 'button.button-grid-search', function(e) {
                e.preventDefault();
                 
                var r = this.parentNode.parentNode.parentNode;
                var data = grid_exec_adt.getDataTable().row(r).data();
                me.viewExecutionForm_adt(data);
            });
            
            $("#datatable_action_exec_adt").on('click', 'button.button-grid-submit', function(e) {
                e.preventDefault();
                
                var r = this.parentNode.parentNode.parentNode;
                var data = grid_exec_adt.getDataTable().row(r).data();
                
                var url = site_url+'/main/mainpic/execSubmit';
                
                var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to Submit this Action Plan Execution ?');
                mod.find('button.btn-primary').off('click');
                mod.find('button.btn-primary').one('click', function(){
                    mod.modal('hide');
                    
                    Metronic.blockUI({ boxed: true });
                    $.post(
                        url,
                        {action_id: data.id},
                        function( data ) {
                            Metronic.unblockUI();
                            if(data.success) {
                                grid_exec_adt.getDataTable().ajax.reload();
                                
                                MainApp.viewGlobalModal('success', 'Success Updating Action Plan Execution');
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
            });
            
            $('#exec-button-save').on('click', function() {
                var me = this;
                var url = site_url+'/main/mainpic/execSaveDraft';
                var valid = false;
                
                if ($('#exec-select-status').val() == 'COMPLETE') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_explain]').val() != ''
                        //&& $( "#exec-form" ).find('textarea[name=execution_evidence]').val() != ''
                    ) valid = true
                }
                
                if ($('#exec-select-status').val() == 'EXTEND') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_reason]').val() != ''
                        && $( "#exec-form" ).find('input[name=revised_date]').val() != ''
                    ) valid = true
                }
                
                if ($('#exec-select-status').val() == 'ONGOING') {
                    if (
                        $( "#exec-form" ).find('textarea[name=execution_explain]').val() != ''
                         
                    ) valid = true
                }
                
                if (valid) {
                    var mod = MainApp.viewGlobalModal('confirm', 'Are You sure you want to save this Action Plan Execution ?');
                    mod.find('button.btn-primary').off('click');
                    mod.find('button.btn-primary').one('click', function(){
                        mod.modal('hide');
                        $('#modal-exec').modal('hide');
                        
                        Metronic.blockUI({ boxed: true });
                        $.post(
                            url,
                            $( "#exec-form" ).serialize(),
                            function( data ) {
                                Metronic.unblockUI();
                                if(data.success) {
                                    grid_exec.getDataTable().ajax.reload();
                                    
                                    //MainApp.viewGlobalModal('success', 'Success Updating Action Plan Execution');
                                    location.href=site_url+'/maini/mainpic/actionplan_adt';
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
                    MainApp.viewGlobalModal('error', 'Please Fill All Action Plan Execution data');
                }
            });
            
            $("<div id='tooltip'></div>").css({
                position: "absolute",
                display: "none",
                border: "1px solid #fdd",
                padding: "2px",
                "background-color": "#fee",
                opacity: 0.80
            }).appendTo("body");
        },
         
        viewExecutionForm_adt: function(data) {
            var me = this;
            var act_id = data.id;
              
            $('#form-action-id').val(act_id);
            
            $('#fgroup-explain').hide();
            $('#fgroup-evidence').hide();
            $('#fgroup-reason').hide();
            $('#fgroup-date').hide();
            
            $( '#exec-select-status' ).prop('disabled', true);
            $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', true);
            $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', true);
            $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', true);
            
            $('#exec-button-save').hide();
            
            if (data.execution_status == 'COMPLETE') {
                $( '#exec-select-status' ).val(data.execution_status);
                $( "#exec-form" ).find('textarea[name=execution_explain]').val(data.execution_explain);
                $( "#exec-form" ).find('textarea[name=execution_evidence]').val(data.execution_evidence);
                
                $('#fgroup-explain').show();
                $('#fgroup-evidence').show();
                if (data.is_owner == 1) {
                    if (data.action_plan_status == 4) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                    if (data.is_head == '1' && data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                } else {
                    if (data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                        $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                }
            } else if (data.execution_status == 'EXTEND') {
                $( '#exec-select-status' ).val(data.execution_status);
                $( "#exec-form" ).find('textarea[name=execution_reason]').val(data.execution_reason);
                $( "#exec-form" ).find('input[name=revised_date]').val(data.revised_date_v);
                
                $('#fgroup-reason').show();
                $('#fgroup-date').show();
                
                if (data.is_owner == 1) {
                    if (data.action_plan_status == 4) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                    if (data.is_head == '1' && data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                } else {
                    if (data.action_plan_status == 5) {
                        $( '#exec-select-status' ).prop('disabled', false);
                        $( "#exec-form" ).find('textarea[name=execution_reason]').prop('readonly', false);
                        
                        $('#exec-button-save').show();
                    }
                }
            } else {
                $( '#exec-select-status' ).val('ONGOING');
                $('#fgroup-explain').show();
                $('#fgroup-evidence').hide();
                $( '#exec-select-status' ).prop('disabled', false);
                $( "#exec-form" ).find('textarea[name=execution_explain]').prop('readonly', false);
                $( "#exec-form" ).find('textarea[name=execution_evidence]').prop('readonly', false);
                $( "#exec-form" ).find('textarea[name=execution_explain]').val(data.execution_explain);
                $('#exec-button-save').show();
            }
         
            
            $('#modal-exec').modal('show');
            
        }
    };  
}();

