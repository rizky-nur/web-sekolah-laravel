@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit News</h2>
    <form action="/dashboard/pengumuman/{{ $pengumuman->slug }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="id" id="id" value="{{ $pengumuman->id }}" hidden>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title', $pengumuman->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug"
                placeholder="Slug" value="{{ old('slug', $pengumuman->slug) }}" required>
            <label for="slug" class="form-label">Slug</label>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="excrept mb-3">excrept</label>
        <div class="form-floating mt-3">
            @error('excrept')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="excrept" type="hidden" name="excrept"
                value="{{ old('excrept', $pengumuman->excrept) }}">
            <trix-editor input="excrept"></trix-editor>
        </div>
        <label for="description mb-3">description</label>
        <div class="form-floating mt-3">
            @error('description')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="description" type="hidden" name="description"
                value="{{ old('description', $pengumuman->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
</div>
</div>
@endsection