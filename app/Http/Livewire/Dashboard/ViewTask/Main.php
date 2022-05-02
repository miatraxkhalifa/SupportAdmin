<?php

namespace App\Http\Livewire\Dashboard\ViewTask;

use App\Models\Task;
use Livewire\Component;

class Main extends Component
{
    public $task;

    public function mount(Task $task)
    {
        $this->task = $task;
        //  $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {

        $task = $this->task;
        return view('livewire.dashboard.view-task.main', [
            'task' => $task,
        ]);
    }
}
