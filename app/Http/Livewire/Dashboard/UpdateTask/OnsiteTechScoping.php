<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

use Livewire\Component;

class OnsiteTechScoping extends Component
{

    public $deviceName, $issue, $description, $address;

    protected function getListeners()
    {
        return [
            'updateTask' => 'update',
        ];
    }

    protected $rules = [
        'deviceName' => 'required',
        'issue' => 'required',
        'description' => 'required',
        'address' => 'required',
    ];

    protected $messages = [
        'deviceName.*' => 'device name is needed ..',
        'issue.*' => 'Issue reported?',
        'description.*' => 'Enter job description',
        'address.*' => 'site address?',
    ];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->deviceName = $this->task->OnsiteTechScoping->deviceName;
        $this->issue = $this->task->OnsiteTechScoping->issue;
        $this->description =  $this->task->OnsiteTechScoping->description;
        $this->address =  $this->task->OnsiteTechScoping->address;
        return view('livewire.dashboard.update-task.onsite-tech-scoping');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'deviceName' => $this->deviceName,
            'issue' => $this->issue,
            'description' => $this->description,
            'address' => $this->address,
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
        $this->task->OnsiteTechScoping->update([
            'deviceName' => ucwords($this->deviceName),
            'issue' => $this->issue,
            'description' => $this->description,
            'address' => ucwords($this->address),
        ]);
 
    }
}
