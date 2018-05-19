<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTransactionControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/products/5/transactions');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }
}
