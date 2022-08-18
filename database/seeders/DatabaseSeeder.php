<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\guru;
use \App\Models\siswa;
use \App\Models\jurusan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'rizky',
            'email' => 'rizkynh460@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        jurusan::create([
            'jurusan_name' => 'Rekayasa Perangkat Lunak',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Multimedia',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Teknik Komputer Dan Jaringan',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Bisnis Daring Dan Pemasaran',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Perbankan Syariah',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Otomatisai Tata Kelola Perkantoran',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);
        jurusan::create([
            'jurusan_name' => 'Akutansi Dan Keuangan Lembaga',
            'rombel' => '2',
            'jml_siswa' => '72'
        ]);

        guru::factory(80)->create();
        siswa::factory(80)->create();
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
