<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Livre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Fadwa',
            'email' => 'fadwa@gmail.com'
        ]);

        Livre::factory(6)->create([
            'user_id' => $user->id
        ]);

       
    }
}
