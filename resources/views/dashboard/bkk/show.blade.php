@extends('layouts.admin')
@section('content')
<div class="body px-3">

    <h2 class="pb-3">{{ $bkks->title }}</h2>
    {!! $bkks->body !!}
</div>
</div>
@endsection