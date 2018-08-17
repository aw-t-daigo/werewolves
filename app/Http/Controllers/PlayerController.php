<?php

namespace App\Http\Controllers;

use App\Models\Player;

class PlayerController extends Controller
{
    public function getLivingPlayer(Player $player)
    {
        $living = $player->where('room_id', session()->get('roomId'))
            ->where('is_dead', 0)->get();

        return response($living);
    }
}
