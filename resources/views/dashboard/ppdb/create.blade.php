@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Create News</h2>
    <form action="/dashboard/ppdb" class="mb-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title') }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <img class="d-block img-preview img-fluid mb-3 col-sm-5" id="output">
            <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image"
                onchange="loadFile(event)">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>
</div>
</div>
@endsection