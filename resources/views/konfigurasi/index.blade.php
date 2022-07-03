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
                        <a href="{{ route('add-konfigurasi') }}" class="btn btn-primary">tambah</a>
                    </p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Gambar
                                    </th>
                                    <th>
                                        About
                                    </th>
                                    <th>
                                        Contact
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $konfigurasi )
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td><img src="{{ asset('storage/' .$konfigurasi->gambar)}}" width="300" srcset="">
                                    </td>
                                    <td>{{$konfigurasi->about}}</td>
                                    <td>{{$konfigurasi->contact}}</td>

                                   
                                    <td><a href="{{ route ('edit-konfigurasi', $konfigurasi->id )}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route ('delete-konfigurasi', $konfigurasi->id )}}" class="btn btn-sm btn-danger" onclick="return confirm('yakin mau menghapus data ini?')">delete</a>
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
