<?php

use Illuminate\Database\Seeder;

class EquipmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tblEquipmentCategory')
    		->delete();

    	DB::table('tblEquipmentCategory')
    		->insert([
    			[
    				'strEquipmentCatName'	=>	'Equipment 1',
    				'intStatus'				=>	1,
    				'created_at'			=> date('Y-m-d H:i:s'),
    				'updated_at'			=> date('Y-m-d H:i:s')
    			],
    			[
    				'strEquipmentCatName'	=>	'Equipment 2',
    				'intStatus'				=>	1,
    				'created_at'			=> date('Y-m-d H:i:s'),
    				'updated_at'			=> date('Y-m-d H:i:s')
    			],
    			[
    				'strEquipmentCatName'	=>	'Equipment 3',
    				'intStatus'				=>	1,
    				'created_at'			=> date('Y-m-d H:i:s'),
    				'updated_at'			=> date('Y-m-d H:i:s')
    			]
    		]);
    }
}
