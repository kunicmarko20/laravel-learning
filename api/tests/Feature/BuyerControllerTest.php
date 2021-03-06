<?php

namespace Tests\Feature;

use App\Buyer;
use App\Scope\BuyerScope;
use Tests\TestCase;

class BuyerControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/buyers');

        $response->assertStatus(200);
        $this->assertCount(654, $response->json('data'));
    }

    public function testShow()
    {
        $buyer = Buyer::all()->random();
        $response = $this->getJson('/buyers/' . $buyer->id);

        $response->assertStatus(200);
        $this->assertSame($buyer->name, $response->json('data')['name']);
    }

    public function testShowFail()
    {
        $buyer = Buyer::withoutGlobalScope(BuyerScope::class)->doesntHave('transactions')->get()->random();

        $response = $this->getJson('/buyers/' . $buyer->id);

        $response->assertStatus(404);
    }
}
