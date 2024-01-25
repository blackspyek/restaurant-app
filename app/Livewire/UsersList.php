<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UsersList extends Component
{
    public function render()
    {
        return view('livewire.users-list', [
            'users' => User::paginate(6),
        ] );
    }
    #[On('deleteUser')]
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
    }
    public function alertConfirm($id) : void
    {
        $this->dispatch('swal:confirm',id: $id, type: 'warning',message: 'Are you sure?',text: 'If deleted, you will not be able to recover this User entry!');
    }
}
