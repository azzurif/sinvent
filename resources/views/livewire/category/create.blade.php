<div>
  <form class="md:w-96" wire:submit="save">
    <!-- Category -->
    <div>
      <x-input-label for="category" :value="__('Category')" />
      <select
        class="dark:border-dark-gray dark:text-white dark:focus:border-light-blue dark:bg-cold-black mt-1 block w-full rounded-lg border border-dark-gray bg-light-gray p-2.5 text-sm text-gray-900 focus:border-dark-blue focus:ring-0"
        name="category" required wire:model="form.category">
        <option selected>Choose a category</option>
        @foreach ($categories as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
      </select>
      <x-input-error class="mt-2" :messages="$errors->get('form.category')" />
    </div>

    <!-- Description -->
    <div class="mt-4">
      <x-input-label for="description" :value="__('Description')" />
      <x-text-area class="mt-1 block w-full" name="description" wire:model="form.description"
        placeholder="Write the description..." autocomplete="description"></x-text-area>
      <x-input-error class="mt-2" :messages="$errors->get('form.description')" />
    </div>

    <div class="mt-4">
      <x-primary-button>
        Save
        <div wire:loading>
          ...
        </div>
      </x-primary-button>
    </div>
  </form>
</div>
