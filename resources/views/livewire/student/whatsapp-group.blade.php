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
          <p class="text-base">0{{$groups->semestre}}S-2605-{{$groups->seccion}}</p>
          @endscope

          @scope('cell_materia',$groups)
          <p class="text-lg">{{$groups->materia}}</p>
          @endscope

          @scope('cell_codigo',$groups)
          <p class="text-base">{{$groups->codigo}}</p>
          @endscope

          @scope('cell_profesor',$groups)
          <p class="text-base"><strong>{{ (empty($groups->profesor)) ? 'Sin datos' : $groups->profesor}}</strong></p>
          @endscope
          
          @scope('cell_link', $groups)
            @if(empty($groups->link))
              <x-mary-icon name='far.sad-tear' class='text-orange-600' label='Sin grupo'/>
            @else
              <x-mary-button link='{{$groups->link}}' icon="fab.whatsapp" class="bg-green-500 hover:bg-green-300" external tooltip="Grupo" />  
            @endif
          @endscope
          
          @role('delegate')
            @scope('actions', $groups)
            <x-mary-button @click="$wire.edit(true, {{$groups->id}}, '{{$groups->materia}}')" class='bg-sky-500 hover:bg-sky-300' icon="o-pencil" tooltip="Editar" />
            @endscope
          @endrole

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

    <x-mary-modal wire:model="modal2" class="backdrop-blur" box-class="bg-slate-100 p-10 w-fit overflow-y-auto z-20">
        <x-mary-form wire:submit="update1" class="sm:w-[400px]">

          <x-mary-alert title="Cuidado!" description="Materia registrada." icon="o-exclamation-triangle" x-show="$wire.alert2" class="alert-warning" />
          <h2 class="mt-7 px-5 text-lg font-medium text-black dark:text-gray-100">
            {{ __('Editar Materia') }}
          </h2>

          <p class="px-5 mt-1 text-lg text-black dark:text-gray-400">
            <strong>{{ $subject }} </strong>
          </p>

            <x-mary-input label="Professor" wire:model="professor" placeholder="Profesor" clearable />
            
            <x-mary-input label="Enlace de Whatsapp" wire:model="link" placeholder="Enlace de Whatsapp" clearable />
            
            <x-slot:actions>
              <x-mary-button label="Actualizar" class="bg-sky-600" type="submit" spinner="update1" />
            </x-slot:actions>
        </x-mary-form> 
    </x-mary-modal>

  </div>