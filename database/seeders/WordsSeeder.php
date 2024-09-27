<?php

namespace Database\Seeders;

use App\Models\Words;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WordsSeeder extends Seeder
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

    //public function importWords() {
        // array of data
        // 0 'word_sydsamiska',
        // 1 'definition_sydsamiska',
        // 2 'word_svenska',
        // 3 'definition_svenska',
        // 4 'word_norska',
        // 5 'definition_norska',
        // 6 'synonyms',
        // 7 'antonyms',
        // 8 'example_of_use',
        // 9 'sources',
        // 10 'arousal_level',
        // 11 'frequency_id'

        $array = [
            // ["aavone", null,"lycklig ", "att vara lycklig, varm och glad", null, null, null, null, null, "Authors,etal. 'journal_name'. publish year", 0, 0 ],
            // ["hïelkes", null, "nervös", "att vara nervös, hysterisk, som lätt kan bringas ut av fattningen av plötsliga och oväntade händelser", null, null, null, null, null, "Authors,etal. 'journal_name'. publish year", 0, 0 ],
            // ["girmes", null, "glad", "att vara glad på ett 'skrytsamt sätt'. Irriterande glad; självgod", null, null, null, null, null, "Authors,etal. 'journal_name'. publish year", 0, 0 ],
            
            ["aavone", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium","lycklig ", "att vara lycklig, varm och glad", "perspiciatis", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "perspiciatis, unde omnis, iste natus error", "perspiciatis, unde omnis, iste natus error", "this is an example of use", "Authors,etal. 'journal_name'. publish year", 0, 0 ],
            ["hïelkes", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "nervös", "att vara nervös, hysterisk, som lätt kan bringas ut av fattningen av plötsliga och oväntade händelser", "perspiciatis", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "perspiciatis, unde omnis, iste natus error", null, "this is an example of use", "Authors,etal. 'journal_name'. publish year", 0, 0 ],
            ["girmes", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "glad", "att vara glad på ett 'skrytsamt sätt'. Irriterande glad; självgod", "perspiciatis", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", null, null, "this is an example of use", null, 0, 0 ],
            
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'word_sydsamiska' => $value[0], 
                'definition_sydsamiska' => $value[1],
                'word_svenska' => $value[2],
                'definition_svenska' => $value[3],
                'word_norska' => $value[4],
                'definition_norska' => $value[5],
                'synonyms' => $value[6],
                'antonyms' => $value[7],
                'example_of_use' => $value[8],
                'sources' => $value[9],
                'arousal_level' => $value[10],
                'frequency_id' => $value[11],


                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('words')->insert($array2);

    }
}
