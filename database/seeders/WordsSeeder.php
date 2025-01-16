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
            [
                'aasku',
                'En sydsamisk term för ett specifikt sätt att vandra.',
                'vandring',
                'Processen att gå till fots från en plats till en annan.',
                'vandring',
                'Gange til fots fra ett sted til et annet.',
                'promenad, tur, färd',
                'stanna, vila, stillhet',
                'Jag tycker om att göra en lång vandring i skogen på helgerna.',
                'Samisk ordbok, Svenska Akademiens ordlista',
                2,
                3, 1, 
                "Aasku jih aajmoe lea gusnie niehkuh ij goerkieh.",
                "Desire and hope are where dreams have no limits."
            ],
            [
                'báhko',
                'En sydsamisk term för ett redskap som används vid jakt.',
                'båge',
                'Ett redskap för att skjuta pilar, ofta använt vid jakt eller sport.',
                'bue',
                'Et redskap for å skyte piler, brukt til jakt eller sport.',
                'pilbåge, jaktbåge',
                null,
                'Han plockade upp sin båge och förberedde sig för jakt.',
                'Samisk ordbok, Nordiska ordboken',
                3,
                2, 2, 
                "Báhko lea mov goerhtemegie biejedh.",
                "The bone is the foundation of my strength."
            ],
            [
                'guovssu',
                'Termen för snö i sydsamiska språket, särskilt på vintern.',
                'snö',
                'Fruset vatten i form av vita kristaller som faller från himlen under vintermånaderna.',
                'snø',
                'Fryst vann i form av hvite krystaller som faller fra himmelen om vinteren.',
                'flingor, vinter, is',
                'värme, regn, sommar',
                'Det var mycket snö på marken och vinden blåste hårt.',
                'Samisk ordbok, Svenska akademins ordlista',
                1,
                1, 4,
                "Guovssu lea Almetjh nïejte, ovte tjaktjele aaj dïedtie.",
                "The northern lights are the daughter of the people, dancing in the winter sky."
            ],
            [
                'ludna',
                'En term som används för att beskriva en persons hårdare eller mer rustika kläder.',
                'kläder',
                'Plagg eller föremål som bärs för att skydda kroppen.',
                'klær',
                'Plagg eller objekter som bæres for å beskytte kroppen.',
                'kläder, dräkt, plagg',
                'bar, naken',
                'Han klädde sig i sina tjocka kläder för att stå emot kylan.',
                'Samisk ordbok',
                1,
                2, 2,
                "Ludna lea biejjien biejje-gïele.", 
                "The song is the sun's voice."
            ],
            [
                'jåvke',
                'En sydsamisk term för en typ av fågel som ofta ses på vintermorgnar.',
                'fågel',
                'Ett djur som har fjädrar och kan flyga.',
                'fugl',
                'Et dyr som har fjær og kan fly.',
                'fåglar, vingar, rovfåglar',
                null,
                'Fågeln flög iväg i den kalla morgonluften.',
                'Samisk ordbok',
                3,
                3, 
                1, 
                "Jåvke golkeme gusnie biejjie åadtjeme.", 
                "The shadow follows where the sun shines."

            ],
            ["aavone", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium","lycklig", "att vara lycklig, varm och glad", "lykkelig", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "perspiciatis, unde omnis, iste natus error", "perspiciatis, unde omnis, iste natus error", "this is an example of use", "Authors,etal. 'journal_name'. publish year", 0, 0, 1, "Aavone lea gusnie aejkie jih guvvie gaajhkedh.", "Hope is where courage and dreams meet." ],
            ["hïelkes", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "nervös", "att vara nervös, hysterisk, som lätt kan bringas ut av fattningen av plötsliga och oväntade händelser", "nervøs", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "perspiciatis, unde omnis, iste natus error", null, "this is an example of use", "Authors,etal. 'journal_name'. publish year", 0, 0, 6, "Hïelkes tjihkijægan sijhtem åarjelsavloe.", "In the frost, I hear the call of the southern wind." ],
            ["girmes", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", "glad", "att vara glad på ett 'skrytsamt sätt'. Irriterande glad; självgod", "glad", "ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium", null, null, "this is an example of use", null, 0, 0, 6, "Girmes luvnie goerhkebe aejkien tjuvkes.", "In the mist lies the gentle whisper of hope." ],
            
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
                'frequency' => $value[11],
                'node_id' => $value[12],
                'expression' => $value[13],
                'translation' => $value[14],

                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ];
        endforeach ;
        DB::table('words')->insert($array2);

    }
}


