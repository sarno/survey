<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    
    protected $fillable = [
        'layanan_id',
        'question_text',
        'question_text_en',
        'question_text_ar',
    ];

    protected $casts = [
        'question' => 'array',
    ];

    // layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // jawaban
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
