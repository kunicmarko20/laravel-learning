<?php

namespace App;

use App\Scope\SellerScope;

class Seller extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScope());
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function isSelling(Product $product): bool
    {
        return $this->id === $product->seller_id;
    }
}
