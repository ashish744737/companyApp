@extends('layouts.app')
@section('content')
<div class="container custom-border">
    <h1 class="my-4">Employee Details</h1>
    <hr>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
    <hr>
    <div class="list-group">
        @foreach ($employees as $employee)
            <div class="list-group-item">
                <h5>{{ $employee->first_name.'  '. $employee->last_name}}</h5>  
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p>Company : {{ $employee->company->name }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Email : {{ $employee->email }}</p>
                        <p>Phone : {{ $employee->phone }}</p>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="margin-left:5px;">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            
        @endforeach
        <div class="pagination-wrapper d-flex justify-content-center">
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
