@extends('layout.master')

@section('title')
<title>Profile</title>
@endsection

@section('content')

@if(session()->has('message'))
<div class="message">
    {{ session()->get('message') }}
</div>
@endif
<div class="profile">
    <div class="myPosts">
        @foreach($blogs as $blog)
        <div class="myPost">
            <a href="/singlePost/{{$blog->id}}"><img class="myPostImg" src="{{$blog->display}}" alt="Error" /></a>
            <div class="myPostInfo">
                <div class="myPostCats">
                    <span class="myPostCat">Music</span>
                    <span class="myPostCat">Life</span>
                </div>
                <span class="myPostTitle">
                    <a href="/singlePost/{{$blog->id}}">{{$blog->title}}</a>
                </span>
                <span class="myPostLikeComment">
                    <i class="fa-regular fa-thumbs-up">
                        <span class="singlemyPostLikeNum">{{$blog->likes->count()}}</span>
                    </i>
                    <i class="fa-regular fa-comment">
                        <span class="singlemyPostCommentsNum"> {{$blog->comments->count()}} </span>
                    </i>
                </span>
                <hr />
                <div class="myPostAuthorDate">
                    <div class="myPostAuthor"> {{$blog->user->name}} </div>
                    <div class="myPostDate">{{$blog->created_at}}</div>
                </div>
            </div>
            <p class="myPostDesc">
                {{$blog->description}}
            </p>
        </div>
        @endforeach
    </div>

    <div class='sidebar'>
    <div class="sidebarItem">
        <span class="sidebarTitle">ABOUT ME</span>
        @if($user->image == NULL)
                <img src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
                @else
                <img src="{{$user->image}}" alt="">
                @endif
        
        @auth
        @if($user->id != auth()->user()->id)
        @if(!auth()->user()->followedBy($user))
        <form action="/follow/{{$user->id}}" method="POST">
            @csrf
            <button class="PPfollowButton">Theo dõi</button>
        </form>
        @else
        <form action="/follow/{{$user->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="PPunfollowButton">Bỏ Theo dõi</button>
        </form>
        @endif
        @endif
        @endauth
        <p>
            {{$user->name}}
            <br>
            Email: {{$user->email}}
        </p>
    </div>
    <div class="sidebarItem">
        <span class="sidebarTitle">CATEGORIES</span>
        <ul class="sidebarList">
            <li class="sidebarListItem"><a href="/listFollower/{{$user->id}}">Follow ({{$user->followers->count()}}) </a></li>
            <li class="sidebarListItem"><a href="/bookmark/{{$user->id}}">Bookmarked Blogs ({{$blogs->count()}}) </a></li>
        </ul>
    </div>
</div>
</div>
@endsection