<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class HardwareReplacement extends Component
{
    public $task, $disposal, $deviceName, $address, $contactName, $contactEmail, $contactNumber, $remarks, $Status;

    protected $listeners = ['updateTask' => 'update'];

    protected $rules = [
        'deviceName' => 'required',
        'address' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required|email',
        'contactNumber' => 'required',
        'remarks' => 'required'
    ];

    protected $messages = [
        'deviceName.*' => 'Device name is required',
        'address.*' => 'Site address is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number111 is required',
        'remarks' => 'reason for replacement?'
    ];

    public function validateData()
    {
        $validation = Validator::make([
            'deviceName' => $this->deviceName,
            'address' => $this->address,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'remarks' => $this->remarks,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
    }

    public function render()
    {
        $this->disposal = $this->task->SO->disposal;
        $this->deviceName = $this->task->SO->deviceName;
        $this->address = $this->task->SO->address;
        $this->contactName = $this->task->SO->contactName;
        $this->contactEmail = $this->task->SO->contactEmail;
        $this->contactNumber = $this->task->SO->contactNumber;
        $this->remarks = $this->task->SO->remarks;
        $this->Status = $this->task->SO->Status;
        return view('livewire.dashboard.update-task.hardware-replacement');
    }

    public function update()
    {
        $this->validateData();
        $this->task->SO->update([
            'disposal' => $this->disposal,
            'deviceName' => $this->deviceName,
            'address' => $this->address,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'remarks' => $this->remarks,
            'Status' => $this->Status,
        ]);
        $this->emit('updateTask');
    }
}
