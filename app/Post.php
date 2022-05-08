<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   use SoftDeletes; #PHPでいうトレイト
    
   protected $fillable = [
  'title',
  'body',
  'category_id'
  //PostControllerのstoreメソッドにて、fill関数で挿入できるようにする
   ];

  public function getPaginateByLimit(int $limit_count = 5)
  {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    //::with(リレーション名)->paginate();はEagerローディングという機能を使う書き方。
    //リレーションによって増えるデータベースアクセスの回数を減らすための機能。
  }
  
  //Categoryに対するリレーション。多対１なので単数形
  public function category()
  {
      return $this->belongsTo('App\Category');
  }
}
