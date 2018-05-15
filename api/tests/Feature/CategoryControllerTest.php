<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/categories');

        $response->assertStatus(200);
        $this->assertCount(30, $response->json('data'));
    }

    public function testShow()
    {
        $category = Category::all()->random();
        $response = $this->getJson('/categories/' . $category->id);

        $response->assertStatus(200);
        $this->assertSame($category->name, $response->json('data')['name']);
    }

    public function testShowFail()
    {
        $response = $this->getJson('/categories/40');

        $response->assertStatus(404);
    }

    public function testStore()
    {
        $response = $this->postJson('/categories', [
            'name' => 'test',
            'description' => $description = 'some description',
        ]);

        $response->assertStatus(201);

        $this->assertSame($description, ($data = $response->json('data'))['description']);

        $this->assertSame(Category::find($data['id'])->name, $data['name']);
    }

    public function testUpdate()
    {
        $response = $this->postJson('/categories', [
            'name' => $name = 'test',
            'description' => 'some description',
        ]);

        $response->assertStatus(201);

        $response = $this->putJson('/categories/' . $response->json('data')['id'], [
            'description' => $description = 'fake description',
        ]);

        $response->assertStatus(200);

        $this->assertSame($name, $response->json('data')['name']);
        $this->assertSame($description, $response->json('data')['description']);
    }

    public function testDestroy()
    {
        $response = $this->postJson('/categories', [
            'name' => $name = 'test',
            'description' => 'some description',
        ]);

        $response->assertStatus(201);

        $this->assertCount(31, Category::all());
        $response = $this->delete('/categories/' . $id = $response->json('data')['id']);

        $response->assertStatus(204);

        $this->assertNull(Category::find($id));
        $this->assertCount(30, Category::all());
    }
}
