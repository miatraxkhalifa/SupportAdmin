<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\HardwareReturn;
use App\Models\InvoiceRequest;
use App\Models\OutofScope;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskType;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Main extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $q, $status, $adminSupport, $task_type;

    public $newTask = false;
    public $deleteTask = false;

    protected $listeners = ['refreshComponent' => 'closeModal'];

    protected $queryString = [
        'q' => ['except' => ''],
        'status'  => ['except' => ''],
        'adminSupport'  => ['except' => ''],
        'task_type'  => ['except' => '']
    ];

    public function render()
    {
        $admins = User::orderby('name')->whereHas('Role', function ($q) {
            $q->where('roles_id', '1');
        })->get();

        $tasks = Task::with('TaskType')->with('Owner')->with('Admin')->orderby('status', 'ASC')->orderby('created_at', 'DESC')
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('case', 'LIKE', '%' . $this->q . '%')->orwhere('client', 'LIKE', '%' . $this->q . '%');
                });
            })
            ->when($this->adminSupport, function ($query) {
                return $query->where(function ($query) {
                    $query->where('admin', 'LIKE', '%' . $this->adminSupport . '%');
                });
            })
            ->when($this->task_type, function ($query) {
                return $query->where(function ($query) {
                    $query->where('tasks_id', 'LIKE', '%' . $this->task_type . '%');
                });
            })
            ->when($this->status, function ($query) {
                return $query->where(function ($query) {
                    $query->where('status', 'LIKE', '%' . $this->status . '%');
                });
            })
            ->paginate('15');

        return view('livewire.dashboard.main', [
            'tasks' => $tasks,
            'tasktypes' => TaskType::orderBy('name')->get(),
            'admins' => $admins,
            'total' => Task::get(),
        ]);
    }

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function new()
    {
        $this->newTask = true;
        $this->adminSupport = '';
    }

    public function closeModal()
    {
        $this->newTask = false;
        $this->deleteTask = false;
        $this->reset();
    }

    public function delete($id)
    {
        $this->deleteTask = $id;
    }

    public function confirmDelete(Task $id)
    {
        HardwareReturn::where('tasks_id', $this->deleteTask)->delete();
        InvoiceRequest::where('tasks_id', $this->deleteTask)->delete();

        $id->find($this->deleteTask)->delete();
        $checkOOW = OutofScope::where('tasks_id', $this->deleteTask)->count();
        if ($checkOOW >= 1) {
            OutofScope::where('tasks_id', $this->deleteTask)->update([
                'status' => '0',
            ]);
        }

        $this->closeModal();
        $this->dispatchBrowserEvent('warning', [
            'message' => 'Task deleted',
        ]);

        //    $this->emit('invoiceTaskDeleted', $task->id);
    }

    public function grab(Task $id)
    {
        $this->authorize('admin', App\Models\User::class);
        $id->update([
            'admin' => auth()->user()->id,
            'status' => '2',
        ]);
        $this->dispatchBrowserEvent('info', [
            'message' => 'Task Grabbed',
        ]);
        redirect()->route('dashboard.show', $id->id);
    }
}
