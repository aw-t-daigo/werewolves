<?php

use Illuminate\Database\Seeder;

class RoleMstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleMst = [
            ['role_name' => '村人', 'is_wolf' => false, 'need_manip' => false],
            ['role_name' => '人狼', 'is_wolf' => true, 'need_manip' => true],
            ['role_name' => '占い師', 'is_wolf' => false,'need_manip' => true],
            ['role_name' => '霊能者', 'is_wolf' => false, 'need_manip' => false],
            ['role_name' => '共有', 'is_wolf' => false, 'need_manip' => false],
            ['role_name' => '狩人','is_wolf' =>false, 'need_manip' => true],
            ['role_name' => '狂人', 'is_wolf' => false, 'need_manip' => false],
        ];

        DB::table('role_mst')->insert($roleMst);
    }
}
