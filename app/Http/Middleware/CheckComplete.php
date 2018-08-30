<?php

namespace App\Http\Middleware;

use App\Events\PunishmentReceived;
use App\Models\Player;
use App\Models\RoleStatus;
use Closure;

class CheckComplete
{
    private $player;
    private $roleStatus;

    public function __construct(Player $player, RoleStatus $roleStatus)
    {
        $this->player = $player;
        $this->roleStatus = $roleStatus;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $resp = $next($request);

        $roomId = session()->get('roomId');

        // 生存している要操作役職一覧
        $living = $this->player->with('roleMst:role_id,need_manip')
            ->where('room_id', $roomId)
            ->where('is_dead', 'is', false)
            ->get()
            ->filter(function ($value) {
                return $value->roleMst->need_manip;
            })->groupBy('role_id');

        // 能力対象を選択し終えた役職とその対象一覧
        $targeted = $this->roleStatus->where('room_id', $roomId)
            ->whereIn('role_id', $living->keys())->get();

        // 夜操作終了処理
        if ($living->count() == $targeted->count()) {
            $wolfTarget = $targeted->where('role_id', 2)->first();
            $hunterTarget = $targeted->where('role_id', 6)->first();

            if (!is_null($hunterTarget) && $wolfTarget->targeted === $hunterTarget->targeted) {
                $message = [
                    'message' => '朝になりました。犠牲者はいませんでした。',
                    'playerName' => 'GM',
                ];
            } else {
                $this->player->find($wolfTarget->targeted)->fill(['is_dead' => 1])->save();
                $playerName = $this->player->find($wolfTarget->targeted)->player_name;
                $message = [
                    'message' => '朝になりました。' . $playerName . 'は無残な姿になって発見されました。',
                    'playerName' => 'GM',
                ];

            }

            $this->roleStatus->where('room_id', $roomId)->delete();

            event(new PunishmentReceived($message, $roomId));
        }

        return $resp;
    }
}
