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
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $contact->title }}</td>
            <td>
                <a href="/dashboard/contact/{{ $contact->id }}"
                    class="badge bg-primary text-decoration-none text-white"><i class="bi bi-eye-fill">view</i></a>
                <a href="/dashboard/contact/{{ $contact->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                <form action="/dashboard/contact/{{ $contact->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="text" name="oldimage" id="oldimage" value="{{ $contact->image }}" hidden>
                    <input type="text" name="id" id="id" value="{{ $contact->id }}" hidden>
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