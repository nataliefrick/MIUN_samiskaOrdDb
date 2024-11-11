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
                1,  // Assuming word with ID 1 is 'aasku'
                'Updated the definition of "aasku" to better reflect its meaning in modern context.',
                'Alice Johnson',
                'alice.johnson@techsolutions.com',
                '+123456789',
                null,
                null,
            ],
            [
                2,  // Assuming word with ID 2 is 'báhko'
                'Corrected the spelling and added a more detailed example of usage for "báhko".',
                'Bob Smith',
                'bob.smith@greenenergy.com',
                '+987654321',
                null,
                null,
            ],
            [
                3,  // Assuming word with ID 3 is 'guovssu'
                'Revised the definition to clarify the distinction between "guovssu" and similar words in other languages.',
                'Charlie Brown',
                'charlie.brown@futuretechlabs.com',
                '+112233445',
                null,
                null,
            ],
            [
                4,  // Assuming word with ID 4 is 'ludna'
                'Added synonym "plagg" and updated example sentence to include more context about the term "ludna".',
                'Diana Ross',
                'diana.ross@creativeinnovations.com',
                '+223344556',
                null,
                null,
            ],
            [
                5,  // Assuming word with ID 5 is 'jåvke'
                'Updated the example of use for "jåvke" to include a clearer description of the bird species.',
                'Evan Green',
                'evan.green@healthtechsolutions.com',
                '+334455667',
                null,
                null,
            ],
            [
                6,  // Assuming word with ID 6 is 'ludna'
                'Fixed a typo in the definition of "ludna" and clarified the relationship with its Norwegian counterpart.',
                'Fiona White',
                'fiona.white@creativeinnovations.com',
                '+998877665',
                null,
                null,
            ],
            [
                7,  // Assuming word with ID 7 is 'jåvke'
                'Enhanced the "jåvke" definition by including a comparison to other types of birds in Sami culture.',
                'George Miller',
                'george.miller@culturalresearch.org',
                '+123987654',
                null,
                null,
            ],
            [
                8,  // Assuming word with ID 8 is 'báhko'
                'Revised the pronunciation guide for "báhko" and added a few related synonyms to the entry.',
                'Hannah Clark',
                'hannah.clark@samidictionary.org',
                '+345678901',
                null,
                null,
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
