@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalUser }}</h3>
                    <p>Total User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('admin/add-user') }}" class="small-box-footer">Add New User <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalBook }}</h3>
                    <p>Total Book</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('admin/add-book') }}" class="small-box-footer">Add New Book <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <a class="btn btn-primary" href="{{ url('admin/add-user') }}">
                                <button type="button" class="btn btn-light">Add User</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Register Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/update-user/'.$user->id) }}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="{{ url('admin/delete-user/'.$user->id) }}">
                                        <button type="button" class="btn btn-danger ms-2">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if(session('status')=="user success")
            <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Book List</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <a class="btn btn-primary" href="{{ url('admin/add-book') }}">
                                <button type="button" class="btn btn-light">Add Book</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->tag }}</td>
                                <td>
                                    <a href="{{ url('admin/update-book/'.$book->id) }}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="{{ url('admin/delete-book/'.$book->id) }}">
                                        <button type="button" class="btn btn-danger ms-2">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if(session('status')=="book success")
            <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
