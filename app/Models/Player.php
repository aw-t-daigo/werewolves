<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Player
 *
 * @property int $player_id
 * @property int $room_id
 * @property string $player_name
 * @property int $is_dead
 * @property int $role_id
 * @property-read \App\Models\RoleMst $roleMst
 * @property-read \App\Models\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Player whereIsDead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Player wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Player wherePlayerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Player whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Player whereRoomId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\RoleStatus $roleStatus
 */
class Player extends Model
{
    protected $table = 'player';
    protected $primaryKey = 'player_id';
    public $timestamps = false;
    protected $fillable = ['room_id', 'player_name', 'is_dead', 'role_id'];

    /**
     * Roomとの関係
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * RoleMstとの関係
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleMst()
    {
        return $this->belongsTo('App\Models\RoleMst', 'role_id');
    }

    public function roleStatus()
    {
        return $this->hasOne('App\Models\RoleStatus', 'targeted', 'player_id');
    }
}
