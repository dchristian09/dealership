<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //To call vehicle list
    public function index()
    {
        $active_customer = "";
        $active_vehicle = "active";
        $vehicles = Vehicle::all();
        return view('vehicle', compact('vehicles', 'active_customer', 'active_vehicle'));
    }

    //To move into vehicle create page
    public function create()
    {
        $customers = Customer::all();
        $active_customer = "";
        $active_vehicle = "active";
        $vehicles = Vehicle::all();

        return view('vehicleCreate', compact('customers', 'vehicles', 'active_customer', 'active_vehicle'));
    }

    //To add vehicle data to database
    public function store(Request $request)
    {
        Vehicle::create([
            'model' => $request->model,
            'year' => $request->year,
            'passengers' => $request->passengers,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'customer_id' => $request->customer_id,
            'vehicle_type' => $request->vehicle_type,
            'fuel_type'=> $request->fuel_type,
            'trunk_area'=> $request->trunk_area,
            'tire_count'=> $request->tire_count,
            'cargo_area'=> $request->cargo_area,
            'luggage_size'=> $request->luggage_size,
            'fuel_capacity'=> $request->fuel_capacity,
        ]);

        return redirect()->route('vehicle.index')->with('success', 'Vehicle created successfully');
    }
    //To show specific vehicle data
    public function show($id)
    {
        $active_customer = "";
        $active_vehicle = "active";
        $vehicle = Vehicle::where('id', $id)->first();
        return view('vehicleView', compact('vehicle', 'active_customer', 'active_vehicle'));
    }

    //To move into vehicle edit page
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $active_customer = "";
        $active_vehicle = "active";
        $customer = Customer::all();
        return view('vehicleEdit', compact('vehicle', 'customer','active_customer', 'active_vehicle' ));
    }

    //To update vehicle data into database
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
            'model' => $request->model,
            'year' => $request->year,
            'passengers' => $request->passengers,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'customer_id' => $request->customer_id,
            'vehicle_type' => $request->vehicle_type,
            'fuel_type' => $request->fuel_type,
            'trunk_area' => $request->trunk_area,
            'luggage_size' => $request->luggage_size,
            'fuel_capacity' => $request->fuel_capacity,
            'tire_count' => $request->tire_count,
            'cargo_area' => $request->cargo_area,
        ]);


        return redirect()->route('vehicle.index')->with('success', 'Vehicle updated successfully');
    }

    //To delete vehicle data from database
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicle.index')->with('success', 'Vehicle deleted successfully');
    }
}
