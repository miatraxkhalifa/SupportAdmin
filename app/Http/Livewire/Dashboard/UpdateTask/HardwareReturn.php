<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class HardwareReturn extends Component
{
    public $task, $status, $contactName, $contactNumber, $contactEmail, $remarks;

    protected $listeners = ['updateTask' => 'update'];

    protected $rules = [
        'contactName' => 'required',
        'contactNumber' => 'required',
        'contactEmail' => 'required|email',
    ];

    protected $messages = [
        'contactName.*' => 'Item or hardware is required',
        'contactNumber.*' => 'Quantity is required',
        'contactEmail.required' => 'contact email add?',
        'contactEmail.email' => 'not an email add',
    ];

    public function render()
    {
        $this->status = $this->task->HardwareReturn->status;
        $this->contactName = $this->task->HardwareReturn->SO->contactName;
        $this->contactNumber = $this->task->HardwareReturn->SO->contactNumber;
        $this->contactEmail = $this->task->HardwareReturn->SO->contactEmail;
        $this->remarks = $this->task->HardwareReturn->remarks;
        return view('livewire.dashboard.update-task.hardware-return');
    }

    public function validateData()
    {

        $validation = Validator::make([
            'contactName' => $this->contactName,
            'contactNumber' => $this->contactNumber,
            'contactEmail' => $this->contactEmail,
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
        $this->task->HardwareReturn->SO->update([
            'contactName' => $this->contactName,
            'contactNumber' => $this->contactNumber,
            'contactEmail' => $this->contactEmail,
        ]);
        $this->task->HardwareReturn->update([
            'status' => $this->status,
            'remarks' => $this->remarks,
        ]);
    }
}
