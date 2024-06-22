<div id="cont-dsChart" class="d-flex flex-column gap-2">
    {{-- table under stock --}}
    <div id="stock-underLevel">
        <table class="table" id="myTable-underStock">
            <thead>
                <tr>
                        <th scope="col">Code Parts</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Status</th>
                </tr>
            </thead>
        </table>
    </div>

    <div id="live-transaction">
        <h4>Live Transaction</h4>
        <table class="table" id="table-liveTransaction">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
    
        </table>
    </div>

</div>

{{-- chart level --}}
<div id="chart-stock">
    <canvas id="myChart-stockLevel"></canvas>
</div>


<script>
$.ajax({
    url: "/api/record",
    method: "GET",
    dataType: "JSON",
    success: function(data) {
        console.log(data);
        $("#table-liveTransaction").dataTable({
            lengthChange: false,
            searching: false,
            responsive: true,
            paging: false,
            data: data,
            columns: [
                { data: "item", label: "Item" }, 
                { 
                    data: "status",
                    title: "Status",
                    render: function(data,type,row) {
                        if(data === "IN") {
                            return `<span class='text-primary fw-bold'>${data}</span>`
                        }else {
                            return `<span class='text-danger fw-bold'>${data}</span>`
                        }
                    } 
                } 
            ]
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
    }
})

    
// Table Item Problem
$.ajax({
    url: "/api/status/stock",
    method: "GET",
    dataType: "JSON",
    success: function(data) {
        $("#myTable-underStock").dataTable({
            info: false,
            lengthChange: false,
            searching: false,
            data: data,
            columns: [
                {data: "id_item",label: "Code Parts"},
                {data: "stock",label: "Stock"},
                {data: "status",label: "Status"}
            ]
        })
    }
})


// Chart Level Stock
var canvas = document.getElementById("myChart-stockLevel");
if (canvas) {
    const ctx = canvas.getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "1/06/24",
                "2/06/24",
                "3/06/24",
                "4/06/24",
                "5/06/24",
                "6/06/24",
                "7/06/24",
                "8/06/24",
                "9/06/24",
                "10/06/24",
                "11/06/24",
                "12/06/24",
                "13/06/24",
                "14/06/24",
                "15/06/24",
            ],
            datasets: [
                {
                    label: "Actual Stock",
                    data: [
                        1.4, 3.1, 2, 1, 2.3, 1.3, 5, 2, 3, 1.3, 2.1, 2.3, 4,
                        1, 3.1,
                    ],
                    borderWidth: 1.5,
                    borderColor: "#000000",
                    backgroundColor: "#000000",
                },
                {
                    label: "Standar Stock",
                    data: [
                        1.5, 3, 3, 2, 2.5, 1, 3, 2.5, 2, 1, 2.5, 2, 4.2, 3,
                        3.5,
                    ],
                    borderWidth: 1.5,
                    borderColor: "#FF0000",
                    backgroundColor: "#FF0000",
                    borderDash: [10, 5],
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
} else {
    console.log("terjadi kesalahan");
}

</script>