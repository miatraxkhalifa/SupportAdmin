<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class WarrantyRepair extends Component
{
    public $task, $contactName, $contactEmail, $contactNumber, $address, $issue, $brandModel, $serial, $quote, $remarks;

    // protected $listeners = ['updateTask' => 'update']; //validateUpdateTask

    protected function getListeners()
    {
        return [
            'updateTask' => 'update',
        ];
    }

    protected $rules = [
        'issue' => 'required',
        'brandModel' => 'required',
        'serial' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required',
        'contactNumber' => 'required',
        'address' => 'required',
        'remarks' => 'required',
    ];

    protected $messages = [
        'issue.*' => 'Issue description is required',
        'brandModel.*' => 'Brand and model is required',
        'serial.*' => 'serial number is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number is required',
        'address.*' => 'Site address is required',
        'remarks' => 'Add some remarks..',
    ];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->contactName = $this->task->WarrantyRepair->contactName;
        $this->contactEmail =  $this->task->WarrantyRepair->contactEmail;
        $this->contactNumber =  $this->task->WarrantyRepair->contactNumber;
        $this->address = $this->task->WarrantyRepair->address;
        $this->issue =  $this->task->WarrantyRepair->issue;
        $this->brandModel = $this->task->WarrantyRepair->brandModel;
        $this->serial = $this->task->WarrantyRepair->serial;
        $this->remarks = $this->task->WarrantyRepair->remarks;
        $this->quote = $this->task->WarrantyRepair->quote;

        return view('livewire.dashboard.update-task.warranty-repair');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'address' => $this->address,
            'issue' => $this->issue,
            'brandModel' => $this->brandModel,
            'serial' => $this->serial,
            'remarks' => $this->remarks,
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
        $this->task->WarrantyRepair->update([
            'contactName' => ucwords($this->contactName),
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'address' => ucwords($this->address),
            'issue' => ucwords($this->issue),
            'brandModel' => ucwords($this->brandModel),
            'serial' => ucwords($this->serial),
            'remarks' => ucwords($this->remarks),
            'quote' => $this->quote,
        ]);
    }
}
