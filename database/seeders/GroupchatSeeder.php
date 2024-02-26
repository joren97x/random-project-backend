<?php

namespace Database\Seeders;

use App\Models\Groupchat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupchatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Groupchat::factory(6)->create();
    }
}
