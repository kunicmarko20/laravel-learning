<?php

namespace Tests\Feature;

use Tests\TestCase;

class BuyerProductControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/buyers/1/products');

        $response->assertStatus(200);
        $this->assertCount(2, $response->json('data'));
    }
}
