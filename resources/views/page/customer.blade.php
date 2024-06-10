<div class="bg-body p-3" style="border-radius: 4px">
    <button type="button" class="btn btn-primary py-2" data-bs-toggle="modal" data-bs-target="#addModal">add Customer</button>
    <table id="myTable" class="table table-hover">
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
<div class="modal fade" id="update_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Customer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateData">
          @csrf
          <div id="alert_danger_update" class="alert alert-danger d-none" role="alert">
            <ul>

            </ul>
          </div>
          <div class="modal-body">
              <label for="editCode_Cus">Code Cus</label>
              <input disabled name="editCode_Cus" type="text" id="editCode_Cus" class="form-control">
              <label for="editName_Cus">Customer</label>
              <input name="editName_Cus" type="text" id="editName_Cus" class="form-control">
              <label for="editAlamat_Cus">Alamat</label>
              <input name="editAlamat_Cus" type="text" id="editAlamat_Cus" class="form-control">
              <label for="editEmail_Cus">Email</label>
              <input name="editEmail_Cus" type="text" id="editEmail_Cus" class="form-control">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
      </div>
    </div>
  </div>

<!-- Modal ADD -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Customer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addCustomer">
          <div class="alert alert-danger d-none align-items-center" role="alert">
            <ul>

            </ul>
          </div>
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

  {{-- DELETE MODAL --}}
<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        apakah kamu yakin ingin mengapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" onclick="confirmDel()" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  function alertSuccess(message) {
    $('#alert_success').append(`
      <div class="alert alert-primary alert-dismissible fade show" id="alert_success" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `)
  }

  var token = $('meta[name="csrf-token"]').attr('content')

  // EDIT DATA
  function editCustomer(code_cus) {
    $.ajax({
      url:'/customer/' + code_cus + '/edit',
      method: 'GET',
      dataType: 'JSON',
      success: function(data) {
        $('#editCode_Cus').val(data.code_cus),
        $('#editName_Cus').val(data.customer),
        $('#editAlamat_Cus').val(data.alamat),
        $('#editEmail_Cus').val(data.email)
      }
    })
  }




  $(document).ready( function () { 

  // UPDATE DATA 
  $('#updateData').on('submit',function(e) {
    e.preventDefault()

    var code_cus = $('#editCode_Cus').val()
    var customer = $('#editName_Cus').val()
    var email = $('#editEmail_Cus').val()
    var alamat = $('#editAlamat_Cus').val()

    $.ajax({
      url: '/customer/' + code_cus + '/update',
      method: 'PUT',
      data: {
        customer: customer,
        email: email,
        alamat: alamat,
        _token: token
      },
      success:function(response) {
        if(response.errors) {
          $('#alert_danger_update').removeClass('d-none')
          $.each(response.errors, function(key,value) {
            $('#alert_danger_update').append("<li>"+value+"</li>")
          }) 
        }else{

          $('#update_modal').modal('hide')
          $('#content').load('/customer')
        }

      },
      error:function(jqXHR,textStatus,errorThrow) {
        console.log(textStatus)
      }
    })
  })

    
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
        address: $("#add_Address").val(),
        _token: token
      },
      success:function (response) {
        if(response.errors) {
          
          $(".alert-danger").removeClass("d-none")
          $.each(response.errors, function(key,value) {
            $(".alert-danger").append("<li>"+value+"</li>")
          })
          
          $("#addCustomer")[0].reset()

          }else{
            $("#addCustomer")[0].reset()
            $("#content").load("/customer")
            $("#addModal").modal('hide')
            alertSuccess(response.success)
          }
      },
      error: function(jqXHR,textStatus,errorThrow) {
        $("#content").html(`<p>${textStatus}</p>`)
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
          { data: 'code_cus', render: function (data, type, row) {
              return `
              <div class="d-flex gap-2">
                <div class="height: 10px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_modal" onclick="editCustomer('${data}')">Edit</button>
                </div>
                <div class="height: 10px;">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal" onclick="deleteCustomer('${data}')">Delete</button>
                </div>
              </div>
              `;
            } 
          }
        ]
      });
    }

    // function handling Error
    function handlerError(jqXHR, textStatus, errorThrow) {
        $('#content').html(`<p> ${textStatus} </p>`)
    };

    // function handling Complate
    function handleComplate(){ console.log("handle completed") };
  });


  var code_CustomerForDelete
  function deleteCustomer(code_cus) {
    code_CustomerForDelete = code_cus
  }

  function confirmDel() {
    $('#delete_modal').modal('hide')
    $.ajax({
      url: '/customer/'+code_CustomerForDelete+'/delete',
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': token
      },
      success:function(response) {
        if(response.errors) {
          console.log(response.errors)
        }else{ 
          $('#content').load('/customer')
          alertSuccess(response.success)
        }
      }
    })
  }
      
</script>
