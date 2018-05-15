<?php

namespace Tests\Feature;

use App\Transaction;
use Tests\TestCase;

class TransactionBuyerControllerTest extends TestCase
{
    public function testIndex()
    {
        $transaction = Transaction::all()->random();
        $response = $this->getJson('/transactions/'. $transaction->id .'/buyers');

        $response->assertStatus(200);
        $this->assertSame($transaction->buyer->name, $response->json('data')['name']);
        $this->assertSame($transaction->buyer->email, $response->json('data')['email']);
    }
}
