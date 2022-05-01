<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use App\Models\Task;

use Livewire\Component;

class InvoiceRequest extends Component
{
    public $task, $Status, $remarks;

    protected function getListeners()
    {
        return [
            'updateTask' => 'update',
        ];
    }

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->Status = $this->task->InvoiceRequest->Status;
        $this->remarks = $this->task->InvoiceRequest->remarks;
        return view('livewire.dashboard.update-task.invoice-request');
    }

    public function update()
    {
        $this->task->InvoiceRequest->update([
            'remarks' => $this->remarks,
        ]);
        if ($this->task->status == 3) {
            $this->task->InvoiceRequest->OutofScope->update([
                'status' => '2'
            ]);
            $this->task->InvoiceRequest->update([
                'Status' => 'Completed',
            ]);
        } else {
            $this->task->InvoiceRequest->OutofScope->update([
                'status' => '1'
            ]);
            $this->task->InvoiceRequest->update([
                'Status' => 'Pending',
            ]);
        }
    }
}
