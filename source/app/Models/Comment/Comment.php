<?php

<<<<<<<< HEAD:source/app/Models/Comment/Comment.php
namespace App\Models\Comment;

use App\Models\Product\Product;
========
namespace App\Models\Product;

use App\Product;
>>>>>>>> a8e3ab1 (Settings Environment):source/app/Models/Product/Comment.php
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    // public $rep_comment = false;
    protected $fillable = [
        'name', 'desc','status','product_id','rep_comment'
    ];
    protected $primaryKey = 'id';
    protected $table = 'comments';
    public function product(){
        return $this->belongsto(Product::class,'product_id','id');
    }
}
