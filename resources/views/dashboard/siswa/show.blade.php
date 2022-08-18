@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @foreach($siswas as $siswa)
    <h2 class="pb-3">{{ $siswa->title }}</h2>
    <img src="{{ asset('storage/' . $siswa->image) }}" alt="" srcset="">
    {!! $siswa->description !!}
    @endforeach
</div>
</div>
@endsection