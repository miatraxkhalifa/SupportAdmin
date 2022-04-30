<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ProjectorLamp extends Component
{
    public $task, $brand, $model, $details;

    protected $listeners = ['updateTask' => 'update'];

    protected $rules = [
        'brand' => 'required',
        'model' => 'required',
    ];

    protected $messages = [
        'brand.*' => 'Brand?',
        'model.*' => 'Model?',
    ];

    public function render()
    {
        $this->brand = $this->task->SO->SO_Type_ProjectorLamp->brand;
        $this->model = $this->task->SO->SO_Type_ProjectorLamp->model;
        $this->details = $this->task->SO->SO_Type_ProjectorLamp->details;
        return view('livewire.dashboard.update-task.hardware-replacement.projector-lamp');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'brand' => $this->brand,
            'model' => $this->model,
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
        $this->task->SO->SO_Type_ProjectorLamp->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'details' => $this->details,
        ]);
    }
}
