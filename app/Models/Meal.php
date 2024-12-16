<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public const TYPE_BREAKFAST = 1;
    public const TYPE_LUNCH = 2;
    public const TYPE_DINNER = 3;

    protected $fillable = [
        'day_id',
        'type',
        'title',
        'recipe',
        'image',
        'calories',
        'fat',
        'protein',
        'net_carbs',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function getTypeLabelAttribute()
    {
        switch ($this->type) {
            case self::TYPE_BREAKFAST: return 'Breakfast';
            case self::TYPE_LUNCH: return 'Lunch';
            case self::TYPE_DINNER: return 'Dinner';
        }

        return '';
    }
}
