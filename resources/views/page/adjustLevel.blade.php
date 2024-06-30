<div id="container_tableAdjust">
    <!-- Button trigger modal -->
<button id="btn" class="btn" onclick="pageLinkStock('/form/levelStock')">Adjust Stock Level</button>


    <table class="table table-hover" id="table_adjuststock">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>



<script>
    $.ajax({
        url: "/levelstock/record/data",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#table_adjuststock').dataTable({
                lengthChange: false,
                responsive: true,
                data: data,
                columns: [
                    {data: "id_levelStock",label: "No" },
                    {data: "date",label: "Date" },
                    {data: "Actual",label: "Total" },
                    {
                        data: "id_levelStock",
                        label: "Date",
                        render: function(data,row,type) {
                            return `<button class="btn btn-danger" onclick="destroyLevelStock('${data}')">Hapus</button>`
                        }
                    },
                ]
            })
        }
    })

    function destroyDetailLevelStock(id_levelStock) {
        $.ajax({
            url: "/detaillevelstock/destroy/"+id_levelStock,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function(response) {
                if(response.error) {
                    console.log(response.error)
                }else {
                    console.log(response.success)
                    $('#content').load('/stock', function() {
                        $('#dashboard_stock_content').load('/adjustlevel')
                    })
                }
            },
            error:function(textStatus) {
                console.log(textStatus)
            }
        })
    }

    function destroyLevelStock(id_levelStock) {
        $.ajax({
            url: "/levelstock/destroy/"+id_levelStock,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function(response) {
                if(response.error) {
                    console.log(response.error)
                }else {
                    console.log(response.success)
                    destroyDetailLevelStock(id_levelStock)
                }
            },
            error:function(textStatus) {
                console.log(textStatus)
            }
        })
    }

</script>