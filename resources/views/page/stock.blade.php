@extends('layout.main')
<div class="p-3 d-flex flex-column gap-2">
    <header class="d-flex flex-column">
        <div class="text-center">
            <h1 class="fs-5 fw-bold">STOCK CONTROL</h1>
        </div>
        <div class="d-flex justify-content-between align-items-end">
            <div>
                <button class="btn btn-primary w-fit">New Item</button>
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
    <content>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Plant</th>
                    <th>Customer</th>
                    <th>Code Cus</th>
                    <th>Item</th>
                    <th>Stock</th>
                    <th>Order Now</th>
                </tr>
            </thead>
        </table>
    </content>    
</div>