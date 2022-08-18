@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Create News</h2>
    <form action="/dashboard/guru/{{ $guru->id }}" class="mb-3" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name"
                placeholder="name" value="{{ old('name', $guru->name) }}" required>
            <label for="name">name</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">news image</label>
            <input type="text" name="oldimage" id="oldimage" value="{{ $guru->image }}" hidden>
            @if($guru->image)
            <img src="{{ asset('storage/' . $guru->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
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
        <select name="gender" id="gender" class="form-select">
            @if(old('gender',$guru->gender) == 'Laki-Laki')
            <option value="Laki-laki" selected>Laki-Laki</option>
            @elseif(old('gender',$guru->gender) == 'Perempuan')
            <option value="Perempuan" selected>Perempuan</option>
            @else
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            @endif
        </select>
        <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>
</div>
</div>
@endsection