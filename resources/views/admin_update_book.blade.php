@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="pb-2">Update Book Data</h3>
            <form name="add-book-form" id="add-book-form" method="post" action="{{url('admin/update-book/')}}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="bookid" value="{{ $book->id }}"/>
                <div class="form-group">
                    <label>Author</label>
                    <select class="form-control" name="authorid">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                        @if ($author->id==$book->authorid)
                            selected
                        @endif
                        >{{ $author->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-name">Title</label>
                    <input type="text" class="form-control" id="add-name" name="title" placeholder="Book Title" value="{{ $book->title }}">
                </div>
                <div class="form-group">
                    <label for="add-tag">Tag</label>
                    <input type="text" class="form-control" id="add-tag" name="tag"
                        placeholder="Book Tag Separate By Comma" value="{{ $book->tag }}">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="3" name="content" placeholder="Enter Content">{{ $book->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <br/>
                    <img class="img-fluid my-2" src="{{ url('book-image/'.$book->image) }}"/>
                    <br/>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="add-image" name="image">
                        <label class="custom-file-label" for="add-image">Choose file</label>
                    </div>
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

<script>
    $(document).ready(function(){
        $('#add-image').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
    })
</script>
@endsection
