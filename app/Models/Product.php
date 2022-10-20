<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'ean',
        'name',
        'category_id',
        'price',
        'description',
        'details',
    ];

    public function productCategory()
    {
        return $this->belongsTo(Category::class);
    }
}
