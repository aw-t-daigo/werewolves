<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/07
 * Time: 13:36
 */

namespace App\Repositories;


interface PlayerRepositoryInterface
{
    /**
     * 全プレイヤー情報取得
     * @return mixed
     */
    public function getAllPlayers();

    /**
     * player_idで一件取得
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * プレイヤーの死亡処理
     * @param $id
     * @return mixed
     */
    public function killPlayer($id);

    /**
     * プレイヤーのis_wolfがtrueであればtrue
     * @param $id
     * @return mixed
     */
    public function isWolf($id);

    /**
     * idからplayer_name取得
     * @param $id
     * @return mixed
     */
    public function getPlayerName($id);

    /**
     * プレイヤー登録
     * @param array $param
     * @return mixed
     */
    public function insert(array $param);
}
