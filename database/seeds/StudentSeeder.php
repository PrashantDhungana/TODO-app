<?php

use Illuminate\Database\Seeder;
use App\Students;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for students
     //    for ($i = 1 ; $i <= 20 ; $i ++) {

     //    	$student = [
     //    		'name' => 'Student ' . $i,
     //    		'phone_no' => rand(1111, 99999),
     //    		'address' => 'student address ' . $i 
     //    	];

     //    	echo 'Adding student ' . $i . ' to students table'.PHP_EOL;
     //    	\DB::table('students')->insert($student);
    	// }

        factory(Students::class,20)->create();
	}
}
