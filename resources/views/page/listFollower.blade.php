@extends('layout.master')

@section('title')
<title>List Follower</title>
@endsection

@section('content')
<div class="listFollower">

    <div class="posts">
        @foreach($followersInfo as $follower)
        <div class="post">
            @if($follower->image == NULL)
            <a href="/profile/{{$follower->id}}">
            <img class="postImg" src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
            </a>       
            @else
            <a href="/profile/{{$follower->id}}"><img class="postImg" src="{{$follower->image}}" alt="Error" /></a>
            @endif

            <div class="postInfo">
                <span class="postTitle">
                    <a href="/profile/{{$follower->id}}">{{$follower->name}}</a>
                </span>
            </div>
        </div>
        @endforeach
    </div>

    @include('components.sidebar')
</div>
@endsection