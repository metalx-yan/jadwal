<?php

use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Level;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$a = Level::all();
	    		
    		for ($i=0; $i < count($a) ; $i++) { 
    			
    			Major::create([
    				'code' => str_random(5),
    				'name' => 'Teknik Listrik',
    				'level_id' => $i + 1
    			]);

    			Major::create([
    				'code' => str_random(5),
    				'name' => 'Teknik Bangunan',
    				'level_id' => $i + 1
    			]);

    			Major::create([
    				'code' => str_random(5),
    				'name' => 'Teknik Mesin',
    				'level_id' => $i + 1
    			]);

    			Major::create([
    				'code' => str_random(5),
    				'name' => 'RPL',
    				'level_id' => $i + 1
    			]);
    		}

    }
}
