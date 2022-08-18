@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        @foreach($osiss as $osis)
            {{ $osis->title }}
                <a href="/dashboard/osis/{{ $osis->id }}/edit"
                    class="badge bg-success text-decoration-none text-white"><i class="bi bi-pen">edit</i></a>
                   {!! $osis->body !!} 
        @endforeach
</div>
</div>
@endsection