(function (namespace, $) {
    "use strict";

    var VpsProvisionDataTable = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = VpsProvisionDataTable.prototype;

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
        var $dt_vps_provision = $("#dt_vps_provision");

        var table = $dt_vps_provision.DataTable({
            "dom": '<"clear">lfrtip',
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": $dt_vps_provision.data("source")
            },
            "pageLength": "50",
            "columns": [
                {
                    "class": "details-control text-center",
                    "orderable": false,
                    "data": null,
                    "defaultContent": '',
                    "searchable": false
                },
                {"data": "customer.name", "name": "customer.name"},
                {"data": "operating_system.name", "name": "operatingSystem.name", "class": "text-center"},
                {"data": "provisioned_by.name", "name": "provisionedBy.name", "class": "text-center"},
                {"data": "virtual_machine", "name": "vps_provisions.virtual_machine", "class": "text-center"},
                {"data": "ip", "name": "vps_provisions.ip", "class": "text-center"},
                {"data": "mac", "name": "vps_provisions.mac", "class": "text-center"}
            ],
            "createdRow": function (row, data) {
                if ('approved' == data["status"]) {
                    $(row).addClass("success");
                } else if ('rejected' == data["status"]) {
                    $(row).addClass("warning");
                }
            },
            "drawCallback": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        var o = this;
        $dt_vps_provision.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            o._formatDetails(row.data(), row, tr);
        });
    };

    p._formatDetails = function (d, row, tr) {

        var provisionId = d.id;
        var $dt_vps_provision = $("#dt_vps_provision");

        $.ajax({
            "type": "POST",
            "url": $dt_vps_provision.data("details-source"),
            "data": {id: provisionId},
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

    window.materialadmin.VpsProvisionDataTable = new VpsProvisionDataTable;
}(this.materialadmin, jQuery));