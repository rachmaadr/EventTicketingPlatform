<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('assets/svgs/logo-mark.svg') }}" type="image/x-icon">
        <title>@yield('tittle') - {{ config('app.name', 'Ticketinc') }}</title>
        {{-- Script --}}
        @vite(['resources/css/frontend.css'])
        {{-- Styles --}}
        @livewireStyles
        {{-- Custom CSS --}}
        @stack('css')
    </head>

    <body>
        {{-- Navbar --}}
        <x-frontend.navbar/>
        
        {{-- Slot --}}
        {{ $slot }}
        {{-- Livewire Script --}}
        @livewireScripts

        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(() => {
                $('#navbarToggler').on('click', function (e) {
                    let navigationMenu = $(this).attr('data-target')
                    $(navigationMenu).toggleClass('hidden')
                })
            })
        </script>

        {{-- Custom JS --}}
        @stack('js')
    </body>

</html>