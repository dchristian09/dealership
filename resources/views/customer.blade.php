@extends('layouts.mainlayout')

@section('page_title')Customer @endsection

@section('main_content')
<div class="container-fluid">
    <br>
    <h1 class="display-4">Customer</h1>

    <div class="text-left" id="create">
        <a class="btn btn-success pull-left" href="{{ route('customer.create') }}">Add New Customer</a>
    </div>

    <table class="table table-striped table-primary table-hover table-container" >
        <thead>
            <th> No </th>
            <th> Customer Name </th>
            <th> Customer Address </th>
            <th> Phone Number </th>
            <th> ID Card </th>
            <th class="d-flex justify-content-center"> ACTIONS </th>
        </thead>
        <tbody>
            @php 
            $i = 1 
            @endphp
            @foreach($customer as $customer)
                <tr>
                    <td>{{ $i }}</td>
                    @php 
                    $i++ 
                    @endphp
                    <td>{{ $customer['name'] }}</td>
                    <td>{{ $customer['address'] }}</td>
                    <td>{{ $customer['phone_number'] }}</td>
                    <td>{{ $customer['id_card'] }}</td>
                    <td class="text-center">
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('customer.show', $customer->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('customer.edit', $customer->id) }}">Edit</a>
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