<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;

class ProjectorLamp extends Component
{
    public $task;

    public function render()
    {
        return view('livewire.dashboard.update-task.hardware-replacement.projector-lamp');
    }
}
