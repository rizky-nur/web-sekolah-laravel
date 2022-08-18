@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <a href="/dashboard/jurusan/create" class="btn btn-primary">Add new post</a>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-responsive mt-3">
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Rombel</th>
            <th>Jumlah Siswa</th>
            <th>action</th>
        </tr>
        @foreach($jurusans as $jurusan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jurusan->jurusan_name }}</td>
            <td>{{ $jurusan->rombel }}</td>
            <td>{{ $jurusan->jml_siswa}}</td>
            <td>
                <a href="/dashboard/jurusan/{{ $jurusan->jurusan_name }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                <form action="/dashboard/jurusan/{{ $jurusan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"
                        onclick="return confirm('Are you sure delete this data?')"><i
                            class="bi bi-trash">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection