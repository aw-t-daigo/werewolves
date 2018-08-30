<?php

namespace App\Http\Middleware;

use App\Events\PunishmentReceived;
use App\Models\Player;
use App\Models\RoleMst;
use Closure;

class CheckGameOver
{
    private $player;
    private $roleMst;

    public function __construct(Player $player, RoleMst $roleMst)
    {
        $this->player = $player;
        $this->roleMst = $roleMst;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $resp = $next($request);
        $roomId = session()->get('roomId');

        $living = $this->player
            ->where('room_id', $roomId)
            ->where('is_dead', 0)->get();

        $wolfCount = $living->filter(function ($item) {
            return $item->roleMst->is_wolf;
        })->count();

        $villagerCount = $living->filter(function ($item) {
            return !$item->roleMst->is_wolf;
        })->count();

        // 人狼の勝ち
        if ($wolfCount >= $villagerCount) {
            $message = [
                'message' => '人狼の勝ちです！',
                'playerName' => 'GM',
            ];
            event(new PunishmentReceived($message, $roomId));
        } else if ($wolfCount == 0) {
            $message = [
                'message' => '村人の勝ちです！',
                'playerName' => 'GM',
            ];
            event(new PunishmentReceived($message, $roomId));
        } else {
            $message = [
                'message' => '夜になりました。役職者は操作してください。',
                'playerName' => 'GM',
            ];
            event(new PunishmentReceived($message, $roomId));
        }

        return $resp;

    }
}
