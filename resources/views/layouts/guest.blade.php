<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="shortcut icon" href="image/logo.png" type="image/x-icon">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-l from-indigo-500 dark:bg-gray-900">

    <div class="w-full sm:max-w-md px-6 py-4 bg-slate-100  border-indigo-500/100 rounded-lg border-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
      <div class="flex justify-center">
        <a href="/" wire:navigate>
          <img src="{{asset('/image/logo.png')}}" class="w-32 h-32 fill-current text-gray-500" />
        </a>
      </div>
      {{ $slot }}
    </div>
    <footer class="py-4 text-center text-black font-mediun text-lg dark:text-white/70">
      &copy; UNEFA {{date('Y')}}
    </footer>
  </div>
</body>

</html>