@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <div class="row row-cols-lg-2 row-cols-sm-1">
        <div class="col">
            <a href="/dashboard/siswa/create" class="btn btn-primary mt-4">Add new post</a>
        </div>
        <div class="col mt-4">
            <form action="/dashboard/siswa" class="d-flex ">
                <input class="form-control me-2" name="search" id="search" type="search"
                    placeholder="Cari berdasarkan nama Jurusan" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-responsive mt-3">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>image</th>
            <th>gender</th>
            <th>jurusan</th>
            <th>action</th>
        </tr>
        @foreach($siswas as $siswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->name }}</td>
            <td><img src="{{ asset('storage/' . $siswa->image) }}" class="d-block img-fluid mb-3 col-sm-5"></td>
            <td>{{ $siswa->gender }}</td>
            <td>{{ $siswa->jurusan_id }}</td>
            <td>
                <a href="/dashboard/siswa/{{ $siswa->id }}" class="badge bg-primary text-decoration-none text-white"><i
                        class="bi bi-eye-fill">view</i></a>
                <a href="/dashboard/siswa/{{ $siswa->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                <form action="/dashboard/siswa/destroy" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="text" name="oldimage" id="oldimage" value="{{ $siswa->image }}" hidden>
                    <input type="text" name="id" id="id" value="{{ $siswa->id }}" hidden>
                    <button type="submit" class="badge bg-danger border-0"
                        onclick="return confirm('Are you sure delete this data?')"><i
                            class="bi bi-trash">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $siswas->links() }}
</div>
</div>
@endsection