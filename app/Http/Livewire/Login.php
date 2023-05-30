<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Login extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;
    protected $listeners=['userLogged'];
    public $userMail;
    public function render()
    {
        return view('livewire.login');
    }

    public function userLogged(ModelsUser $user){
        $this->userMail = $user->name;
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = ModelsUser::where('email', $this->email)->first();
        if ($user && $this->password === $user->password) {
            // Passwords match
            session()->flash('message', 'You are logged in successfully.');
            return redirect()->route('welcome');
        } else {
            // Passwords don't match
            session()->flash('error', 'Email and password are wrong.');
        }
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password);

        ModelsUser::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);

        session()->flash('message', 'Your register successfully Go to the login page.');

        $this->resetInputFields();
    }
}
