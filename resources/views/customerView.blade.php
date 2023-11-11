@extends('layouts.mainlayout')

@section('page_title')Customer's Vehicle @endsection

@section('main_content')
    <div class="container-fluid">
        <div>
            <h1>{{ $customer['name'] }}</h1>
            <div id="details">
                <p id="teamview"><b>Address: </b>{{ $customer['address'] }}</p>
                <p id="teamview"><b>Phone Number: </b><i>{{ $customer['phone_number'] }}</i></p>
                <p id="teamview"><b>ID Card: </b><i>{{ $customer['id_card'] }}</i></p>
                <a href="/customer" class="btn btn-success" id="tombol">Back</a>
            </div>
            <h3>List Vehicle:</h3>

            <table class="table table-striped table-primary table-hover table-container">
                <thead>
                    <th> No </th>
                    <th> Model </th>
                    <th> Year </th>
                    <th> Passengers </th>
                    <th> Manufacturer </th>
                    <th> Price </th>
                    <th> Vehicle Type </th>
                    <th> Criteria 1 </th>
                    <th> Criteria 2 </th>
                    <th class="d-flex justify-content-center"> ACTIONS </th>
                </thead>
                <tbody>
                    @php $index = 1 @endphp
                    @php $totalPrice = 0 @endphp
                    @foreach ($vehicle as $vehicle)
                        @if($vehicle['customer_id'] == $customer['id'])
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            @php $index++ @endphp
                            <td>{{ $vehicle['model'] }}</td>
                            <td>{{ $vehicle['year'] }}</td>
                            <td>{{ $vehicle['passengers'] }} Person</td>
                            <td>{{ $vehicle['manufacturer'] }}</td>
                            <td>Rp.{{ $vehicle['price'] }}</td>
                            @php $totalPrice = $totalPrice + $vehicle['price'] @endphp
                            <td>{{ $vehicle['vehicle_type'] }}</td>
                            @if($vehicle['vehicle_type'] == 'car') 
                                <td>{{ $vehicle['fuel_type'] }}</td>
                                <td>{{ $vehicle['trunk_area'] }} m&sup2</td>
                            @elseif($vehicle['vehicle_type'] == 'motorcycle')
                                <td>{{ $vehicle['luggage_size'] }} sup2</td>
                                <td>{{ $vehicle['fuel_capacity'] }} L</td>
                            @elseif($vehicle['vehicle_type'] == 'truck')
                                <td>{{ $vehicle['tire_count'] }} Tires</td>
                                <td>{{ $vehicle['cargo_area'] }} m&sup2</td>
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
                        @endif
                    @endforeach

                </tbody>
            </table>
            <p id="teamview" style="margin-left: 85%"><b>Total Price: </b><i>{{ $totalPrice }}</i></p>
        </div>
    </div>
@endsection