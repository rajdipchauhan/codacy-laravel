@extends('layouts.app')

@section('content')
        <a href="/addEmployee" class="btn btn-primary ml-auto">Add Employee</a>
        <table class="table">
            <thead>
                <tr>
                  <td></td>
                  <td>First Name</td>
                  <td>Last Name</td>
                  <td>Company</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Action</td>
                </tr>
            </thead>
            <tbody>
            @if(count($employeeData) > 0)
                  @foreach($employeeData as $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->company_name }}</td>
                    <td>{{ $data->employee_email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td><a href="/editEmployee/{{$data->id}}">Edit</a> <a href="/deleteEmployee/{{$data->id}}">Delete</a></td>
                </tr>
                  @endforeach
                  @else
            <div class="d-flex justify-content-center " style="margin: 20px;">No Data found</div>
            @endif
            </tbody>
           
                 
        </table>
        <div class="d-flex justify-content-center " style="margin: 20px;">{!! $employeeData->render() !!}</div>

        @endsection
