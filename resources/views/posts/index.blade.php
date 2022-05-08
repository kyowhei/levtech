@extends('layouts.app')

@section('content')
<p class='username'>ログイン中：<a href="/user">{{ Auth::user()->name }}</a></p>
<h1>Blog Name</h1>
<div class="create">
    <a href='/posts/create'>create</a>
</div>
 <div>
    @foreach($questions as $question)
        <div>
            <a href="https://teratail.com/questions/{{ $question['id'] }}">
                {{ $question['title'] }}
              </a>
        </div>
    @endforeach
</div>
<div class='posts'>
    @foreach ($posts as $post)
      <div class='post'>
          <h2 class='title'>
             <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
          </h2>
          <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
          <p class='body'>{{ $post->body}}</p>
          <small>posted by : {{ $post->user->name }}</small>
      </div>
      <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="button" onclick='deletePost();'>delete</button> 
      </form>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
<script>
    function deletePost(){
        'use strict';
        if (confirm('記事を削除しますか？')) {
            document.getElementById('form_{{ $post->id }}').submit();
        }
    }
</script>
@endsection