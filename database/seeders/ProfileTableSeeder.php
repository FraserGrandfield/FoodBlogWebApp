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
        DB::table('tag')->insert([
            'name' => 'spicy'
        ]);
        DB::table('tag')->insert([
            'name' => 'glutenFree'
        ]);
        DB::table('tag')->insert([
            'name' => 'vegitarian'
        ]);
        DB::table('tag')->insert([
            'name' => 'vegan'
        ]);
        DB::table('tag')->insert([
            'name' => 'lowCalories'
        ]);

        $profile = Profile::factory()->times(10)->hasPosts(3)->create();

    }
}
