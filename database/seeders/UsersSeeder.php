<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // only import if DB is empty
    //     if(!User::count()){
    //         $this->importUsers();
    //     }
    // }

    // public function importUsers() {
        // array of data
        $array = [
    ['Natalie', 'natalie@mail.com', Hash::make('password') ],
    ['Gäst', 'guest@miun.com', Hash::make('MIUN-sseid-2024') ],
    ['Gäst', 'guest@miun.se', Hash::make('MIUN-sseid-2024') ],
    ['Marie-France', 'marie-france.champoux-larsson@miun.se', Hash::make('MIUN-sseid-2024') ],
    ['Anna', 'anna.leiler@miun.se', Hash::make('MIUN-sseid-2024') ],
            
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'name' => $value[0],
                'email' => $value[1],
                'password' => $value[2],
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('users')->insert($array2);
    }
}