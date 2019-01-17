/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7 & Bootstrap 4.0.0-Alpha 6
Version: 3.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v3.0/admin/apple/
*/

var handleDataTableCombinationSetting = function() {
	"use strict";
    
    if ($('#data-table').length !== 0) {
        $('#data-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                { extend: 'excel', className: 'btn-sm btn-info m-l-5', exportOptions: {
                    columns: "thead th:not(.noExport)"
                }},
                { extend: 'pdf', className: 'btn-sm btn-success m-l-5', exportOptions: {
                    columns: "thead th:not(.noExport)"
                } },
                { extend: 'print', className: 'btn-sm btn-warning m-l-5', exportOptions: {
                    columns: "thead th:not(.noExport)"
                } }
            ],
            responsive: true,
            autoFill: false,
            colReorder: false,
            keys: false,
            rowReorder: false,
            select: false,
            ordering: false,
            pageLength:50,
        });
    }
};

var TableManageCombine = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableCombinationSetting();
        }
    };
}();