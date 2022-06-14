<?php

namespace App\Models\Brand;

use App\Models\Product\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'desc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'brands';

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
