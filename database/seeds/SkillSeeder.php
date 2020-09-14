<?php

use Illuminate\Database\Seeder;
use App\Skill;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Skill::create([
            'name'=>'ux',
            'value'=> 50
        ],[
            'name'=>'ui',
            'value'=> 90
        ]);
    }
}
