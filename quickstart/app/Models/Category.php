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
    protected $fillable = [
        'name',
        'desc',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
