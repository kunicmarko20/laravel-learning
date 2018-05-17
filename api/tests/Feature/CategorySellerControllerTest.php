<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategorySellerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/categories/1/sellers');

        $response->assertStatus(200);
        $this->assertCount(103, $response->json('data'));
    }
}
