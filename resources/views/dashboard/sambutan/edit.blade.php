@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit Article</h2>
    @foreach($sambutans as $sambutan)
    <form action="/dashboard/sambutan/{{ $sambutan->slug }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="id" id="id" value="{{ $sambutan->id }}" hidden>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title', $sambutan->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug"
                placeholder="Slug" value="{{ old('slug', $sambutan->slug) }}" required>
            <label for="slug" class="form-label">Slug</label>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">news image</label>
            <input type="text" name="oldimage" id="oldimage" value="{{ $sambutan->image }}" hidden>
            @if($sambutan->image)
            <img src="{{ asset('storage/' . $sambutan->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
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
        <label for="description mb-3">description</label>
        <div class="form-floating mt-3">
            @error('description')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="description" type="hidden" name="description"
                value="{{ old('description', $sambutan->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
    @endforeach
</div>
</div>
@endsection