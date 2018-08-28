<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 14:21
 */

namespace App\Services;


use App\Models\Player;

class EntranceRoomService
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @param array $param
     * @return Player
     */
    public function entranceRoom(array $param)
    {
        $this->player->fill($param)->save();
        return $this->player;
    }
}
