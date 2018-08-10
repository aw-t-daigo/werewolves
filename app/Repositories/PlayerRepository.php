<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/07
 * Time: 13:50
 */

namespace App\Repositories;


use App\Models\Player;

class PlayerRepository implements PlayerRepositoryInterface
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @return mixed
     */
    public function getAllPlayers()
    {
        return $this->player->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->player->find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function killPlayer($id)
    {
        if ($this->player->find($id)->is_dead) {
            return false;
        }
        return $this->player->find($id)->fill(['is_dead' => true])->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function isWolf($id)
    {
        return $this->player->find($id)->roleMst->is_wolf;
    }

    /**
     * @param $id
     * @return string
     */
    public function getPlayerName($id)
    {
        return $this->player->find($id)->player_name;
    }

    /**
     * @param array $param
     * @return bool|mixed
     */
    public function insert(array $param)
    {
        return $this->player->fill($param)->save();
    }
}
