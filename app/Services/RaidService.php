<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/10
 * Time: 11:28
 */

namespace App\Services;


use App\Models\Player;
use App\Models\Result;
use App\Models\RoleMst;
use App\Models\RoleStatus;

/**
 * Class RaidService
 * @package App\Services
 */
class RaidService
{
    protected $player;
    protected $roleMst;
    protected $roleStatus;
    protected $result;

    public function __construct(Player $player, RoleMst $roleMst, RoleStatus $roleStatus, Result $result)
    {
        $this->player = $player;
        $this->roleMst = $roleMst;
        $this->roleStatus = $roleStatus;
        $this->result = $result;
    }

    /**
     * @param $roomId
     * @param $player_id
     * @param $target_player
     * @return array
     */
    public function raid($roomId, $player_id, $target_player)
    {
        if ($this->player->find($target_player)->is_dead) {
            return ['success' => false];
        }

        // resultに向かって操作
        $this->result->fill([
            'room_id' => $roomId,
            'player_id' => $player_id,
            'target_player' => $target_player
        ])->save();

        $this->roleStatus->where('room_id', $roomId)
            ->where('role_id', 2)
            ->fill('is_completed', true)
            ->save();

        return ['success' => true];
    }
}
