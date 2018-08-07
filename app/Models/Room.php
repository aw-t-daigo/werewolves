<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @package App
 * @property int $room_id
 * @property int $player_num
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Player[] $player
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room wherePlayerNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Room whereRoomId($value)
 * @mixin \Eloquent
 */
class Room extends Model
{
    protected $table = 'room';
    protected $primaryKey = 'room_id';
    public $timestamps = false;
    protected $fillable = ['player_num'];

    /**
     * Playerとの関係
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function player()
    {
        return $this->hasMany('App\Models\Player');
    }
}
