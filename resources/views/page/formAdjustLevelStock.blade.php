<div id="container_formLevelstock" style="display:flex; flex-direction: column; gap-2">

    <div style="display: flex; justify-content: space-between; padding: 8px; align-items: center; background-color: white; border-radius: 10px 10px 0 0">        
        <div style="padding: 12px; display: flex; flex-direction: column; width: 370px; text-align:center">
            <h3>FORM LEVEL STOCK</h3>

            {{-- input id and date --}}
            <div style="display: flex">
                <div style="padding: 8px;">
                    <input type="number" class="form-control" id="noLevelStock" placeholder="id" autocomplete="none">
                </div>
                <div style="padding: 8px;">
                    <input type="date" required class="form-control" id="dateLevelStock">
                </div>
            </div>

        </div>

        {{-- action btn  --}}
        <div class="d-flex gap-4">
            <button id="btn" style="border-radius: 70%; padding: 8px; background-color: red !important" class="btn" onclick="clearProblemStock()"><img src="/trash.png" alt="" width="40"></button>
            <button data-bs-target="#modalAddProblem" data-bs-toggle="modal" id="btn" style="border-radius: 70%; padding: 8px" class="btn"><img src="/add.png" alt="" width="40" class="img-rotate"></button>
            <button id="btn" style="border-radius: 70%; padding: 10px; background-color: blue !important" class="btn" onclick="addLevelStock()"><img src="/save.png" alt="" width="40"></button>
        </div>

    </div>

    {{-- table stock problem --}}
    <table class="table table-striped table-hover" id="table_stockProblem" style="margin-top: 8px">
        <thead>
            <tr>
                <th>Code Parts</th>
                <th>Actual</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="modalAddProblem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Problem</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="actualProblem" class="form-label">Code part</label>
                <select id="selectCodeparts" class="form-select" aria-label="Default select example">
                    <option selected>-</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="actualProblem" class="form-label">Actual</label>
                <input type="number" class="form-control" id="actualProblem" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="remarkProblem" class="form-label">Remark</label>
                <textarea class="form-control" id="remarkProblem" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addProblemStock()">Submit</button>
        </div>
        </div>
    </div>
</div>

<script>

    var today = new Date()
    var yesterday = new Date(today)
    yesterday.setDate(today.getDate() - 1)
    var dd = String(yesterday.getDate()).padStart(2,'0') // Day
    var mm = String(yesterday.getMonth()).padStart(2,'0') // Month
    var yyyy = yesterday.getFullYear()
    $('#dateLevelStock').val(yyyy + '-' + mm + '-' + dd)

    // data for input select -> code part
    $.ajax({
        url: "items/api",
        method: "GET",
        dataType: "JSON",
        success:function(data) {
            for(const nameCodeParts of data) {
                $('#selectCodeparts').append(`<option value=${nameCodeParts.id_items}>${nameCodeParts.id_items}</option>`)
            }
        }
    })

    // array place for one of item problem
    var problemStock = []

    // for every refresh can push data to array public
    var itemProblem = localStorage.getItem('problemStock')
    if(itemProblem) {
        problemStock.push(...JSON.parse(itemProblem))
    }

    // func clear localstorage problemStock
    function clearProblemStock() {
        localStorage.removeItem('problemStock')
        $('#content').load('/stock', function() {
            $('#dashboard_stock_content').load('/form/levelStock')
        })
    }

    // func handle data send to table table_stockProblem
    function tableProblemStock() {
        $('#table_stockProblem').dataTable({
            lengthChange: false,
            searching: false,
            paging: false,
            data: problemStock,
            columns:[
                {data: "codePartProblem", label: "Code Parts"},
                {data: "actualPorblem", label: "Actual"},
                {data: "remarkProblem", label: "Remark"},
                {
                    data: "codePartProblem", 
                    label: "Action",
                    render: function(data,type,row) {
                        return `
                        <button class="btn btn-danger" onclick="delStockProblem('${data}')">Hapus</button>
                        `
                    }
                },
            ]
        })
    }

    // func delete code part in array/localstorage
    function delStockProblem(code_part) {
        var valueFind = problemStock.findIndex(itemProblem => itemProblem.codePartProblem === code_part)
        problemStock.splice(valueFind, 1)
        localStorage.setItem('problemStock', JSON.stringify(problemStock))
        $('#content').load('/stock', function() {
            $('#dashboard_stock_content').load('/form/levelStock')
        })
    }
    
    // call for run when page refresh
    tableProblemStock()

    // func add code part to push in localstorage
    function addProblemStock() {
        
        var idLevelStock = $('#noLevelStock').val()
        var date = $('#dateLevelStock').val()
        var code_part = $('#selectCodeparts').val()
        var actual = $('#actualProblem').val()
        var remark = $('#remarkProblem').val()
        problemStock.push({id_LevelStock: idLevelStock, codePartProblem: code_part, actualPorblem: actual, remarkProblem: remark})
        localStorage.setItem('problemStock', JSON.stringify(problemStock))
        $('#modalAddProblem').modal("hide")
        $('#content').load('/stock', function() {
            $('#dashboard_stock_content').load('/form/levelStock')
        })
    }

    // get number levelStock
    $.ajax({
        url: "/idLevelStock",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#noLevelStock').val(data.id_levelStock)
        }
    })

    // func add detail problem to database
    function addDetailLevelStock() {
        for(const valueDetailProblem of problemStock) {
            $.ajax({
                url : "/detailproblem/add",
                method: "POST",
                dataType: "JSON",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                data: {
                    id_levelStock: valueDetailProblem.id_LevelStock,
                    code_part: valueDetailProblem.codePartProblem,
                    actual: valueDetailProblem.actualPorblem,
                    remark: valueDetailProblem.remarkProblem
                },
                success: function(response) {
                    if(response.error) {
                        console.log(response.error)
                    }else{
                        console.log(response.success)
                        localStorage.removeItem("problemStock")
                        $('#content').load('/stock', function() {
                            $('#dashboard_stock_content').load('/adjustlevel')
                        })
                    }
                },
                error: function (jqXHR,textStatus,errorThrow) {
                    console.log(textStatus)
                }
            })
        }
    }

    // func add levelStock to database
    function addLevelStock() {
        var id_levelStock = $('#noLevelStock').val()
        var dateLevelStock = $('#dateLevelStock').val()
        $.ajax({
            url: "/levelstock/add",
            method: "POST",
            dataType: "JSON",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: {
                id_levelStock: id_levelStock,
                date: dateLevelStock
            },
            success: function(response) {
                if(response.error) {
                    console.log(response.error)
                }else{
                    console.log(response.success)
                    addDetailLevelStock()
                }
            },
            error: function(jqXHR,textStatus,errorThrow) {
                console.log(textStatus)
            }
        })

    
    }
</script>