<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\SO_Type_MP;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MediaPlayer extends Component
{
    //$connection type = wired/wireless
    //  $ssid, $password
    // $connection_status = dhcp / static
    // $ip, $subnet, $dg, $dns1, $dns2

    public $connection_type, $ssid, $status, $password, $connection_status, $ip, $subnet, $dg, $dns1, $dns2, $application, $solution, $orientation, $details;

    public $storeID, $postCode, $passCode;


    protected function getListeners()
    {
        return [
            'SOMediaPlayervalidate' => 'validateData',
            'saveSO' => 'save',
        ];
    }

    protected $rules = [
        'connection_type' => 'sometimes',
        'ssid' => 'required_if:connection_type,wireless',
        'password' => 'required_if:connection_type,wireless',

        'connection_status' => 'required',

        'ip' => 'required_if:connection_status,static',
        'subnet' => 'required_if:connection_status,static',
        'dg' => 'required_if:connection_status,static',
        'dns1' => 'required_if:connection_status,static',
        'dns2' => 'required_if:connection_status,static',

        'application' => 'required',
        'solution' => 'required',
        'orientation' => 'required',
        'status' => 'required',

        'storeID' => 'required_if:application,7-Eleven',
        'postCode' => 'required_if:application,7-Eleven',
        'passCode' => 'required_if:application,7-Eleven',
    ];

    protected $messages = [
        'connection_type' => 'Wired or Wireless?',
        'application' => 'required',
        'solution' => 'required',
        'orientation' => 'required',
        'connection_status.*' => 'DHCP or Static?',
        'status' => 'LT Status?'
    ];

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.media-player');
    }

    public function validateData()
    {
        // dd('testing');
        $validation = Validator::make([
            'connection_type' => $this->connection_type,
            'ssid' => $this->ssid,
            'password' => $this->password,
            'connection_status' => $this->connection_status,
            'application' => $this->application,
            'solution' => $this->solution,
            'orientation' => $this->orientation,
            'ip' => $this->ip,
            'subnet' => $this->subnet,
            'dg' => $this->dg,
            'dns1' => $this->dns1,
            'dns2' => $this->dns2,
            'storeID' => $this->storeID,
            'postCode' => $this->postCode,
            'passCode' => $this->passCode,
            'ssid' => $this->ssid,
            'password' => $this->password,
            'status' => $this->status,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $this->emit('validationError', false);
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }
        $this->emit('validationError', true);
    }

    public function save($id)
    {
        //  dd($id);
        // $this->validateData();

        if ($this->connection_type == 'wireless') {
            $connection_type = '. SSID: ' . $this->ssid . ', PASSWORD: ' . $this->password;
        } else {
            $connection_type = '';
        }

        if ($this->connection_status == 'static') {
            $connection_status = '| IP: ' . $this->ip . ' SUBNET: ' . $this->subnet . ' DG: ' . $this->dg . ' DNS: ' . $this->dns1 . ' & ' . $this->dns2;
        } else {
            $connection_status = '';
        }
        SO_Type_MP::create([
            'so_id' => $id,
            'connection_type' => ucwords($this->connection_type) . $connection_type . ' . ' . ucwords($this->connection_status) . $connection_status,
            'application' => $this->application,
            'solution' => $this->solution,
            'orientation' => $this->orientation,
            'status' => $this->status,
            'details' => $this->details,
        ]);
    }
}
