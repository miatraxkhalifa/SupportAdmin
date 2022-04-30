<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\HardwareReturn as ModelsHardwareReturn;
use App\Models\SO;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class HardwareReturn extends Component
{
    public $return;
    public $returns;

    protected $rules = [
        'return' => 'required',
    ];

    protected $messages = [
        'return.*' => 'Select case',
    ];

    public function mount()
    {
        $this->returns = Task::with('SO')->where('tasks_id', 1)->where('status', '=', 3)
            ->whereHas('SO', function ($q) {
                $q->where('disposal', '3');
            })
            ->get();
    }

    public function render()
    {
        //  dd($this->return);
        return view('livewire.dashboard.new-task.hardware-return');
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'return' => $this->return,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
    }

    public function save()
    {
        $this->validateData();
        $task = Task::create([
            'case' => Task::find($this->return)->case,
            'client' => Task::find($this->return)->client,
            'tasks_id' => '5',
            'owner' => auth()->user()->id,
        ]);

        ModelsHardwareReturn::create([
            'tasks_id' => $task->id,
            'so_id' => SO::where('tasks_id', $this->return)->pluck('id')->first(),
        ]);
        $this->dispatchEvent();
    }

    public function dispatchEvent()
    {
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('success', [
            'message' => 'Task Created',
        ]);
    }
}
