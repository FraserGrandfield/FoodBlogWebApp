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
        DB::table('tags')->insert([
            'name' => 'Spicy'
        ]);
        DB::table('tags')->insert([
            'name' => 'Gluten Free'
        ]);
        DB::table('tags')->insert([
            'name' => 'Vegitarian'
        ]);
        DB::table('tags')->insert([
            'name' => 'Vegan'
        ]);
        DB::table('tags')->insert([
            'name' => 'Low Calories'
        ]);

        $profile = Profile::factory()->times(10)->hasPosts(3)->create();

    }
}
