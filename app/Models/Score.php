<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student as StudentEloquent;

class Score extends Model
{
    use HasFactory;
    protected $table = 'scores';

    public function student()
    {
        return $this->belongsTo(StudentEloquent::class);
    }

    public function scopeOrderByTotal($query)
    {
        return $query->orderBy('scores.total', 'DESC');
    }

    public function scopeOrderBySubject($query)
    {
        return $query->orderBy('scores.chinese', 'DESC')
            ->orderBy('scores.english', 'DESC')
            ->orderBy('scores.math', 'DESC');
    }
}