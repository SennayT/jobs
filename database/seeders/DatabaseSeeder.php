<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sennay',
            'email' => 'wsennay@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'type' =>'admin'
        ]);
        User::factory()
            ->times(10)
            ->create()
            ->each(function ($user){
                if($user->type === 'employer') {
                    $user->jobs()->saveMany(
                        Job::factory()->times(rand(1,3))->make()
                    );
                }
            });
    }
}
