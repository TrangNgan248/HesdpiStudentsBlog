<div class="comments">
    @auth

    <div class="commentWrite">
        <img src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
        <form class="commentsWriteForm" action="/comment/{{$blog->id}}" method="POST">
            @csrf
            <textarea name="comment" class="commentsWriteInput" placeholder="Add a comment..."></textarea>
            <button class="writeSubmit">Comment</button>
        </form>
    </div>
    @endauth
    @foreach($comments as $comment)
    <ol class="commentsList">
        <li class="commentsListItem">
            <div class="commentsPerson">
                <img src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
                <span class="commentsName"> {{$comment->user->name}} &nbsp;</span>
                <span class="commentsDate">commented on {{$comment->created_at}} </span>
            </div>
            <div class="commentsInfo">
                <div class="commentsContent">
                    {{$comment->comment_content}}

                </div>
                <a href="/comment/delete/{{$comment->id}}"><i class="commentsDeleteIcon far fa-trash-alt"></i></a>
            </div>

            <div>
                @if (!$comment->likedBy(auth()->user()))
                <form action="/comment/like/{{$comment->id}}" method="POST">
                    @csrf
                    <button>
                        <i class="fa-regular fa-thumbs-up">
                            <span class="singlePostLikeNum"> {{count($comment->likes)}} </span>
                        </i>
                    </button>
                </form>
                @else
                <form action="/comment/unlike/{{$comment->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>
                        <i class="fa-solid fa-thumbs-up">
                            <span class="singlePostLikeNum"> {{count($comment->likes)}} </span>
                        </i>
                    </button>
                </form>
                @endif
            </div>

        </li>
    </ol>
    @endforeach
</div>