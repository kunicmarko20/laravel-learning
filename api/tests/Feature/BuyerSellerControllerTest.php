<?php

namespace Tests\Feature;

use Tests\TestCase;

class BuyerSellerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/buyers/1/sellers');

        $response->assertStatus(200);
        $this->assertCount(2, $response->json('data'));
    }
}
