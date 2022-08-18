@extends('layouts.admin')
@section('content')
<div class="body px-3">
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
            <th>action</th>
        </tr>
        @foreach($visimisis as $visimisi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $visimisi->title }}</td>
            <td>
                <a href="/dashboard/VisiMisi/{{ $visimisi->id }}"
                    class="badge bg-primary text-decoration-none text-white"><i class="bi bi-eye-fill">view</i></a>
                <a href="/dashboard/VisiMisi/{{ $visimisi->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection