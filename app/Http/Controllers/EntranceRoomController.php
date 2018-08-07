<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntranceRoomPost;
use App\Models\Player;
use App\Models\RoleMst;
use App\Models\RoleStatus;
use Illuminate\Http\Request;

/**
 * Class EntranceRoomController
 * 入室画面に関するコントローラ
 * @package App\Http\Controllers
 */
class EntranceRoomController extends Controller
{
    public function show(Request $request)
    {
        $role = RoleMst::all();
        return view('rooms.entrance', [
            'roleMst' => $role,
        ]);
    }

    public function enter(EntranceRoomPost $request)
    {
        $player = new Player;
        $player->fill([
            'room_id' => $request->room_id,
            'player_name' => $request->player_name,
            'is_dead' => false,
            'role_id' => $request->role,
        ])->save();
        $role = $request->role;

        switch ($role) {
            case 2:
            case 3:
            case 4:
            case 6:
                // 夜に操作が必要な役職のみ
                // fallthrough
                $roleStatus = new RoleStatus;
                $roleStatus->fill([
                    'room_id' => $player->room_id,
                    'player_id' => $player->player_id,
                    'is_completed' => false,
                ])->save();
        }

        $request->session()->regenerate();
        $request->session()->put('roomId', $player->room_id);
        $request->session()->put('playerId', $player->player_id);
        $request->session()->put('roleId', $player->role_id);

        $roomIdCookie = cookie('roomId', $player->room_id);
        $playerIdCookie = cookie('playerId', $player->player_id);
        $roleIdCookie = cookie('roleId', $player->role_id);

        return redirect("/night/$role")->withCookie($roomIdCookie)->withCookie($playerIdCookie)->withCookie($roleIdCookie);
    }
}
