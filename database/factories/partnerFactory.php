<?php

namespace Database\Factories;

use App\Models\partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class partnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'last_name'=>$this->faker->name(),
            'DNI'=>$this->faker->numberBetween(10000000,99999999)
        ];
    }
}
