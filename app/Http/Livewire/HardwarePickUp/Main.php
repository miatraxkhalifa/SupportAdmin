<?php

namespace App\Http\Livewire\HardwarePickUp;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $q;

    protected $queryString = [
        'q' => ['except' => '']
    ];

    public function updatingQ()
    {
        $this->resetPage();    //Search box to reset page
    }

    public function render()
    {
        $tasks = Task::has('SO')->wherehas('SO', function ($query) {
            $query->where('disposal', '3');
        })->wherehas('SO', function ($query) {
            $query->where('Status', '!=', 'Cancelled');
        })
            ->when($this->q, function ($query) {
                return $query->where('case', 'LIKE', '%' . $this->q . '%')->orwhere('client', 'LIKE', '%' . $this->q . '%')
                    ->orwherehas('SO', function ($query) {
                        $query->where('deviceName', 'LIKE', '%' . $this->q . '%')->orwhere('SONumber', 'LIKE', '%' . $this->q . '%');
                    });
            })->orderby('status', 'ASC')->paginate('15');

        return view('livewire.hardware-pick-up.main', [
            'tasks' => $tasks,
        ]);
    }
}
