<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm as FormsRegisterForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class RegisterForm extends Component
{
    use WithFileUploads;
    
    public FormsRegisterForm $form;

    public function create() {
        // Validation
        $validate = $this->validate();

        if($this->form->image) {
            $validate['form.image'] = $this->form->image->store('uploads', 'public');
        }
        // Create User
       $user = User::create($validate);
        // Reset
        $this->form->reset();
        request()->session()->flash('success', 'User successfully created');
        
        // Component Dispact To User-List
        // $this->dispatch('user-created', $user);
    }

    // public function readList() {
    //     $this->dispatch('user-created');
    // }

    public function render()
    {
        return view('livewire.register-form');
    }

    public function placeholder() {
        return view('livewire.includes.placeholder');
    }
}
