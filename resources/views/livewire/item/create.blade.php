<div>
  <form class="p-6" wire:submit="save">
    <x-header>
      New Item
    </x-header>

    {{-- Category_id --}}
    <div>
      <x-input-label htmlFor="category_id" :value="__('Category')" />
      <select class="dark:text-white dark:bg-cold-black bg-light-gray text-primary" id="category_id"
        wire:model="form.category_id">
        <option selected>Select Category</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
      </select>
      <x-input-error class="mt-2" :messages="$errors->get('form.category_id')" />
    </div>

    {{-- Name --}}
    <div class="mt-2">
      <x-input-label htmlFor="name" :value="__('Name')" />
      <x-text-input class="mt-1 block w-full" name="name" required autofocus autocomplete="name"
        wire:model="form.name" />
      <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
    </div>
    {{-- Brand --}}
    <div class="mt-2">
      <x-input-label htmlFor="brand" :value="__('Brand')" />
      <x-text-input class="mt-1 block w-full" name="brand" autocomplete="brand" wire:model="form.brand" />
      <x-input-error class="mt-2" :messages="$errors->get('form.brand')" />
    </div>
    {{-- Specification --}}
    <div class="mt-2">
      <x-input-label htmlFor="specification" :value="__('Specification')" />
      <x-text-input class="mt-1 block w-full" name="specification" autocomplete="specification"
        wire:model="form.specification" />
      <x-input-error class="mt-2" :messages="$errors->get('form.specification')" />
    </div>
    {{-- Qnt --}}
    <div class="mt-2">
      <x-input-label htmlFor="qnt" :value="__('qnt')" />
      <x-text-input class="mt-1 block w-full" name="qnt" type="number" autocomplete="qnt" wire:model="form.qnt" />
      <x-input-error class="mt-2" :messages="$errors->get('form.qnt')" />
    </div>

    <div class="mt-6 flex justify-end">
      <x-secondary-button x-on:click="$dispatch('close')">
        {{ __('Cancel') }}
      </x-secondary-button>

      <x-primary-button class="mt-2">
        Save
        <div wire:loading>
          ...
        </div>
      </x-primary-button>
    </div>
  </form>
</div>
