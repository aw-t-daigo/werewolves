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
        $targetPlayer = $request->player_id;

        $message = $service->raid($roomId, $targetPlayer);

        if ($message['success']) {
            event(new WerewolvesRecieved($message, $roomId));
        }

        return response()->json($message);
    }
}
