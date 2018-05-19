<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('/users');

        $response->assertStatus(200);
        $this->assertCount(1000, $response->json('data'));
    }

    public function testShow()
    {
        $response = $this->getJson('/users/1');

        $response->assertStatus(200);
        $this->assertSame(User::find(1)->name, $response->json('data')['name']);
    }

    public function testShowFail()
    {
        $response = $this->getJson('/users/1231231');

        $response->assertStatus(404);
        $this->assertSame('User could not be found.', $response->json('message'));
    }

    public function testStore()
    {
        $response = $this->postJson('/users', [
           'name' => 'test',
           'email' => $email = 'test@test.com',
           'password' => 'test123',
           'password_confirmation' => 'test123',
        ]);

        $response->assertStatus(201);

        $this->assertSame($email, ($data = $response->json('data'))['email']);

        $this->assertSame(User::find($data['id'])->name, $data['name']);
    }

    public function testUpdate()
    {
        $response = $this->postJson('/users', [
           'name' => 'test',
           'email' => 'test@test.com',
           'password' => 'test123',
           'password_confirmation' => 'test123',
        ]);

        $response->assertStatus(201);

        $response = $this->putJson('/users/' . $response->json('data')['id'], [
            'name' => $name = 'bla',
            'email' => 'test@test.com',
        ]);

        $response->assertStatus(200);

        $this->assertSame($name, $response->json('data')['name']);
    }

    public function testDestroy()
    {
        $response = $this->postJson('/users', [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test123',
            'password_confirmation' => 'test123',
        ]);

        $response->assertStatus(201);

        $this->assertCount(1001, User::all());
        $response = $this->delete('/users/' . $id = $response->json('data')['id']);

        $response->assertStatus(204);

        $this->assertNull(User::find($id));
        $this->assertCount(1000, User::all());
    }

    public function testVerify()
    {
        $user = User::where('verified', '0')->get()->random();

        $response = $this->putJson('/users/verify/' . $user->verification_token);

        $response->assertStatus(204);
        $this->assertSame('1', User::find($user->id)->verified);
    }
}
