@extends('layout.master')
@section('title')
<title>Post Status</title>
@endsection

@section('content')
<div class="write">
    <img class="writeImg" src="https://previews.123rf.com/images/saiyood/saiyood1805/saiyood180500531/100715547-gro%C3%9Fe-wei%C3%9Fe-panoramawolken-am-blauen-himmel-.jpg" alt="" />
    <form class="writeForm" action="/write" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="writeFormGroup">
            <input name="title" type="text" placeholder="Title" class="writeInput" value="{{old('title')}}" autoFocus={true} />
            @error('title')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
        <input name="image" placeholder="Link Image" class="writeInput" value="{{old('image')}}" type="text" id="fileInput" />
            @error('image')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
            <textarea name="description" placeholder="Description" class="writeInput" value="{{old('description')}}" autofocus={true}></textarea>
            @error('description')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="writeFormGroup">
            <textarea id="ckeditor_create" name="content" placeholder="Tell your story..." type="text" value="{{old('content')}}" class="writeInput writeText"></textarea>
            @error('content')
            <div class="error">
                <br>
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="writeSubmit">Publish</button>
    </form>
</div>
@endsection