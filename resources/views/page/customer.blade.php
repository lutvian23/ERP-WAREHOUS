
<div class="bg-body p-3" style="border-radius: 4px">
    <button type="button" class="btn btn-primary py-2" data-bs-toggle="modal" data-bs-target="#addModalCustomer">add Customer</button>
    <table id="myTable-customer" class="table table-hover">
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
<div class="modal fade" id="update_modalCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  <div class="modal fade" id="addModalCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<script src="customer.js"></script>