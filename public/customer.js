//Get data API to table

$.ajax({
    url: "/api/customer",
    method: "GET",
    serverside: true,
    dataType: "JSON",
    success: function (data) {
        $("#myTable-customer").DataTable({
            processing: true,
            serverside: true,
            lengthChange: false,
            data: data,
            columns: [
                { data: "no", name: "No" },
                { data: "code_cus", name: "Code Cus" },
                { data: "customer", name: "Customer" },
                { data: "alamat", name: "Alamat" },
                { data: "email", name: "Email" },
                {
                    data: "code_cus",
                    render: function (data, type, row) {
                        return `
        <div class="d-flex gap-2">
        <div class="height: 10px;">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_modalCustomer" onclick="editCustomer('${data}')">Edit</button>
        </div>
        <div class="height: 10px;">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal" onclick="deleteCustomer('${data}')">Delete</button>
        </div>
        </div>
        `;
                    },
                },
            ],
        });
    },
});

var customerId;
function deleteCustomer(data) {
    customerId = data;
}

function confirmDel() {
    $.ajax({
        url: "/customer/" + customerId + "/delete",
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        success: function (response) {
            if (response.errors) {
                console.log(response.errors);
            } else {
                $("#delete_modal").modal("hide");
                $("#content").load("/customer");
                alertSuccess(response.success);
            }
        },
    });
}

$("#addCustomer").on("submit", function (e) {
    e.preventDefault();
    var code_cus = $("#add_codeCus").val();
    var customer = $("#add_Cuss").val();
    var email = $("#add_Email").val();
    var alamat = $("#add_Address").val();
    $.ajax({
        url: "/customer/add",
        method: "POST",
        dataType: "JSON",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            code_cus: code_cus,
            customer: customer,
            email: email,
            alamat: alamat,
        },
        success: function (response) {
            if (response.errors) {
                console.log(response.errors);
                $.each(response.errors, function (key, value) {
                    $("#addCustmer").append(`<li>${value}</li>`);
                });
            } else {
                $("#content").load("/customer");
                $("#addCustomer")[0].reset();
                $("#addModalCustomer").modal("hide");
                alertSuccess(response.success);
                console.log("selesai");
            }
        },
    });
});

function editCustomer(data) {
    $.ajax({
        url: "/customer/" + data + "/edit",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            $("#editCode_Cus").val(data.code_cus);
            $("#editName_Cus").val(data.customer);
            $("#editAlamat_Cus").val(data.alamat);
            $("#editEmail_Cus").val(data.email);
        },
    });
}

$("#updateData").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        url: "/customer/" + $("#editCode_Cus").val() + "/update",
        method: "PUT",
        dataType: "JSON",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            customer: $("#editName_Cus").val(),
            alamat: $("#editAlamat_Cus").val(),
            email: $("#editName_Cus").val(),
        },
        success: function (response) {
            if (response.errors) {
                $.each(response.errors, function (key, value) {
                    $("#alert_danger_update").append(`<li>${value}</li>`);
                });
            } else {
                $("#update_modalCustomer").modal("hide");
                $("#addCustomer")[0].reset();
                $("#content").load("/customer");
                alertSuccess(response.success);
            }
        },
    });
});
