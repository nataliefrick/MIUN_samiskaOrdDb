<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call the function to fill the tables with data        
        $this ->call(NodesSeeder::class); 
        $this ->call(WordsSeeder::class);
        $this ->call(UsersSeeder::class); 
        $this ->call(DownloadsSeeder::class); 
        $this ->call(ChangesSeeder::class); 

        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

       