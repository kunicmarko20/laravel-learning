<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategoryTransactionControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/categories/1/transactions');

        $response->assertStatus(200);
        $this->assertCount(82, $response->json('data'));
    }
}
