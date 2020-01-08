<?php

namespace ConfrariaWeb\Schedule\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = [
        'user_id',
        'status_id',
        'title',
        'what',
        'where',
        'when',
        'type',
        'options'
    ];

    protected $casts = [
        'options' => 'collection'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
