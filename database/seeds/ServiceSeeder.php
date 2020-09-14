<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cnt = [1,2,3];
        for ($i=0; $i < 3; $i++) { 
            $date = Carbon::create(2015, 5, 28, 0, 0, 0);
                Service::create([
                    'name' => 'hello it is service '. $cnt[$i],
                    'description' => 'Service description',
                    'image' => 'ball.jpg'
                    
                ]);
    	}
    }
}
