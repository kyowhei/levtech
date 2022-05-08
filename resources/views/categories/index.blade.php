@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<h1>Blog Name</h1>
<div class="create">
    <a href='/posts/create'>create</a>
</div>
<div class='posts'>
    @foreach ($posts as $post)
      <div class='post'>
          <h2 class='title'>
             <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
          </h2>
          <a href="">{{ $post->category->name }}</a>
          <p class='body'>{{ $post->body}}</p>
      </div>
      <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="submit">delete</button> 
      </form>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
<div class="back">[<a href="/">back</a>]</div>
@endsection