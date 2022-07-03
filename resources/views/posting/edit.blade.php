@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <h4 class="card title ">edit data</h4>
                    <p class="card-description">
                        
                    </p>
                    @if (Session::get('failed'))
                        <div class="alert alert-warning">{{Session::get('failed')}}</div>
                    @endif  
                    <form class="forms-sample" action="{{ route ('update-posting')}}" method="POST" enctype="multipart/form-data">                
                    @csrf   
                    <input type="hidden" name="id" value="{{$data->id}}">           
                    <div class="form-group">
                        <label for="exampleInputName1">judul</label>
                        <input type="text" class="form-control"  id="exampleInputName1" name="judul" value="{{$data->judul}}"  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Topik</label>
                        <input type="text" class="form-control"  id="exampleInputEmail2" name="topik" value="{{$data->topik}}"  >       
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
                        <img src="{{ asset('storage/' .$data->gambar)}}" width="300px" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Isi</label>
                        <input type="text" class="form-control"  name="isi" id="exampleInputPassword3" value="{{$data->isi}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Preview</label>
                        <input type="text" class="form-control"  name="preview" id="exampleInputPassword3" value="{{$data->preview}}" >
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
