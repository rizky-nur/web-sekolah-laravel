@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @foreach($profiles as $profile)
    <img src="{{ asset('storage/' . $profile->image) }}" alt="" srcset="">
    {!! $profile->description !!}
    @endforeach
</div>
</div>
@endsection