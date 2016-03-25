<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tblEmployeeType')
    		->delete();

    	DB::table('tblEmployeeType')
    		->insert([
    			[
    				'strPosition'	=> 'Doctor',
    				'intStatus'		=> 1,
    				'created_at'	=> date('Y-m-d H:i:s')
    			],
    			[
    				'strPosition'	=> 'Nurse',
    				'intStatus'		=> 1,
    				'created_at'	=> date('Y-m-d H:i:s')	
    			],
    			[
    				'strPosition'	=> 'Cashier',
    				'intStatus'		=> 1,
    				'created_at'	=> date('Y-m-d H:i:s')
    			]
    		]);
    }
}
