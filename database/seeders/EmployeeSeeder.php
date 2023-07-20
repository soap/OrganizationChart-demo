<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'title' => 'test_tt',
            'first_name' => 'test_fn',
            'last_name' => 'test_ln',
            'join_date' => '2023-07-18 03:08:31',
            'quit_date' => null,
            'status' => 1,
            'user_id' => 1,
            'job_position_id' => 10,
            'promotion_date' => '2023-07-18 03:08:31',
        ]);

        Employee::create([
            'title' => 'test_tt2',
            'first_name' => 'test_fn2',
            'last_name' => 'test_ln2',
            'join_date' => '2023-07-19 03:08:31',
            'quit_date' => null,
            'status' => 1,
            'user_id' => 1,
            'job_position_id' => 9,
            'promotion_date' => '2023-07-19 03:08:31',
        ]);
    }
}
