<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCriterias extends Model
{
    protected $primaryKey = 'event_criteria_id';
    protected $fillable = [
        'event_id',
        'criteria_id',
    ];
}
