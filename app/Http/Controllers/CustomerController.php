<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //To call customer list
    public function index()
    {
        $active_customer = "active";
        $active_vehicle = "";
        $customer = Customer::all();
        return view('customer', compact('customer', 'active_customer', 'active_vehicle'));
    }

    //To move into customer create page
    public function create()
    {
        $active_customer = "active";
        $active_vehicle = "";
        return view('customerCreate', compact('active_customer', 'active_vehicle'));
    }

    //To add customer data to database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'id_card' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    //To show specific customer data
    public function show($customer)
    {
        $active_customer = "active";
        $active_vehicle = "";
        $vehicle = Vehicle::all();
        $customer = Customer::where('id', $customer)->first();
        return view('customerView', compact('customer', 'vehicle', 'active_customer', 'active_vehicle'));
    }

    //To move into customer edit page
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customerEdit', compact('customer'));
    }

    //To update customer data into database
    public function update(Request $request, $id)
    {

        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->id_card,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }

    //To delete customer data from database
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
    }
}

