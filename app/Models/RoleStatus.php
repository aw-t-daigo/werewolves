<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleStatus extends Model
{
    public $timestamps = false;
    protected $fillable = ['room_id', 'player_id', 'is_completed'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
