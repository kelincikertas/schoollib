@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="pb-2">Update User</h3>
            <form name="add-user-form" id="add-user-form" method="post" action="{{url('admin/update-user')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userid" value="{{ $user->id }}"/>
                <div class="form-group">
                    <label for="add-name">Name</label>
                    <input type="text" class="form-control" id="add-name" name="name" placeholder="Your Name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="add-email">Email</label>
                    <input type="email" class="form-control" id="add-email" name="email" placeholder="Your email" value="{{ $user->email }}">
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
                
                @if(session('status')=="success")
                <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </form>
            
        </div>
    </div>

</div>
@endsection
