<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table = 'responden';

    protected $fillable = [
        'nama',
        'usia',
        'gender',
        'phone',
        'language',
        'total_nilai',
        'tanggal_survey',
    ];

    protected $dates = [
        'tanggal_survey',
    ];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
