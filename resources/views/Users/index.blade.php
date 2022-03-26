@extends('layouts.dashboard2')
@section('title','Data Users')
@section('content-inner')
<div class="main-content-inner">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Users</h4>
                        @include('Company.components.menu1')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Users</h4>
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalLong">Add New Users</button>
                        <div class="modal fade" id="exampleModalLong">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Add New Users</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/users/store" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control" required placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control" required placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">User Level</label>
                                                <select name="id_user_level" class="custom-select" required>
                                                    <option value="">Choose Level</option>
                                                    @foreach ($usr_lvl as $lvl)
                                                        <option value="{{ $lvl->id_user_level }}">{{ $lvl->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control" required placeholder="Enter password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control" required placeholder="Enter password">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Simpan Data" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->user_level->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm delete-item" data-toggle="modal" data-target="#exampleModalEdit{{ $user->id }}">Edit</button>
                                                <a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                                <div class="modal fade" id="exampleModalEdit{{ $user->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Form Edit Users</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/users/update" method="POST">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                                    <div class="form-group">
                                                                        <label for="">Name</label>
                                                                        <input type="text" name="name" class="form-control" required placeholder="Enter name" value="{{ $user->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Email</label>
                                                                        <input type="email" name="email" class="form-control" required placeholder="Enter email" value="{{ $user->email }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">User Level</label>
                                                                        <select name="id_user_level" class="custom-select" required>
                                                                            <option value="">Choose Level</option>
                                                                            @foreach ($usr_lvl as $lvl)
                                                                                <option value="{{ $lvl->id_user_level }}" @if($lvl->id_user_level==$user->id_user_level) selected @endif>{{ $lvl->description }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="submit" value="Simpan Data" class="btn btn-primary">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
