/**
 once a wise man told you need to work hard !!!
 * **/

$(function () {

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
    $("#edit_ledger_type").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const identifier = link.data("identifier");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #identifier").val(identifier);
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
});

$(document).ready(function() {
    $('#classification_identifier').change(function() {
        $('#parent_identifier').prop('disabled', $(this).val() !== "");
    });

    $('#parent_identifier').change(function() {
        $('#classification_identifier').prop('disabled', $(this).val() !== "");
    })

    $(document).on('keyup', '#title', function() {
        var value = $(this).val().toUpperCase();
        value = value.replace(/\s+/g, '-');
        $('#identifier').val(value);
    });

});
$("#addCr").on("click", function () {
    document.getElementById('addCrBox').innerHTML+=`<div class="col-6">
                        <div class="form-group">
                            <label for="vno">Cr</label>
                            <select class="form-control">
                                <option>sdfsd</option>
                                <option>sdfshikb</option>
                                <option>no</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount"  autocomplete="off">
                        </div>
                    </div>`
});
$("#addLedger").on("click", function () {
    document.getElementById('addLedgerBox').innerHTML+=`<div class="col-6">
                       <div class="col-3">
                            <div class="form-group">
                                <label for="vno">Dr/Cr</label>
                                <select class="form-control">
                                    <option>Dr</option>
                                    <option>Cr</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="vno">Ledgers</label>
                                <select class="form-control">
                                    <option>zdadf</option>
                                    <option>Cr</option>
                                    <option>Cradf</option>
                                    <option>aaaCr</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount"  autocomplete="off">
                            </div>
                        </div>`
});
$("#addCrNoteSales").on("click", function () {
    document.getElementById('addCrNoteSalesBox').innerHTML+=`<div class="col-6">
                            <div class="form-group">
                                <label for="vno">Dr</label>
                                <select class="form-control">
                                    <option>sdfsd</option>
                                    <option>sdfshikb</option>
                                    <option>no</option>
                                </select>
                            </div>
                        </div>`
});
$("#addDrNote").on("click", function () {
    document.getElementById('addDrNoteBox').innerHTML+=`<div class="col-6">
                            <div class="form-group">
                                <label for="vno">Dr</label>
                                <select class="form-control">
                                    <option>sdfsd</option>
                                    <option>sdfshikb</option>
                                    <option>no</option>
                                </select>
                            </div>
                        </div>`
});

