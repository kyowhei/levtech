<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class="create">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        </div>
            <h3>Title</h3>
            <h2 class="title">
                {{ $post->title }}
            </h2>
            <a href="">{{ $post->category->name }}</a>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost();">delete</button> 
        </form>
        <script>
            function deletePost(){
                'use strict';
                if (confirm('記事を削除しますか？')) {
                    document.getElementById('form_{{ $post->id }}').submit();
                }
            }
        </script>
    </body>
</html>