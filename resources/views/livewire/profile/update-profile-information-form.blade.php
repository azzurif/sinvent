<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
  <x-header>
    {{ __('Profile Information') }}

    <x-slot:subheader>
      {{ __("Update your account's profile information and email address.") }}
    </x-slot:subh>
  </x-header>

  <form class="mt-6 space-y-6" wire:submit="updateProfileInformation">
    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" wire:model="name" required
        autofocus autocomplete="name" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" wire:model="email" required
        autocomplete="username" />
      <x-input-error class="mt-2" :messages="$errors->get('email')" />

      @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
        <div>
          <p class="dark:text-light-gray mt-2 text-sm text-cold-black">
            {{ __('Your email address is unverified.') }}

            <button
              class="dark:text-light-gray dark:hover:text-gray-100 dark:focus:ring-offset-dark-gray rounded-md text-sm text-dark-gray underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-light-blue focus:ring-offset-2"
              wire:click.prevent="sendVerification">
              {{ __('Click here to re-send the verification email.') }}
            </button>
          </p>

          @if (session('status') === 'verification-link-sent')
            <p class="dark:text-light-green mt-2 text-sm font-medium text-dark-green">
              {{ __('A new verification link has been sent to your email address.') }}
            </p>
          @endif
        </div>
      @endif
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      <x-action-message class="me-3" on="profile-updated">
        {{ __('Saved.') }}
      </x-action-message>
    </div>
  </form>
</section>
