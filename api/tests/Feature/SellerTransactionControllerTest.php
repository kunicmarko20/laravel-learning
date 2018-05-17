<?php

namespace Tests\Feature;

use Tests\TestCase;

class SellerTransactionControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/sellers/3/transactions');

        $response->assertStatus(200);
    }
}
