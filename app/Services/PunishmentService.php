<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/07
 * Time: 14:08
 */

namespace App\Services;

use App\Models\Player;

/**
 * Class PunishmentService
 * @package App\Services
 */
class PunishmentService
{
    protected $playerRepo;
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * プレイヤーの死亡処理とステータスの生成
     * @param $targetPlayer
     * @return array
     */
    public function punishment($targetPlayer):array
    {
        $saved = $this->player->find($targetPlayer)->fill(['is_dead' => 1])->save();
        if (!$saved) {
            abort(400);
        }

        $target = $this->player->find($targetPlayer)->player_name;
        $wolfOrNot = $this->player->find($targetPlayer)->roleMst->is_wolf;
        $wolfOrNot = $wolfOrNot ? '人狼' : '人間';

        return [
            'message' => $target.'は処刑されました。',
            'playerName' => 'GM',
            'medium' => $target.'は'.$wolfOrNot.'でした。'
        ];
    }
}
