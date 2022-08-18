@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Edit post</h2>
    @foreach($photos as $photo)
    <form action="/dashboard/galery/{{ $photo->id}}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="id" id="id" value="{{ $photo->id }}" hidden>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title"
                placeholder="Title" value="{{ old('title', $photo->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <select name="jurusan_id" class="form-select" id="jurusan_id">
            @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan_name}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="image" class="form-label">news image</label>
            <input type="text" name="oldimage" id="oldimage" value="{{ $photo->image }}" hidden>
            @if($photo->image)
            <img src="{{ asset('storage/' . $photo->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
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
        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
    @endforeach
</div>
</div>
@endsection