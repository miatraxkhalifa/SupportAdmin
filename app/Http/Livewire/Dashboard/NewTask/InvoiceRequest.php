<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\InvoiceRequest as ModelsInvoiceRequest;
use App\Models\OutofScope;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class InvoiceRequest extends Component
{
    public $remarks, $case, $task, $quote;

    // protected $listeners = ['invoiceTaskDeleted' => 'accidentallyDelete'];


    protected $rules = [
        'task' => 'required',
      //  'case' => 'required',
        'remarks' => 'required',
    ];

    protected $messages = [
        'task.*' => 'Select quote',
       // 'case.*' => 'Select case number',
        'remarks.*' => 'Kindly add remarks',
    ];

    public function mount()
    {
        $this->quote = OutofScope::where('status', 0)->whereHas('Task', function ($q) {
            $q->where('status', 3);
        })->get();
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.invoice-request');
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'task' => $this->task,
           // 'case' => $this->case,
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

    public function save()
    {
     //   dd($this->task);
        $this->validateData();
        $findOrigTask = OutofScope::where('id', $this->task)->pluck('tasks_id')->first();   //find($this->task)->pluck('tasks_id')->first();
      //  dd($findOrigTask);
        $task = Task::create([
            'case' => Task::where('id',$findOrigTask)->pluck('case')->first(),
            'client' => Task::where('id', $findOrigTask)->pluck('client')->first(),
            'tasks_id' => '4',
            'owner' => auth()->user()->id,
            'admin' => Task::where('id', $findOrigTask)->pluck('admin')->first(),
        ]);

        ModelsInvoiceRequest::create([
            'tasks_id' => $task->id,
            'quote_id' =>  OutofScope::where('id',$this->task)->pluck('id')->first(),
            'remarks' => $this->remarks,
        ]);
        OutofScope::where('id', $this->task)->update([
            'status' => '1',
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
