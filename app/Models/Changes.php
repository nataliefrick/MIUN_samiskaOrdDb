<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changes extends Model
{
    use HasFactory;
    protected $fillable = [
        'word_id',
        'message',
        'name',
        'email',
        'telephone',
        'status',
        'checked_by'
    ];

    public function words()
    {
        return $this->belongsTo(Words::class);
    }
}
