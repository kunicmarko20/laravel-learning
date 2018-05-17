<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategoryProductsControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/categories/1/products');

        $response->assertStatus(200);
        $this->assertCount(107, $response->json('data'));
    }
}
