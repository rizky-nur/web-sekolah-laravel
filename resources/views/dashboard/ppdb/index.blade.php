@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <a href="/dashboard/ppdb/create" class="btn btn-primary">Add new post</a>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-responsive mt-3">
        <tr>
            <th>No</th>
            <th>title</th>
            <th>image</th>
            <th>action</th>
        </tr>
        @foreach($ppdb as $ppdb)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ppdb->title }}</td>
            <td><img src="{{ asset('storage/' . $ppdb->image) }}" class="d-block img-fluid mb-3 col-sm-5"></td>
            <td>
                <a href="/dashboard/ppdb/{{ $ppdb->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                <form action="/dashboard/ppdb/destroy" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="text" name="oldimage" id="oldimage" value="{{ $ppdb->image }}" hidden>
                    <input type="text" name="id" id="id" value="{{ $ppdb->id }}" hidden>
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