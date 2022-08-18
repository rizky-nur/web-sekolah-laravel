@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $visimisis->title }}</h2>
    {!! $visimisis->body !!}
</div>
</div>
@endsection