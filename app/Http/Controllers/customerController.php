<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        return view('page/customer');
    }

    public function customer_data()
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
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code_cus' => 'required|unique:customers,code_cus',
                'customer' => 'required',
                'email' => 'required|unique:customers,email',
                'address' => 'required'
            ],
            [
                'code_cus.required' => 'Code Customer Harus diisi',
                'code_cus.unique' => 'Code Customer sudah digunakan',
                'customer.required' => 'Customer harus diisi',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email sudah digunakan',
                'address.required' => 'Alamat harus digunakan',
            ]
        );

        $dataInput = [
            'code_cus' => $request->code_cus,
            'customer' => $request->customer,
            'email' => $request->email,
            'alamat' => $request->address,
        ];
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $customer = $this->customer->make($dataInput);
            $customer->save();
            return response()->json(['message' => "success"]);
        }
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
