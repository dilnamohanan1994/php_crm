@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-left: 72px;">
                <div class="card-header">Edit Company
                <span class="text-right float-right"><a class="btn btn-primary" href="{{route('company.list')}}"> Company List</a></span>
                </div>
                <div class="card-body">
                    <form action="{{route('company.update',$companies->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name',$companies->name) }}" id="name" class="form-control" >
                            @error('name')
                            <span class="text-danger">Name is Required.</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ old('email',$companies->email) }}" id="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" value="{{ old('logo') }}" id="logo" class="form-control" >
                            @error('logo')
                            <span class="text-danger">Logo Size Minimum 100*100.</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" value="{{ old('website',$companies->website) }}" id="website" class="form-control" >
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