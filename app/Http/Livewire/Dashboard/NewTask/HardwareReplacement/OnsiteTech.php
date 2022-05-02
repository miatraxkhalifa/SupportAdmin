<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\OnsiteTech as ModelsOnsiteTech;
use App\Models\SO;
use App\Models\Task;
use Livewire\Component;

class OnsiteTech extends Component
{
    public $jobDescription, $contactName, $contactNumber, $contactEmail, $address, $sameSiteDetails;

    protected function getListeners()
    {
        return [
            'contactName' => 'name',
            'contactEmail' => 'email',
            'contactNumber' => 'number',
            'address' => 'contactAddress',
            'saveOnsiteTech' => 'save',
        ];
    }

    public function name($value)
    {
        $this->contactName = $value;
    }

    public function email($value)
    {
        $this->contactEmail = $value;
    }

    public function number($value)
    {
        $this->contactNumber = $value;
    }

    public function contactAddress($value)
    {
        $this->address = $value;
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.onsite-tech');
    }

    public function save($id)
    {
        // dd($id);
        $oldTask = Task::where('id', $id)->pluck('id')->first();
        $task = Task::create([
            'case' => Task::where('id', $id)->pluck('case')->first(),
            'client' => Task::where('id', $id)->pluck('client')->first(),
            'tasks_id' => '2',
            'owner' => auth()->user()->id,
        ]);
        ModelsOnsiteTech::create([
            'deviceName' => SO::where('tasks_id', $oldTask)->pluck('deviceName')->first(),
            'issue' => SO::where('tasks_id', $oldTask)->pluck('remarks')->first(),
            'address' => $this->address,
            'siteStatus' => 'N/A',
            'jobDescription' => $this->jobDescription,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'approver' =>  SO::where('tasks_id', $oldTask)->pluck('approver')->first(),
            'tasks_id' => $task->id,
            'related' => '1',
        ]);
    }
}
