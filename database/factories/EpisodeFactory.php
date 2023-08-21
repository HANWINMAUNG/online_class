<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->company(),
            'course_id'=>$this->faker->numberBetween(1,20),
            'privacy'=>$this->faker->randomElement(['public','private']),
            'image'=>$this->faker->text(30),
            'video' => $this->faker->text(50),
            'cover' => $this->faker->text(50),
            'summary' =>$this->faker->text(70)
        ];
    }
}
