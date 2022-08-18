@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $pkss->title }}</h2>
    {!! $pkss->body !!}
</div>
</div>
@endsection