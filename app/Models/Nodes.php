<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_node',
        'polarity_node',
        'sub_node'
    ];

    public function words()
    {
        return $this->hasMany(Words::class, 'node_id');
    }
}
