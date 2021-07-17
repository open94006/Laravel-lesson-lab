<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Score as ScoreEloquent;
use App\Models\User as UserEloquent;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    public function user()
    {
        return $this->belongsTo(UserEloquent::class);
    }

    public function score()
    {
        return $this->hasOne(ScoreEloquent::class);
    }
}