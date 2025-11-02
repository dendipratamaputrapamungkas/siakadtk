<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => bcrypt('password'), // sesuaikan
            'role' => 'admin', // atau faker->randomElement(['admin','guru','ortu'])
            'guru_id' => null,
            'siswa_id' => null,
        ];
    }
}
