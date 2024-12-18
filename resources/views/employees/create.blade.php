@extends('layouts.app')
@section('content')
<div class="container custom-border">
    <h1 class="my-4">Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="company_id" class="form-label">Company<span class="text-danger">*</span></label>
            <select class="form-control" aria-label="Company" id="company_id" name="company_id">
                <option selected>Please select company</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}" {{ old('company_id') == $company->id ? 'selected' : '' }} >{{$company->name}}</option>
                @endforeach
            </select>
            @error('company_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
