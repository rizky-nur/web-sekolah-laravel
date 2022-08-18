@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $perpust->title }}</h2>
    <img src="{{ asset('storage/' . $perpust->image) }}" alt="" srcset="">
    {!! $perpust->body !!}
</div>
</div>
@endsection