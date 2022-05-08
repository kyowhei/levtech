@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<h1 class="title">Edit Mode</h1>
<div class="content">
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class='content__title'>
            <h2>タイトル</h2>
            <input type='text' name='post[title]' value="{{ $post->title }}">
        </div>
        <div class='content__body'>
            <h2>本文</h2>
            <input type='text' name='post[body]' value="{{ $post->body }}">
        </div>
        <input type="submit" value="update">
    </form>
</div>
<div class="back">[<a href="/posts/{{ $post->id }}">back</a>]</div>
@endsection