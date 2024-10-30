<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $primaryKey = 'criteria_id';
    protected $fillable = [
        'name',
    ];
}
