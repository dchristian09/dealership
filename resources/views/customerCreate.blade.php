@extends('layouts.mainlayout')

@section('page_title')Create New Customer @endsection

@section('main_content')
    <div class="container-fluid" id="tengah">
        <h1 class="row justify-content-center display-4">Create New Customer</h1>
        <div id="form">
            <form action="{{ route('customer.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Customer Name: </label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>Customer Address: </label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    <label>Phone Number: </label>
                    <input type="number" class="form-control" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label>ID Card: </label>
                    <input type="number" class="form-control" name="id_card" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Register New Customer</button>
                </div>
            </form>
        </div>
    </div>
@endsection