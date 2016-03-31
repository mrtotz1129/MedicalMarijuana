<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tblRoomType')
        	->delete();

        \DB::table('tblRoomType')
        	->insert([
        		[
        			'strRoomTypeDesc'	=>	'Public',
        			'created_at'		=>	date('Y-m-d H:i:s'),
        			'updated_at'		=>	date('Y-m-d H:i:s')
        		],
        		[
        			'strRoomTypeDesc'	=>	'Private',
        			'created_at'		=>	date('Y-m-d H:i:s'),
        			'updated_at'		=>	date('Y-m-d H:i:s')
        		]
        	]);
    }
}
