<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [
        // 'name',
        'desc',
    ];

    protected $fillable = [
        'name',
        'desc',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot() 
    {
        parent::boot();
        static::deleting(function($category) {
            foreach ($category->products()->get() as $p) {
                $p->delete();
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->orderBy('id', 'desc');
    }

    // recursive, load all children
    public function subCategories()
    {
        return $this->children()->with('subCategories');
    }
}
