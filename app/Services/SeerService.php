<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/24
 * Time: 16:01
 */

namespace App\Services;


use App\Models\Player;
use App\Models\RoleStatus;

class SeerService
{
    protected $player;
    protected $roleStatus;

    public function __construct(Player $player, RoleStatus $roleStatus)
    {
        $this->player = $player;
        $this->roleStatus = $roleStatus;
    }

    /**
     * @param $roomId
     * @param $targetPlayer
     * @return array
     */
    public function seer($roomId, $targetPlayer)
    {
        if ($this->player->find($targetPlayer)->is_dead) {
            abort(400);
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => 3],
            ['targeted' => $targetPlayer]
        );

        $target = $this->player->find($targetPlayer)->player_name;
        $wolfOrNot = $wolfOrNot = $this->player->find($targetPlayer)->roleMst->is_wolf;
        $wolfOrNot = $wolfOrNot ? '人狼' : '人間';

        return [
            'message' => $target.'は'.$wolfOrNot.'です。',
            'playerName' => 'GM',
        ];
    }
}
