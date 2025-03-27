<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = 'products';

    protected $appends = ['is_sale'];


    public function getIsSaleAttribute()
    {
        return $this->quantity > 0 && $this->sale_price !== 0 && $this->sale_price && $this->date_on_sale_from <= Carbon::now() && $this->date_on_sale_to >= Carbon::now();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class, 'products_id');
    }


    public function scopeSearch($query, $search)
    {
        $query->where('name', 'LIKE', '%' . trim($search) . '%')->orWhere('description', 'LIKE', '%' . trim($search) . '%');
    }

    //public function scopeCategory($query, $categoryName)
    // {

    //     if ($categoryName) {
    //         return $query->whereHas('category', function ($q) use ($categoryName) {
    //             $q->where('name', $categoryName);
    //         });
    //     }

    //     return $query;
    // }


    public function scopeFilter($query)
    {
        if (request()->has('category')) {
            $query->where('category_id', request()->query('category'));
        };

        if (request()->has('sortBy')) {
            switch (request()->query('sortBy')) {
                case 'max':
                    $query->orderBy('price', 'desc');
                    break;
                case 'min':
                    $query->orderBy('price');
                    break;
                case 'bestsaller':
                    $query;
                    break;
                case 'sale':
                    $query->where('sale_price', '!=', 0)->where('date_on_sale_to', '>=', Carbon::now())->where('date_on_sale_from', '<=', Carbon::now());
                    break;
                default:
                    $query;
                    break;
            }
            // return $query;
        }
    }
}
