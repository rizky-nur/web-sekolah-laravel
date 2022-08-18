@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit pks</h2>
    <form action="/dashboard/pks/{{ $pkss->id }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="id" id="id" value="{{ $pkss->id }}" hidden>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title / Judul" value="{{ old('title', $pkss->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="body mb-3">Body</label>
        <div class="form-floating mt-3">
            @error('body')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $pkss->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
</div>
@endsection