@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $strukturs->title }}</h2>
    {!! $strukturs->body !!}
</div>
</div>
@endsection