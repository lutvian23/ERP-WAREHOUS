<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\TryCatch;

class customerController extends Controller
{
    protected $customer;
    public function __construct()
    {
        $this->customer = new customer();
    }
    public function index()
    {
        $customers = $this->customer->all();
        $data = $customers->map(function ($customer, $index) {
            return [
                'no' => $index + 1,
                'code_cus' => $customer->code_cus,
                'customer' => $customer->customer,
                'alamat' => $customer->alamat,
                'email' => $customer->email
            ];
        });
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = $this->customer->where('code_cus', $id)->firstOrFail();
        return response()->json($customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customers = $this->customer->find($request->code_cus);
        $customers->update($request->all());
        return response()->json(['message' => 'Customer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->customer->destroy($id);
    }
}
