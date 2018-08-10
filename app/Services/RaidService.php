<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/10
 * Time: 11:28
 */

namespace App\Services;


use App\Models\Player;
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

    /**
     * RaidService constructor.
     * @param Player $player
     * @param RoleMst $roleMst
     * @param RoleStatus $roleStatus
     */
    public function __construct(Player $player, RoleMst $roleMst, RoleStatus $roleStatus)
    {
        $this->player = $player;
        $this->roleMst = $roleMst;
        $this->roleStatus = $roleStatus;
    }

    /**
     * 襲撃先決定処理
     * @param $roomId
     * @param $playerId
     * @return array
     */
    public function raid($roomId, $playerId)
    {
        if ($this->player->find($playerId)->is_dead) {
            return ['success' => false];
        }

        // TODO: 夜操作テーブル（仮）に向かって操作
//        $saved = $this->player->find($playerId)->fill(['player_id' => $playerId])->save();

//        if ($saved) {
//            $this->roleStatus->where('room_id', $roomId)
//                ->where('role_id', 2)
//                ->fill('is_completed', true)
//                ->save();
//        }

//        return $saved ?
//            ['success' => true, 'player_id' => $playerId] :
//            ['success' => false];
    }
}
