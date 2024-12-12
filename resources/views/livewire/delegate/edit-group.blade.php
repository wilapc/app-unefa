<x-mary-form wire:submit="save1" class="sm:w-[400px]">

  <x-mary-alert title="Cuidado!" description="Materia registrada." icon="o-exclamation-triangle" x-show="$wire.alert2" class="alert-warning" />
  <h2 class="mt-7 px-5 text-lg font-medium text-black dark:text-gray-100">
    {{ __('Editar Materia') }}
  </h2>

  <p class="px-5 mt-1 text-sm text-black dark:text-gray-400">
    {{ $wgId }}
  </p>

    <x-mary-input label="Professor" wire:model="professor" placeholder="Profesor" clearable />
    
    <x-mary-input label="Enlace de Whatsapp" wire:model="link" placeholder="Enlace de Whatsapp" clearable />
    
    <x-slot:actions>
      <x-mary-button label="Actualizar" class="bg-sky-600" type="submit" spinner="update" />
    </x-slot:actions>
</x-mary-form>
