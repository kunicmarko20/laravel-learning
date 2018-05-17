<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class SellerBuyerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/sellers/5/buyers');

        $response->assertStatus(200);
        $this->assertCount(3, $response->json('data'));
    }
}
