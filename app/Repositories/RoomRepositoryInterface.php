<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 12:51
 */

namespace App\Repositories;


interface RoomRepositoryInterface
{
    /**
     * Room表に挿入
     * @param $player_num
     * @return mixed
     */
    public function insert($player_num);

    /**
     * 削除
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * roomId取得
     * @return mixed
     */
    public function getRoomId();
}
