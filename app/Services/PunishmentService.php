<?php
/**
 * Created by PhpStorm.
 * User: t_daigo
 * Date: 2018/08/07
 * Time: 14:08
 */

namespace App\Services;

use App\Repositories\PlayerRepositoryInterface;

/**
 * Class PunishmentService
 * @package App\Services
 */
class PunishmentService
{
    protected $playerRepo;

    public function __construct(PlayerRepositoryInterface $playerRepo)
    {
        $this->playerRepo = $playerRepo;
    }

    /**
     * プレイヤーの死亡処理とステータスの生成
     * @param $id
     * @return array
     */
    public function punishment($id):array
    {
        $saved = $this->playerRepo->killPlayer($id);
        return $saved ?
            ['success' => true, 'medium' => $this->playerRepo->getPlayerName($id)] :
            ['success' => false];
    }
}
