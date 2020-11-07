<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Manually seeding test data
        DB::table('profiles')->insert([
            'email' => "test@gmail.com",
            'first_name' => "testFirst",
            'last_name' => "testLast",
            'profile_picture' => "profilePicutre",

        ]);

        Profile::factory()->times(10)->hasPosts(2)->hasComments(1)->create();
    }
}
