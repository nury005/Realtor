<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'admin' => 1,
            'name' => 'Nurjan',
            'phone' => 61000000,
            'password' => bcrypt('123456'),
        ]);

//        $realtor->assignRole('realtor');
////
////        $realtor->realtorRecord()->create([
////            'user_id' => $realtor->id,
////        ]);
    }
}
