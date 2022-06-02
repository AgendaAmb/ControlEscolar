<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [ 'id' => 1, 'academic_program_id' => 1, 
                'from' => '2022-05-01', 
                'to' => '2022-05-01', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 'id' => 2, 'academic_program_id' => 2, 
                'from' => '2022-05-01', 
                'to' => '2022-05-01', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 'id' => 3, 'academic_program_id' => 3, 
                'from' => '2022-05-01', 
                'to' => '2022-05-01', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 'id' => 4, 'academic_program_id' => 4, 
                'from' => '2022-05-01', 
                'to' => '2022-05-01', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach($announcements as $i){
            Announcement::create($i);
        }
    }
}
