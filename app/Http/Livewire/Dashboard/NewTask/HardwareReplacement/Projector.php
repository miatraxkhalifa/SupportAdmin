<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\SO_Type_Projector;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Projector extends Component
{
    public $brand, $model, $details;

    protected $rules = [
        'brand' => 'required',
        'model' => 'required',
    ];

    protected $messages = [
        'brand.*' => 'Projector brand is needed',
        'model.*' => 'Projector model is required',
    ];

    protected function getListeners()
    {
        return [
            'SOProjectorvalidate' => 'validateData',
            'saveSOProjector' => 'save',
        ];
    }

    public function validateData()
    {
        $validation = Validator::make([
            'brand' => $this->brand,
            'model' => $this->model,
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
        SO_Type_Projector::create([
            'so_id' => $id,
            'brand' => $this->brand,
            'model' => $this->model,
            'details' => $this->details,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.projector');
    }
}
