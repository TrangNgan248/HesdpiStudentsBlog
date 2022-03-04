@extends('layout.master')
@section('title')
<title>Home</title>
@endsection

@section('content')
@include('components.header')
@if(session()->has('message'))
<div class="message">
    {{ session()->get('message') }}
</div>
@endif
<div class="home">
   
    @include('components.posts')
    @include('components.sidebar')
</div>
@endsection
