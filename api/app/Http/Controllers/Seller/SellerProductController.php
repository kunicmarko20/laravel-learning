<?php

namespace App\Http\Controllers\Seller;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\Seller;
use App\User;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        return $this->jsonResponse(
            $seller->products
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request, User $seller)
    {
        return $this->jsonResponse(
            Product::fromProductStore($request, $seller->id),
            201
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Seller $seller, Product $product)
    {
        if (!$seller->isSelling($product)) {
            throw new HttpException(422, "Seller is not the owner of product.");
        }

        return $this->jsonResponse(
            $product->fromProductUpdate($request)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller, Product $product)
    {
        if (!$seller->isSelling($product)) {
            throw new HttpException(422, "Seller is not the owner of product.");
        }

        Storage::delete($product->image);
        $product->delete();

        return response()->json([], 204);
    }
}
