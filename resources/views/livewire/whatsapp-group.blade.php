<div class="backdrop-opacity-10 mx-auto rounded">
  
  <div class="flex flex-col items-center h-screen">
    
    <div class=" flex sm:justify-center bg-slate-300 my-4 overflow-x-auto sm:mx-0 sm:w-auto w-[300px]">
        <!-- Table Group -->
      {{-- You can use any `$wire.METHOD` on `@row-click` --}}
      <x-mary-table :headers="$header" :rows="$groups" >
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
        <!-- Table Group End -->
    </div>
  
    <div class="my-4">
        <x-mary-button label="Añadir" @click="$wire.modal1 = true" class="bg-green-500 text-white hover:text-black"/>
    </div>
  </div>
    <x-mary-modal wire:model="modal1" class="backdrop-blur" box-class="bg-red-50 p-10 w-fit overflow-y-auto">    
      <livewire:pages.add-group />
    </x-mary-modal>
</div>