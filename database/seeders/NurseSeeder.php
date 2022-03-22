<?php

namespace Database\Seeders;

use App\Models\nurse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //write factory seed 
        nurse::factory(30)->create();
    }
}
