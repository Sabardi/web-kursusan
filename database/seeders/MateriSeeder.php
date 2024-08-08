<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Materi::create([
            'kursus_id' => '1',
            'Judul' => 'Introduction to HTML',
            'deskripsi' => 'A complete guide to HTML basics.',
            'embed_link' => 'https://example.com/nama'
        ]);
    }
}
