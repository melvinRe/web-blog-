@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Session::get('failed'))
                    <div class="alert alert-warning">{{Session::get('failed')}}</div>
                @endif
                <div class="card-body">
                    <h4 class="card title ">Tambah Data</h4>
                    <p class="card-description">
                        
                    </p>  
                    <form class="forms-sample" action="{{ route ('store-contact')}}" method="POST" enctype="multipart/form-data">                
                    @csrf              
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputName1" name="name" value="{{old('name')}}"  placeholder="name">
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
                    <div class="form-group">
                        <label for="exampleInputPassword3">Phone Number</label>
                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="exampleInputPassword3" value="{{old('phone_number')}}" placeholder="phone_number">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Message</label>
                        <input type="text" class="form-control @error('message') is-invalid @enderror" name="message" id="exampleInputPassword3" value="{{old('message')}}" placeholder="message">
                        @error('message')
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