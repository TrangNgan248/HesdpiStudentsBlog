<div class='top'>
  <div class="topLeft">
    <i class="topIcon fa-brands fa-facebook-square"></i>
    <i class="topIcon fa-brands fa-twitter-square"></i>
    <i class="topIcon fa-brands fa-instagram-square"></i>
    <i class="topIcon fa-brands fa-youtube"></i>
  </div>
  <div class="topCenter">
    <ul class="topList">
      <a href="/home">
        <li class="topListItem">HOME</li>
      </a>
      <li class="topListItem">TAG </li>
      <li class="topListItem">TRENDING</li>
      <li class="topListItem">QUESTION</li>
      @auth
      <form action="/logout" method="POST">
        @csrf
        <button class="logoutButton">
          <li class="topListItem">LOGOUT</li>
        </button>
      </form>
      @endauth
      @guest
      <a href="/login">
        <li class="topListItem">LOGIN</li></button>
      </a>
      @endguest

    </ul>
  </div>
  <div class="topRight">
    <div class="search">
      <input class="search-txt" type="text" name="" placeholder="Type to search" />
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>
    @auth
    @if(auth()->user()->image == NULL)
                <img class="topImg" src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
                @else
                <img class="topImg" src="{{auth()->user()->image}}" alt="">
                @endif

    <ul>
      <li class="topHas-SubMenu">{{auth()->user()->name}}
        <ul class="topSubMenu">
          <li><i class="fa-solid fa-user"><a href="/profile/{{auth()->user()->id}}"> Profile</a></i></li>
          <li><i class="fa-solid fa-pen-to-square"><a href="/write"> Post status</a></i></li>
          <li><i class="fa-solid fa-gear"><a href="/setting/{{auth()->user()->id}}"> Setting</a></i></li>

        </ul>
      </li>
    </ul>
    @endauth
  </div>
</div>