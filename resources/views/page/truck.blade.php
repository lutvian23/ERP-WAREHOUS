<div class="d-flex flex-column gap-2 p-2" style="height: 100%; width: 100%">
    {{-- button --}}
    <div class="d-flex justify-content-between gap-2">
        <h4 class="fw-bold">TRUCK</h4>
        <div class="d-flex flex-row-reverse gap-2">
            <button id="btn" class="btn">Data Truck</button>
            <button id="btn" class="btn">Record Delivery</button>
        </div>
    </div>

    {{-- Status Truck --}}
    <div class="d-flex gap-4 justify-content-between" style="height: 200px;width: 100%">
        <div class="rounded p-3 text-light d-flex gap-2 justify-content-between align-items-center" style="width: 50%;height: 100%; background-color:#146e00;">
            <div style="width: 50%">
                <h4 class="fw-bold">TRUCK</h4>
                <hr class="border border-opacity-50">
                <div class="d-flex justify-content-between" style="width: 50%">
                    <h5>Deliver</h5> : <nav>5</nav>
                </div>

            </div>
            <div style="width: 50%" class="text-center">
                <p class="" style="font-size: 150px">10</p>
            </div>
        </div>
        <div class="d-flex justify-content-between gap-2" style="width: 50%;height: 100%;">
            <div class="rounded p-2" style="background-color: white; width: 50%; height: 100%">
                <div style="height: 10%">
                    <p>Monthly Delivery</p>
                </div>
                <div class="d-flex align-items-end justify-content-between" style="height: 80%; width: 100%">
                    <p style="font-size: 80px">23</p>
                    <p class="fw-semibold" style="font-size:30px">Orders</p>
                </div>
            </div>
            <div class="rounded p-2" style="background-color: white; width: 50%">
                <div style="height: 10%">
                    <p>Total Delivery</p>
                </div>
                <div class="d-flex align-items-end justify-content-between" style="height: 80%; width: 100%">
                    <p style="font-size: 80px">1223</p>
                    <p class="fw-semibold" style="font-size:30px">Orders</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="d-flex flex-column gap-2 mt-2">
        <div class="d-flex justify-content-between">
            <h4>Planning Delivery</h4>
            <button id="btn" class="btn">Update Planning Delivery</button>
        </div>

        {{-- Table delivery --}}
        <div>
            <table class="table" id="table_delivery">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code Truck</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

<script>
    $('#table_delivery').DataTable()
</script>