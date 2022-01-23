<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */
    protected $model = Message::class ;

    public function definition()
    {
        return [
            'contenu' => $this->faker->sentences(5, true),
        ];
    }
}
