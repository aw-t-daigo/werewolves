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
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SeerService extends BaseRoleService
{
    const ROLE_ID = 3;
    private $wolfOrNot;

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
    public function seer($roomId, $targetPlayer)
    {
        if ($this->player->find($targetPlayer)->is_dead) {
            throw new BadRequestHttpException('対象のプレイヤーは既に死亡しています');
        }

        $this->roleStatus->updateOrCreate(
            ['room_id' => $roomId, 'role_id' => self::ROLE_ID],
            ['targeted' => $targetPlayer]
        );

        $this->playerName = $this->player->find($targetPlayer)->player_name;
        $isWolf = $wolfOrNot = $this->player->find($targetPlayer)->roleMst->is_wolf;
        $this->wolfOrNot = $isWolf ? '人狼' : '人間';

        return true;
    }

    public function createMessage()
    {
        return [
            'message' => $this->playerName . 'は' . $this->wolfOrNot . 'です。',
            'playerName' => 'GM',
        ];
    }
}
