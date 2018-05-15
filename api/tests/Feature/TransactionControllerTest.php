<?php

namespace Tests\Feature;

use App\Transaction;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/transactions');

        $response->assertStatus(200);
        $this->assertCount(1000, $response->json('data'));
    }

    public function testShow()
    {
        $transaction = Transaction::all()->random();
        $response = $this->getJson('/transactions/' . $transaction->id);

        $response->assertStatus(200);
        $this->assertSame($transaction->quantity, $response->json('data')['quantity']);
    }

    public function testShowFail()
    {
        $response = $this->getJson('/transactions/1001');

        $response->assertStatus(404);
    }
}
