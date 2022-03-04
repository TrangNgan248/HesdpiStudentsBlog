<!DOCTYPE html>

<html>

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="register">
        <span class="registerTitle">Register</span>
        <form class="registerForm" action="/register" method="POST">
            @csrf
            <label>Full name</label>
            <input name="name" type="text" value="{{old('name')}}" class="registerInput" placeholder="Enter your fullname..." />
            @error('name')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <label>Username</label>
            <input name="username" type="text" value="{{old('username')}}" class="registerInput" placeholder="Enter your username..." />
            @error('username')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <label>Email</label>
            <input name="email" type="email" value="{{old('email')}}" class="registerInput" placeholder="Enter your email..." />
            @error('email')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <label>Password</label>
            <input name="password" type="password" class="registerInput" placeholder="Enter your password..." />
            @error('password')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <label>Confirm Password</label>
            <input name="password_confirmation" type="password" class="registerInput" placeholder="Confirm your password..." />
            @error('password_confirmation')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <button class="registerButton">Register</button>
        </form>
        <button class="registerLoginButton"><a href="/login"> Login</a></button>
    </div>
</body>

</html>