<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Screen extends Component
{
    public $task, $brand, $model, $details;

    protected $listeners = ['updateTask' => 'update'];

    protected $rules = [
        'brand' => 'required',
        'model' => 'required',
        'serial' => 'required',
    ];

    protected $messages = [
        'brand.*' => 'Brand?',
        'model.*' => 'Model?',
        'serial.*' => 'Serial Number?',
    ];

    public function render()
    {
        $this->brand = $this->task->SO->SO_Type_Screen->brand;
        $this->model = $this->task->SO->SO_Type_Screen->model;
        $this->details = $this->task->SO->SO_Type_Screen->details;
        $this->serial = $this->task->SO->SO_Type_Screen->serial;
        return view('livewire.dashboard.update-task.hardware-replacement.screen');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'brand' => $this->brand,
            'model' => $this->model,
            'serial' => $this->serial,
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
        $this->task->SO->SO_Type_Screen->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'serial' => $this->serial,
            'details' => $this->details,
        ]);
    }
}
