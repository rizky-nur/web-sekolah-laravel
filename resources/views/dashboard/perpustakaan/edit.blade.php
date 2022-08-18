@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit</h2>
    <form action="/dashboard/perpus/{{ $perpust->id }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title', $perpust->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" name="oldimage" id="oldimage" value="{{ $perpust->image }}" hidden>
            @if($perpust->image)
            <img src="{{ asset('storage/' . $perpust->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
            @else
            <img class="d-block img-fluid mb-3 col-sm-5" id="output">
            @endif
            <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image"
                onchange="loadFile(event)">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="body mb-3">body</label>
        <div class="form-floating mt-3">
            @error('body')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $perpust->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
</div>
</div>
@endsection