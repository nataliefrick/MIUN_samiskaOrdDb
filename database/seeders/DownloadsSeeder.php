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
                'Alice Johnson',
                'Project Manager',
                'Sami Language Institute',
                'alice.johnson@samilanguage.org',
                '+123456789',
                'Reviving the Sydsamiska Language',
                'A project aimed at revitalizing and preserving the Sydsamiska language through educational programs and cultural initiatives.',
                'promenad',
                'Looking for partnerships with educational institutions and Sami cultural organizations to preserve the language.',
            ],
            [
                'Bob Smith',
                'Cultural Advisor',
                'Nordic Heritage Foundation',
                'bob.smith@nordicheritage.org',
                '+987654321',
                'Sami Traditions and Language Preservation',
                'A project focused on documenting and preserving traditional Sami practices and their linguistic connections in Sweden and Norway.',
                'bue',
                'Collaborating with Sami elders and cultural experts to preserve traditional knowledge and Sami vocabulary.',
            ],
            [
                'Charlie Brown',
                'Linguist',
                'Linguistic Research Center',
                'charlie.brown@linguisticsresearch.com',
                '+112233445',
                'Comparative Study of Sami and Nordic Languages',
                'A comparative linguistic study of the Sydsamiska and Norwegian languages, focusing on lexical and syntactical similarities.',
                'regn',
                'Looking to connect with universities and research groups focusing on Nordic and Sami languages.',
            ],
            [
                'Diana Ross',
                'Community Manager',
                'Sami Language Association',
                'diana.ross@samilanguageassociation.com',
                '+223344556',
                'Sami Language Courses for the Next Generation',
                'Developing language courses for young Sami people to learn and speak their native language, Sydsamiska.',
                'kläder',
                'Collaborating with local schools and Sami communities to promote language learning among young people.',
            ],
            [
                'Evan Green',
                'Director',
                'Indigenous Language Initiative',
                'evan.green@indigenouslanguage.org',
                '+334455667',
                'Documenting Sami Folk Songs and Stories',
                'A project to collect and transcribe traditional Sami songs and stories in the Sydsamiska language, with a focus on oral traditions.',
                'fugl',
                'Need assistance from cultural researchers, folklorists, and linguists to record and transcribe the stories.',
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
