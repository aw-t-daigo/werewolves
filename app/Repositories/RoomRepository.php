<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 13:03
 */

namespace App\Repositories;


use App\Models\Room;

class RoomRepository implements RoomRepositoryInterface
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function insert($player_num)
    {
        return $this->room->fill(['player_num' => $player_num])->save();
    }

    public function delete($id)
    {
        return $this->room->destroy($id);
    }

    public function getRoomId()
    {
        return $this->room->room_id;
    }
}
