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
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class GuardService
 * @package App\Services
 */
class GuardService extends BaseRoleService
{
    const ROLE_ID = 6;

    public function __construct(Player $player, RoleStatus $roleStatus)
    {
        parent::__construct($player, $roleStatus);
    }

    /**
     * @param $roomId
     * @param $targetPlayer
     * @return bool
     * @throws BadRequestHttpException
     */
    public function guard($roomId, $targetPlayer)
    {
        if ($this->player->find($targetPlayer)->is_dead) {
            throw new BadRequestHttpException('対象のプレイヤーは既に死亡しています');
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => self::ROLE_ID],
            ['targeted' => $targetPlayer]
        );

        $this->playerName = $this->player->find($targetPlayer)->player_name;

        return true;
    }

    /**
     * @return array
     */
    public function createMessage()
    {
        return [
            'message' => $this->playerName . 'を護衛します',
            'playerName' => 'GM',
        ];
    }
}
