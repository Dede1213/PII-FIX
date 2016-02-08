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
                var vm = 'main/viewRisk';
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
                    var vm = 'riski/RiskRegister';
                    return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'">'+data+'</a>';
                }else if (full.cr_status == '1') {
                    var vm = 'riski/riskregister/ChangeRequestView';
                } else {
                   var vm = 'riski/riskregister/ChangeRequestView';
                }
                return '<a target="_self" class="'+cls+'" href="'+site_url+'/'+vm+'/'+full.id+'">'+data+'</a>';
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

var Dashboard = function() {
    return {
        init: function() {
            var me = this;
            
            // FILTER DROPDOWN
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
            
            // TAB CONTROL FOR BREADCRUMB
            $('ul.nav-tabs a[data-toggle=tab]').on('click', function() {
                var hrefa = $(this).attr('href');
                var ulid = hrefa.replace('#', '');
                ulid = 'bread_'+ulid;
                
                $('ul.page-breadcrumb li.bread_tab').hide();
                $('#'+ulid).show();
            });
        },
        initUserChart: function() {
            $.getJSON( site_url+"/main/getSummaryCount", function( data ) {
                var series = data;
                var tick = [ [0, "Tinggi"], [1, "Sedang"], [2, "Rendah"] ];
                
                on_options["yaxis"]["ticks"] = tick;
                
                $.plot("#chart_user", data, on_options);
            });
            
            /*
            var initData = [
                {'dtype': 'Tinggi', 'dvalue': 0, 'color': "#D91E18"},
                {'dtype': 'Sedang', 'dvalue': 0, 'color': "#F3C200"},
                {'dtype': 'Rendah', 'dvalue': 0, 'color': "#1BA39C"},
            ];
            $.getJSON( site_url+"/main/getSummaryCount", function( data ) {
                $.each(data, function(data2idx, dval) {
                    console.log(dval, dval.data[0][1], dval.data[0][0]);
                    if (dval.data[0][1] == 'Tinggi') {
                        initData[0].dvalue = dval.data[0][0];
                    } else if(dval.data[0][1] == 'Sedang') {
                        initData[1].dvalue = dval.data[0][0];
                    } else if(dval.data[0][1] == 'Rendah') {
                        initData[2].dvalue = dval.data[0][0];
                    }
                });
                
                var chart = AmCharts.makeChart("chart_user", {
                    "theme": "light",
                    "type": "serial",
                    "dataProvider": initData,
                    "graphs": [{
                        "fillAlphas": 2,
                        "colorField": "color",
                        "lineAlpha": 0.2,
                        "title": "Dvalue",
                        "type": "column",
                        "valueField": "dvalue"
                    }],
                    "depth3D": 5,
                    "angle": 30,
                    "rotate": true,
                    "categoryField": "dtype",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "fillAlpha": 0.05,
                        "position": "left"
                    }
                });
            });
            */
            
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
        }
    };  
}();