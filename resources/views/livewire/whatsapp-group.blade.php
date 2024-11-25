<div class="py-6 max-w-7xl backdrop-opacity-10 mx-auto rounded">
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Grupos') }}
      </h2>
      <x-primary-button class="bg-green-600">
        {{ __('Añadir')}}
      </x-primary-button>
    </div>
  </x-slot>
  <div class="grid grid-cols-2">
    @if(false)
    <div class="col-span-2 flex sm:justify-center overflow-x-auto mx-auto sm:mx-0 sm:w-auto w-[300px]">
      <!-- Table Group -->
      <x-table></x-table>
      <!-- Table Group End -->
    </div>
    @endif
    <di class="col-span-2 overflow-x-auto mx-auto bg-sky-900 rounded-md">
      <h2 class="mt-7 px-5 text-lg font-medium text-white dark:text-gray-100">
        {{ __('Añadir Materia') }}
      </h2>

      <p class="px-5 mt-1 text-sm text-white dark:text-gray-400">
        {{ __("Ingresa los datos requeridos para obtener el grupo") }}
      </p>
      <livewire:pages.add-group />
  </div>
</div>
</div>