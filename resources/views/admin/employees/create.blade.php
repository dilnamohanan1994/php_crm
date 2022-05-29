@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-left: 72px;">
                <div class="card-header">Add Employee
                    <span class="text-right float-right"></span>
                </div>
                <div class="card-body">
                    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" >
                            @error('first_name')
                            <span class="text-danger">First Name is Required.</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" >
                            @error('last_name')
                            <span class="text-danger">Last Name is Required.</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <select name="company_id" id="company_id" class="form-control" required>
                                @if($companies)
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                                @else
                                  <option>No Theaters Found</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit"  id="submit" class="btn btn-success" value="Submit" >
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection