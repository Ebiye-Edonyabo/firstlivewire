<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;


class RegisterForm extends Form
{
    //
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|max:200|unique:users')]
    public $email;

    #[Validate('required|min:3|')]
    public $password;

    #[Validate('nullable|sometimes|image|max:1020')]
    public $image;

}
