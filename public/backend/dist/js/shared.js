/**
 once a wise man told you need to work hard !!!
 * **/

$(function () {
    $(".datatable").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        ordering: false,
    });

    $(document).on("focus", "#search-report-fiscal-year", function () {
        $("#search-report-fiscal-year").on("change", function (e) {
            window.location.href = `/dashboard/reports/${$(this)
                .find(":selected")
                .val()}`;
        });
    });

    if ($(document).attr("title") == "Report") {
        const pathSegments = window.location.pathname.split("/");
        const uuid = pathSegments[pathSegments.length - 1];
        $.ajax({
            url: "/dashboard/all-fiscal-years",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    $("#search-report-fiscal-year").append(
                        $("<option>", {
                            value: data.id,
                            text: data.year,
                        })
                    );

                    if (data.active === 1) {
                        activeUuid = data.id;
                    }
                });

                if (uuid != "reports") {
                    $("#search-report-fiscal-year").val(uuid).change();
                } else {
                    $("#search-report-fiscal-year").val(activeUuid).change();
                }

                const fiscal_year = $("#search-report-fiscal-year").val();
                mediumPieChartReport(fiscal_year, "#medium-report-chart");
                categoriesPieChartReport(
                    fiscal_year,
                    "#categories-report-chart"
                );
                departmentsPieChartReport(
                    fiscal_year,
                    "#departments-report-chart"
                );
            },
        });
    }

    if ($(document).attr("title") == "Dashboard") {
        var xValues = [];
        var yValues = [];
        //medium chart
        $.ajax({
            url: "/dashboard/medium-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.tickets_count);
                });
                //
                new Chart($("#medium-chart"), {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        legend: {
                            labels: {
                                usePointStyle: true,
                            },
                            display: true,
                        },
                        title: {
                            display: false /*text: "Current Fiscal Year"*/,
                        },
                    },
                    animation: {
                        duration: 2500,
                    },
                });
                xValues = [];
                yValues = [];

                //
            },
        });

        //category chart
        $.ajax({
            url: "/dashboard/categories-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.category_count);
                });

                var ctx = document
                    .getElementById("categories-chart")
                    .getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    ticks: {
                                        display: false,
                                    },
                                },
                            ],
                        },
                        legend: {
                            display: true,
                            position: "top",
                            align: "right",
                            labels: {
                                usePointStyle: true,
                                generateLabels: function (chart) {
                                    var labels = chart.data.labels;
                                    var legendLabels = [];

                                    for (var i = 0; i < labels.length; i++) {
                                        legendLabels.push({
                                            text: labels[i],
                                            fillStyle:
                                                chart.data.datasets[0]
                                                    .backgroundColor[i],
                                            hidden: chart.getDatasetMeta(0)
                                                .data[i].hidden,
                                        });
                                    }

                                    return legendLabels;
                                },
                            },
                        },
                        animation: {
                            duration: 2500,
                        },
                    },
                });
                xValues = [];
                yValues = [];
            },
        });

        //department chart
        $.ajax({
            url: "/dashboard/departments-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.department_id_count);
                });

                var ctx = document
                    .getElementById("departments-chart")
                    .getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    ticks: {
                                        display: false,
                                    },
                                },
                            ],
                        },
                        legend: {
                            display: true,
                            position: "top",
                            align: "right",
                            labels: {
                                usePointStyle: true,
                                generateLabels: function (chart) {
                                    var labels = chart.data.labels;
                                    var legendLabels = [];

                                    for (var i = 0; i < labels.length; i++) {
                                        legendLabels.push({
                                            text: labels[i],
                                            fillStyle:
                                                chart.data.datasets[0]
                                                    .backgroundColor[i],
                                            hidden: chart.getDatasetMeta(0)
                                                .data[i].hidden,
                                        });
                                    }

                                    return legendLabels;
                                },
                            },
                        },
                        animation: {
                            duration: 2500,
                        },
                    },
                });
                xValues = [];
                yValues = [];
                //
            },
        });
    }

    //notification badge count
    $.ajax({
        url: "/dashboard/notification/unread/count",
        type: "get",
        success: function (response) {
            if (response > 0) {
                let badgeSpan = $("<span>");
                badgeSpan.prop({
                    class: "badge badge-warning badge-pill navbar-badge font-weight-bolder",
                    innerHTML: `${response}`,
                });
                badgeSpan.appendTo("#notification-icon-dashboard");
            }
        },
    });

    $("#edit_admin_name").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const name = link.data("name");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #name").val(name);
    });

    $("#edit_admin_email").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const email = link.data("email");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #email").val(email);
    });

    $("#edit_admin_password").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #password").val("");
        modal.find(".modal-body #password_confirmation").val("");
    });

    $("#edit_admin_role").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const title = link.data("title");
        const id = link.data("id");
        const role_id = link.data("role_id");

        modal.find(".modal-body #role_id").html("");
        modal.find(".modal-body #title").val(title);

        $.ajax({
            url: "/dashboard/user-name",
            type: "get",
            data: { _token: $("input[name='_token']").val(), _method: "get" },
            success: function (response) {
                response.forEach(function (data) {
                    modal.find(".modal-body #role_id").append(
                        $("<option>", {
                            value: data.title,
                            text: data.name,
                        })
                    );
                });

                modal
                    .find(`.modal-body #role_id option[value=${role_id}]`)
                    .prop("selected", "selected")
                    .change();
            },
        });
    });

    $("#edit_admin_department").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const department_id = link.data("department_id");

        modal.find(".modal-body #id").val(id);
        modal
            .find(".modal-body #edit_admin_department_id")
            .empty()
            .trigger("change");

        $.ajax({
            url: "/dashboard/department-name",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    modal.find(".modal-body #edit_admin_department_id").append(
                        $("<option>", {
                            value: data.id,
                            text: data.name,
                        })
                    );
                });

                modal
                    .find(".modal-body #edit_admin_department_id")
                    .val(department_id)
                    .trigger("change");
            },
        });
    });

    $("#edit_admin_department_id").select2({
        theme: "bootstrap4",
        searchInputPlaceholder: "खोज्नुहोस",
    });

    $("#edit_admin_department_id").select2({
        dropdownParent: $("#edit_admin_department"),
    });

    $("#add_admin").on("shown.bs.modal", function (e) {
        const modal = $(this);
        modal.find(".modal-body #role_id2").html("");

        $.ajax({
            url: "/dashboard/role-name",
            type: "get",

            success: function (response) {
                response.forEach(function (data) {
                    modal.find(".modal-body #role_id2").append(
                        $("<option>", {
                            value: data.id,
                            text: data.name,
                        })
                    );
                });
            },
        });

        modal
            .find(".modal-body #add_admin_department_id")
            .empty()
            .trigger("change");

        $.ajax({
            url: "/dashboard/department-name",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    modal.find(".modal-body #add_admin_department_id").append(
                        $("<option>", {
                            value: data.id,
                            text: data.name,
                        })
                    );
                });
            },
        });
    });

    $("#add_admin_department_id").select2({
        theme: "bootstrap4",
        searchInputPlaceholder: "खोज्नुहोस",
    });

    $("#add_admin_department_id").select2({
        dropdownParent: $("#add_admin"),
    });

    $("#forward_ticket_department_id").select2({
        theme: "bootstrap4",
        searchInputPlaceholder: "खोज्नुहोस",
    });

    $("#forward_ticket").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const ticket_id = link.data("ticket_id");

        modal.find(".modal-body #ticket_id").val(ticket_id);
        modal
            .find(".modal-body #forward_ticket_department_id")
            .empty()
            .trigger("change");

        $.ajax({
            url: "/dashboard/department-ticket-forward",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    modal
                        .find(".modal-body #forward_ticket_department_id")
                        .append(
                            $("<option>", {
                                value: data.id,
                                text: data.name,
                            })
                        );
                });
            },
        });
    });

    $("#edit_ledger_group").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const classification_identifier = link.data("classification_identifier");
        const parent_identifier = link.data("parent_identifier");
        const negative_identifier = link.data("negative_identifier");
        const identifier = link.data("identifier");
        const affects_gross_profit = link.data("affects_gross_profit");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #identifier").val(identifier);
        modal.find(".modal-body #classification_identifier").html("");
        modal.find(".modal-body #parent_identifier").html("");
        modal.find(".modal-body #negative_identifier").html("");
        const radioYes = modal.find(".modal-body input[name='affects_gross_profit'][value='1']");
        const radioNo = modal.find(".modal-body input[name='affects_gross_profit'][value='0']");

        if (affects_gross_profit === "1") {
            radioYes.prop("checked", true);
        } else {
            radioNo.prop("checked", true);
        }
        $.ajax({
            url: "/ledger/group_identifier",
            type: "get",
            data: { _token: $("input[name='_token']").val(), _method: "get" },
            success: function (response) {
                modal.find(".modal-body #negative_identifier").append(
                    $("<option>", {
                        value: "",
                        text: "select one"
                    })
                );
                response.forEach(function (data) {
                    modal.find(".modal-body #negative_identifier").append(
                        $("<option>", {
                            value: data.identifier,
                            text: data.title,
                        })
                    );
                });
                modal
                    .find(`.modal-body #negative_identifier option[value=${negative_identifier}]`)
                    .prop("selected", "selected")
                    .change();
            },
        });
        if(classification_identifier!=''){
            $.ajax({
                url: "/ledger/classification_identifier",
                type: "get",
                data: { _token: $("input[name='_token']").val(), _method: "get" },
                success: function (response) {
                    modal.find(".modal-body #classification_identifier").append(
                        $("<option>", {
                            value: "",
                            text: ""
                        })
                    );
                    response.forEach(function (data) {
                        modal.find(".modal-body #classification_identifier").append(
                            $("<option>", {
                                value: data.identifier,
                                text: data.title,
                            })
                        );
                    });
                    modal
                        .find(`.modal-body #classification_identifier option[value=${classification_identifier}]`)
                        .prop("selected", "selected")
                        .change();
                },
            });

        }else{
            $.ajax({
                url: "/ledger/group_identifier",
                type: "get",
                data: { _token: $("input[name='_token']").val(), _method: "get" },
                success: function (response) {
                    response.forEach(function (data) {
                        modal.find(".modal-body #parent_identifier").append(
                            $("<option>", {
                                value: data.identifier,
                                text: data.title,
                            })
                        );
                    });
                    modal
                        .find(`.modal-body #parent_identifier option[value=${parent_identifier}]`)
                        .prop("selected", "selected")
                        .change();
                },
            });
        }
    });

    $("#edit_ledger").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const group_identifier = link.data("group_identifier");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #group_identifier").html("");

        $.ajax({
            url: "/ledger/group_identifier",
            type: "get",
            data: { _token: $("input[name='_token']").val(), _method: "get" },
            success: function (response) {
                response.forEach(function (data) {
                    modal.find(".modal-body #group_identifier").append(
                        $("<option>", {
                            value: data.identifier,
                            text: data.title,
                        })
                    );
                });
                modal
                    .find(`.modal-body #group_identifier option[value=${group_identifier}]`)
                    .prop("selected", "selected")
                    .change();
            },
        });
    });

    $("#edit_fiscal_year").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const year = link.data("year");
        const active = link.data("active");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #year").val(year);
        active && modal.find(".modal-body #active_edit").prop("checked", true);
        !active &&
            modal.find(".modal-body #active_edit").prop("checked", false);
    });

    $("#edit_ledger_classification").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const identifier = link.data("identifier");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #identifier").val(identifier);
    });

    const deleteModal = $("#delete_modal");
    let template = null;

    deleteModal.on("shown.bs.modal", function (e) {
        template = deleteModal.html();
        const modal = $(this);
        const link = $(e.relatedTarget);
        const url = link.data("url");

        modal.find(".modal-footer #confirm-button").on("click", function (e) {
            e.preventDefault();
            const formData = {
                windowUrl: window.location.href,
                _token: $("input[name='_token']").val(),
                _method: "DELETE",
            };
            $.ajax({
                headers: {
                    Accept: "application/json",
                    "Content-Type":
                        "application/x-www-form-urlencoded; charset=UTF-8",
                },
                url,
                type: "post",
                data: formData,
                success: function (response) {
                    window.location.href = response.redirect;
                    modal.modal("hide");
                },
            });
        });
    });

    deleteModal.on("hidden.bs.modal", function () {
        deleteModal.html(template);
    });

    //Date range picker with time picker
    $("#date_range_search_ticket")
        .daterangepicker({
            timePicker: false,
            locale: {
                format: "YYYY/MM/DD",
            },
            buttons: {
                clear: true,
                close: false,
            },
        })
        .val("");

    const rejectTicketModal = $("#reject_ticket");
    rejectTicketModal.on("shown.bs.modal", function (e) {
        template = rejectTicketModal.html();
        const modal = $(this);
        const link = $(e.relatedTarget);
        const url = link.data("url");
        const ticketNumber = link.data("ticket_number");

        modal
            .find(".modal-body #reject_ticket_label")
            .text(`#Ticket : ${ticketNumber} will be rejected !!!`);

        modal.find(".modal-footer #confirm-button").on("click", function (e) {
            e.preventDefault();
            $.ajax({
                url,
                type: "get",
                success: function (response) {
                    window.location.href = response.redirect;
                },
            });
        });
    });
    rejectTicketModal.on("hidden.bs.modal", function () {
        rejectTicketModal.html(template);
    });

    const publishClosedTicketModal = $("#publish_closed_ticket");
    publishClosedTicketModal.on("shown.bs.modal", function (e) {
        template = publishClosedTicketModal.html();
        const modal = $(this);
        const link = $(e.relatedTarget);
        const url = link.data("url");
        const ticketNumber = link.data("ticket_number");

        modal
            .find(".modal-body #close_ticket_publish")
            .text(`#Ticket : ${ticketNumber} will be visible to public !!!`);

        modal.find(".modal-footer #confirm-button").on("click", function (e) {
            e.preventDefault();
            $.ajax({
                url,
                type: "get",
                success: function (response, textStatus, xhr) {
                    if(xhr.status)
                        location.reload();
                    else
                        window.location.href = response.redirect;
                },
            });
        });
    });
    publishClosedTicketModal.on("hidden.bs.modal", function () {
        publishClosedTicketModal.html(template);
    });

    $("#close_ticket").on("shown.bs.modal", function (e) {
        template = $(this).html();
        const modal = $(this);
        const link = $(e.relatedTarget);
        const url = link.data("url");
        const ticket_number = link.data("ticket_number");

        modal
            .find(".modal-body #close_ticket_label")
            .text(`#Ticket : ${ticket_number} will be closed !!!`);

        modal.find(".modal-footer #confirm-button").on("click", function (e) {
            $.ajax({
                url: url,
                type: "get",
                success: function (response) {
                    window.location.href = response.redirect;
                },
            });
        });
    });
    $("#close_ticket").on("hidden.bs.modal", function () {
        $(this).html(template);
    });

    $(".notification-mark").on("click", function (e) {
        e.preventDefault();
        link = $(this).attr("href");
        notification_id = $(this).attr("data-id");
        notificationTicketPermission(link, notification_id);
    });

    $("#notification-dropdown-dashboard").hover(function (e) {
        $(".notification-mark").on("click", function (e) {
            e.preventDefault();
            link = $(this).attr("href");
            notification_id = $(this).attr("data-id");
            notificationTicketPermission(link, notification_id);
        });
    });

    $(".dropdown-notification").on("show.bs.dropdown", function () {
        var $notificationDropdown = $("#notification-dropdown-dashboard");
        $notificationDropdown.empty();

        var notificationCount = 0;

        $.ajax({
            url: "/dashboard/notification/unread/count",
            type: "get",
            success: function (response) {
                notificationCount = response;
            },
        });

        $.ajax({
            url: "/dashboard/notification/unread",
            type: "get",
            success: function (response) {
                var notifications = response.data;

                var notificationHeader = `<span class="dropdown-item dropdown-header">${notificationCount} Notifications</span>`;

                var fragment = document.createDocumentFragment();

                notifications.forEach(function (data, index) {
                    var divider = $("<div>").prop({
                        class: "dropdown-divider",
                    });

                    var notificationAnchor = `<a href="/dashboard${data.data.url}" class="dropdown-item notification-mark" data-id="${data.id}">

                          <span class="float-right font-weight-normal text-muted text-sm">
                            ${data.created_at}
                            </span>

                          <h6 class="font-weight-bolder">
                            <u>${data.data.title}</u>
                            </h6>

                          <span class="text-wrap mb-1">&#8227;
                            ${data.data.body}
                            </span>

                        </a>`;

                    divider.appendTo(fragment);
                    $(notificationAnchor).appendTo(fragment);
                });

                var divider = $("<div>").prop({
                    class: "dropdown-divider",
                });

                var notificationFooterAnchor = `<a href="/dashboard/notifications" class="dropdown-item dropdown-footer">See All Notifications</a>`;

                divider.appendTo(fragment);
                $(notificationFooterAnchor).appendTo(fragment);

                $notificationDropdown
                    .empty()
                    .append(notificationHeader)
                    .append(fragment);
            },
        });
    });

    $(".dropdown-notification").on("hidden.bs.dropdown", function () {
        $("#notification-dropdown-dashboard").empty();
    });

    $(document).on("focus", "#description", function () {
        $(this).removeClass("is-invalid");
    });

    $("#reply-cancel-open-ticket").on("click", function () {
        $("#reply-card-open-ticket").addClass("d-none");
    });

    $("#reply-open-ticket").on("click", function () {
        $("#reply-card-open-ticket").removeClass("d-none");
        window.scrollBy(0, 500);
    });

    $("#reply-cancel-processing-ticket").on("click", function () {
        $("#reply-card-processing-ticket").addClass("d-none");
    });

    $("#reply-processing-ticket").on("click", function () {
        $("#reply-card-processing-ticket").removeClass("d-none");
        window.scrollBy(0, 500);
    });

    $("#reply-submit-open-ticket").on("click", function (e) {
        e.preventDefault();

        let $submitForm = true;

        $("#attachments-main")
            .find(".gallery-photo-add")
            .each(function () {
                if ($(this).get(0).files.length === 0) {
                    if ($submitForm === true) {
                        toastr.error(
                            "Please select a File or delete Blank Image Box !!!"
                        );
                    }
                    $submitForm = false;
                }
            });

        if ($("#description").val() === "") {
            $("#description").addClass("is-invalid");
            toastr.error("Description cannot be empty !!!");
            $submitForm = false;
        }

        if ($submitForm === true) {
            $(this).parents("form").submit();
        }
    });

    $("#reply-submit-processing-ticket").on("click", function (e) {
        e.preventDefault();

        let $submitForm = true;

        $("#attachments-main")
            .find(".gallery-photo-add")
            .each(function () {
                if ($(this).get(0).files.length === 0) {
                    if ($submitForm === true) {
                        toastr.error(
                            "Please select a File or delete Blank Image Box !!!"
                        );
                    }
                    $submitForm = false;
                }
            });

        if ($("#description").val() === "") {
            $("#description").addClass("is-invalid");
            toastr.error("Description cannot be empty !!!");
            $submitForm = false;
        }

        if ($submitForm === true) {
            $(this).parents("form").submit();
        }
    });

    $("#add-attachment").on("click", function () {
        if ($("#attachments-main :last-child").children().length < 1) {
            add_attachment_row();
        } else if (
            $("#attachments-main :last-child").find(".gallery-photo-add").get(0)
                .files.length === 0
        ) {
            toastr.error("Please select a File on empty box !!!");
        } else {
            add_attachment_row();
        }
    });

    $(document).on("click", ".remove-attachment", function () {
        $(this).closest("#attachments-child").remove();
    });

    $(document).on("change", ".gallery-photo-add", function () {
        let imgTag = $("<img>");

        const file = this.files[0];
        const reader = new FileReader();
        console.log(file.type);

        reader.addEventListener(
            "load",
            function () {
                if (file.type.startsWith("image/")) srcImage = reader.result;
                else srcImage = "/frontend/images/file-icon.png";

                imgTag.prop({
                    src: srcImage,
                });
            },
            false
        );

        if (file) {
            reader.readAsDataURL(file);
        }

        $(this).parent().children()[1].innerHTML = "";
        imgTag.appendTo("div.attachment-gallery");
    });

    $("#open_ticket_model_category").select2({
        theme: "bootstrap4",
        searchInputPlaceholder: "खोज्नुहोस",
    });

    $("#edit_open_ticket").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const category_id = link.data("category");

        modal.find(".modal-body #id").val(id);

        modal
            .find(".modal-body #open_ticket_model_category")
            .empty()
            .trigger("change");

        $.ajax({
            url: "/dashboard/category-name",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    modal
                        .find(".modal-body #open_ticket_model_category")
                        .append(
                            $("<option>", {
                                value: data.id,
                                text: data.name,
                            })
                        );
                    modal
                        .find(".modal-body #open_ticket_model_category")
                        .val(category_id)
                        .trigger("change");
                });
            },
        });
    });

    $(document).on("focus", "#search-form-fiscal-year", function () {
        $("#search-form-fiscal-year").on("change", function (e) {
            location.href = `${window.location.pathname}?fiscal_year=${$(this)
                .find(":selected")
                .val()}`;
        });
    });

    $("#ticket_search_form").on("submit", function (e) {
        e.preventDefault();
        if ($("#date_range_search_ticket").val() == "") {
            $("#date_range_search_ticket").prop("disabled", true);
        }
        e.currentTarget.submit();
    });

    $("#categories_to_excel").on("click", function () {
        $.ajax({
            url: `/dashboard/report/categories-count/${$(
                "#search-report-fiscal-year"
            )
                .find(":selected")
                .val()}`,
            type: "get",
            success: function (response) {
                const values = [["Catagories", "Ticket Count"]];
                response.forEach(function (data) {
                    values.push([data.name, data.category_count]);
                });
                exportToExcel(
                    values,
                    `catagories-${$(
                        "#search-report-fiscal-year option:selected"
                    ).text()}`
                );
            },
        });
    });

    $("#departments_to_excel").on("click", function () {
        $.ajax({
            url: `/dashboard/report/departments-count/${$(
                "#search-report-fiscal-year"
            )
                .find(":selected")
                .val()}`,
            type: "get",
            success: function (response) {
                const values = [["Department", "Ticket Count"]];
                response.forEach(function (data) {
                    values.push([data.name, data.department_id_count]);
                });
                exportToExcel(
                    values,
                    `departments-${$(
                        "#search-report-fiscal-year option:selected"
                    ).text()}`
                );
            },
        });
    });

    $("#medium_to_excel").on("click", function () {
        $.ajax({
            url: `/dashboard/report/medium-count/${$(
                "#search-report-fiscal-year"
            )
                .find(":selected")
                .val()}`,
            type: "get",
            success: function (response) {
                const values = [["Medium", "Ticket Count"]];
                response.forEach(function (data) {
                    values.push([data.name, data.tickets_count]);
                });
                exportToExcel(
                    values,
                    `medium-${$(
                        "#search-report-fiscal-year option:selected"
                    ).text()}`
                );
            },
        });
    });
});

// user defined functions
function notificationMarker(id) {
    $.ajax({
        url: `/dashboard/notification/mark/${id}`,
        type: "post",
        data: { _token: $("input[name='_token']").val(), _method: "put" },
    });
}

function notificationTicketPermission(link, notification_id) {
    const pathSegments = link.split("/");
    const ticket_id = pathSegments[pathSegments.length - 1];

    $.ajax({
        method: "post",
        url: "/dashboard/ticket/view-permission",
        data: {
            _token: $('input[name="_token"]').val(),
            ticket_id: ticket_id,
        },
        success: function (response) {
            notificationMarker(notification_id);
            if (response) {
                window.location.href = link;
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "This ticket was forwarded to another department",
                });
            }
        },
    });
}

(function ($) {
    var Defaults = $.fn.select2.amd.require("select2/defaults");

    $.extend(Defaults.defaults, {
        searchInputPlaceholder: "",
    });

    var SearchDropdown = $.fn.select2.amd.require("select2/dropdown/search");

    var _renderSearchDropdown = SearchDropdown.prototype.render;

    SearchDropdown.prototype.render = function (decorated) {
        // invoke parent method
        var $rendered = _renderSearchDropdown.apply(
            this,
            Array.prototype.slice.apply(arguments)
        );

        this.$search.attr(
            "placeholder",
            this.options.get("searchInputPlaceholder")
        );

        return $rendered;
    };
})(window.jQuery);

//get the parameter value if parameter doesn't exist then returns undefined
function getParameter(parameter_name) {
    var url = window.location.search.substring(1);
    var varUrl = url.split("&");
    for (var i = 0; i < varUrl.length; i++) {
        var parameter = varUrl[i].split("=");
        if (parameter[0] == parameter_name) {
            return parameter[1];
        }
    }
}

function generateColors(numColors) {
    const colors = [];
    const goldenRatio = 0.618033988749895;
    let hue = 0.1; // Use a fixed seed value

    for (let i = 0; i < numColors; i++) {
        hue += goldenRatio;
        hue %= 1;

        const saturation = 0.5;
        const lightness = 0.6;

        const color = hslToHex(hue * 360, saturation * 100, lightness * 100);
        colors.push(color);
    }

    return colors;
}

function hslToHex(h, s, l) {
    h /= 360;
    s /= 100;
    l /= 100;
    let r, g, b;
    if (s === 0) {
        r = g = b = l;
    } else {
        const hue2rgb = (p, q, t) => {
            if (t < 0) t += 1;
            if (t > 1) t -= 1;
            if (t < 1 / 6) return p + (q - p) * 6 * t;
            if (t < 1 / 2) return q;
            if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
            return p;
        };
        const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
        const p = 2 * l - q;
        r = Math.round(hue2rgb(p, q, h + 1 / 3) * 255);
        g = Math.round(hue2rgb(p, q, h) * 255);
        b = Math.round(hue2rgb(p, q, h - 1 / 3) * 255);
    }
    return `#${r.toString(16)}${g.toString(16)}${b.toString(16)}`;
}

function add_attachment_row() {
    const attachmentChild = $("<div>", {
        class: "col-md-6 mb-5 border border-3",
        id: "attachments-child",
    });

    $("<input>", {
        type: "file",
        accept: ".jpg,.jpeg,.bmp,.png,.pdf,.pptx,.doc,.docx,.ppt,.xls,.xlsx,.webp",
        name: "attachments[]",
        class: "btn btn-primary w-100 mt-2 gallery-photo-add",
    }).appendTo(attachmentChild);

    $("<div>", {
        class: "col-md-6 attachment-gallery",
    }).appendTo(attachmentChild);

    const closeButton = $("<button>", {
        type: "button",
        class: "btn btn-outline-danger mt-2 float-right mb-2 remove-attachment",
    });

    $("<i>", {
        class: "fa fa-trash",
    }).appendTo(closeButton);

    $("<div>", {
        class: "col-12",
    })
        .append(closeButton)
        .appendTo(attachmentChild);

    attachmentChild.appendTo("#attachments-main");
}

function mediumPieChartReport(fiscal_year_id, elementSelector) {
    $.ajax({
        url: `/dashboard/report/medium-count/${fiscal_year_id}`,
        type: "get",
        success: function (response) {
            const values = [["Name", "Count"]];
            response.forEach(function (data) {
                values.push([data.name, data.tickets_count]);
            });
            google.charts.setOnLoadCallback(drawChart(elementSelector, values));
        },
    });
}

function categoriesPieChartReport(fiscal_year_id, elementSelector) {
    $.ajax({
        url: `/dashboard/report/categories-count/${fiscal_year_id}`,
        type: "get",
        success: function (response) {
            const values = [["Name", "Count"]];
            response.forEach(function (data) {
                values.push([data.name, data.category_count]);
            });
            google.charts.setOnLoadCallback(drawChart(elementSelector, values));
        },
    });
}

function departmentsPieChartReport(fiscal_year_id, elementSelector) {
    $.ajax({
        url: `/dashboard/report/departments-count/${fiscal_year_id}`,
        type: "get",
        success: function (response) {
            const values = [["Name", "Count"]];
            response.forEach(function (data) {
                values.push([data.name, data.department_id_count]);
            });
            google.charts.setOnLoadCallback(drawChart(elementSelector, values));
        },
    });
}

function drawChart(elementSelector, values) {
    var data = google.visualization.arrayToDataTable(values);
    var options = {
        pieHole: 0.4,
        chartArea: { width: "100%", height: "95%" },
    };
    var chart = new google.visualization.PieChart(
        document.querySelector(elementSelector)
    );
    chart.draw(data, options);
}

function getCurrentTime() {
    const now = new Date();
    const hours = ("0" + now.getHours()).slice(-2);
    const minutes = ("0" + now.getMinutes()).slice(-2);
    const seconds = ("0" + now.getSeconds()).slice(-2);
    return `${hours}:${minutes}:${seconds}`;
}

function exportToExcel(values, name) {
    const fileName = `${name}-${getCurrentTime()}.xlsx`; // Change the filename as needed
    const sheetName = "Sheet1"; // Change the sheet name as needed

    const rows = [...values];

    const worksheet = XLSX.utils.aoa_to_sheet(rows);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, sheetName);
    XLSX.writeFile(workbook, fileName);
}
$(document).ready(function() {
    $('#classification_identifier').change(function() {
        $('#parent_identifier').prop('disabled', $(this).val() !== "");
    });

    $('#parent_identifier').change(function() {
        $('#classification_identifier').prop('disabled', $(this).val() !== "");
    })
    $('#title').keyup(function() {
        var value = $(this).val().toUpperCase();
        value=value.replace(/\s+/g, '-');
        $('#identifier').val(value);
    });

});

