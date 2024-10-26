<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'institution',
        'email',
        'telephone',
        'projectTitle',
        'description',
        'searchTerm',
        'notes'
    ];

}
