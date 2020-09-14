<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Category;

class CategorySeeder extends Seeder
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
        for ($i=0; $i < 1; $i++) { 
            $date = Carbon::create(2015, 5, 28, 0, 0, 0);
                Category::create([
                    'name' => 'hello it is category '.$cnt[$i],
                    'cat_description' => 'Service description',
                    'service_id' => '1'?'1'!=NULL:'2',
                    'cat_description' => 'hello it is desc',
                    'price' => '18.00',
                    'image' => '15882589125d.jpeg'
                    
                ]);
    	}
    }
}
