
<div class="d-flex flex-column gap-2" id="container-dashboardStock">
    <div class="d-flex gap-2">
        <button id="btn" class="btn" onclick="pageLinkStock('/home/stock')">
            <img src="home.png" alt="" width="25px">
        </button>
        <button id="btn" class="btn" onclick="pageLinkStock('/stock/list')">Stock</button>
        <button id="btn" class="btn" onclick="pageLinkStock('/adjustlevel')">Update Level Stock</button>
    </div>

    
<div id="dashboard_stock_content">

</div>
<script>
function pageLinkStock(url) {
    $.ajax({
        url: url,
        method: "GET",
        success:function(response) {
            $("#dashboard_stock_content").html(response)
        },
        error:function(jqXHR,textStatus,errorThrow) {
            console.log(`error on index dashboardstock ${textStatus}`)
        }
    })
}

</script>