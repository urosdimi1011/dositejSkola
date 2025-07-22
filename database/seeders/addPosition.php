<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addPosition extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['key'=>'asistent',          'label'=>'Asistent',           'sort_order'=>3],
            ['key'=>'docent',            'label'=>'Docent',             'sort_order'=>2],
            ['key'=>'vanredni_profesor', 'label'=>'Vanredni profesor', 'sort_order'=>4],
            ['key'=>'redovni_profesor',  'label'=>'Redovni profesor',  'sort_order'=>1],
            ['key'=>'dopunski_rad',  'label'=>'Dopunski rad',  'sort_order'=>5],
        ];

        foreach ($items as $i) {
            Position::updateOrCreate(['key'=>$i['key']], $i);
        }
    }
}
