<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\Task;
use App\Models\User;
use App\Models\WarrantyRepair as ModelsWarrantyRepair;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class WarrantyRepair extends Component
{
    public $case, $client, $type, $issue, $brandModel, $serial, $contactName, $contactEmail, $contactNumber, $address, $remarks, $approver;

    protected $rules = [
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
        'type' => 'required',
        'issue' => 'required',
        'brandModel' => 'required',
        'serial' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required',
        'contactNumber' => 'required',
        'address' => 'required',
        'remarks' => 'required',
        'approver' => 'required',
    ];

    protected $messages = [
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or company name is required',
        'type.*' => 'Hardware type is required',
        'issue.*' => 'Issue description is required',
        'brandModel.*' => 'Brand and model is required',
        'serial.*' => 'serial number is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number is required',
        'address.*' => 'Site address is required',
        'remarks' => 'Add some remarks..',
        'approver.*' => 'L2 approver is required',
    ];

    public function render()
    {
        $level2 = User::orderby('name')->whereHas('Role', function ($q) {
            $q->where('roles_id', '3');
        })->get();
        return view('livewire.dashboard.new-task.warranty-repair', [
            'level2' => $level2,
        ]);
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function dispatchEvent()
    {
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('success', [
            'message' => 'Task Created',
        ]);
    }

    public function submit()
    {
        $this->validateData();

        $task = Task::create([
            'case' => $this->case,
            'client' => $this->client,
            'tasks_id' => '3',
            'owner' => auth()->user()->id,
        ]);

        ModelsWarrantyRepair::create([
            'type' => ucwords($this->type),
            'address' => ucwords($this->address),
            'contactName' => ucwords($this->contactName),
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'approver' => $this->approver,
            'tasks_id' => $task->id,
            'brandModel' => ucwords($this->brandModel),
            'serial' => ucwords($this->serial),
            'remarks' => $this->remarks,
            'issue' => ucwords($this->issue),
        ]);
        $this->dispatchEvent();
    }

    public function validateData()
    {
        $validation = Validator::make([
            'type' => $this->type,
            'address' => $this->address,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'approver' => $this->approver,
            'case' => $this->case,
            'client' => $this->client,
            'brandModel' => $this->brandModel,
            'serial' => $this->serial,
            'remarks' => $this->remarks,
            'issue' => $this->issue,
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
