<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'profile' => $this->faker->imageUrl(640,480),
            'gender'=> $this->faker->name(),
            'bio'=> $this->faker->company(),
<<<<<<< HEAD
            'link'=> json_encode([['icon' => $this->faker->company() , 'link' => $this->faker->company() , 'label' => $this->faker->company()]]),
=======
            'link'=> json_encode(['icon' => 'facebook' , 'link' => 'http://haneinmaung.com' , 'label' => 'hanwinf' ]),
>>>>>>> 75dfd0fce3f012fbb3c71e45a1776492e52e1e92
            'dob' => $this->faker->date(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
