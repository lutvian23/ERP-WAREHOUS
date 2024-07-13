<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\rotation;
use App\Models\truck;
use Illuminate\Http\Request;

class truckController extends Controller
{

    protected $rotation;
    public function __construct()
    {
        $this->rotation = new rotation();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_delivery = $this->rotation->deliverydata();
        $data_delivery = $data_delivery->map(function($data_delivery,$index) {
            return [
                "no" => $index + 1,
                "id_rotation" => $data_delivery->id_rotation,
                "code_customer" => $data_delivery->code_cus,
                "code_truck" => $data_delivery->code_truck,
                "alamat" => $data_delivery->alamat,
                "date" => $data_delivery->date,
                "status" => $data_delivery->status
            ];
        });
        // dd($data_delivery);

        $order = rotation::where('status', "delivered")->get();
        $order = $order->isEmpty() ? 0 : count($order);
        $truck = truck::all();
        $customer = customer::all();
        $hasil = count($truck);
        $rotation = $this->rotation->addressRotation();
        $month_delivery = $this->rotation->monthDelivery();
        $arrayRotate = $rotation->map(function($rotation,$index) {
            return [
                "no" => $index + 1,
                "code_truck" => $rotation->code_truck,
                "alamat" => $rotation->alamat,
                "date" => $rotation->date,
                "status" => $rotation->status
            ];
        });
        return response()->json([
            "data_delivery" => $data_delivery,
            "data_truck" => ["truck" => $truck,"customer" => $customer],
            "truck" => $hasil,
            "order" => $order, 
            "rotation" => $arrayRotate,
            "monthly_delivered" => $month_delivery
        ]);
        
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
        rotation::create([
            "code_truck" => $request->code_truck,
            "code_customer" => $request->code_customer,
            "date" => $request->date,
            "status" => "processing"
        ]);
        return response()->json(["success" => "data ditambahkan"],200);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}