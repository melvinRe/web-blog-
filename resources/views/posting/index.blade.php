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
                        <a href="{{ route ('add-posting') }}" class="btn btn-primary">tambah</a>
                    </p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        user name
                                    </th>
                                    <th>
                                        Judul
                                    </th>
                                    <th>
                                        Topik
                                    </th>
                                    <th>
                                        Gambar
                                    </th>
                                    <th>
                                        Isi
                                    </th>
                                    <th>
                                        Preview
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $posting)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$posting->user->name}}</td>
                                    <td>{{$posting->judul}}</td>
                                    <td>{{$posting->topik}}</td>
                                    <td>
                                        <img src="{{ asset('storage/' .$posting->gambar)}}" width="100" srcset="">
                                    </td>
                                    <td>{{$posting->isi}}</td>
                                    <td>{{$posting->preview}}</td>
                                    
                                    
                                    <td><a href="{{ route ('edit-posting', $posting->id )}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route ('delete-posting', $posting->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('yakin mau menghapus data ini?')">delete</a>
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
