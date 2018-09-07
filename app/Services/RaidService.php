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
class RaidService extends BaseRoleService
{
    const ROLE_ID = 2;

    public function __construct(Player $player, RoleStatus $roleStatus)
    {
        parent::__construct($player, $roleStatus);
    }

    /**
     * @param $roomId
     * @param $target_player
     * @return bool
     * @throws BadRequestHttpException
     */
    public function raid($roomId, $target_player)
    {

        if ($this->player->find($target_player)->is_dead) {
            throw new BadRequestHttpException('対象のプレイヤーは既に死亡しています');
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => self::ROLE_ID],
            ['targeted' => $target_player]
        );

        $this->playerName = $this->player->find($target_player)->player_name;

        return true;
    }

    /**
     * @return array
     */
    public function createMessage()
    {
        return [
            'message' => $this->playerName . 'を襲撃します',
            'playerName' => 'GM',
        ];
    }
}
