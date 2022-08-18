@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <a href="/dashboard/guru/create" class="btn btn-primary">Add new post</a>
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
            <th>action</th>
        </tr>
        @foreach($gurus as $guru)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guru->name }}</td>
            <td><img src="{{ asset('storage/' . $guru->image) }}" class="d-block img-fluid mb-3 col-sm-5"></td>
            <td>{{ $guru->gender }}</td>
            <td>
                <a href="/dashboard/guru/{{ $guru->id }}" class="badge bg-primary text-decoration-none text-white"><i
                        class="bi bi-eye-fill">view</i></a>
                <a href="/dashboard/guru/{{ $guru->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                <form action="/dashboard/guru/destroy" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="text" name="oldimage" id="oldimage" value="{{ $guru->image }}" hidden>
                    <input type="text" name="id" id="id" value="{{ $guru->id }}" hidden>
                    <button type="submit" class="badge bg-danger border-0"
                        onclick="return confirm('Are you sure delete this data?')"><i
                            class="bi bi-trash">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $gurus->links() }}
</div>
</div>
@endsection