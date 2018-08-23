<?php

namespace App\Http\Controllers;

use App\Events\WerewolvesReceived;
use App\Http\Requests\AbilityRequest;
use App\Http\Requests\ChatRequest;
use App\Models\Player;
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
        $targetPlayer = $request->player_id;

        $message = $service->raid($roomId, $targetPlayer);

        event(new WerewolvesReceived($message, $roomId));

        return response()->json($message);
    }

    /**
     * @param ChatRequest $request
     * @param Player $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function chat(ChatRequest $request, Player $player)
    {
        $roomId = $request->session()->get('roomId');
        $playerId = $request->session()->get('playerId');
        $message = [
            'message' => $request->message,
            'playerName' => $player->find($playerId)->player_name,
        ];

        event(new WerewolvesReceived($message, $roomId));

        return response()->json($message);
    }
}
