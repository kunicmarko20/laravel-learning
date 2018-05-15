<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/products');

        $response->assertStatus(200);
        $this->assertCount(1000, $response->json('data'));
    }

    public function testShow()
    {
        $product = Product::all()->random();
        $response = $this->getJson('/products/' . $product->id);

        $response->assertStatus(200);
        $this->assertSame($product->name, $response->json('data')['name']);
    }

    public function testShowFail()
    {
        $response = $this->getJson('/products/1001');

        $response->assertStatus(404);
    }
}
