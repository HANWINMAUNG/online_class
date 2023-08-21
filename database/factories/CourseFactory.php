<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
            'instructor_id'=>$this->faker->numberBetween(1,20),
            'price'=>$this->faker->numberBetween(300,1000),
            'image'=>$this->faker->text(30),
            'cover_photo'=>$this->faker->text(30),
            'description' => $this->faker->text(50),
            'summary' =>  $this->faker->text(70)
        ];
    }
}
