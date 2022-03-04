@extends('layout.master')
@section('title')
<title>Post</title>
@endsection

@section('content')
@if(session()->has('message'))
<div class="message">
    {{ session()->get('message') }}
</div>
@endif
<div class="single">

    <div class="singlePostComment">
        @include('components.singlePost')
        @include('components.comment')
    </div>

    @include('components.sidebar')
</div>
@endsection