<?php

namespace Tests\Feature;

use Tests\TestCase;

class TransactionCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/transactions/1/categories');

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));
    }
}
