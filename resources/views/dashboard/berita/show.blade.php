@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @foreach($beritas as $berita)
    <img src="{{ asset('storage/' . $berita->image) }}" alt="" srcset="">
    @endforeach
</div>
</div>
@endsection