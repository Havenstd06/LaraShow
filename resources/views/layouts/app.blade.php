@extends('layouts.base')

@section('body')
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
    <!-- Off-canvas menu for mobile -->
    <div x-show="sidebarOpen" class="md:hidden" style="display: none;">
      <div class="fixed inset-0 flex z-40">
        <div @click="sidebarOpen = false" x-show="sidebarOpen" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" style="display: none;">
          <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state." x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800" style="display: none;">
          <div class="absolute top-0 right-0 -mr-14 p-1">
            <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600" aria-label="Close sidebar" style="display: none;">
              <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <div class="flex-shrink-0 flex justify-center items-center px-4">
            <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467"><g fill="#f9fafb"><path d="M7.434.266L6.758 1.39l.915-.243zM7.07.359l-.533.14-.672 1.127.526-.14zM6.171.596l-.525.14-.678 1.127.532-.14zM5.279.833l-.527.14-.68 1.128.53-.14zM4.385 1.07l-.527.14-.68 1.127.527-.14zM3.49 1.307l-.528.14-.68 1.127.528-.14zM2.595 1.544l-.528.14-.679 1.127.527-.14zM1.7 1.78l-1.17.31.24.885.25-.067zM.793 3.173v.794h.418l.792-.794zM2.377 3.173l-.792.794h.551l.793-.794zM3.303 3.173l-.793.794h.552l.793-.794zM4.23 3.173l-.793.794h.552l.792-.794zM5.155 3.173l-.792.794h.551l.794-.794zM6.082 3.173l-.794.794h.552l.793-.794zM7.008 3.173l-.794.794h.552l.793-.794zM7.934 3.173l-.794.794h.797v-.794zM.793 4.231v3.44c0 .293.237.53.53.53h6.085a.53.53 0 00.53-.53v-3.44zm.929.53h5.287a.132.132 0 110 .264H5.424v1.19h1.585a.132.132 0 110 .265H1.722a.132.132 0 110-.264h1.585V5.025H1.722a.132.132 0 110-.265zm1.85.264v1.19h1.587v-1.19zm-1.85 2.117h5.287a.132.132 0 110 .264H1.722a.132.132 0 110-.264z"/></g></svg>
            <h1 class="ml-2 text-2xl text-gray-50 tracking-widest font-semibold">{{ config('app.name') }}</h1>
          </div>
          <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2">
              <a href="{{ route('films') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'films')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="film" class="mr-4 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"/></svg>
                Films
              </a>
              <a href="{{ route('series') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'series')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="tv" class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M592 0H48A48 48 0 000 48v320a48 48 0 0048 48h240v32H112a16 16 0 00-16 16v32a16 16 0 0016 16h416a16 16 0 0016-16v-32a16 16 0 00-16-16H352v-32h240a48 48 0 0048-48V48a48 48 0 00-48-48zm-16 352H64V64h512z"/></svg>
                Séries TV
              </a>
              <a href="{{ route('acteurs') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'acteurs')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="user-tag" class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M630.6 364.9l-90.3-90.2c-12-12-28.3-18.7-45.3-18.7h-79.3c-17.7 0-32 14.3-32 32v79.2c0 17 6.7 33.2 18.7 45.2l90.3 90.2c12.5 12.5 32.8 12.5 45.3 0l92.5-92.5c12.6-12.5 12.6-32.7.1-45.2zm-182.8-21c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24c0 13.2-10.7 24-24 24zm-223.8-88c70.7 0 128-57.3 128-128C352 57.3 294.7 0 224 0S96 57.3 96 128c0 70.6 57.3 127.9 128 127.9zm127.8 111.2V294c-12.2-3.6-24.9-6.2-38.2-6.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 287.9 0 348.1 0 422.3v41.6c0 26.5 21.5 48 48 48h352c15.5 0 29.1-7.5 37.9-18.9l-58-58c-18.1-18.1-28.1-42.2-28.1-67.9z"/></svg>
                Acteurs
              </a>
            </nav>
          </div>
        </div>
        <div class="flex-shrink-0 w-14">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64">
        <div class="flex items-center justify-center h-16 px-4 bg-gray-900 text-gray-50">
            <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467"><g fill="#f9fafb"><path d="M7.434.266L6.758 1.39l.915-.243zM7.07.359l-.533.14-.672 1.127.526-.14zM6.171.596l-.525.14-.678 1.127.532-.14zM5.279.833l-.527.14-.68 1.128.53-.14zM4.385 1.07l-.527.14-.68 1.127.527-.14zM3.49 1.307l-.528.14-.68 1.127.528-.14zM2.595 1.544l-.528.14-.679 1.127.527-.14zM1.7 1.78l-1.17.31.24.885.25-.067zM.793 3.173v.794h.418l.792-.794zM2.377 3.173l-.792.794h.551l.793-.794zM3.303 3.173l-.793.794h.552l.793-.794zM4.23 3.173l-.793.794h.552l.792-.794zM5.155 3.173l-.792.794h.551l.794-.794zM6.082 3.173l-.794.794h.552l.793-.794zM7.008 3.173l-.794.794h.552l.793-.794zM7.934 3.173l-.794.794h.797v-.794zM.793 4.231v3.44c0 .293.237.53.53.53h6.085a.53.53 0 00.53-.53v-3.44zm.929.53h5.287a.132.132 0 110 .264H5.424v1.19h1.585a.132.132 0 110 .265H1.722a.132.132 0 110-.264h1.585V5.025H1.722a.132.132 0 110-.265zm1.85.264v1.19h1.587v-1.19zm-1.85 2.117h5.287a.132.132 0 110 .264H1.722a.132.132 0 110-.264z"/></g></svg>
            <h1 class="ml-2 text-2xl text-gray-50 tracking-widest font-semibold">{{ config('app.name') }}</h1>
        </div>
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
          <!-- Sidebar component, swap this element with another sidebar if you like -->
          <nav class="flex-1 px-2 py-4 bg-gray-800">
            <a href="{{ route('films') }}" class="group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'films')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="film" class="mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"/></svg>
                Films
            </a>
            <a href="{{ route('series') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'series')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="tv" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M592 0H48A48 48 0 000 48v320a48 48 0 0048 48h240v32H112a16 16 0 00-16 16v32a16 16 0 0016 16h416a16 16 0 0016-16v-32a16 16 0 00-16-16H352v-32h240a48 48 0 0048-48V48a48 48 0 00-48-48zm-16 352H64V64h512z"/></svg>
                Séries TV
            </a>
            <a href="{{ route('acteurs') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'acteurs')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="user-tag" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M630.6 364.9l-90.3-90.2c-12-12-28.3-18.7-45.3-18.7h-79.3c-17.7 0-32 14.3-32 32v79.2c0 17 6.7 33.2 18.7 45.2l90.3 90.2c12.5 12.5 32.8 12.5 45.3 0l92.5-92.5c12.6-12.5 12.6-32.7.1-45.2zm-182.8-21c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24c0 13.2-10.7 24-24 24zm-223.8-88c70.7 0 128-57.3 128-128C352 57.3 294.7 0 224 0S96 57.3 96 128c0 70.6 57.3 127.9 128 127.9zm127.8 111.2V294c-12.2-3.6-24.9-6.2-38.2-6.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 287.9 0 348.1 0 422.3v41.6c0 26.5 21.5 48 48 48h352c15.5 0 29.1-7.5 37.9-18.9l-58-58c-18.1-18.1-28.1-42.2-28.1-67.9z"/></svg>
                Acteurs
            </a>
          </nav>
        </div>
      </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
        <button @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden" aria-label="Open sidebar">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
          </svg>
        </button>
        <div class="flex-1 px-4 flex justify-between">
          <div class="flex-1 flex">
            <div class="w-full flex md:ml-0">
              <label for="search_field" class="sr-only">Search
              </label>
              <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                  </svg>
                </div>
                <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
              </div>
            </div>
          </div>
        </div>
      </div>

      <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0" x-data="" x-init="$el.focus()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            @yield('content')
        </div>
      </main>
      @include('layouts.footer')
    </div>
  </div>
@endsection
