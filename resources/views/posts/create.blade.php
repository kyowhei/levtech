@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<h1>Blog Name</h1>
<form action="/posts" method="POST">
    @csrf
    <div class="title">
        <h2>Title</h2>
        <input type="text" name="post[title]" placeholder="タイトルを入力" value="{{ old('post.title') }}"/>
        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
    </div>
    <div class="body">
        <h2>Body</h2>
        <textarea name="post[body]" placeholder="記事内容を入力">{{ old('post.body') }}</textarea>
        <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
    </div>
    <div class="category">
        <h2>Category</h2>
        <select name="post[category_id]">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            //$categoriesにはカテゴリーの全件データが入っているので、それを１件ずつ表示。
            //実際に送信したい値はカテゴリーのidなので、valueには各カテゴリーのidを設定。
        </select>
    </div>
    <input type="submit" value="store"/>
</form>
<div class="back">[<a href="/">back</a>]</div>
@endsection