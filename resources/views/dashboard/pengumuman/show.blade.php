@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">{{ $pengumuman->title }}</h2>
    <img src="{{ asset('storage/' . $pengumuman->image) }}" alt="" srcset="">
    {!! $pengumuman->description !!}
</div>
</div>
@endsection