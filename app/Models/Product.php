<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'description', 'image', 'price', 'slug', 'is_active', 'user_id',
    ];


    protected static function boot()
    {
        parent::boot();

        /**
         *
         * create slug when created
         */
        static::creating(function ($product) {
            $product->slug =  Str::slug($product->name) . '-' . str::random(4);
        });

        /**
         *
         * update slug when updated
         */
        static::updating(function ($product) {
            $product->slug =  Str::slug($product->name) . '-' . str::random(4);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Here is the scope for normal , gold , silver products
     *  i will add the terms for each one
     * normal ---> all products that price is lower than or equal 100
     * silver---> all products that price is lower than 200
     * gold---> all products that price greater than 0
     */
    public function scopeNorrmalProducts($query)
    {
        return $query->where('price', '<=', 100);
    }
    public function scopeSilverProducts($query)
    {
        return $query->where('price', '<=', 200);
    }
    public function scopeGoldProducts($query)
    {
        return $query->where('price', '>', 0);
    }
}
