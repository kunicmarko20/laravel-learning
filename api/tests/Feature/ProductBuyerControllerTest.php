<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductBuyerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/products/5/buyers');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }
}
