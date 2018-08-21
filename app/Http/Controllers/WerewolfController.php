<?php

namespace App\Http\Controllers;

use App\Events\WerewolvesReceived;
use App\Http\Requests\AbilityRequest;
use App\Http\Requests\ChatRequest;
use App\Services\RaidService;

class WerewolfController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('night.werewolves');
    }

    /**
     * @param AbilityRequest $request
     * @param RaidService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function raid(AbilityRequest $request, RaidService $service)
    {
        $roomId = $request->session()->get('roomId');
        $playerId = $request->session()->get('playerId');
        $targetPlayer = $request->player_id;

        $message = $service->raid($roomId, $targetPlayer);

        if ($message['success']) {
            event(new WerewolvesReceived($message, $playerId, $roomId));
        }

        return response()->json($message);
    }

    /**
     * @param ChatRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function chat(ChatRequest $request)
    {
        $roomId = $request->session()->get('roomId');
        $playerId = $request->session()->get('playerId');
        $message = $request->message;

        event(new WerewolvesReceived($message, $playerId, $roomId));

        return response()->json($message);
    }
}
