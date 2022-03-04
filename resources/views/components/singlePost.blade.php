<div class="singlePost">
    <div class="singlePostWrapper">
        @if($blog->display == NULL)
        <img src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
        @else
        <img src="{{$blog->display}}" alt="" class="singlePostImg" />

        @endif

        <h1 class="singlePostTitle">
            {{$blog->title}}
            @auth
            <div class="singlePostEdit">
                <div class="singlePostLikeComment">
                    @if (!$blog->bookmarkBy(auth()->user()))
                    <form action="/singlePost/bookmark/{{$blog->id}}" method="POST">
                        @csrf
                        <button>
                            <i class="fa-regular fa-bookmark"> </i>
                        </button>
                    </form>
                    @else
                    <form action="/singlePost/bookmark/{{$blog->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>
                            <i class="fa-solid fa-bookmark"> </i>
                        </button>
                    </form>
                    @endif
                </div>
                @if($blog->user->id == auth()->user()->id)
                <a href="/singlePost/edit/{{$blog->id}}"><i class="singlePostIcon far fa-edit"></i></a>

                <a href="/singlePost/delete/{{$blog->id}}"><i class="singlePostIcon far fa-trash-alt"></i></a>
                @endif
            </div>
            @endauth

        </h1>
        <div class="singlePostInfo">
            <span class="singlePostAuthor">
                Author: <a href="/profile/{{$blog->user->id}}"><b>{{$blog->user->name}}</b></a>
            </span>
            <span class="singlePostDate">
                {{$blog->created_at}}
            </span>
        </div>
        <p class="singlePostDesc">
           {!!$blog->content!!}
        </p>
        @auth
        <div class="singlePostLikeComment">
            @if (!$blog->likedBy(auth()->user()))
            <form action="/singlePost/like/{{$blog->id}}" method="POST">
                @csrf
                <button>
                    <i class="fa-regular fa-thumbs-up">
                        <span class="singlePostLikeNum"> {{count($blog->likes)}} </span>
                    </i>
                </button>
            </form>
            @else
            <form action="/singlePost/unlike/{{$blog->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>
                    <i class="fa-solid fa-thumbs-up">
                        <span class="singlePostLikeNum"> {{count($blog->likes)}} </span>
                    </i>
                </button>
            </form>
            @endif
            <i class="fa-regular fa-comment">
                <span class="singlePostCommentsNum"> {{count($blog->comments)}} </span>
            </i>

        </div>
        @endauth
    </div>
</div>