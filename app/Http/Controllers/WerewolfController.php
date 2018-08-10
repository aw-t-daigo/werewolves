<?php

namespace App\Http\Controllers;

use App\Events\WerewolvesRecieved;
use App\Http\Requests\AbilityRequest;
use App\Services\RaidService;

class WerewolfController extends Controller
{
    public function raid(AbilityRequest $request, RaidService $service)
    {
        $roomId = $request->session()->get('roomId');
        $playerId = $request->session()->get('player_id');
        $targetPlayer = $request->player_id;

        $message = $service->raid($roomId, $playerId, $targetPlayer);

        if ($message['success']) {
            event(new WerewolvesRecieved($message, $roomId));
        }

        // TODO: 夜操作完了チェックサービスを作る

        return response()->json($message);
    }
}
