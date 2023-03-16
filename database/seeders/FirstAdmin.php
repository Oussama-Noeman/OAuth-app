<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class FirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create($this->adminData());
    }
    private function adminData()
    {
        return [
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin2023'),
            'email_verified_at'=>Carbon::now()            
        ];
    }
}
