<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    //create
    public function customerCreate(Request $request)
    {
        // return $request;
        try {
            $request->validate([
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',

            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        Customer::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        return 'Customer ' . $request->name . ' fue agregada exitosamente';
    }
    //update
    public function customerUpdate($id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->save();

        return 'Customer ' . $request->name . ' fue actualizada exitosamente';
    }
    //delete
    public function customerDelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return 'Customer ' . $customer->name . ' fue eliminada exitosamente';
    }
}