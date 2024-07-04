<div class="d-flex flex-column p-2 gap-2">
    <div class="d-flex justify-content-between">
        <h3 class="fw-bold">PRODUCT</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
            Tambah Product
        </button>
    </div>
    
    <div class="bg-light p-3 rounded">
        <table class="table table-hover" id="table_product">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Code Customer</th>
                <th scope="col">Part Number</th>
                <th scope="col">Item</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_productAdd">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="part_number" class="form-label">Part Number</label>
                        <input type="number" class="form-control" id="part_number">
                    </div>
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">Code Customer</label>
                        <select class="form-select" id="id_customer">
                            <option selected>-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_item" class="form-label">Item</label>
                        <input type="text" class="form-control" id="id_item">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_productAdd">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="part_number" class="form-label">Part Number</label>
                        <input type="number" class="form-control" id="part_number_edit">
                    </div>
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">Code Customer</label>
                        <select class="form-select" id="id_customer_edit">
                            <option selected>-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_item" class="form-label">Item</label>
                        <input type="text" class="form-control" id="id_item_edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    // func add data product
    $('#form_productAdd').on("submit",function(e) {
        e.preventDefault()
        $.ajax({
            url:"/product/add",
            method: "POST",
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: {
                part_number: $('#part_number').val(),
                id_customer: $('#id_customer').val(),
                id_item: $('#id_item').val()
            },
            success:function(response) {
                if(response.error) {
                    console.log(response.error)
                }else {
                    $("#modalAdd").modal("hide")
                    $("#content").load("/product")
                    console.log(response.success)
                }
            },
            error: function(textStatus) {
                console.log(textStatus)
            }
        })
    })
    
    var idCustomer = []



        // $.ajax({
        //     url:any,
        //     method: "PUT",
        //     headers: {
        //         "X-CSRF-TOKEN": token,
        //     },
        //     data: [
        //         {
        //             id_product: $('#id_product').val(),
        //             id_customer: $('#id_customer').val(),
        //             id_item: $('#id_item').val()
        //         }
        //     ],
        //     success:function(response) {
        //         if(response.error) {
        //             console.log(response.error)
        //         }else {
        //             console.log(response.success)
        //         }
        //     },
        //     error: function(textStatus) {
        //         console.log(textStatus)
        //     }

        // })

    // func delete product
    async function deleteProduct(data) {
        $.ajax({
            url: "/product/destroy/" + data,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success:function(response) {
                if(response.error) {
                    console.log(response.error)
                }else {
                    $('#content').load('/product')
                    console.log(response.success)
                }
            },
            error: function(textStatus) {
                console.log(textStatus)
            }

        })
    }

    // Get data Product and place to table
    $.ajax({
        url: "/product/data",
        method: "GET",
        dataType: "JSON",
        success: function(data) {

            for(const item of data.customer) {
                idCustomer.push(item)
            }
            // select option value
            for(const selcOption of data.customer) {
                $("#id_customer").append(` <option value=${selcOption}>${selcOption}</option> `)
            }
                
            // handle part number
            $("#part_number").val(data.part_number)
            $('#table_product').dataTable({
                reponsive:true,
                data: data.product,
                columns: [
                    {data: "no", label: "No"},
                    {data: "id_product", label: "Code Customer"},
                    {data: "id_customer", label: "Part Number"},
                    {data: "id_item", label: "Item"},
                    {
                        data: "id_product",
                        label: "Action",
                        render: function(data,type,row) {
                            return `
                                <button onclick="editProduct('${data}')" type="button" class="btn btn-primary">Edit</button>
                                <button onclick="deleteProduct('${data}')" type="button" class="btn btn-danger">Delete</button></button>
                            `
                        }
                    }
                ]
            })

        }
    })

    // func edit product
    async function editProduct(data) {
        $.ajax({
            url: "/product/" + data + "/edit",
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function(response) {
                if(response.error) {
                    console.log(response.error)
                }else {
                    $('#part_number_edit').val(response.success.part_number)
                    $('#id_item_edit').val(response.success.id_item)
                    $('#id_customer_edit').val(response.success.id_customer)

                    // $('#id_customer_edit').append(` <option value=${response.success.id_customer}>${response.success.id_customer}</option> `)
                    for(const editSelcOption of idCustomer) {
                        $('#id_customer_edit').append(` <option value=${editSelcOption}>${editSelcOption}</option> `)
                    }
                    $("#modalEdit").modal('show')
                }
            }
        })
    }

</script>
