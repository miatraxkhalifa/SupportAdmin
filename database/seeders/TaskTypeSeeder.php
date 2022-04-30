<?php

namespace Database\Seeders;

use App\Models\SO_Type;
use App\Models\TaskType;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'id' => '1',
                'name' => 'SO(Hardware Replacement)'
            ],
            [
                'id' => '2',
                'name' => 'Onsite Technician'
            ],
            [
                'id' => '3',
                'name' => 'Warranty Repair'
            ],
            [
                'id' => '4',
                'name' => 'Invoice Request'
            ],
            [
                'id' => '5',
                'name' => 'Hardware Pick Up'
            ],
            [
                'id' => '6',
                'name' => 'Item/Hardware Availability Inquiry'
            ],
            [
                'id' => '7',
                'name' => 'Onsite Technician Scoping'
            ],
        ];

        $salesOrderTypes = [
            [
                'id' => '1',
                'name' => 'Media Player'
            ],
            [
                'id' => '2',
                'name' => 'Network Device'
            ],
            [
                'id' => '3',
                'name' => 'Projector'
            ],
            [
                'id' => '4',
                'name' => 'Projector Lamp'
            ],
            [
                'id' => '5',
                'name' => 'Screen'
            ],
            [
                'id' => '6',
                'name' => 'Others',
            ],
        ];

        foreach ($tasks as $task) {
            TaskType::create($task);
        }

        foreach ($salesOrderTypes as $value) {
            SO_Type::create($value);
        }
    }
}
