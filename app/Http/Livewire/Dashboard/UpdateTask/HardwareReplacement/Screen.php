<?php

namespace App\Http\Livewire\Dashboard\UpdateTask\HardwareReplacement;

use Livewire\Component;

class Screen extends Component
{
    public $task;

    public function render()
    {
        return view('livewire.dashboard.update-task.hardware-replacement.screen');
    }
}
