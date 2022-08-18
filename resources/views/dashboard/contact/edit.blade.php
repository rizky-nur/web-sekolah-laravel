@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit News</h2>
    <form action="/dashboard/contact/{{ $contact->id }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title', $contact->title) }}" required>
            <label for="title">Title</label>
            @error('title')
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
                value="{{ old('description', $contact->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
</div>
</div>
@endsection