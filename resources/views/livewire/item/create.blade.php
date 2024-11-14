<div>
  <form class="w-full" wire:submit="save">
    <x-header class="mb-4 text-2xl">
      New Item
    </x-header>

    <section
      class="dark:bg-cold-black mb-4 w-full items-center gap-4 rounded-md border border-dark-gray bg-light-gray p-2 flex">
      <!-- Category -->
      <div class="grow">
        <x-input-label for="category" :value="__('Category')" />
        <select
          class="dark:border-dark-gray dark:text-white dark:focus:border-light-blue dark:bg-cold-black mt-1 block h-10 w-full rounded-lg border border-dark-gray bg-light-gray p-2.5 text-sm text-gray-900 focus:border-dark-blue focus:ring-0"
          name="category" wire:model="form.category" required>
          <option selected>Choose a category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
          @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('form.category')" />
      </div>

      <!-- Name -->
      <div class="grow">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input class="mt-1 block h-10 w-full rounded-lg border p-2.5" name="name" placeholder="Name" required
          wire:model="form.name" />
        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
      </div>

      <!-- Stock -->
      <div class="grow">
        <x-input-label for="stock" :value="__('Stock')" />
        <x-input-number class="mt-1 block h-10 w-full rounded-lg border p-2.5" name="stock" placeholder="10" required
          wire:model="form.stock" />
        <x-input-error class="mt-2" :messages="$errors->get('form.stock')" />
      </div>
    </section>

    <section
      class="dark:bg-cold-black w-full items-start gap-4 rounded-md border border-dark-gray bg-light-gray p-2 flex">
      <!-- Specification -->
      <div class="grow">
        <x-input-label for="specification" :value="__('Specification')" />
        <x-text-area class="mt-1 block w-full" name="specification" wire:model="form.specification"
          wire:model="form.specification" placeholder="Write the specification..."
          autocomplete="specification"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('form.specification')" />
      </div>

      <div class="grow">
        {{-- Merk --}}
        <div class="mb-2">
          <x-input-label for="merk" :value="__('Merk')" />
          <x-text-input class="mt-1 block h-9 w-full" name="merk" placeholder="Merk" wire:model="form.merk" />
          <x-input-error class="mt-2" :messages="$errors->get('form.merk')" />
        </div>

        {{-- Seri --}}
        <div>
          <x-input-label for="seri" :value="__('Seri')" />
          <x-text-input class="mt-1 block h-9 w-full" name="seri" placeholder="Seri" wire:model="form.seri" />
          <x-input-error class="mt-2" :messages="$errors->get('form.seri')" />
        </div>
      </div>
    </section>

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
