<?php

namespace Database\Seeders;

use App\Models\Tukang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TukangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $cities = ['Banjarmasin','Banjarbaru'];

        foreach (range(1, 20) as $index) {
            $city = $faker->randomElement($cities);
            $address = "Jl. A.Yani Km ".$faker->numberBetween(3,33)." No ".$faker->numberBetween(1,100).", ".$city;
            $phoneNumber = '08' . $faker->numerify('##########'); 
            $phoneNumber = $faker->regexify('08[0-9]{10}');

            Tukang::create([
                'nama' => $faker->name,
                'alamat' => $address,
                'no_telp' => $phoneNumber,
                'is_kepala' => 0
            ]);
        }
    }
}
