<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="login">
        <span class="loginTitle">Login</span>
        <form class="loginForm" action="/login" method="POST">
            @csrf
            <label>Username</label>
            <input name="username" type="text" class="loginInput" placeholder="Enter your username..." />
            @error('username')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <label>Password</label>
            <input name="password" type="password" class="loginInput" placeholder="Enter your password..." />
            @error('password')
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <button class="loginButton">Login</button>
        </form>
        <button class="loginRegisterButton"><a href="/register">Register</a> </button>
    </div>
</body>

</html>