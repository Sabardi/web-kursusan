<?php

namespace Database\Seeders;

use App\Models\Kursus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kursus::create([
            'judul' => 'Web Development Basics',
            'deskripsi' => 'Learn the basics of HTML, CSS, and JavaScript.',
            'durasi' => '6 weeks'
        ]);
    }
}
