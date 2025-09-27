@extends('layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Blog</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('update',$blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputTitle" class="form-label"><strong>Title:</strong></label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ $blog->title }}"
                    class="form-control @error('title') is-invalid @enderror" 
                    id="inputTitle" 
                    placeholder="title">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Content:</strong></label>
                <textarea 
                    class="form-control @error('content') is-invalid @enderror" 
                    style="height:150px" 
                    name="content" 
                    id="inputcontent" 
                    placeholder="content">{{ $blog->content }}</textarea>
                @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPhoto" class="form-label"><strong>Photo:</strong></label>
                <input 
                    type="file" 
                    name="photo" 
                    class="form-control @error('photo') is-invalid @enderror" 
                    id="inputPhoto">
                <img src="/images/{{ $blog->photo }}" width="300px">
                @error('photo')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
        </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>
@endsection