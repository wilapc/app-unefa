<div>

  <div class="flex flex-col items-center h-screen">

    <div class=" flex sm:justify-center bg-slate-300 my-4 overflow-x-auto sm:mx-0 sm:w-auto w-[300px]">
      <!-- Table Group -->
      {{-- You can use any `$wire.METHOD` on `@row-click` --}}
      @php
      $subtitle = ($permission) ? 'Aquí visualizaras tus materias a cargo' : 'Aquí visualizaras tus materias inscritas';
      @endphp
      <x-mary-card title="Materias Registradas" subtitle={{$subtitle}}
        shadow separator>

        <x-mary-table :headers="$header" :rows="$groups" class="bg-slate-200 overflow-y-auto h-fit">
          @scope('cell_seccion',$groups)
          <p class="text-base">S0{{$groups->semestre}}-2605-{{$groups->seccion}}</p>
          @endscope

          @scope('cell_materia',$groups)
          <p class="text-lg">{{$groups->materia}}</p>
          @endscope

          @scope('cell_codigo',$groups)
          <p class="text-base">{{$groups->codigo}}</p>
          @endscope
          <x-slot:empty>
            <x-mary-icon name="o-cube" label="No hay materias registradas!" />
          </x-slot:empty>
        </x-mary-table>

        <x-slot:actions>
          <x-mary-button label="Registrar" @click="$wire.modal1 = true" class="bg-green-500 text-white hover:text-black" />
        </x-slot:actions>

      </x-mary-card>
    </div>

    <x-mary-modal wire:model="modal1" class="backdrop-blur" box-class="bg-slate-100 p-10 w-fit overflow-y-auto z-20">
      <livewire:pages.add-group />
    </x-mary-modal>

  </div>