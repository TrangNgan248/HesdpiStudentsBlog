@extends('layout.master')
@section('title')
<title>Trending</title>
@endsection

@section('content')
<div class="bookmark">
    <div class="posts">
        @foreach($blogs as $blog)
        <div class="post">
            <a href="/singlePost/{{$blog->id}}"><img class="postImg" src="{{$blog->display}}" alt="Error" /></a>
            <div class="postInfo">
                <div class="postCats">
                    <span class="postCat">Music</span>
                    <span class="postCat">Life</span>
                </div>
                <span class="postTitle">
                    <a href="/singlePost/{{$blog->id}}">{{$blog->title}}</a>
                </span>
                <span class="postLikeComment">
                    @if(is_countable($blog->likes))
                    <i class="fa-regular fa-thumbs-up">
                        <span class="singlePostLikeNum"> {{count($blog->likes)}}</span>
                    </i>
                    
                    <i class="fa-regular fa-comment">
                        <span class="singlePostCommentsNum"> {{count($blog->comments)}} </span>
                    </i>
                    @endif
                </span>
                <hr />
                <div class="postAuthorDate">
                    <div class="postAuthor"> {{$blog->user->name}} </div>
                    <div class="postDate">{{$blog->created_at}}</div>
                </div>
            </div>
            <p class="postDesc">
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
                <li class="sidebarListItem"><a href="#">Bookmarked Blogs ({{$blogs->count()}}) </a></li>
            </ul>
        </div>
    </div>
</div>
@endsection