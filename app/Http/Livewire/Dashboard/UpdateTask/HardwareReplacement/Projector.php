<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Projector extends Component
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
        $this->brand = $this->task->SO->SO_Type_Projector->brand;
        $this->model = $this->task->SO->SO_Type_Projector->model;
        $this->details = $this->task->SO->SO_Type_Projector->details;
        return view('livewire.dashboard.update-task.hardware-replacement.projector');
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
        $this->task->SO->SO_Type_Projector->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'details' => $this->details,
        ]);
    }
}
