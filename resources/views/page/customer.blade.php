<div class="bg-body p-3" style="border-radius: 4px">
    <button type="button" class="btn btn-primary py-2" data-bs-toggle="modal" data-bs-target="#addModal">add Customer</button>
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

<!-- Modal EDIT -->
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

<!-- Modal ADD -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addCustomer">
            @csrf
            <div class="modal-body">
              <label for="">Code Cus</label>
              <input type="text" id="add_codeCus" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
              <label for="">Customer</label>
              <input type="text" id="add_Cuss" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
              <label for="">Email</label>
              <input type="email" id="add_Email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
              <label for="">Address</label>
              <input type="text" id="add_Address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<script>
$(document).ready( function () { 

    //Add Customer
    $('#addCustomer').on('submit',function (e) {
        e.preventDefault()
        $.ajax({
            url: '/customer/add',
            method: 'POST',
            dataType: 'JSON',
            data: {
              code_cus: $("#add_codeCus").val(),
              email: $("#add_Email").val(),
              customer: $("#add_Cuss").val(),
              address: $("#add_Address").val()
            },
            success:function (response) {
              console.log(response)
            }
        })
    })

    
    //Get data API to table
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
