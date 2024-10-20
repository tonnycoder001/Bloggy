<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class RegisterForm extends Component
{

    #[Rule('required|min:2|max:255')]
    public $name = '';

    #[Rule('required|email|unique:users')]
    public $email = '';

    #[Rule('required|min:6')]
    public $password = '';

    public function createNewUser()
    {
        $this->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        // sending flash message using session
        request()->session()->flash('message', 'User Created Successfully');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
