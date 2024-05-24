<div class="bg-body p-3" style="border-radius: 4px">
    <table id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Code Cus</th>
                <th>Customers</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="">Code Cus</label>
          <input type="text" id="editCode_cus" class="input-group">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready( function () { 

        $.ajax({
            url: '/api/customer',
            method: "GET",
            dataType: "JSON",
            success: handlerSuccess,
            error: handlerError,
            complate: handleComplate 
        }); 
        
        // function handling Success
        function handlerSuccess(data) {
            console.log(data)
            $('#myTable').DataTable({
                processing: true,
                serverside: true,
                data: data,
                columns: [
                    { data: 'no', name: "No" },
                    { data: 'code_cus', name: "Code Cus" },
                    { data: 'customer', name: "Customer" },
                    { data: 'alamat', name: "Alamat" },
                    { data: 'email', name: "Email" },
                    { data: null, render: function (data, type, row) {
                        return `
                        <div class="height: 10px;">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="editCustomer(${row.code_cus})">Edit</button>
                        </div>
                        `;
                    } }
                ]
            });
        }

        // function handling Error
        function handlerError(jqXHR, textStatus, errorThrow) {
            $('#content').html(`<p> ${textStatus} </p>`)
        };

        // function handling Complate
        function handleComplate(){ console.log("handle completed") };
          
        // function handling Edit
        function editCustomer(id) {
            $.get(`/customer/${id}/edit`, function(data) {
                console.log(data)
                $('#editCode_cus').val(data.code_cus);
                $('#editCustomer').val(data.customer);
                $('#editAlamat').val(data.alamat);
                $('#editEmail').val(data.email);
            });
        }
    });
      
</script>
