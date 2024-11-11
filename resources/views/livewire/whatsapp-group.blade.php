<div class="py-6 max-w-7xl backdrop-opacity-10 bg-white/70 my-4 mx-auto rounded">
  <div class="grid grid-cols-2">
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Grupos') }}
      </h2>
    </x-slot>
    <div class="col-span-2 flex justify-center">
      <table class="table-fixed bg-cyan-700 rounded-md">
        <thead>
          <tr>
            <th class="border-b dark:border-slate-600 font-medium p-4 pt-2 pl-8 text-slate-100 dark:text-slate-100 text-left">Materia</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pt-2 text-slate-100 dark:text-slate-100 text-left">Profesor</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pt-2 text-slate-100 dark:text-slate-100 text-left">Sección</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pt-2 pr-8 text-slate-100 dark:text-slate-100 text-left">Grupo</th>
          </tr>
        </thead>
        <tbody class="bg-slate-300">
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Matemática</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Malcolm Lockyer</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">03S-2405-D1</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Link del grupo</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Ingles</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Luis Luna</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">02S-2405-D2</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Link del grupo</td>
          </tr>
          <tr>
            <td class="p-4 pl-8 text-slate-500 dark:text-slate-400">Programación</td>
            <td class="p-4 pl-8 text-slate-500 dark:text-slate-400">Alexnder Arroyo</td>
            <td class="p-4 pl-8 text-slate-500 dark:text-slate-400">04S-2405-D1</td>
            <td class="p-4 pl-8 text-slate-500 dark:text-slate-400">Link del grupo</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>