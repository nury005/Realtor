<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Katež',
            'Etaž',
            'Elitka',
            'Ýer jaý',
            'Daça',
            'Howly',
            'Arenda',
            'Magazin Arenda',
        ];

        foreach ($types as $type) {
            $obj = new Type();
            $obj->name_tm = $type;
            $obj->name_en = $type;
//            $obj->name_ru = $type;
//            $obj->name_tr = $type;
            $obj->save();
        }
    }
}
