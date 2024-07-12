<div style="" class="d-flex flex-column gap-2">
    <div class="d-flex justify-content-between">
        <h4 class="fw-semibold">PLANNING DELIVERY</h4>
        <button id="btn" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddData">Tambah data</button>
    </div>
    <div class="p-3 bg-light rounded">    
        <table class="table" id="tbl_historyDeliver">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code Truck</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Planning</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="code_truck" class="form-label">Code Truck</label>
            <input type="text" class="form-control" id="code_truck">
        </div>
        <div class="mb-3">
            <label for="code_customer" class="form-label">Code Customer</label>
            <input type="text" class="form-control" id="code_customer">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="date">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
    </div>
    </div>
</div>
</div>

<script>

    $(document).ready(function() {
        $.ajax({
            url: "/truck/data",
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $('#tbl_historyDeliver').dataTable({
                    lengthChange:false,
                    data: data.data_delivery,
                    columns: [
                        {data: "no", label: "No"},
                        {data: "code_truck", label: "Code Truck"},
                        {data: "alamat", label: "Tujuan"},
                        {data: "date", label: "Waktu"},
                        {
                            data: "status", 
                            label: "Status",
                            render: function(data,row,type) {
                                switch (data) {
                                    case "processing":
                                        return `<span style="color: #0004FF">${data}</span>`
                                    break;
                                    case "shipped":
                                        return `<span style="color: #00FF2A">${data}</span>`
                                    break;
                                    case "delivered":
                                        return `<span style="color: #DCDCDC">${data}</span>`
                                    break;
                                    default:
                                        return `<span style="color: #D80303">${data}</span>`
                                    break;
                                }
                            }
                        },
                        {
                            data: "id_rotation", 
                            label: "Action",
                            render: function(data,row,type) {
                                return ` <button class="btn btn-sm btn-warning">Edit</button>`
                            }
                        },
                    ]
                })
            }
        })
    })

</script>