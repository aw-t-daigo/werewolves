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
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
     * @return string
     * @throws BadRequestHttpException
     */
    public function raid($roomId, $target_player)
    {

        if ($this->player->find($target_player)->is_dead) {
            throw new BadRequestHttpException('対象のプレイヤーは既に死亡しています');
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => 2],
            ['targeted' => $target_player]
        );

        return $this->player->find($target_player)->player_name;
    }
}
