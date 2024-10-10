<div>
  <x-header>
    List Categories
  </x-header>

  @foreach ($categories as $category)
    <h3>
      {{ $category->category }}
    </h3>
  @endforeach
</div>
