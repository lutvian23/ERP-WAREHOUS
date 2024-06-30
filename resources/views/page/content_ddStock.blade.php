<div class="d-flex justify-content-center">
    <div id="cont-dsChart" class="d-flex flex-column gap-2 ">
        {{-- chart level --}}
        <div id="chart-stock">
            <canvas id="myChart-stockLevel"></canvas>
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
</div>





<script>
$.ajax({
    url: "/api/record",
    method: "GET",
    dataType: "JSON",
    success: function(data) {
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


var valueActual = []
var valueDate = []
$.ajax({
    url: "/levelstock/record/data",
    method: "GET",
    dataType: "JSON",
    success: function(data) {

        valueActual = data.map(item => item.Actual)
        valueDate = data.map(item => item.date)

        // Chart Level Stock
        var canvas = document.getElementById("myChart-stockLevel");
        if (canvas) {
            const ctx = canvas.getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: valueDate,
                    datasets: [
                        {
                            label: "Actual Stock",
                            data: valueActual,
                            borderWidth: 1.5,
                            borderColor: "#000000",
                            backgroundColor: "#000000",
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
    }
})



</script>