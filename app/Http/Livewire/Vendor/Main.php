<?php

namespace App\Http\Livewire\Vendor;

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
        $tasks = Task::where('status', 3)->has('OnsiteTech')->when($this->q, function ($query) {
            return $query->where('case', 'LIKE', '%' . $this->q . '%')->orwhere('client', 'LIKE', '%' . $this->q . '%');
        })->wherehas('OnsiteTech', function ($query) {
            $query->where('Status', '!=', 'Paid');
        })->orderby('status', 'ASC')->paginate('15');

        return view('livewire.vendor.main', [
            'tasks' => $tasks,
        ]);
    }
}
