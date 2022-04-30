<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Network extends Component
{
    public $task, $type, $connection_type, $details;

    protected $rules = [
        'connection_type' => 'required',
    ];

    protected $messages = [
        'connection_type.*' => 'Connection Type?',
    ];

    protected $listeners = ['updateTask' => 'update'];

    public function render()
    {
        $this->type = $this->task->SO->SO_Type_Network->type;
        $this->connection_type = $this->task->SO->SO_Type_Network->connection_type;
        $this->details = $this->task->SO->SO_Type_Network->details;
        return view('livewire.dashboard.update-task.hardware-replacement.network');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'connection_type' => $this->connection_type,
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
        $this->task->SO->SO_Type_Network->update([
            'type' => $this->type,
            'connection_type' => $this->connection_type,
            'details' => $this->details,
        ]);
    }
}
