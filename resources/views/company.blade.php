@extends('layouts.app')

@section('content')
        <a href="/addCompany" class="btn btn-primary ml-auto">Add Company</a>
        <table class="table">
            <thead>
                <tr>
                  <td></td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Logo</td>
                  <td>Website</td>
                  <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(count($companyData) > 0)
                  @foreach($companyData as $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td><img src="{{asset('uploads/'.$data->logo)}}" alt="logo" height="100px" width="100px"/></td>
                    <td>{{ $data->website }}</td>
                    <td><a href="/editCompany/{{$data->id}}">Edit</a> <a href="/deleteCompany/{{$data->id}}">Delete</a></td>
                </tr>
                  @endforeach
                  @else
                    <div class="float-left"> No Data found</div>
                  @endif
               
            </tbody>
        </table>
        <div class="d-flex justify-content-center " style="margin: 20px;">{!! $companyData->render() !!}</div>

        @endsection
