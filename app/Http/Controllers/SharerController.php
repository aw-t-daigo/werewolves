<?php

namespace App\Http\Controllers;

use App\Events\SharerReceived;
use App\Http\Requests\ChatRequest;
use App\Models\Player;

class SharerController extends Controller
{
    public function show()
    {
        return view('night.sharer');
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

        event(new SharerReceived($message, $roomId));

        return response()->json($message);
    }
}
