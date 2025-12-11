<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_user_can_create_contato()
{
    $user = User::factory()->create();
    $this->actingAs($user)
         ->post(route('contatos.store'), [
             'nome' => 'Fulano',
             'email' => 'fulano@example.com',
             'telefone' => '99999-9999',
         ])->assertRedirect(route('contatos.index'));

    $this->assertDatabaseHas('contatos', ['nome' => 'Fulano', 'user_id' => $user->id]);
}
}
