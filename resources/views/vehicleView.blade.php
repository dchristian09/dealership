@extends('layouts.mainlayout')

@section('page_title')Vehicle Details @endsection

@section('main_content')
    <div class="container-fluid" id="view">
        <h1 class="row justify-content-center display-3" style = "margin-top: -30%">Vehicle Details</h1>
            <div id="details">
                <p>Vehicle Model: {{ $vehicle['model'] }}</p>
                <p>Year: {{ $vehicle['year'] }}</p>
                <p>Passengers: {{ $vehicle['passengers'] }}</p>
                <p>Manufacturer: {{ $vehicle['manufacturer'] }}</p>
                <p>Price: {{ $vehicle['price'] }}</p>
                <p>Owner: <a href="{{ route('customer.show', $vehicle->customer->id) }}">{{ $vehicle->customer->name }}</a></p>
                <p>Vehicle Type: {{ $vehicle['vehicle_type'] }}</p>
                @if($vehicle['vehicle_type'] == 'car') 
                    <p>Fuel Type: {{ $vehicle['fuel_type'] }}</p>
                    <p>Trunk Area: {{ $vehicle['trunk_area'] }}</p>
                @elseif($vehicle['vehicle_type'] == 'motorcycle')                        
                    <p>Luggage Size: {{ $vehicle['luggage_size'] }}</p>
                    <p>Fuel Capacity: {{ $vehicle['fuel_capacity'] }}</p>
                @elseif($vehicle['vehicle_type'] == 'truck')
                    <p>Tire Count: {{ $vehicle['tire_count'] }}</p>
                    <p>Cargo Area:{{ $vehicle['cargo_area'] }}</p>
                @endif
            </div>
        <a href="/vehicle" class="btn btn-primary" id="tombol">Back</a>
    </div>
@endsection