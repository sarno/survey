<?php

namespace Database\Seeders;

use App\Models\Responden;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Responden::truncate(); // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        $faker = Faker::create('id_ID'); // Use Indonesian locale for faker

        for ($i = 0; $i < 100; $i++) {
            Responden::create([
                'nama' => $faker->name,
                'usia' => $faker->randomElement(['<17', '18-25', '26-30', '31-40', '>40']),
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'phone' => $faker->phoneNumber,
                'language' => $faker->randomElement(['ID', 'AR']),
                'total_nilai' => $faker->numberBetween(0, 40),
                'tanggal_survey' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}