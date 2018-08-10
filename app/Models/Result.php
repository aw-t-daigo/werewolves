<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Result
 *
 * @property int $id
 * @property int $room_id
 * @property int $player_id
 * @property int $target_player
 * @property-read \App\Models\Player $player
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Result wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Result whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Result whereTargetPlayer($value)
 * @mixin \Eloquent
 */
class Result extends Model
{
    public $timestamps = false;
    protected $fillable = ['room_id', 'player_id', 'target_player'];

    /**
     * player表との関係
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
