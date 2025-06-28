<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $cities = ['Banjarmasin','Banjarbaru','Palangkaraya','Pulang Pisau'];

        foreach (range(1, 20) as $index) {
            $city = $faker->randomElement($cities);
            $address = "Jl. A.Yani Km ".$faker->numberBetween(3,33)." No ".$faker->numberBetween(1,100).", ".$city;
            $phoneNumber = '08' . $faker->numerify('##########'); 
            $phoneNumber = $faker->regexify('08[0-9]{10}');
            $nik = $faker->nik ?? sprintf(
                '%02d%02d%02d%s%04d',
                63,
                $faker->numberBetween(71, 72),
                $faker->numberBetween(10, 30),
                $faker->date('dmy'),
                $faker->numberBetween(1, 9999)
            );
            $npwp = sprintf(
                '%02d.%03d.%03d.%d-%03d.%03d',
                $faker->numberBetween(1, 34),
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 9),
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 999)
            );
            Client::create([
                'nama_client' => $faker->name,
                'alamat' => $address,
                'no_hp' => $phoneNumber,
                'nik' => $nik,
                'no_npwp' => $npwp,
                'nama_perusahaan' => $faker->company
            ]);
        }
    }
}
