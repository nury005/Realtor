<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name_tm' => 'Aşgabat', 'name_en' => 'Ashgabat'],
            ['name_tm' => 'Ahal', 'name_en' => null],
            ['name_tm' => 'Balkan', 'name_en' => null],
            ['name_tm' => 'Daşoguz', 'name_en' => null],
            ['name_tm' => 'Lebap', 'name_en' => null],
            ['name_tm' => 'Mary', 'name_en' => null],
        ];

        foreach ($locations as $location) {
            $obj = new Location();
            $obj->name_tm = $location['name_tm'];
            $obj->name_en = $location['name_en'];
            $obj->save();
        }
    }
}
