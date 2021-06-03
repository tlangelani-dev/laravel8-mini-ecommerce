<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Product extends Model
{
    use HasFactory;

    public function category(): Relation
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
