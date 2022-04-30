<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\SO_Type_Screen;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Screen extends Component
{
    public $brand, $model, $serial;

    protected $rules = [
        'brand' => 'required',
        'model' => 'required',
        'serial' => 'required'
    ];

    protected $messages = [
        'brand.*' => 'Screen brand is needed',
        'model.*' => 'Screen model is required',
        'serial.*' => 'Screen serial number is required',
    ];

    protected function getListeners()
    {
        return [
            'SOScreensvalidate' => 'validateData',
            'saveSOScreens' => 'save',
        ];
    }

    public function validateData()
    {
       // dd('test');
        $validation = Validator::make([
            'brand' => $this->brand,
            'model' => $this->model,
            'serial' => $this->serial,
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
          SO_Type_Screen::create([
            'so_id' => $id,
            'brand' => $this->brand,
            'model' => $this->model,
            'serial' => $this->serial,
          ]);
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.screen');
    }
}
