<div class="p-3 d-flex flex-column gap-2">
    <header class="d-flex flex-column">
        <div class="text-center">
            <h1 class="fs-5 fw-bold">STOCK CONTROL</h1>
        </div>
        <div class="d-flex justify-content-between align-items-end">
            <div class="d-flex gap-2 h-fit">
                <button class="btn btn-primary w-fit">New Item</button>
                <div class="d-flex gap-2 h-fit">
                    <input type="text" class="form-control" placeholder="Place Item" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>                      
            </div>
            <form action="" class="">
                @csrf
                <div class="d-flex gap-2 flex flex-content-between align-items-end">
                    <div>
                        <label for="kanban">kanban</label>
                        <input class="form-control" name="kanban" type="text">
                    </div>
                    <div>
                        <label for="kanban">Label</label>
                        <input class="form-control" name="Label" type="text">
                    </div>
                    <button class="btn btn-warning px-2 w-fit">Send</button>
                </div>
            </form>
        </div>
    </header>
    <content class="bg-white p-3 " style="border-radius: 7px">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Plant</th>
                    <th>Customer</th>
                    <th>Code Cus</th>
                    <th>Item</th>
                    <th>Stock</th>
                    <th>Order Now</th>
                    <th>Min</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>BDWA</td>
                    <td>XIMA SEJAHTERAH</td>
                    <td>XIMA</td>
                    <td>VC3321</td>
                    <td>200</td>
                    <td>50</td>
                    <td>15</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end" style="width: 100%">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
            </nav>
        </div>

    </content>    
</div>