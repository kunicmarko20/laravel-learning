<?php

namespace Tests\Feature;

use App\Transaction;
use Tests\TestCase;

class TransactionSellerControllerTest extends TestCase
{
    public function testIndex()
    {
        $transaction = Transaction::all()->random();
        $response = $this->getJson('/transactions/'. $transaction->id .'/sellers');

        $response->assertStatus(200);
        $this->assertSame($transaction->product->seller->name, $response->json('data')['name']);
        $this->assertSame($transaction->product->seller->email, $response->json('data')['email']);
    }
}
