<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class develop_question extends Model
{
    use HasFactory;
    protected $table = 'develop_question';
    protected $fillable = [
        'category_id',
        'question_id',
        'option',
        'score'
    ];
}
