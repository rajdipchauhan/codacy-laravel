@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
<div>Update Employee</div>
<form action="/updateEmployee" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$employeeData->id}}">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" value="{{$employeeData->first_name}}" placeholder="Enter First Name">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" id="last_name" value="{{$employeeData->last_name}}" placeholder="Enter Last Name">
    </div>
    <div class="form-group">
        <label for="company">Company</label>
        <select name="company" id="company" class="form-control">
            <option value="">Select Company</option>
            @foreach($companyData as $data)
                <option value="{{$data->id}}" {{ $data->id == $employeeData->company ? 'selected="selected"' : '' }}>{{$data->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$employeeData->email}}" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" class="form-control" id="phone" name="phone" value="{{$employeeData->phone}}" placeholder="Enter Phone">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
