@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h4 class="card title ">Data User</h4>
                    <p class="card-description">
                        <a href="{{route ('add-user')}}" class="btn btn-primary">tambah</a>
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
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        
                                        <td><a href="{{ route ('edit-user', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ route ('delete-user', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('yakin mau menghapus data ini?')">delete</a>
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
