@extends('layouts.mainlayout')

@section('page_title')Update Vehicle @endsection

@section('main_content')
    <div class="container-fluid" id="tengah">
        <h1 class="row justify-content-center display-4" style="margin-top: 10%">Update Vehicle</h1>
        <div id="form">
            <form action="{{ route('vehicle.update', $vehicle->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label>Model: </label>
                    <input type="text" class="form-control" name="model" value="{{ $vehicle->model }}"required>
                    <label>Tahun: </label>
                    <input type="number" class="form-control" name="year" value="{{ $vehicle->year }}"required>
                    <label>Jumlah Penumpang: </label>
                    <input type="number" class="form-control" name="passengers" value="{{ $vehicle->passengers }}"required>
                    <label>Manufaktur: </label>
                    <input type="text" class="form-control" name="manufacturer" value="{{ $vehicle->manufacturer }}"required>
                    <label>Harga: </label>
                    <input type="number" class="form-control" name="price" value="{{ $vehicle->price }}"required>
                </div>
                <div class="form-group">
                    <label>Customer: </label>
                    <select name="customer_id" class="custom-select">
                        <option value="{{ $vehicle->customer_id }}" selected>{{ $vehicle->customer->name }}</option>
                        @foreach ($customer as $customer)
                            @if ($vehicle->customer->name  != $customer['name'] )
                            <option value="{{ $customer->id }}">{{ $customer['name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Vehicle Type: </label>
                    <select id="vehicleType" name="vehicle_type" class="custom-select" onchange="showAdditionalField()">
                        <option value="{{ $vehicle->vehicle_type }}" selected>{{ $vehicle->vehicle_type }}</option>
                        @if ($vehicle->vehicle_type  == 'car' )
                        <option value="truck">Truck</option>
                        <option value="motorcycle">Motorcycle</option>
                        @elseif ($vehicle->vehicle_type  != 'truck' )
                        <option value="car">Car</option>
                        <option value="motorcycle">Motorcycle</option>
                        @elseif ($vehicle->vehicle_type  == 'motorcycle' )
                        <option value="car">Car</option>
                        <option value="truck">Truck</option>
                        @endif
                    </select>
                </div>
                <div class="form-group" id="carTypeInput" style="display:none;">
                    <label>Fuel Type: </label>
                    <input type="text" class="form-control" name="fuel_type" value="{{ $vehicle->fuel_type }}" >
                    <label>Trunk Area: </label>
                    <input type="number" class="form-control" name="trunk_area" value="{{ $vehicle->trunk_area }}">
                </div>
                <div class="form-group" id="truckTypeInput" style="display:none;">
                    <label>Tire Count: </label>
                    <input type="number" class="form-control" name="tire_count"value="{{ $vehicle->tire_count }}" >
                    <label>Cargo Area: </label>
                    <input type="number" class="form-control" name="cargo_area" value="{{ $vehicle->cargo_area }}">
                </div>
                <div class="form-group" id="motorcycleTypeInput" style="display:none;">
                    <label>Luggage Size: </label>
                    <input type="number" class="form-control" name="luggage_size" value="{{ $vehicle->luggage_size }}">
                    <label>Fuel Capacity: </label>
                    <input type="number" class="form-control" name="fuel_capacity" value="{{ $vehicle->fuel_capacity }}">
                </div>

                <script>
                    function showAdditionalField() {
                        var vehicleType = document.getElementById('vehicleType').value;
                        var carTypeInput = document.getElementById('carTypeInput');
                        var truckTypeInput = document.getElementById('truckTypeInput');
                        var motorcycleTypeInput = document.getElementById('motorcycleTypeInput');

                        if (vehicleType === 'car') {
                            carTypeInput.style.display = 'block';
                        } else {
                            carTypeInput.style.display = 'none';
                        }

                        if (vehicleType === 'truck') {
                            truckTypeInput.style.display = 'block';
                        } else {
                            truckTypeInput.style.display = 'none';
                        }

                        if (vehicleType === 'motorcycle') {
                            motorcycleTypeInput.style.display = 'block';
                        } else {
                            motorcycleTypeInput.style.display = 'none';
                        }
                    }

                    // Trigger the function on page load
                    showAdditionalField();
                </script>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Edit Vehicle</button>
                </div>
            </form>
        </div>
    </div>
@endsection