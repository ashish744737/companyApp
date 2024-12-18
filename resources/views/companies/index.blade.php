@extends('layouts.app')
@section('content')
<div class="container custom-border">
    <h1 class="my-4">Company Details</h1>
    <hr>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
    <hr>
    
    <div class="list-group">
            @foreach ($companies as $company)
            <div class="list-group-item">

                <h5>{{ $company->name }}</h5><hr>
                <div class="row">
                <div class="col-sm-3">
                    @if(!empty($company->logo))
                        <p><img src="{{asset('uploads/'.$company->logo)}}" alt="logo" srcset="" width="100" height="100"></p>
                    @else    
                        <p><img src="{{asset('images/logo.png')}}" alt="logo" srcset="" width="100" height="100"></p>
                    @endif
                    </div>
                    <div class="col-sm-6" style="alight-content:center">
                    <p>Email : {{ $company->email }}</p>
                    <p>Website : <a href="{{ $company->website }}" target="_blank"> {{ $company->website }}</a></p>
                    </div>
                    <div class="col-sm-3">
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" style="margin-left:5px;">Delete</button>
                  
                </form>
                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary btn-sm" style="margin-left:5px;">Employees</a>
                    </div>
                </div>
            </div>
            <br>   
            @endforeach 
            
            <div class="pagination-wrapper d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
            
    </div>
</div>
   
@endsection
