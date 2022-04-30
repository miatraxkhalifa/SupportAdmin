<?php

namespace App\Http\Livewire\Dashboard\NewTask;

use App\Models\OutofScope;
use App\Models\SO;
use App\Models\SO_Type;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;


class HardwareReplacement extends Component
{

    public $warranty, $quote, $case, $client, $disposal, $deviceName, $type, $address, $contactName, $contactEmail, $contactNumber, $approver, $remarks;

    public $validateSibling = false;

    public $withOnsiteTech;

    protected function getListeners()
    {
        return ['validationError' => 'siblingValidate'];
    }

    protected $rules = [
        'case' => 'required|numeric|digits_between:1,7',
        'client' => 'required',
        'disposal' => 'required',
        'deviceName' => 'required',
        'type' => 'required',
        'address' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required|email',
        'contactNumber' => 'required',
        'approver' => 'required',
        'remarks' => 'required'
    ];

    protected $messages = [
        'case.required' => 'Case number is required',
        'case.integer' => 'invalid case number',
        'client.*' => 'Client or company name is required',
        'disposal.*' => 'update hardware disposal..',
        'deviceName.*' => 'Device name is required',
        'type.*' => 'Hardware type is required',
        'address.*' => 'Site address is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number111 is required',
        'approver.*' => 'L2 approver is required',
        'remarks' => 'reason for replacement?'
    ];

    public function updating()
    {
        $this->emit('contactName', $this->contactName);
        $this->emit('contactEmail', $this->contactEmail);
        $this->emit('contactNumber', $this->contactNumber);
        $this->emit('address', $this->address);
    }

    public function render()
    {
        $level2 = User::orderby('name')->whereHas('Role', function ($q) {
            $q->where('roles_id', '3');
        })->get();
        $types = SO_Type::get();

        return view('livewire.dashboard.new-task.hardware-replacement', [
            'level2' => $level2,
            'types' => $types,
        ]);
    }


    public function siblingValidate($value)
    {
        if ($value === true) {
            $this->validateSibling = true;
            //    dd('test');
            $this->validateData();
        } else {
            $this->validateSibling = false;
        }
    }

    public function tryMethod()
    {
        if ($this->validateSibling == false) {
            $this->emit('SOMediaPlayervalidate');
            $this->emit('SONetworkvalidate');
            $this->emit('SOProjectorvalidate');
            $this->emit('SOProjectorLampvalidate');
            $this->emit('SOScreensvalidate');
            $this->emit('SOOthersvalidate');
        } else if ($this->validateSibling == true) {
            //  dd('testbottom');
            $this->validateData();
        } else {
            // dd('else sa try');
            $this->emit('SOMediaPlayervalidate');
            $this->emit('SONetworkvalidate');
            $this->emit('SOProjectorvalidate');
            $this->emit('SOProjectorLampvalidate');
            $this->emit('SOScreensvalidate');
            $this->emit('SOOthersvalidate');
        }
    }

    public function validateData()
    {

        $validation = Validator::make([
            'case' => $this->case,
            'client' => $this->client,
            'disposal' => $this->disposal,
            'deviceName' => $this->deviceName,
            'type' => $this->type,
            'address' => $this->address,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'approver' => $this->approver,
            'remarks' => $this->remarks,
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
                'tasks_id' => '1',
                'owner' => auth()->user()->id,
            ]);
            OutofScope::create([
                'quote' => $this->quote,
                'tasks_id' => $task->id,
            ]);
            $SO = SO::create([
                'disposal' => $this->disposal,
                'deviceName' => $this->deviceName,
                'type' => $this->type,
                'address' => $this->address,
                'contactName' => $this->contactName,
                'contactEmail' => $this->contactEmail,
                'contactNumber' => $this->contactNumber,
                'approver' => $this->approver,
                'tasks_id' => $task->id,
                'remarks' => $this->remarks,
            ]);
            $this->emit('saveSO', $SO->id);
            $this->emit('saveSONetwork', $SO->id);
            $this->emit('saveSOProjector', $SO->id);
            $this->emit('saveSOProjectorLamp', $SO->id);
            $this->emit('saveSOScreens', $SO->id);
            $this->emit('saveSOOthers', $SO->id);
            $this->emit('saveOnsiteTech', $task->id);
            $this->dispatchEvent();
        } else {
            $task = Task::create([
                'case' => $this->case,
                'client' => $this->client,
                'tasks_id' => '1',
                'owner' => auth()->user()->id,
            ]);
            $SO =  SO::create([
                'disposal' => $this->disposal,
                'deviceName' => $this->deviceName,
                'type' => $this->type,
                'address' => $this->address,
                'contactName' => $this->contactName,
                'contactEmail' => $this->contactEmail,
                'contactNumber' => $this->contactNumber,
                'approver' => $this->approver,
                'tasks_id' => $task->id,
                'remarks' => $this->remarks,
            ]);
            $this->emit('saveSO', $SO->id);
            $this->emit('saveSONetwork', $SO->id);
            $this->emit('saveSOProjector', $SO->id);
            $this->emit('saveSOProjectorLamp', $SO->id);
            $this->emit('saveSOScreens', $SO->id);
            $this->emit('saveSOOthers', $SO->id);
            $this->emit('saveOnsiteTech', $task->id);
            $this->dispatchEvent();
        }
    }

    public function close()
    {
        $this->emit('refreshComponent');
    }

    public function submit()
    {
        $this->tryMethod();
        $this->validateSibling = false;
    }

    public function dispatchEvent()
    {
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('success', [
            'message' => 'Task Created',
        ]);
    }
}
