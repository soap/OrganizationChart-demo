<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobRole;

class JobRoleSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobRole::create([
            'name' => 'Head of Unit',
            'ordering' => '1'
        ]);

        JobRole::create([
            'name' => 'Assistant of Unit',
            'ordering' => '2'
        ]);

        JobRole::create([
            'name' => 'Member of Unit',
            'ordering' => '3'
        ]);
    }
}
