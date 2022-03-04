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
            <i class="fa-regular fa-thumbs-up">
                <span class="singlePostLikeNum"> {{count($blog->likes)}}</span>
            </i>
            <i class="fa-regular fa-comment">
                <span class="singlePostCommentsNum"> {{count($blog->comments)}} </span>
            </i>
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