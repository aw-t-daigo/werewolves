<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/27
 * Time: 13:26
 */

namespace App\Services;

use App\Models\Player;
use App\Models\RoleStatus;

/**
 * Class GuardService
 * @package App\Services
 */
class GuardService
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
    public function guard($roomId, $targetPlayer)
    {
        if ($this->player->find($targetPlayer)->is_dead) {
            abort(400);
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => 6],
            ['targeted' => $targetPlayer]
        );

        $playerName = $this->player->find($targetPlayer)->player_name;

        return [
            'message' => $playerName.'を護衛します',
            'playerName' => 'GM',
        ];
    }
}
