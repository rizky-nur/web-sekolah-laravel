@extends('layouts.admin')
@section('content')
<div class="body px-3">
    <h2 class="pb-3">{{ $contact->title }}</h2>
    <img src="{{ asset('storage/' . $contact->image) }}" alt="" srcset="">
    {!! $contact->description !!}
</div>
</div>
@endsection