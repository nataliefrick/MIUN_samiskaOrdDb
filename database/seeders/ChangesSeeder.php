<?php

namespace Database\Seeders;

use App\Models\Changes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ChangesSeeder extends Seeder
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
            1,
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ",
            "Natalie Frick",
            "Natalie@mail.com",
            "0730-12 34 56",
            null,
            null
            ],
            [
                1,
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ",
                null,
                null,
                null,
                null,
                null
            ],
            [
                3,
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ",
                "Jennifer Ruddy",
                "jennifer@mail.com",
                "0730-12 34 56",
                null,
                null
                ]
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'word_id' => $value[0],
                'message' => $value[1],
                'name' => $value[2],
                'email' => $value[3],
                'telephone' => $value[4],
                'status' => $value[5],
                'checked_by' => $value[6],
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('changes')->insert($array2);

    }
}
