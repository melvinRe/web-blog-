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
                    <form class="forms-sample" action="{{ route ('update-contact')}}" method="POST" enctype="multipart/form-data">                
                    @csrf   
                    <input type="hidden" name="id" value="{{$data->id}}">           
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control"  id="exampleInputName1" name="name" value="{{$data->Name}}"  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control"  id="exampleInputEmail2" name="email" value="{{$data->Email}}"  >       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Phone Number</label>
                        <input type="number" class="form-control"  name="phone_number" id="exampleInputPassword3" value="{{$data->Phone_number}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Message</label>
                        <input type="text" class="form-control"  name="message" id="exampleInputPassword3" value="{{$data->message}}" >
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
