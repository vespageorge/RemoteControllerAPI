<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommandTypes;
use App\Models\CommandDefaultList;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CommandTypes::insert([
            ['name' => 'executable',
             'description' => 'Used to run different executables from slave machine.',
             'created_by' => "SYSTEM"],
            ['name' => 'cmd',
             'description' => 'Console commands to run in powershell or cmd.',
             'created_by' => "SYSTEM"],
            ['name' => 'selenium',
             'description' => 'Automated browser execution.',
             'created_by' => "SYSTEM"],
            ['name' => 'installer',
             'description' => 'Download and install software.',
             'created_by' => "SYSTEM"],
            ['name' => 'custom',
             'description' => 'Created by user different type of scripts',
             'created_by' => "SYSTEM"],
        ]);
        CommandDefaultList::insert([
            ['cmd' => 'Notepad',
             'description' => 'Launch notepad',
             'command_type_id' => "1"],
            ['cmd' => 'Google',
             'description' => 'Search google.com',
             'command_type_id' => "5"], 
        ]);
    }
}
