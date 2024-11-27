<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()
            ->times(5000)
            ->sequence(fn ($sequence) => [
                'body' => 'Message' . $sequence->index,
                'created_at' => now()->subYear()->addMinutes($sequence->index),
            ])
            ->create([
                'user_id' => 1,
                'room_id' => 1,
            ]);
    }
}
