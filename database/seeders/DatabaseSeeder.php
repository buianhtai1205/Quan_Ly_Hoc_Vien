<?php

namespace Database\Seeders;

use App\Models\Academic;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Academic::factory(10)->create();
        Teacher::factory(50)->create();
    }
}
