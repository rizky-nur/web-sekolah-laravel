@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $osiss->title }}</h2>
    {!! $osiss->body !!}
</div>
</div>
@endsection