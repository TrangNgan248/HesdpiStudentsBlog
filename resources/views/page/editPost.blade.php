@extends('layout.master')
@section('title')
<title>Post Status</title>
@endsection

@section('content')
<div class="write">
    <img class="writeImg" src="https://previews.123rf.com/images/saiyood/saiyood1805/saiyood180500531/100715547-gro%C3%9Fe-wei%C3%9Fe-panoramawolken-am-blauen-himmel-.jpg" alt="" />
    <form class="writeForm" action="/singlePost/update/{{$blog->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="writeFormGroup">
            <input name="title" type="text" value="{{$blog->title}}" class="writeInput" autoFocus={true} />
            @error('title')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
            <input name="image" placeholder="Link Image" class="writeInput" type="text" id="fileInput" value="{{$blog->display}}" />
            @error('image')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
            <textarea name="description" class="writeInput" autofocus={true}> {{$blog->description}} </textarea>
            @error('description')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
            <textarea id="ckeditor_edit" name="content" type="text" class="writeInput writeText"> {{$blog->content}} </textarea>
            @error('content')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="writeSubmit">Update</button>
    </form>
</div>
@endsection