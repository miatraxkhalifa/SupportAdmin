<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\OnsiteTechScoping as ModelsOnsiteTechScoping;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class OnsiteTechScoping extends Component
{

    //  protected $listeners = ['newOnsiteTech' => 'validateData'];

    //
    public $case, $client, $deviceName, $issue, $description, $address;

    protected $rules = [
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
        'deviceName' => 'required',
        'issue' => 'required',
        'description' => 'required',
        'address' => 'required',
    ];

    protected $messages = [
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or company name is required',
        'deviceName.*' => 'device name is needed ..',
        'issue.*' => 'Issue reported?',
        'description.*' => 'Enter job description',
        'address.*' => 'site address?',
    ];

    public function mount()
    {
        $this->task = Task::with('OnsiteTech')->where('status', '!=', 3)->where('tasks_id', 2)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.onsite-tech-scoping');
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
            'client' => ucwords($this->client),
            'tasks_id' => '7',
            'owner' => auth()->user()->id,
        ]);

        ModelsOnsiteTechScoping::create([
            'tasks_id' => $task->id,
            'deviceName' => $this->deviceName,
            'issue' => ucwords($this->issue),
            'description' => $this->description,
            'address' => ucwords($this->address),
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

    public function validateData()
    {

        $validation = Validator::make([
            'case' => $this->case,
            'client' => $this->client,
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
}
