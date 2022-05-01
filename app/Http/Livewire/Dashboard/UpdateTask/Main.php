<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Main extends Component
{
    public $task, $case, $client, $status;

    protected function getListeners()
    {
        return [
            'mount' => 'render',
        ];
    }

    protected $rules = [
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
    ];

    protected $messages = [
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or company name is required',
    ];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->status = $this->task->status;
        $this->case = $this->task->case;
        $this->client = $this->task->client;
        return view('livewire.dashboard.update-task.main');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'case' => $this->case,
            'client' => $this->client,
        ], $this->rules, $this->messages);

        //     $this->emit('validateUpdateTask');

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
        $this->task->update([
            'status' => $this->status,
            'case' => $this->case,
            'client' => ucwords($this->client),
        ]);

        if ($this->status != 1) {
            $this->task->update([
                'admin' => auth()->user()->id,
            ]);
        } else {
            $this->task->update([
                'admin' => 0,
            ]);
        }
        $this->emit('updateTask');
        $this->emitSelf('mount');
        $this->dispatchEvent();
        sleep('3');
        return redirect()->to('/dashboard' . '/' . $this->task->id);
    }

    public function dispatchEvent()
    {
        $this->dispatchBrowserEvent('success', [
            'message' => 'Task Updated',
        ]);
    }
}
