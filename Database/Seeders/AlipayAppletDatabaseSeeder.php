<?php

namespace Modules\AlipayApplet\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AlipayAppletDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            AlipayAuthMenuSeeder::class,
            AlipayAppletSettingSeeder::class,
            AlipayAppletTemplateSeeder::class
        ]);
    }
}
