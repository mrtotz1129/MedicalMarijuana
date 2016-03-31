<?php

use Illuminate\Database\Seeder;

class ItemCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblItemCategory')
        	->delete();

        DB::table('tblItemCategory')
        	->insert([
        		[
        			'strItemCategoryDesc'	=>	'Medicine',
        			'created_at'			=> date('Y-m-d H:i:s'),
        			'updated_at'			=> date('Y-m-d H:i:s')
        		]
        	]);
    }
}
