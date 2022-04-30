<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\ItemInquiry as ModelsItemInquiry;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ItemInquiry extends Component
{
    public $case, $client, $item,$remarks, $quantity;
    public $inputs = [];
    public $i = 1;

    protected $rules = [
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
        'item' => 'required',
        'quantity' => 'required|numeric',
        /*         'item.*' => 'required',
        'quanity.*' => 'required', */


    ];

    protected $messages = [
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or Company name is required',
        'item.required' => 'Item or hardware is required',
        'quantity.required' => 'Quantity is required',
        'quantity.numeric' => 'Quantity should be numeric',
        /*         'item.*.required' => 'Item or hardware is required',
        'quantity.*.required' => 'Quantity is required',
        'quantity.*.numeric' => 'Quantity should be numeric', */
    ];

    public function render()
    {
        return view('livewire.dashboard.new-task.item-inquiry');
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function submit()
    {
        $this->validateData();
        $task = Task::create([
            'case' => $this->case,
            'client' => $this->client,
            'owner' => auth()->user()->id,
            'tasks_id' => '6',
        ]);

        ModelsItemInquiry::create([
            'tasks_id' => $task->id,
            'item' => $this->item,
            'quantity' => $this->quantity,
            'remarks' => $this->remarks,
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

    public function addRows($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function removeRows($i)
    {
        unset($this->inputs[$i]);
        if ($this->i != 1) {
            $this->i--;
        }
    }


    public function validateData()
    {
        $validation = Validator::make([
            'case' => $this->case,
            'client' => $this->client,
            'item' => $this->item,
            'quantity' => $this->quantity,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
    }
}
