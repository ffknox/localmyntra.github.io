<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'color',
        'point_one',
        'point_two',
        'product_id',
        'discount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
