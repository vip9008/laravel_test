<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_number',
        'date',
        'is_complete',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}