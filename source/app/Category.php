<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'name',  'desc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public function product(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
