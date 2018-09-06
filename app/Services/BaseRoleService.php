<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/09/06
 * Time: 12:37
 */

namespace App\Services;


use App\Models\Player;
use App\Models\RoleStatus;

class BaseRoleService
{
    protected $player;
    protected $roleStatus;
    protected $playerName;

    /**
     * BaseRoleService constructor.
     * @param Player $player
     * @param RoleStatus $roleStatus
     */
    public function __construct(Player $player, RoleStatus $roleStatus)
    {
        $this->player = $player;
        $this->roleStatus = $roleStatus;
    }
}
