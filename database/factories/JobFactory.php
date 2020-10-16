<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'title' => $this->faker->words(3,true),
            'details' => $this->faker->paragraphs(rand(4,7),true),
            'deadline' => $this->faker->dateTimeBetween('now','+10 months'),
            'address' =>$this->faker->address
        ];
    }
}
