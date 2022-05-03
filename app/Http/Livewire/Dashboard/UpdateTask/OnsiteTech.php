<?php

namespace App\Http\Livewire\Dashboard\UpdateTask;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class OnsiteTech extends Component
{
    public $task, $deviceName, $issue, $techETA, $Status, $address, $siteStatus, $jobDescription, $LTid, $token, $contactName, $contactNumber, $contactEmail, $dateCompleted, $jobReport, $PO, $remarks;

    protected function getListeners()
    {
        return [
            'updateTask' => 'update',
        ];
    }

    protected $rules = [
        'deviceName' => 'required',
        'issue' => 'required',
        'address' => 'required',
        'siteStatus' => 'required',
        'jobDescription' => 'required',
        'contactName' => 'required',
        'contactEmail' => 'required',
        'contactNumber' => 'required',
        'LTid' => 'required',
        'token' => 'required',
    ];

    protected $messages = [
        'deviceName.*' => 'Device is required',
        'issue.*' => 'Issue reported is required',
        'address.*' => 'Site address is required',
        'siteStatus.*' => 'Status onsite?',
        'jobDescription.*' => 'Job decription is required',
        'contactName.*' => 'site contact name isrequired',
        'contactEmail.*' => 'contact email isrequired',
        'contactNumber.*' => 'contact number is required',
        'LTid' => 'LabTech ID?',
        'token' => 'Kioskadmin password?',
    ];

    public function mount(Task $task)
    {
        $this->task = $task->load('TaskType', 'Owner', 'Admin', 'OnsiteTech', 'OutofScope', 'InvoiceRequest', 'OnsiteTechScoping', 'ItemInquiry', 'WarrantyRepair', 'HardwareReturn', 'SO');
    }

    public function render()
    {
        $this->deviceName = $this->task->OnsiteTech->deviceName;
        $this->issue = $this->task->OnsiteTech->issue;
        $this->address = $this->task->OnsiteTech->address;
        $this->siteStatus = $this->task->OnsiteTech->siteStatus;
        $this->jobDescription = $this->task->OnsiteTech->jobDescription;
        $this->contactName = $this->task->OnsiteTech->contactName;
        $this->contactEmail =  $this->task->OnsiteTech->contactEmail;
        $this->contactNumber = $this->task->OnsiteTech->contactNumber;
        $this->dateCompleted = $this->task->OnsiteTech->dateCompleted;
        $this->jobReport = $this->task->OnsiteTech->jobReport;
        $this->PO = $this->task->OnsiteTech->PO;
        $this->remarks = $this->task->OnsiteTech->remarks;
        $this->LTid =  $this->task->OnsiteTech->LTid;
        $this->token =  $this->task->OnsiteTech->token;
        $this->Status = $this->task->OnsiteTech->Status;
        $this->techETA = $this->task->OnsiteTech->techETA;
        return view('livewire.dashboard.update-task.onsite-tech');
    }

    public function validateData()
    {
        $validation = Validator::make([
            'deviceName' => $this->deviceName,
            'issue' => $this->issue,
            'address' => $this->address,
            'siteStatus' => $this->siteStatus,
            'jobDescription' => $this->jobDescription,
            'contactName' => $this->contactName,
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'LTid' => $this->LTid,
            'token' => $this->token,
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
        $this->task->OnsiteTech->update([
            'contactName' => ucwords($this->contactName),
            'contactEmail' => $this->contactEmail,
            'contactNumber' => $this->contactNumber,
            'address' => ucwords($this->address),
            'issue' => ucwords($this->issue),
            'deviceName' => $this->deviceName,
            'siteStatus' =>  $this->siteStatus,
            'jobDescription' => $this->jobDescription,
            'dateCompleted' => $this->dateCompleted,
            'jobReport' => $this->jobReport,
            'PO' => $this->PO,
            'remarks'  => $this->remarks,
            'LTid' => $this->LTid,
            'token' => $this->token,
            'Status' => $this->Status,
            'techETA' => $this->techETA,
        ]);
    }
}
