<form class="mt-6 space-y-5 px-5 pb-6">
  <x-input-label for='semester' :value="'Semestre'" class="text-white"/>
  <x-text-input type='text' name='semester' autocomplete requiered />

  <x-input-label for='subject' :value="'Materia'" class="text-white"/>
  <x-text-input type='text' name='subject' autocomplete requiered />

  <x-input-label for='section' :value="'Sección'" class="text-white"/>
  <x-text-input type='text' name='section' autocomplete requiered />
</form>
