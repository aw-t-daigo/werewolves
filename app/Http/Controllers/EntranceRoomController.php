<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntranceRoomPost;
use App\Models\RoleMst;
use App\Services\EntranceRoomService;

/**
 * Class EntranceRoomController
 * 入室画面に関するコントローラ
 * @package App\Http\Controllers
 */
class EntranceRoomController extends Controller
{
    public function show()
    {
        $role = RoleMst::all();
        return view('rooms.entrance', [
            'roleMst' => $role,
        ]);
    }

    public function enter(EntranceRoomPost $request, EntranceRoomService $service)
    {
        $param = [
            'room_id' => $request->room_id,
            'player_name' => $request->player_name,
            'role_id' => $request->role,
        ];
        $player = $service->entranceRoom($param);

        $request->session()->regenerate();
        $request->session()->put('roomId', $player->room_id);
        $request->session()->put('playerId', $player->player_id);
        $request->session()->put('roleId', $player->role_id);

        $roomIdCookie = cookie('roomId', $player->room_id);
        $playerIdCookie = cookie('playerId', $player->player_id);
        $roleIdCookie = cookie('roleId', $player->role_id);

        return redirect("/night/$player->role_id")->withCookie($roomIdCookie)->withCookie($playerIdCookie)->withCookie($roleIdCookie);
    }
}
