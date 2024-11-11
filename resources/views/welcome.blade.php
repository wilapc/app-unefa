<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>UNEFA</title>

  <link rel="shortcut icon" href="image/logo.png" type="image/x-icon">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
  <div class="bg-gradient-to-l from-indigo-500 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
      <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

        <main class="mt-6 flex justify-center">
          <div class="flex max-w-4xl border-indigo-500/100 rounded-lg border-4">
            <div class="basis-1/2 bg-login bg-cover md:w-[400px] h-[500px]">
            </div>
            <div class="basis-1/2 content-center bg-slate-100">
              <h3 class="text-3xl font-bold ml-5 text-gray-800">Bienvenidos a la aplicación estudiantil</h3>
              <livewire:pages.auth.login />
            </div>
          </div>
        </main>

        <footer class="py-4 text-center text-black font-mediun text-lg dark:text-white/70">
          &copy; UNEFA {{date('Y')}}
        </footer>
      </div>
    </div>
  </div>
</body>

</html>