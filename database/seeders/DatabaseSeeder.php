<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Room::factory(10)->create();

        $rooms = Room::all();
        for ($i = 0; $i < 10; $i++){
            $room = $rooms->random();
            Client::factory()->create([
                'room_id' => $room->id
            ]);
        }
        \App\Models\Hotel::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
