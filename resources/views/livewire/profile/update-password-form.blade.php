<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>
<section>
  <x-header>
    {{ __('Update Password') }}

    <x-slot:subheader>
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot:subheader>
  </x-header>

  <form class="mt-6 space-y-6" wire:submit="updatePassword">
    <div>
      <x-input-label for="update_password_current_password" :value="__('Current Password')" />
      <x-text-input class="mt-1 block w-full" id="update_password_current_password" name="current_password" type="password"
        wire:model="current_password" autocomplete="current-password" />
      <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
    </div>

    <div>
      <x-input-label for="update_password_password" :value="__('New Password')" />
      <x-text-input class="mt-1 block w-full" id="update_password_password" name="password" type="password"
        wire:model="password" autocomplete="new-password" />
      <x-input-error class="mt-2" :messages="$errors->get('password')" />
    </div>

    <div>
      <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
      <x-text-input class="mt-1 block w-full" id="update_password_password_confirmation" name="password_confirmation"
        type="password" wire:model="password_confirmation" autocomplete="new-password" />
      <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      <x-action-message class="me-3" on="password-updated">
        {{ __('Saved.') }}
      </x-action-message>
    </div>
  </form>
</section>
