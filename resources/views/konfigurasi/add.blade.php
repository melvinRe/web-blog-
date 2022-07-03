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
                    <form class="forms-sample" action="{{ route ('store-konfigurasi')}}" method="POST" enctype="multipart/form-data">                
                    @csrf 
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>             
                    <div class="form-group">
                        <label for="exampleInputName1">About</label>
                        <input type="text" class="form-control @error('about') is-invalid @enderror" id="exampleInputName1" name="about" value="{{old('about')}}" placeholder="about">
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Contact</label>
                        <input type="text" class="form-control @error('contact') is-invalid @enderror" id="exampleInputEmail2" name="contact" value="{{old('contact')}}" placeholder="contact">
                        @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
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