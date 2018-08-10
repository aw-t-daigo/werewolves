<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleMst
 *
 * @package App\Models
 * @property int $role_id
 * @property string $role_name
 * @property int $is_wolf
 * @property-read \App\Models\Player $player
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMst whereIsWolf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMst whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMst whereRoleName($value)
 * @mixin \Eloquent
 * @property int $need_manip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMst whereNeedManip($value)
 */
class RoleMst extends Model
{
    protected $table = 'role_mst';
    protected $primaryKey = 'role_id';
}
