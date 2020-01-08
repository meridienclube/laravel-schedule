<?php

namespace ConfrariaWeb\Schedule\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleFrequencyOption extends Model
{

    protected $fillable = [
        'frequency',
        'name',
        'description'
    ];

}
