<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{
    use SoftDeletes;
    use HasTranslations;
    use HasFactory;
    protected $fillable=[
        'product_id',
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public $translatable = ['name','short_description','description','meta_description'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function productImages(){
        return $this->hasMany(product_image::class,'product_id','id');
    }
    public function orders(){
        return $this->belongsToMany(Orders::class);
    }
}
