<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    public function updating(Product $product)
    {
        if ($product->quantity != 0 || !$product->isAvailable()) {
            return;
        }

        $product->status = Product::PRODUCT_UNAVAILABLE;

        $product->save();
    }
}
