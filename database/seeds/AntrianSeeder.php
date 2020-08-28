<?php

use Illuminate\Database\Seeder;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 50; $i++) {
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
}
