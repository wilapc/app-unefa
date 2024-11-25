<form wire:submit="save" class="mt-6 space-y-5 px-5 pb-6">
  <x-input-label for='semester' :value="'Semestre'" class="text-white" />
  <select wire:model.live="semester">
    <option value="" disabled>Seleccione el semestre</option>
    @for ($i = 1; $i < 9; $i++)
      <option value="{{ $i }}">Semestre {{ $i }}</option>
      @endfor
  </select>

  <x-input-label for='subject' :value="'Materia'" class="text-white" />
  <select wire:model.live="subject" wire:key="{{ $semester }}">
    <option value="" disabled>Seleccione una materia</option>
    @foreach ( App\Models\Subjects::where('semester',$semester)->get() as $materia )
    <option value="{{ $materia->id }}">{{ $materia->name }}</option>
    @endforeach
  </select>

  <x-input-label for='section' :value="'Sección'" class="text-white" />
  <select wire:model.live="section" wire:key="{{ $subject }}">
    <option value="" disabled>Seleccione una Sección</option>
    @foreach ( App\Models\Section::where('subject_id',$subject)->get() as $seccion )
    <option value="{{ $seccion->id }}">{{ $seccion->section_name }}</option>
    @endforeach
  </select>

  <x-primary-button>Guardar</x-primary-button>
</form>