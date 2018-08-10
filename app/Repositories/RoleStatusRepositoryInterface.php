<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/09
 * Time: 13:44
 */

namespace App\Repositories;


interface RoleStatusRepositoryInterface
{
    /**
     * 挿入
     * @param array $array
     * @return mixed
     */
    public function insert(array $array);

    /**
     * 人狼操作完了
     * @param $roomId
     * @param $isCompleted
     * @return mixed
     */
    public function updateWolves($roomId, $isCompleted);

    /**
     * 占い師操作完了
     * @param $playerId
     * @return mixed
     */
    public function updateSeer($playerId);

    /**
     * 狩人操作完了
     * @param $playerId
     * @return mixed
     */
    public function updateHunter($playerId);

    /**
     * 操作未完了状態に戻す
     * @param $roomId
     * @return mixed
     */
    public function reset($roomId);

    /**
     * is_completedがすべてtrueになっているか確認
     * @param $roomId
     * @return mixed
     */
    public function isCompletedAll($roomId);
}
