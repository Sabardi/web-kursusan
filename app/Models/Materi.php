<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kursus()
    {

        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
}
