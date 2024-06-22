<div class="p-3 d-flex flex-column gap-2">

    <content class="bg-white p-3 " style="border-radius: 7px">
        <table class="table table-dark table-striped" id="table_list_stock">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Parts</th>
                    <th>Racks</th>
                    <th>Code Parts</th>
                    <th>SKU</th>
                    <th>Stock</th>
                </tr>
            </thead>

        </table>

    </content>    
</div>

<script>
    $.ajax({
        url: "/items/api",
        method: "GET",
        dataType: "JSON",
        success:function (data) {
            $("#table_list_stock").DataTable({
                processing: "true",
                serverside: "true",
                paging: "false",
                lengthChange: "false",
                data: data,
                columns: [
                    {data: "no", label: "No"},
                    {data: "name_items", label: "Name Parts"},
                    {data: "rack_items", label: "Racks"},
                    {data: "id_items", label: "Code Parts"},
                    {data: "SKU", label: "SKU"},
                    {data: "stock", label: "Stock"},

                ]
            })
        }
    })
    
</script>