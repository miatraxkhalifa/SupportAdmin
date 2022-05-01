<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\Task;
use App\Models\User;
use App\Models\OnsiteTech as NewOnsiteTech;
use App\Models\OutofScope;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class OnsiteTech extends Component
{

    public $deviceName, $issue, $address, $jobDescription, $contactName, $contactEmail, $contactNumber, $approver, $case, $client, $warranty, $quote;

    public $displayStatus, $LTstatus;

    public $section = true;

    protected $rules = [
        'deviceName' => 'required',
        'issue' => 'required',
        'address' => 'required',
        'jobDescription' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required',
        'contactNumber' => 'required',
        'approver' => 'required',
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
        'displayStatus' => 'required',
        'LTstatus' => 'required',
    ];

    protected $messages = [
        'deviceName.*' => 'Device is required',
        'issue.*' => 'Issue reported is required',
        'address.*' => 'Site address is required',
        'jobDescription.*' => 'Job decription is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number is required',
        'approver.*' => 'L2 approver is required',
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or company name is required',
        'displayStatus.*' => 'What is the display status onsite?',
        'LTstatus.*' => 'LabTech status?',
    ];

    public function requiredIfRule()
    {
        if ($this->warranty == 1 && !isset($this->quote)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'No quote number',
            ]);
        } else if ($this->warranty == 1 && isset($this->quote)) {
            $task = Task::create([
                'case' => $this->case,
                'client' => $this->client,
                'tasks_id' => '2',
                'owner' => auth()->user()->id,
            ]);
            $onsiteTech = NewOnsiteTech::create([
                'tasks_id' => $task->id,
                'deviceName' => $this->deviceName,
                'issue' => $this->issue,
                'address' => $this->address,
                'jobDescription' => $this->jobDescription,
                'contactName' => $this->contactName,
                'contactEmail' => $this->contactEmail,
                'contactNumber' => $this->contactNumber,
                'approver' => $this->approver,
                'siteStatus' => 'Screen display: ' . $this->displayStatus . ',' . 'LT status: ' . $this->LTstatus,
            ]);
            OutofScope::create([
                'quote' => $this->quote,
                'tasks_id' => $task->id,
                'status' => '1',
            ]);
            $this->dispatchEvent();
        } else {
            $task = Task::create([
                'case' => $this->case,
                'client' => $this->client,
                'tasks_id' => '2',
                'owner' => auth()->user()->id,
            ]);
            $onsiteTech = NewOnsiteTech::create([
                'tasks_id' => $task->id,
                'deviceName' => $this->deviceName,
                'issue' => $this->issue,
                'address' => $this->address,
                'jobDescription' => $this->jobDescription,
                'contactName' => $this->contactName,
                'contactEmail' => $this->contactEmail,
                'contactNumber' => $this->contactNumber,
                'approver' => $this->approver,
                'siteStatus' => 'Screen display: ' . $this->displayStatus . ',' . 'LT status: ' . $this->LTstatus,

            ]);
            $this->dispatchEvent();
        }
    }

    public function render()
    {
        $level2 = User::orderby('name')->whereHas('Role', function ($q) {
            $q->where('roles_id', '3');
        })->get();

        return view('livewire.dashboard.new-task.onsite-tech', [
            'level2' => $level2,
        ]);
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function submit()
    {
        $validation = Validator::make([
            'quote' => $this->quote,
            'case' => $this->case,
            'client' => $this->client,
            'deviceName' => $this->deviceName,
            'issue' => $this->issue,
            'address' => $this->address,
            'jobDescription' => $this->jobDescription,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'approver' => $this->approver,
            'LTstatus' => $this->LTstatus,
            'displayStatus' => $this->displayStatus,

        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
        $this->requiredIfRule();
    }

    public function dispatchEvent()
    {
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('success', [
            'message' => 'Task Created',
        ]);
    }
}
