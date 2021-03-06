(function (namespace, $) {
    "use strict";

    var IpDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = IpDataTable.prototype;

    p.initialize = function () {
        this._initDataTables();
    };

    p._initDataTables = function () {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        this.createDataTable();
    };

    p.createDataTable = function () {
        var $dt_ip = $('#dt_ip');

        var table = $dt_ip.DataTable({
            "dom": "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_ip.data('source')
            },
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            "order": [],
            "columns": [
                {
                    "class": 'details-control text-center',
                    "data": null,
                    "defaultContent": '',
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "hostname", "render": function (data) {
                        return data ? data : "-";
                    }
                },
                {"data": "ip", "orderable": false},
                {
                    "data": "mac", "orderable": false, "render": function (data) {
                        return data ? data : "-";
                    }
                },
                {"data": "is_used", "orderable": true, "searchable": false, "class": "text-center"},
                {"data": "action", "name": "action", "class": "text-right", "orderable": false, "searchable": false}
            ],
            "buttons": [
                'pageLength', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

        var o = this;
        $dt_ip.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {
        var $dt_ip = $("#dt_ip");
        $.ajax({
            "type": "GET",
            "url": $dt_ip.data("details-source"),
            "data": {ip: d.ip},
            "success": function (response) {
                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    row.child(response).show();
                    tr.addClass('shown');
                }
            },
            "error": function () {
                bootbox.alert("<h3 class='text-center'>Error fetching data!</h3>");
            }
        });
    };

    window.materialadmin.IpDataTable = new IpDataTable;
}(this.materialadmin, jQuery));