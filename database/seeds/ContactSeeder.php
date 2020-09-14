<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Contact::create([
            'name' => 'mostafa hamed',
            'mail' => 'example@gmail.com',
            'message' => 'it is a msg'
            
        ]);
    }
}
