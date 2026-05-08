<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    public string $email = '';
    public string $password = '';

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login(): mixed
    {
        $this->validate();

        if (
            Auth::attempt(
                [
                    'email' => $this->email,
                    'password' => $this->password,
                    'status' => 'active',
                ],
                $this->remember
            )
        ) {
            request()->session()->regenerate();

            $user = Auth::user();

          
            $user->last_login_at = now();
            $user->save();

            return match ($user->role) {
                'admin'    => redirect()->route('admin.dashboard'),
                'operator' => redirect()->route('operator.dashboard'),
                default    => redirect()->route('customer.dashboard'),
            };
        }

        // Login failed
        $this->dispatchBrowserEvent('swal:error', [
            'message' => 'Invalid credentials or your account is blocked'
        ]);

        return null;
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.app')
            ->section('content');
    }
}
