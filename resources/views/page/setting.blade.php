@extends('layout.master')
@section('title')
<title>Setting</title>
@endsection

@section('content')
<div class="settings">
    <div class="settingsWrapper">
        <div class="settingsTitle">
            <span class="settingsUpdateTitle">Update Your Account</span>
            <!-- <form action="/setting/{{auth()->user()->id}}" method="POST">
                @csrf
                @method('DELETE')
                <span class="settingsDeleteTitle"><button>Delete Account</button> </span>
            </form> -->
            
        </div>
        <form action="/setting/{{auth()->user()->id}}" method="POST" class="settingsForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>Profile Picture</label>
            <div class="settingsPP">
                @if(auth()->user()->image == NULL)
                <img src="https://afamilycdn.com/2019/8/16/jung-hae-in-mua-xe-hoi-dat-tien-tang-quan-ly-lau-nam-ef72a2-1565950866519593001824.jpg" alt="" />
                @else
                <img src="{{auth()->user()->image}}" alt="">
                @endif
            </div>
            <label>Image</label>
            <input name="image" value="{{auth()->user()->image}}" placeholder="Link Image" type="text" />
            <div class="error">
                @error('image')
                {{$message}}
                @enderror
            </div>
            <label>Name</label>
            <input name="name" value="{{auth()->user()->name}}" type="text" placeholder="Name" />
            <div class="error">
                @error('name')
                {{$message}}
                @enderror
            </div>
            <label>Username</label>
            <input name="username" value="{{auth()->user()->username}}" type="text" placeholder="Username" />
            <div class="error">
                @error('username')
                {{$message}}
                @enderror
            </div>
            <label>Email</label>
            <input name="email" value="{{auth()->user()->email}}" type="email" placeholder="Email@email.com" />
            <div class="error">
                @error('email')
                {{$message}}
                @enderror
            </div>
            <label>Password</label>
            <input name="password" type="password" />
            <div class="error">
                @error('password')
                {{$message}}
                @enderror
            </div>
            <button class="settingsSubmit">Update</button>
        </form>
    </div>
    <Sidebar />
</div>
@endsection