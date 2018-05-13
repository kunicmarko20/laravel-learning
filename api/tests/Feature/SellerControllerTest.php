<?php

namespace Tests\Feature;

use App\Scope\SellerScope;
use App\Seller;
use Tests\TestCase;

class SellerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/sellers');

        $response->assertStatus(200);
        $this->assertCount(636, $response->json('data'));
    }

    public function testShow()
    {
        $seller = Seller::has('products')->get()->random();
        $response = $this->getJson('/sellers/' . $seller->id);

        $response->assertStatus(200);
        $this->assertSame($seller->name, $response->json('data')['name']);
    }

    public function testShowFail()
    {
        $seller = Seller::withoutGlobalScope(SellerScope::class)->doesntHave('products')->get()->random();

        $response = $this->getJson('/sellers/' . $seller->id);

        $response->assertStatus(404);
    }
}
