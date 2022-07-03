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
                    <form class="forms-sample" action="{{ route ('store-posting')}}" method="POST" enctype="multipart/form-data">                
                    @csrf              
                    <div class="form-group">
                        <label for="exampleInputName1">judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputName1" name="judul" value="{{old('judul')}}"  placeholder="Judul">
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Topik</label>
                        <input type="text" class="form-control @error('topik') is-invalid @enderror" id="exampleInputEmail2" name="topik" value="{{old('topik')}}"  placeholder="Topik">
                        @error('topik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
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
                        <label for="exampleInputPassword3">Isi</label>
                        <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" id="exampleInputPassword3" value="{{old('isi')}}" placeholder="Isi">
                        @error('isi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Preview</label>
                        <input type="text" class="form-control @error('preview') is-invalid @enderror" name="preview" id="exampleInputPassword3" value="{{old('preview')}}" placeholder="preview">
                        @error('preview')
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