<?php

use Illuminate\Database\Seeder;

class aktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('id_ID');
    	
    	$limit = 80000;

    	for ($i = 0; $i < $limit; $i++){
           DB::table('aktivitas')->insert([
            'nama_aktivitas' => $faker->text($maxNbChars = 100),
            'jam_mulai' => '08:34:15',
            'jam_selesai' => '09:34:15',
            'total_waktu' => '60',
            'tgl' => '2018-08-29',
            'keterangan' => '-',
            'status_atasan' => 'Belum Diverifikasi',
            'status_bkd' => 'Belum Diverifikasi',
        ]);
       }
    }
}
