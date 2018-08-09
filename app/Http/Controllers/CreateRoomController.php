<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomPost;
use App\Models\Room;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Http\Request;

/**
 * 部屋作成画面に関するコントローラ
 * Class CreateRoomController
 * @package App\Http\Controllers
 */
class CreateRoomController extends Controller
{
    /**
     * 部屋作成画面表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('rooms.create');
    }

    /**
     * 人数を受け取り部屋情報を挿入、部屋IDをもって参加画面へリダイレクトする
     * @param CreateRoomPost $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createRoom(CreateRoomPost $request, RoomRepositoryInterface $room)
    {
        $room->insert($request->player_num);
        $roomId = $room->getRoomId();

        return redirect('/enter')->with('roomId', $roomId);
    }
}
