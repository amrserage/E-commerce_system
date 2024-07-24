<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use SoftDeletes;

    use HasTranslations;
    use HasFactory;

    public $translatable = ['name','description','meta_description','meta_title'];
    protected $fillable=[
        'name',
        'slug',
        'description',
        'image',
        'meta_title',       
        'meta_description',
        'meta_keywords',
        'is_showing',
        'is_popular'
    ];
    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
