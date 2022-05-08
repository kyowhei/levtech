<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use App\Category;

class PostController extends Controller
{
   public function index(Post $post)
   {
    //クライアントインスタンス生成
    $client = new \GuzzleHttp\Client();
    
    //GET通信するURL。terataleではこのURLにアクセストークンを用いてGET通信することで最新の質問データを取得できる。
    $url = 'https://teratail.com/api/v1/questions';
    
    //リクエスト送信と返却データの取得
    //Bearerトークンにアクセストークンを指定して認証を行う
    $response = $client->request(
        'GET',
        $url,
        ['Bearer' => config('services.teratail.token')]
    );
    
    //API通信で取得したデータはjson形式なので
    //PHPファイルに対応した連想配列にデコードする
    $questions = json_decode($response->getBody(),true);
    
    //index bladeに取得したデータを渡す
    return view('posts/index')->with([
        'posts' => $post->getPaginateByLimit(),
        'questions' => $questions['questions'],
    ]);
   }
   
  /**
 * 特定IDのpostを表示する
 *引数の$postはid=1のPostインスタンス
 */
   public function show(Post $post)
   {
    return view('posts/show')->with(['post' => $post]);
   }
   
   public function create(Category $category)
   {
    return view('posts/create')->with(['categories' => $category->get()]);  //カテゴリーのすべてのデータをcreate.blade.phpに渡す
   }
   
   public function store(PostRequest $request, Post $post)
   {
    $input = $request['post'];
    $input += ['user_id' => $request->user()->id];  //リレーションで定義したPostモデルのuserメソッドを呼び出し、関連するUserインスタンスのidプロパティを、連想配列の形でuser_idのキーに持たせている。それをPostインスタンスのプロパティとして保存。
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
   }
   
   public function edit(Post $post)
   {
    return view('posts/edit')->with(['post' => $post]);
   }
   
   public function update(PostRequest $request, Post $post)
   {
    $input_post = $request['post'];
    $input_post += ['user_id' => $request->user()->id];  //リレーションで定義したPostモデルのuserメソッドを呼び出し、関連するUserインスタンスのidプロパティを、連想配列の形でuser_idのキーに持たせている。それをPostインスタンスのプロパティとして保存。
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
   }
   
   public function delete(Post $post)
   {
    $post->delete();
    return redirect('/');
   }
}
