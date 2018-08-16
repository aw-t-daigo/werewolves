<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 14:21
 */

namespace App\Services;


use App\Models\Player;
use App\Models\RoleMst;
use App\Models\RoleStatus;

class EntranceRoomService
{
    protected $player;
    protected $roleMst;
    protected $roleStatus;

    public function __construct(Player $player, RoleMst $roleMst, RoleStatus $roleStatus)
    {
        $this->player = $player;
        $this->roleMst = $roleMst;
        $this->roleStatus = $roleStatus;
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
