<?php

namespace Tests\Feature;

use Tests\TestCase;

class BuyerCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/buyers/1/categories');

        $response->assertStatus(200);
        $this->assertCount(7, $response->json('data'));
    }
}
