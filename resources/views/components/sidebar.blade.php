<div class='sidebar'>
    @auth
    <div class="sidebarItem">
        <span class="sidebarTitle">ABOUT ME</span>
        @if(auth()->user()->image == NULL)
            <a href="/profile/{{auth()->user()->id}}">
            <img class="postImg" src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
            </a>       
            @else
            <a href="/profile/{{auth()->user()->id}}"><img class="postImg" src="{{auth()->user()->image}}" alt="Error" /></a>
            @endif
        <p>
          {{auth()->user()->name}}  
          <br>
          {{auth()->user()->email}}
        </p>
    </div>
    <div class="sidebarItem">
        <span class="sidebarTitle">CATEGORIES</span>
        <ul class="sidebarList">
            <li class="sidebarListItem"><a href="/listFollower/{{auth()->user()->id}}">Follow ({{auth()->user()->followers->count()}}) </a></li>
            <li class="sidebarListItem"><a href="/bookmark/{{auth()->user()->id}}">Bookmarked Blogs ({{auth()->user()->bookmarkBlogs->count()}}) </a></li>
        </ul>
    </div>
    @endauth
</div>