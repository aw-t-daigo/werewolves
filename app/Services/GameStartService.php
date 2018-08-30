<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/29
 * Time: 16:03
 */

namespace App\Services;


use App\Events\PunishmentReceived;
use App\Events\SeerReceived;
use App\Models\Player;
use App\Models\RoleMst;

class GameStartService
{
    public $player;
    public $roleMst;

    public function __construct(Player $player, RoleMst $roleMst)
    {
        $this->player = $player;
        $this->roleMst = $roleMst;
    }

    /**
     * @param $roomId
     */
    public function startGame($roomId)
    {
        // ゲーム開始通知
        $startMessage = [
            'message' => 'ゲームを開始します。占い師は結果を確認してください。',
            'playerName' => 'GM',
        ];

        event(new PunishmentReceived($startMessage, $roomId));

        // 初日占い通知
        $players = $this->player->where('room_id', $roomId)->get();
        $randomVillager = $players->filter(function ($item) {
            return !$item->roleMst->is_wolf;
        })->random();

        $seerMessage = [
            'message' => $randomVillager->player_name . 'は人間です',
            'playerName' => 'GM',
        ];

        event(new SeerReceived($seerMessage, $roomId));

    }
}
