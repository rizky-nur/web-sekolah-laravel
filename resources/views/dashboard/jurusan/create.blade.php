@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">Create</h2>
    <form action="/dashboard/jurusan/" class="mb-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('jurusan_name')is-invalid @enderror" id="jurusan_name"
                name="jurusan_name" placeholder="Jurusan Name" value="{{ old('jurusan_name') }}" required>
            <label for="jurusan_name">Name Jurusan</label>
            @error('jurusan_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" min class="form-control @error('rombel')is-invalid @enderror" id="rombel" name="rombel"
                placeholder="Rombel" value="{{ old('rombel') }}" required>
            <label for="rombel">rombel</label>
            @error('rombel')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" min class="form-control @error('jml_siswa')is-invalid @enderror" id="jml_siswa"
                name="jml_siswa" placeholder="Students" value="{{ old('jml_siswa') }}" required>
            <label for="jml_siswa">Student</label>
            @error('jml_siswa')
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