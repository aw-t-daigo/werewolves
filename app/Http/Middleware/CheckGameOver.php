<?php

namespace App\Http\Middleware;

use App\Events\PunishmentReceived;
use App\Models\Player;
use App\Models\RoleMst;
use Closure;

class CheckGameOver
{
    use GameOverTrait;

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

        // セットされたステータスコードが200でなければ以降は処理しない
        if ($resp->getStatusCode() !== 200) {
            return $resp;
        }

        $roomId = session()->get('roomId');

        $this->setPlayerCounts($this->player, $roomId);

        // 人狼の勝ち
        if ($this->wolfCount >= $this->villagerCount) {
            $message = [
                'message' => '人狼の勝ちです！',
                'playerName' => 'GM',
            ];
            event(new PunishmentReceived($message, $roomId));
        } else if ($this->wolfCount == 0) {
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
