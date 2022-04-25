<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
   public function index(Post $post)
   {
    return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
   }
   
  /**
 * 特定IDのpostを表示する
<<<<<<< HEAD
 *引数の$postはid=1のPostインスタンス
=======
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
>>>>>>> refs/remotes/origin/master
 */
   public function show(Post $post)
   {
    return view('posts/show')->with(['post' => $post]);
   }
   
   public function create()
   {
    return view('posts/create');
   }
   
   public function store(PostRequest $request, Post $post)
   {
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
   }
}
