<?php

namespace Database\Seeders;

use App\Models\Downloads;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DownloadsSeeder extends Seeder
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
            "Natalie Frick",
            "Programmer",
            "Mid Sweden University",
            "Natalie@mail.com",
            "0730-12 34 56",
            "Testing the database",
            "This project is just a test of the database and the downloaded data will not be published.",
            "lycklig", 
            null
            ]
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'name' => $value[0], 
                'title' => $value[1], 
                'institution' => $value[2], 
                'email' => $value[3], 
                'telephone' => $value[4], 
                'projectTitle' => $value[5], 
                'description' => $value[6], 
                'searchTerm' => $value[7], 
                'notes' => $value[8], 
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('downloads')->insert($array2);

    }
}
