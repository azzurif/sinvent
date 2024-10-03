<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component 
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
  <div class="md:flex md:items-center md:justify-center">
    <form class="md:w-96" wire:submit="register">
      <x-header>
        Create your account
        <slot:subheader>
          <p class="text-sm font-light text-gray-500">
            Welcome! Please fill in the details to get started.
          </p>
        </slot:subheader>
      </x-header>

      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" wire:model="name" required
          autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" wire:model="email" required
          autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" wire:model="password"
          required autocomplete="new-password" />

        <x-input-error class="mt-2" :messages="$errors->get('password')" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password"
          wire:model="password_confirmation" required autocomplete="new-password" />

        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
      </div>

      <div class="mt-4 flex flex-col items-center justify-center gap-2">
        <x-primary-button class="flex w-full justify-center">
          {{ __('Register') }}
        </x-primary-button>

        <x-link href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </x-link>
      </div>
    </form>

    <img class="hidden md:block md:max-w-md" src="images/guest/login-image.png" alt="Guest Image" />
  </div>
</div>
