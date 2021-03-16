<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $table = 'product_galeries';
    protected $fillable = [
        'product_id', 'photo', 'is_default'
    ];

    protected $hidden = [];

    public function products()
    {

        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


    // accessor
    public function getPhotoAttribute($value)
    {

        return url('storage/' . $value);
    }
}
