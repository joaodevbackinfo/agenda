<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'nascimento' => $this->faker->date(),
            'observacoes' => $this->faker->sentence,
        ];
    }
}
