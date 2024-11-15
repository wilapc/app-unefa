@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-emerald-400 dark:border-emerald-600 text-sm font-medium leading-5 text-neutral-200 dark:text-neutral-50 focus:outline-none focus:border-emerald-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-neutral-50 dark:text-neutral-50 hover:text-neutral-300 dark:hover:text-neutral-300 hover:border-neutral-300 dark:hover:border-neutral-300 focus:outline-none focus:text-neutral-300 dark:focus:text-neutral-300 focus:border-neutral-300 dark:focus:border-neutral-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
