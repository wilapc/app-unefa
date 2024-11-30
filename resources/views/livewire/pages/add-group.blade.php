<x-mary-form wire:submit="save">

  <x-mary-alert title="Cuidado!" description="Materia registrada." icon="o-exclamation-triangle" x-show="$wire.alert" class="alert-warning"/>
  <h2 class="mt-7 px-5 text-lg font-medium text-black dark:text-gray-100">
    {{ __('Añadir Materia') }}
  </h2>

  <p class="px-5 mt-1 text-sm text-black dark:text-gray-400">
    {{ __("Ingresa los datos requeridos para obtener el grupo") }}
  </p>
  @php
  $arrsemester  = [];
  for($i = 1; $i < 9; $i++){
    $arrsemester[] = [ 
        "id" => $i,
        "name" => "Semestre ".$i
        ];
  }
  @endphp
  <x-mary-select
    label="Semestre"
    :options="$arrsemester"
    placeholder="Selecciones un semestre"
    placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
    hint="Elija uno."
    wire:model.live="semester" />

    @php
    $optsubject = App\Models\Subjects::where('semester',$semester)->get();
    @endphp
    <x-mary-select
    label="Materia"
    :options="$optsubject"
    option-label="name"
    placeholder="Seleccione una materia"
    placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
    hint="Elija uno"
    wire:model.live="subject" />

    @php
    $optsection = App\Models\Section::where('subject_id',$subject)->get();
    @endphp
    <x-mary-select
    label="Sección"
    :options="$optsection"
    option-value="id"
    option-label="section_name"
    placeholder="Seleccione una sección"
    placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
    hint="Elija una"
    wire:model.live="form.section" />
    <x-slot:actions>
        <x-mary-button label="Agregar" class="btn-primary" type="submit" spinner='save' />
    </x-slot:actions>
</x-mary-form>