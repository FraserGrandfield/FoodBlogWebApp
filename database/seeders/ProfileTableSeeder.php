<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;

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
        // DB::table('profiles')->insert([
        //     'email' => "test@gmail.com",
        //     'first_name' => "testFirst",
        //     'last_name' => "testLast",
        //     'profile_picture' => "profilePicutre",

        // ]);


        $user = User::factory()->create();

        $profile = Profile::factory()->count(10)->for(User::factory())->hasPosts(2)->hasComments(1)->create();

    }
}
