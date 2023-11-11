@extends('layouts.mainlayout')

@section('page_title')Update Customer @endsection

@section('main_content')
    <div class="container-fluid" id="tengah">
        <h1 class="row justify-content-center display-4">Update Customer</h1>
        <div id="form">
            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input type="text" class="form-control" name="address" value="{{ $customer->address }}" required>
                </div>
                <div class="form-group">
                    <label>Phone Number: </label>
                    <input type="number" class="form-control" name="phone_number" value="{{ $customer->phone_number }}" required>
                </div>
                <div class="form-group">
                    <label>ID Card: </label>
                    <input type="number" class="form-control" name="id_card" value="{{ $customer->id_card }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Customer</button>
                </div>
            </form>
        </div>
    </div>
@endsection