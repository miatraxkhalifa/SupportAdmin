<?php

namespace App\Http\Livewire\Quotes;

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
        /*         $tasks =  OutofScope::with('Task')->with('InvoiceRequest')->when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->where('quote', 'LIKE', '%' . $this->q . '%');
            });
        })->orderby('status', 'ASC')->paginate('15'); */

        $tasks = Task::with('InvoiceRequest')->has('OutofScope')->when($this->q, function ($query) {
            return $query->where('case', 'LIKE', '%' . $this->q . '%')->orwhere('client', 'LIKE', '%' . $this->q . '%')
                ->orwherehas('OutofScope', function ($query) {
                    $query->where('quote', 'LIKE', '%' . $this->q . '%');
                });
        })->orderby('status', 'ASC')->paginate('15');

        return view('livewire.quotes.main', [
            'tasks' => $tasks,
        ]);
    }
}
