<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Membuat role admin 
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        //Membuat role siswa
        $siswaRole = new  Role();
        $siswaRole->name = "kcbjm";
        $siswaRole->display_name = "KC BANJARMASIN";
        $siswaRole->save();

        //Membuat role guru
        $guruRole = new  Role();
        $guruRole->name = "kcsby";
        $guruRole->display_name = "KC SURABAYA";
        $guruRole->save();

        //Membuat role pegawai
        $pegawaiRole = new  Role();
        $pegawaiRole->name = "kcjkt";
        $pegawaiRole->display_name = "KC JAKARTA";
        $pegawaiRole->save();

    	//Membuat sample admin
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->username = 'admin';
        $admin->save();
        $admin->attachRole($adminRole);

        //Membuat sample siswa
        $siswa = new User();
        $siswa->name = 'kcbjm';
        $siswa->email = 'siswa@gmail.com';
        $siswa->password = bcrypt('kcbjm');
        $siswa->username = 'kcbjm';
        $siswa->save();
        $siswa->attachRole($siswaRole);

        //Membuat sample guru
        $guru = new User();
        $guru->name = 'kcsby';
        $guru->email = 'SusantoArdi@gmail.com';
        $guru->password = bcrypt('kcsby');
        $guru->username = 'kcsby';
        $guru->save();
        $guru->attachRole($guruRole);

        //Membuat sample guru
        $guru = new User();
        $guru->name = 'kcjkt';
        $guru->email = 'WiliaWijaya@gmail.com';
        $guru->password = bcrypt('kcjkt');
        $guru->username = 'kcjkt';
        $guru->save();
        $guru->attachRole($guruRole);

    }
}
