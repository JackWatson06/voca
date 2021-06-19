<?php

namespace Database\Factories;

use App\Models\CompanyLead;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyLeadFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyLead::class;



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
            'company_name' => $this->faker->company,
            'industry' => $this->faker->randomElement(['HVAC', 'Electrician', 'Paving', 'Construction']),
            'size' => $this->faker->numberBetween(0, 4000),
            'info'    => $this->faker->paragraph(4)
        ];
    }
}
