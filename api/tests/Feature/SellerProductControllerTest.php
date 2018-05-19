<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SellerProductControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/sellers/1/products');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }

    public function testStore()
    {
        $response = $this->postJson('/sellers/1/products', [
            'name' => 'test',
            'description' => $description = 'some description',
            'quantity' => 11,
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertStatus(201);

        $this->assertSame($description, ($data = $response->json('data'))['description']);

        $this->assertSame(Product::find($data['id'])->name, $data['name']);
    }

    public function testUpdate()
    {
        $response = $this->postJson('/sellers/1/products', [
            'name' => $name = 'test',
            'description' => 'some description',
            'quantity' => 11,
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertStatus(201);

        $response = $this->putJson('/sellers/1/products/' . $response->json('data')['id'], [
            'description' => $description = 'fake description',
        ]);

        $response->assertStatus(200);

        $this->assertSame($name, $response->json('data')['name']);
        $this->assertSame($description, $response->json('data')['description']);
    }

    public function testDestroy()
    {
        $response = $this->postJson('/sellers/1/products', [
            'name' => $name = 'test',
            'description' => 'some description',
            'quantity' => 11,
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertStatus(201);

        $this->assertCount(1001, Product::all());
        $response = $this->delete('/sellers/1/products/' . $id = $response->json('data')['id']);

        $response->assertStatus(204);

        $this->assertNull(Product::find($id));
        $this->assertCount(1000, Product::all());
    }
}
