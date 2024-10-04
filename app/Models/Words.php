<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    use HasFactory;
    protected $fillable = [
        'word_sydsamiska',
        'definition_sydsamiska',
        'word_svenska',
        'definition_svenska',
        'word_norska',
        'definition_norska',
        'synonyms',
        'antonyms',
        'example_of_use',
        'sources',
        'arousal_level',
        'frequency_id'
    ];
}
