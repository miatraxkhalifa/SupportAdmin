<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ItemInquiry extends Component
{
    public $task, $item, $quantity, $remarks;

    protected function getListeners()
    {
        return [
            'updateTask' => 'update',
        ];
    }

    protected $rules = [
        'item' => 'required',
        'quantity' => 'required|numeric',
    ];

    protected $messages = [
        'item.required' => 'Item or hardware is required',
        'quantity.required' => 'Quantity is required',
        'quantity.numeric' => 'Quantity should be numeric',
    ];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->item = $this->task->ItemInquiry->item;
        $this->quantity = $this->task->ItemInquiry->quantity;
        $this->remarks = $this->task->ItemInquiry->remarks;
        return view('livewire.dashboard.update-task.item-inquiry');
    }

    public function validateData()
    {
        $validation = Validator::make([
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

    public function update()
    {
        $this->validateData();
        $this->task->ItemInquiry->update([
            'item' => $this->item,
            'quantity' => $this->quantity,
            'remarks' => $this->remarks,
        ]);
    }
}
