<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Others extends Component
{
    public $task, $details;

    protected $listeners = ['updateTask' => 'update'];

    protected $rules = [
        'details' => 'required',
    ];

    protected $messages = [
        'details.*' => 'no other details?',
    ];

    public function render()
    {
        $this->details = $this->task->SO->SO_Type_Others->details;
        return view('livewire.dashboard.update-task.hardware-replacement.others');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'details' => $this->details,
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
        $this->task->SO->SO_Type_Others->update([
            'details' => $this->details,
        ]);
    }
}
