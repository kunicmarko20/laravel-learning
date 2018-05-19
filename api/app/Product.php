<?php

namespace App;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    const PRODUCT_AVAILABLE = 'available';
    const PRODUCT_UNAVAILABLE = 'unavailable';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function isAvailable(): bool
    {
        return $this->status == self::PRODUCT_AVAILABLE;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function fromProductStore(ProductStoreRequest $request, int $sellerId): self
    {
        $product = new self();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = self::PRODUCT_UNAVAILABLE;
        $product->image = $request->image->store('');
        $product->seller_id = $sellerId;

        $product->save();

        return $product;
    }

    public function fromProductUpdate(ProductUpdateRequest $request): self
    {
        if ($request->has('name')) {
            $this->name = $request->name;
        }

        if ($request->has('description')) {
            $this->description = $request->description;
        }

        if ($request->has('quantity')) {
            $this->quantity = $request->quantity;
        }

        if ($request->has('status')) {
            $this->status = $request->status;
        }

        if ($request->hasFile('image')) {
            Storage::delete($this->image);
            $this->image = $request->image->store('');
        }

        $this->save();

        return $this;
    }
}
