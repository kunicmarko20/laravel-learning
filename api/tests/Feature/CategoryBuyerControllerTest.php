<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategoryBuyerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/categories/1/buyers');

        $response->assertStatus(200);
        $this->assertCount(80, $response->json('data'));
    }
}
