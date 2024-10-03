<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component 
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <div class="md:flex md:items-center md:justify-center">
    <form class="md:w-96" wire:submit="login">
      <x-header>
        Sign In
        <slot:subheader>
          <p class="text-sm font-light text-gray-500">
            Welcome back! Please sign in to continue
          </p>
        </slot:subheader>
      </x-header>

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" wire:model="form.email"
          required autofocus autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('form.email')" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input class="mt-1 block w-full" id="password" name="password" type="password"
          wire:model="form.password" required autocomplete="current-password" />

        <x-input-error class="mt-2" :messages="$errors->get('form.password')" />
      </div>

      <!-- Remember Me -->
      <div class="mt-4 flex items-center justify-between">
        <label class="inline-flex items-center" for="remember">
          <x-checkbox id="remember" type="checkbox" wire:model="form.remember" />
          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>

        @if (Route::has('password.request'))
          <x-link href="{{ route('password.request') }}">
            {{ __('Lost password?') }}
          </x-link>
        @endif
      </div>

      <div class="mt-4 flex flex-col items-center justify-between gap-2">
        <x-primary-button class="flex w-full justify-center">
          {{ __('Log in') }}
        </x-primary-button>

        <span class="text-sm">
          Don’t have an account? <x-link href="{{ route('register') }}">Sign in</x-link>
        </span>
      </div>
    </form>

    <img class="hidden md:block md:max-w-sm" src="images/guest/login-image.png" alt="Guest Image" />
  </div>
</div>
