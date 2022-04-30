<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\SO_Type_Network;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Network extends Component
{
    //$connection type = wired/wireless
    //  $ssid, $password
    // $connection_status = dhcp / static
    // $ip, $subnet, $dg, $dns1, $dns2

    protected function getListeners()
    {
        return [
            'SONetworkvalidate' => 'validateData',
            'saveSONetwork' => 'save',
        ];
    }

    public $connection_type, $ssid, $password, $connection_status, $ip, $subnet, $dg, $dns1, $dns2, $hardware_type, $details;

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

        'hardware_type' => 'required',
    ];

    protected $messages = [
        'hardware_type' => 'Select network hardware to dispatch?',
    ];

    public function validateData()
    {
        // dd('testing');
        $validation = Validator::make([
            'connection_type' => $this->connection_type,
            'ssid' => $this->ssid,
            'password' => $this->password,
            'connection_status' => $this->connection_status,
            'ip' => $this->ip,
            'subnet' => $this->subnet,
            'dg' => $this->dg,
            'dns1' => $this->dns1,
            'dns2' => $this->dns2,
            'hardware_type' => $this->hardware_type,
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
        SO_Type_Network::create([
            'so_id' => $id,
            'connection_type' => ucwords($this->connection_type) . $connection_type . ' . ' . ucwords($this->connection_status) . $connection_status,
            'type' => $this->hardware_type,
            'details' => $this->details,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.network');
    }
}
