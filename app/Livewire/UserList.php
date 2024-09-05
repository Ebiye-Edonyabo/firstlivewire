<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

// #[Layout('layout.app')]
class UserList extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updatedList () {

    }

    #[Computed()]
    public function users() {
        return User::latest()->paginate(5);
    }
    // public function render()
    // {
    //     return view('livewire.user-list',
    //     ['users' => User::latest()->paginate(3)]);
    // }
    
    public function placeholder() {
        return view('livewire.includes.placeholder');
    }
}
