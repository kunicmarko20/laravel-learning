<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;

class ProductCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));
    }

    public function testUpdate()
    {
        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));

        $response = $this->putJson('/products/1/categories/5');

        $response->assertStatus(200);

        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(5, $response->json('data'));
    }

    public function testDestroy()
    {
        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));

        $response = $this->putJson('/products/1/categories/5');

        $response->assertStatus(200);

        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(5, $response->json('data'));

        $response = $this->delete('/products/1/categories/5');

        $response->assertStatus(204);

        $response = $this->getJson('/products/1/categories');

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));
    }
}
