@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $mpks->title }}</h2>
    {!! $mpks->body !!}
</div>
</div>
@endsection