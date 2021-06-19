<?php

namespace Database\Factories;

use App\Models\WorkerLead;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WorkerLeadFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkerLead::class;



    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'trade' => $this->faker->randomElement(['HVAC Technician', 'Electrician', 'Paver', 'Laborer']),
            'info'    => $this->faker->paragraph(4)
        ];
    }
}
