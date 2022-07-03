@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card title ">Tambah Data</h4>
                    <p class="card-description">
                        
                    </p>  
                    <form class="forms-sample" action="{{ route('store-user') }}" method="POST"
                            enctype="multipart/form-data">                
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{old('name')}}"  placeholder="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail2" name="email" value="{{old('email')}}"  placeholder="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword3" value="{{old('password')}}" placeholder="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
