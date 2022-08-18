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
            <th>img</th>
            <th>excerp</th>
            <th>action</th>
        </tr>
        @foreach($sambutans as $sambutan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sambutan->title }}</td>
            <td><img src="{{ asset('storage/' . $sambutan->image) }}" alt="$sambutan->image" srcset=""></td>
            <td>{!! $sambutan->excerp !!}</td>
            <td>
                <a href="/dashboard/sambutan/{{ $sambutan->slug }}"
                    class="badge bg-primary text-decoration-none text-white"><i class="bi bi-eye-fill">view</i></a>
                <a href="/dashboard/sambutan/{{ $sambutan->slug }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
