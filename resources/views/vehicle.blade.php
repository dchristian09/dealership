@extends('layouts.mainlayout')

@section('page_title')Vehicle @endsection

@section('main_content')
<div class="container-fluid">
    <br>
    <h1 class="display-4">Vehicle</h1>

    <div class="text-left" id="create">
        <a class="btn btn-success pull-left" href="{{ route('vehicle.create') }}">Add Vehicle</a>
    </div>

    <table class="table table-striped table-primary table-hover table-container" >
        <thead>
            <th> No </th>
            <th> Model </th>
            <th> Year </th>
            <th> Passengers </th>
            <th> Manufacturer </th>
            <th> Price </th>
            <th> Owner </th>
            <th> Vehicle Type </th>
            <th> Criteria 1 </th>
            <th> Criteria 2 </th>
            <th class="d-flex justify-content-center"> ACTIONS </th>
        </thead>
        <tbody>
            @php 
            $i = 1 
            @endphp
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $i }}</td>
                    @php 
                    $i++ 
                    @endphp
                    <td>{{ $vehicle['model'] }}</td>
                    <td>{{ $vehicle['year'] }}</td>
                    <td>{{ $vehicle['passengers'] }}</td>
                    <td>{{ $vehicle['manufacturer'] }}</td>
                    <td>{{ $vehicle['price'] }}</td>
                    <td>
                        <a href="{{ route('customer.show', $vehicle->customer->id) }}">
                            {{ $vehicle->customer->name }}
                        </a>
                    </td>
                    <td>{{ $vehicle['vehicle_type'] }}</td>
                    @if($vehicle['vehicle_type'] == 'car') 
                        <td>{{ $vehicle['fuel_type'] }}</td>
                        <td>{{ $vehicle['trunk_area'] }}</td>
                    @elseif($vehicle['vehicle_type'] == 'motorcycle')
                        <td>{{ $vehicle['luggage_size'] }}</td>
                        <td>{{ $vehicle['fuel_capacity'] }}</td>
                    @elseif($vehicle['vehicle_type'] == 'truck')
                        <td>{{ $vehicle['tire_count'] }}</td>
                        <td>{{ $vehicle['cargo_area'] }}</td>
                    @endif
                    <td class="text-center">
                        <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('vehicle.show', $vehicle->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('vehicle.edit', $vehicle->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection