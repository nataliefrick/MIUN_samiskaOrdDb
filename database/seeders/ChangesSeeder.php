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
                'word_id' => 1,  // Assuming word with ID 1 is 'aasku'
                'message' => 'Updated the definition of "aasku" to better reflect its meaning in modern context.',
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@techsolutions.com',
                'telephone' => '+123456789',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 2,  // Assuming word with ID 2 is 'báhko'
                'message' => 'Corrected the spelling and added a more detailed example of usage for "báhko".',
                'name' => 'Bob Smith',
                'email' => 'bob.smith@greenenergy.com',
                'telephone' => '+987654321',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 3,  // Assuming word with ID 3 is 'guovssu'
                'message' => 'Revised the definition to clarify the distinction between "guovssu" and similar words in other languages.',
                'name' => 'Charlie Brown',
                'email' => 'charlie.brown@futuretechlabs.com',
                'telephone' => '+112233445',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 4,  // Assuming word with ID 4 is 'ludna'
                'message' => 'Added synonym "plagg" and updated example sentence to include more context about the term "ludna".',
                'name' => 'Diana Ross',
                'email' => 'diana.ross@creativeinnovations.com',
                'telephone' => '+223344556',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 5,  // Assuming word with ID 5 is 'jåvke'
                'message' => 'Updated the example of use for "jåvke" to include a clearer description of the bird species.',
                'name' => 'Evan Green',
                'email' => 'evan.green@healthtechsolutions.com',
                'telephone' => '+334455667',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 6,  // Assuming word with ID 6 is 'ludna'
                'message' => 'Fixed a typo in the definition of "ludna" and clarified the relationship with its Norwegian counterpart.',
                'name' => 'Fiona White',
                'email' => 'fiona.white@creativeinnovations.com',
                'telephone' => '+998877665',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 7,  // Assuming word with ID 7 is 'jåvke'
                'message' => 'Enhanced the "jåvke" definition by including a comparison to other types of birds in Sami culture.',
                'name' => 'George Miller',
                'email' => 'george.miller@culturalresearch.org',
                'telephone' => '+123987654',
                'status' => null,
                'checked_by' => null,
            ],
            [
                'word_id' => 8,  // Assuming word with ID 8 is 'báhko'
                'message' => 'Revised the pronunciation guide for "báhko" and added a few related synonyms to the entry.',
                'name' => 'Hannah Clark',
                'email' => 'hannah.clark@samidictionary.org',
                'telephone' => '+345678901',
                'status' => null,
                'checked_by' => null,
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
