@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                src="{{ url('book-image/'.$latestBook->image) }}" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">{{ $latestBook->title }}</h1>
            <p>{{ \Illuminate\Support\Str::limit($latestBook->content, 200, '...')  }}</p>
            <a class="btn btn-primary" href="{{ url('book/'.$latestBook->id) }}">View Detail</a>
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">This call to action card is a great place to showcase some important information
                or display a clever tagline!</p>
        </div>
    </div>
    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">

        @foreach ($recentBooks as $recentBook)
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">{{ $recentBook->title }}</h2>
                    <img class="img-fluid my-2" src="{{ url('book-image/'.$recentBook->image) }}"/>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($latestBook->content, 100, '...')  }}</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="{{ url('book/'.$recentBook->id) }}">More Info</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
