<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Room;
use App\Services\GameStartService;

class PlayerController extends Controller
{
    public function getLivingPlayer(Player $player)
    {
        $living = $player->where('room_id', session()->get('roomId'))
            ->where('is_dead', 0)->get();

        return response($living);
    }

    public function getPlayerInfo(Room $room, Player $player)
    {
        $roomId = session()->get('roomId');

        $playerNum = $room->find($roomId)->player_num;
        $current = $player->where('room_id', $roomId)->count();

        return response()->json([
            'roomId' => $roomId,
            'canStart' => $playerNum == $current ? true : false,
        ]);
    }

    public function startGame(GameStartService $service)
    {
        $service->startGame(session()->get('roomId'));
        return response()->json([
            'success' => true,
        ]);
    }
}
