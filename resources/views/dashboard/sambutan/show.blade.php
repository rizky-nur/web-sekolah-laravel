@extends('layouts.admin')
@section('content')
<div class="body px-3">
    @foreach($sambutans as $sambutan)
    <h2 class="pb-3">{{ $sambutan->title }}</h2>
    <img src="{{ asset('storage/' . $sambutan->image) }}" alt="$sambutan->image" srcset="">
    {!! $sambutan->description !!}
    @endforeach
</div>
</div>
@endsection