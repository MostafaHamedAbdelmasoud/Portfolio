<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 1; $i++) {
            $date = Carbon::create(2015, 5, 28, 0, 0, 0);
            User::create([
                'name' => 'عمر عبدالله',
                'email' => 'info@portfolio.moofradat.com',
                'isAdmin' => '1',
                'email_verified_at' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
                'remember_token' => 'NULL',
                
                'password' => bcrypt('Omar.502')
            ]);
        }
    }
}
