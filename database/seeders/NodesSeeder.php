<?php

namespace Database\Seeders;

use App\Models\Nodes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class NodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // only import if DB is empty
        // if(!Words::count()){
        //     $this->importWords();
        // }
    //}

        $array = [
            [
                'känslor',
                'positiva',
                'glad'
            ],
            [
                'känslor',
                'positiva',
                'nöjd'
            ],
            [
                'känslor',
                'positiva',
                'bra'
            ],
            [
                'känslor',
                'negativa',
                'skäm'
            ],
            [
                'känslor',
                'negativa',
                'arg'
            ],
            [
                'känslor',
                'negativa',
                'nervös'
            ],
          
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'main_node' => $value[0],
                'polarity_node' => $value[1],
                'sub_node' => $value[2],
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('nodes')->insert($array2);

    }
}

