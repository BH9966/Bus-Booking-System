<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      DB::table('users')->insert(
            [
                'created_by' => null, 
                'company_id' => '',    
                'name' => 'Khamisi Hussein',
                'email' => 'hamisihussein999@gmail.com',
                'phone' => '0754454705',
                'profile_photo' => null,
                'address' => 'Dar es Salaam,kigamboni',
                'role' => 'SuperAdmin',
                'status' => 'active',
                'last_login_at' => null,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin@123'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
            
         );
    }

 
		
	
}
