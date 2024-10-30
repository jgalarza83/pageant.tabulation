<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $primaryKey = 'contestant_id';
    protected $fillable = [
        'name',
        'group_id',
        'photo_path',
    ];
}
