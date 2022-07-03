@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h4 class="card title ">Data Posting</h4>
                    <p class="card-description">
                        <a href="{{ route ('add-contact') }}" class="btn btn-primary">tambah</a>
                    </p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone Number
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $contact)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone_number}}</td>
                                    <td>{{$contact->message}}</td>
                                    {{-- <td>
                                        <img src="{{ asset('storage/' .$posting->gambar)}}" width="300" srcset="">
                                    </td> --}}
                                    {{-- <td>{{$posting->isi}}</td> --}}
                                    
                                    
                                    <td><a href="{{ route ('edit-contact', $contact->id )}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route ('delete-contact', $contact->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('yakin mau menghapus data ini?')">delete</a>
                                    </td>                                        
                                </tr>
                                <a href=""></a>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
