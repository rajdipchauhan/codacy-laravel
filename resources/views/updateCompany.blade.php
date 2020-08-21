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
<div>Update Company</div>
<form action="/updateCompany" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$companyData->id}}">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$companyData->name}}" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$companyData->email}}" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="file" class="form-control-file" name="file" id="logo">
        <img src="{{storage_path().'/uploads/'.$companyData->logo}}" alt="logo" height="100px" width="100px"/>
        <input type="hidden" class="form-control-file" name="logo" id="logo" value="{{$companyData->logo}}">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" value="{{$companyData->website}}" placeholder="Enter Website">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
