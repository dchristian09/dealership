
@extends('layouts.mainlayout')

@section('page_title')Create vehicleEdit @endsection

@section('main_content')
    <div class="container-fluid" id="tengah">
        <h1 class="row justify-content-center display-4">Add New Vehicle</h1>
        <div id="form">
            <form action="{{ route('vehicle.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Model: </label>
                    <input type="text" class="form-control" name="model" required>
                    <label>Tahun: </label>
                    <input type="number" class="form-control" name="year" required>
                    <label>Jumlah Penumpang: </label>
                    <input type="text" class="form-control" name="passengers" required>
                    <label>Manufaktur: </label>
                    <input type="text" class="form-control" name="manufacturer" required>
                    <label>Harga: </label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                    <label>Customer: </label>
                    <select name="customer_id" class="custom-select">
                        <option value="" selected disabled hidden>Choose Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer['id'] }}">{{ $customer['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Vehicle Type: </label>
                    <select id="vehicleType" name="vehicle_type" class="custom-select" onchange="showAdditionalField()">
                        <option value="" selected disabled hidden>Choose Car Type</option>
                        <option value="car">Car</option>
                        <option value="truck">Truck</option>
                        <option value="motorcycle">Motorcycle</option>
                    </select>
                </div>
                <div class="form-group" id="carTypeInput" style="display:none;">
                    <label>Fuel Type: </label>
                    <input type="text" class="form-control" name="fuel_type" >
                    <label>Trunk Area: </label>
                    <input type="number" class="form-control" name="trunk_area" >
                </div>
                <div class="form-group" id="truckTypeInput" style="display:none;">
                    <label>Tire Count: </label>
                    <input type="number" class="form-control" name="tire_count" >
                    <label>Cargo Area: </label>
                    <input type="number" class="form-control" name="cargo_area" >
                </div>
                <div class="form-group" id="motorcycleTypeInput" style="display:none;">
                    <label>Luggage Size: </label>
                    <input type="number" class="form-control" name="luggage_size" >
                    <label>Fuel Capacity: </label>
                    <input type="number" class="form-control" name="fuel_capacity" >
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
                    <button type="submit" class="btn btn-success">Add Vehicle</button>
                </div>
            </form>
        </div>
    </div>
@endsection