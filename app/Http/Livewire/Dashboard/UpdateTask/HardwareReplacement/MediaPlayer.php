<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MediaPlayer extends Component
{
    public $task, $status, $connection_type, $application, $solution, $orientation;

    protected $rules = [
        'connection_type' => 'required',
    ];

    protected $messages = [
        'connection_type.*' => 'Connection Type? Details?',
    ];

    protected $listeners = ['updateTask' => 'update'];

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
        $this->task->SO->SO_Type_MP->update([
            'status' => $this->status,
            'connection_type' => $this->connection_type,
            'application' => $this->application,
            'solution' => $this->solution,
            'orientation' => $this->orientation,
        ]);
    }


    public function render()
    {
        $this->status = $this->task->SO->SO_Type_MP->status;
        $this->connection_type = $this->task->SO->SO_Type_MP->connection_type;
        $this->application = $this->task->SO->SO_Type_MP->application;
        $this->solution = $this->task->SO->SO_Type_MP->solution;
        $this->orientation = $this->task->SO->SO_Type_MP->orientation;
        return view('livewire.dashboard.update-task.hardware-replacement.media-player');
    }
}