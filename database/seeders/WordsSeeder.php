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
        // id, 'word_sydsamiska', 'definition_sydsamiska','word_svenska','definition_svenska','synonyms','antonyms','example_of_use'        'link_to_update','sources','arousal_level','frequency_id'
        $array = [
            ["muohtastáluid", "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>","snögubbar", "<p>Description for the swedish word snowman.</p>", 1, 3, "<p>Göra snögubbar. Dahkat muohtastáluid.</p>", "#", "<p>Authors,etal. 'journal_name'. publish year</p>", 0, 0 ],
            ["muohta", "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>", "snö", "<p>Description for the swedish word snow.</p>", 3, 2, "<p>Det var så mycket snö att dörren nästan inte gick att öppna. Lei nu ollu muohta ahte uksa ii báljo rahpasan.</p>", "#", "<p>Authors,etal. 'journal_name'. publish year</p>", 0, 0 ],
            ["mohtorgielká", "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>","snöskoter", "<p>Description for the swedish word snowmobile.</p>", 1, 0, "<p>En ny snöskoter. Ođđa mohtorgielká.</p>", "#", "<p>Authors,etal. 'journal_name'. publish year</p>", 0, 0 ],
            ["dálki", "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>", "väder","<p>Description for the swedish word weather.</p>", 1, 0, "<p>Vilket dåligt väder!Hei dán dálkki!</p>", "#", "<p>Authors,etal. 'journal_name'. publish year</p>", 0, 0 ]
        ];

        foreach($array as $key => $value) : 
            $array2[] = [
                'word_sydsamiska' => $value[0], 
                'definition_sydsamiska' => $value[1],
                'word_svenska' => $value[2],
                'definition_svenska' => $value[3],
                'synonyms' => $value[4],
                'antonyms' => $value[5],
                'example_of_use' => $value[6],
                'link_to_update' => $value[7],
                'sources' => $value[8],
                'arousal_level' => $value[9],
                'frequency_id' => $value[10],


                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('words')->insert($array2);

    }
}
