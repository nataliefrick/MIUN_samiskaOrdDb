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
        'synonyms',
        'antonyms',
        'example_of_use',
        'link_to_update',
        'sources',
        'arousal_level',
        'frequency_id'
    ];

    protected $casts = [
        'synonyms' => 'list',
        'antonyms' => 'list'

    ];

}
