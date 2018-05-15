<?php

namespace Tests\Feature;

use Tests\TestCase;

class BuyerTransactionControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/buyers/1/transactions');

        $response->assertStatus(200);
        $this->assertCount(2, $response->json('data'));
    }
}
