<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MediaPlayer extends Component
{
    public $task, $status, $connection_type, $application, $solution, $orientation, $details, $oldMP;

    protected $rules = [
        'connection_type' => 'required',
        'oldMP' => 'required',
    ];

    protected $messages = [
        'connection_type.*' => 'Connection Type? Details?',
        'oldMP' => 'Old media player model?',
    ];

    protected $listeners = ['updateTask' => 'update'];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'connection_type' => $this->connection_type,
            'oldMP' => $this->oldMP,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
    }

    public function update()
    {
        $this->validateData();
        $this->task->SO->SO_Type_MP->update([
            'status' => $this->status,
            'connection_type' => $this->connection_type,
            'application' => $this->application,
            'solution' => $this->solution,
            'orientation' => $this->orientation,
            'details' => $this->details,
            'oldMP' => $this->oldMP,
        ]);
    }

    public function render()
    {
        $this->status = $this->task->SO->SO_Type_MP->status;
        $this->connection_type = $this->task->SO->SO_Type_MP->connection_type;
        $this->application = $this->task->SO->SO_Type_MP->application;
        $this->solution = $this->task->SO->SO_Type_MP->solution;
        $this->orientation = $this->task->SO->SO_Type_MP->orientation;
        $this->details = $this->task->SO->SO_Type_MP->details;
        $this->oldMP = $this->task->SO->SO_Type_MP->oldMP;
        return view('livewire.dashboard.update-task.hardware-replacement.media-player');
    }
}
