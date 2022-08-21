<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_option_score extends Model
{
    use HasFactory;
    protected $table = 'question_option_score';
    protected $fillable = [
        'question_id',
        'option',
        'score'
    ];
}
