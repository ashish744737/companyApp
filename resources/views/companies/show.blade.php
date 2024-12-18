@extends('layouts.app')
@section('content')
<div class="container custom-border">
    <h1 class="my-4">{{$company->name}} Employees</h1> 
    
    <div class="list-group">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @if(count($employees) > 0)
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                    @endforeach
                @else
                        <tr>
                            <th colspan="5" style="text-align:center;">No records found</th>
                        </tr>
                @endif
                    
               
            </tbody>
        </table>
    </div>
</div>
@endsection
