<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/09/05
 * Time: 16:43
 */

namespace App\Http\Middleware;

use App\Models\Player;

trait GameOverTrait
{
    protected $wolfCount;
    protected $villagerCount;

    /**
     * @param Player $player
     * @param $roomId
     */
    public function setPlayerCounts(Player $player, $roomId)
    {
        $living = $player->where('room_id', $roomId)
            ->where('is_dead', 0)
            ->get();

        $this->wolfCount = $living->filter(function ($item) {
            return $item->roleMst->is_wolf;
        })->count();

        $this->villagerCount = $living->filter(function ($item) {
            return !$item->roleMst->is_wolf;
        })->count();
    }

    /**
     * @return bool
     */
    public function isWolfWin()
    {
        return $this->wolfCount >= $this->villagerCount;
    }

    /**
     * @return bool
     */
    public function isVillagerWin()
    {
        return $this->wolfCount === 0;
    }
}
