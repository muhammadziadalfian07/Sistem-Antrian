<?php

use App\Pasien;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PasiensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antrian = $this->getAntrian();
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 100; $i++) {
        //     DB::table('pasiens')->insert([
        //         'name' => $faker->name,
        //         'address' => $faker->address,
        //         'antrian_id' => $antrian,
        //         'dokter_id' => $faker->numberBetween(1, 1),
        //         'keluhan' => $faker->word,
        //         'jamkes_id' => $faker->numberBetween(1, 1)
        //     ]);
        // }

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('pasiens')->insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'keluhan' => $faker->word,
                'antrian_id' => $antrian,
                'jamkes_id' => $faker->numberBetween(1, 1),
                'dokter_id' => $faker->numberBetween(1, 1),
            ]);
        }
    }

    public function getAntrian()
    {
        $antrian = '';

        $data = DB::table('antrians')->count();

        if (strlen($data) == 1) {
            $antrian = "RSU-" . ((int) $data + 1);
        } else if (strlen($data) == 2) {
            $antrian = "RSU-" . ((int) $data + 1);
        } else {
            $antrian = "RSU-" . ((int) $data + 1);
        }
        $tanggal = date('Y-m-d');
        $data = DB::table('antrians')->insert([
            'no_antrian' => $antrian,
            'created_at' => $tanggal
        ]);
        return $data;
    }
}
