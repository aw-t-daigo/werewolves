<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/10
 * Time: 11:28
 */

namespace App\Services;


use App\Models\Player;
use App\Models\RoleStatus;

/**
 * Class RaidService
 * @package App\Services
 */
class RaidService
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
     * @param $target_player
     * @return array
     */
    public function raid($roomId, $target_player)
    {

        if ($this->player->find($target_player)->is_dead) {
            abort(400);
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => 2],
            ['targeted' => $target_player]
        );

        $playerName = $this->player->find($target_player)->player_name;

        // TODO: GMからのメッセージという体で書き直す
        return [
            'message' => $playerName.'を襲撃します',
            'playerName' => 'GM',
        ];
    }
}
