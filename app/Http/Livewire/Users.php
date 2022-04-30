<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use App\Models\RoleUsers;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $deleteModal = false;
    public $editModal = false;
    public $roles = '';
    public $name, $q;

    protected $queryString = [
        'q' => ['except' => '']
    ];

    public function updatingQ()
    {
        $this->resetPage();    //Search box to reset page
    }

    public function render()
    {
        $users = User::with('Role')->with('Session')->when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->q . '%')->orwhere('email', 'LIKE', '%' . $this->q . '%')
                    ->orwherehas('Role', function ($query) {
                        $query->where('title', 'LIKE', '%' . $this->q . '%');
                    });
            });
        })->orderby('name')->paginate(10);

        return view('livewire.users', [
            'users' => $users,
            'roleuser' =>  $roleuser = Roles::select('id', 'title')->get(),
        ]);
    }

    public function delete($id)
    {
        $this->deleteModal = $id;
    }

    public function confirmDelete(User $id)
    {
        $update =  $id->find($this->deleteModal);
        $update->email = $update->email . 'deleted';
        $update->save();
        $id->find($this->deleteModal)->delete();

        $this->deleteModal = false;
        $this->dispatchBrowserEvent('warning', [
            'message' => 'User Removed',
        ]);
    }

    public function edit($id)
    {
        $this->editModal = $id;
    }

    public function confirmEdit(RoleUsers $id)
    {
        if ($this->roles == null) {
            $this->editModal = false;
        } else {
            $id->where('users_id', $this->editModal)->delete();

            foreach ($this->roles as $key => $value) {
                RoleUsers::updateOrcreate(
                    ['users_id' => $this->editModal, 'roles_id' => $value],
                    [],
                );
            }
            $this->editModal = false;
            $this->dispatchBrowserEvent('info', [
                'message' => 'User Role Updated',
            ]);
        }
    }
}
