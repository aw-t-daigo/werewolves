<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\RoleStatus
 *
 * @property int $id
 * @property int $room_id
 * @property int $role_id
 * @property int|null $targeted
 * @property-read \App\Models\Player $player
 * @property-read \App\Models\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleStatus whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleStatus whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleStatus whereTargeted($value)
 * @mixin \Eloquent
 */
class RoleStatus extends Model
{
    public $timestamps = false;
    protected $fillable = ['room_id', 'role_id', 'targeted'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
