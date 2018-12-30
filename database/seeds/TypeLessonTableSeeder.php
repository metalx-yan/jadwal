<?php

use Illuminate\Database\Seeder;
use App\Models\TypeLesson;

class TypeLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
        	'Jurusan', 'Umum'
        ];

        foreach ($type as $types) {
        	TypeLesson::create([
        		'type' => $types
        	]);
        }
    }
}