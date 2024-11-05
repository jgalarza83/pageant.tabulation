<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $primaryKey = 'score_id';
    protected $fillable =[
        'user_id',
        'event_id',
        'contestant_id',
        'criteria_id',
        'score',
    ];
}
