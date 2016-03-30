<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblStatus')
        	->delete();

        DB::table('tblStatus')
        	->insert([
        		[
        			'strStatusDesc'	=>	'Admitted',
        			'created_at'	=>	date('Y-m-d H:i:s'),
        			'updated_at'	=>	date('Y-m-d H:i:s')
        		],
        		[
        			'strStatusDesc'	=>	'Transferred',
        			'created_at'	=>	date('Y-m-d H:i:s'),
        			'updated_at'	=>	date('Y-m-d H:i:s')
        		],
        		[
        			'strStatusDesc'	=>	'Released',
        			'created_at'	=>	date('Y-m-d H:i:s'),
        			'updated_at'	=>	date('Y-m-d H:i:s')
        		]
        	]);
    }
}
