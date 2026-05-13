<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected array $messages = [
        'password.min' => 'Password must be at least 6 characters',
    ];

    public function login()
    {
        try {
            $this->validate();
        } catch (ValidationException $e) {

            $this->dispatch(
                'swal',
                icon: 'error',
                title: $e->validator->errors()->first()
            );

            return;
        }

        if (! Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {

            $this->dispatch(
                'swal',
                icon: 'error',
                title: 'Invalid email or password'
            );

            return;
        }

        if (Auth::user()->status !== 'active') {
            Auth::logout();

            $this->dispatch(
                'swal',
                icon: 'error',
                title: 'Your account is blocked'
            );

            return;
        }

        request()->session()->regenerate();

        return match (Auth::user()->role) {
            'SuperAdmin'    => redirect()->route('dashboard_admin'),
            'operator' => redirect()->route('dashboard_operator'),
            default    => redirect()->route('dashboard_customer'),
        };
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}