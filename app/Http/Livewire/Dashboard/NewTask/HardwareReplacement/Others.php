<?php

namespace App\Http\Livewire\Dashboard\NewTask\HardwareReplacement;

use App\Models\SO_Type_Others;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Others extends Component
{
    public $details;

    protected $rules = [
        'details' => 'required',
    ];

    protected $messages = [
        'details.*' => 'Need hardware replacement details',
    ];

    protected function getListeners()
    {
        return [
            'SOOthersvalidate' => 'validateData',
            'saveSOOthers' => 'save',
        ];
    }

    public function validateData()
    {
        $validation = Validator::make([
            'details' => $this->details,
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
          SO_Type_Others::create([
            'so_id' => $id,
            'details' => $this->details,
          ]);
    }

    public function render()
    {
        return view('livewire.dashboard.new-task.hardware-replacement.others');
    }
}
