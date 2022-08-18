@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @foreach($gurus as $guru)
    <h2 class="pb-3">{{ $guru->title }}</h2>
    <img src="{{ asset('storage/' . $guru->image) }}" alt="" srcset="">
    {!! $guru->description !!}
    @endforeach
</div>
</div>
@endsection