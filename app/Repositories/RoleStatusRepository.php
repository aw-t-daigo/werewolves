<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 14:11
 */

namespace App\Repositories;


use App\Models\RoleStatus;

class RoleStatusRepository implements RoleStatusRepositoryInterface
{
    protected $rolesStatus;

    public function __construct(RoleStatus $roleStatus)
    {
        $this->rolesStatus = $roleStatus;
    }

    /**
     * @param array $array
     * @return bool|mixed
     */
    public function insert(array $array)
    {
        return $this->rolesStatus->fill($array)->save();
    }

    public function isCompletedAll($roomId)
    {
        // TODO: Implement isCompletedAll() method.
    }

    public function reset($roomId)
    {
        // TODO: Implement reset() method.
    }

    public function updateHunter($playerId)
    {
        // TODO: Implement updateHunter() method.
    }

    public function updateSeer($playerId)
    {
        // TODO: Implement updateSeer() method.
    }

    public function updateWolves($roomId, $isCompleted)
    {
        // TODO: Implement updateWolves() method.
    }
}
