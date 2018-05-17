<?php

namespace Tests\Feature;

use Tests\TestCase;

class SellerCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/sellers/5/categories');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }
}
