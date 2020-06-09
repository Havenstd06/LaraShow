@extends('layouts.base')

@section('body')
<div class="flex h-screen overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
    <!-- Off-canvas menu for mobile -->
    <div x-show="sidebarOpen" class="md:hidden" style="display: none;">
      <div class="fixed inset-0 z-40 flex">
        <div @click="sidebarOpen = false" x-show="sidebarOpen" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" style="display: none;">
          <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state." x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-800" style="display: none;">
          <div class="absolute top-0 right-0 p-1 -mr-14">
            <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:bg-gray-600" aria-label="Close sidebar" style="display: none;">
              <svg class="w-6 h-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <a href="{{ route('films') }}">
            <div class="flex items-center justify-center flex-shrink-0 px-4">
                <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467"><g fill="#f9fafb"><path d="M7.434.266L6.758 1.39l.915-.243zM7.07.359l-.533.14-.672 1.127.526-.14zM6.171.596l-.525.14-.678 1.127.532-.14zM5.279.833l-.527.14-.68 1.128.53-.14zM4.385 1.07l-.527.14-.68 1.127.527-.14zM3.49 1.307l-.528.14-.68 1.127.528-.14zM2.595 1.544l-.528.14-.679 1.127.527-.14zM1.7 1.78l-1.17.31.24.885.25-.067zM.793 3.173v.794h.418l.792-.794zM2.377 3.173l-.792.794h.551l.793-.794zM3.303 3.173l-.793.794h.552l.793-.794zM4.23 3.173l-.793.794h.552l.792-.794zM5.155 3.173l-.792.794h.551l.794-.794zM6.082 3.173l-.794.794h.552l.793-.794zM7.008 3.173l-.794.794h.552l.793-.794zM7.934 3.173l-.794.794h.797v-.794zM.793 4.231v3.44c0 .293.237.53.53.53h6.085a.53.53 0 00.53-.53v-3.44zm.929.53h5.287a.132.132 0 110 .264H5.424v1.19h1.585a.132.132 0 110 .265H1.722a.132.132 0 110-.264h1.585V5.025H1.722a.132.132 0 110-.265zm1.85.264v1.19h1.587v-1.19zm-1.85 2.117h5.287a.132.132 0 110 .264H1.722a.132.132 0 110-.264z"/></g></svg>
                <h1 class="ml-2 text-2xl font-semibold tracking-widest text-gray-50">{{ config('app.name') }}</h1>
            </div>
          </a>
          <div class="flex-1 h-0 mt-5 overflow-y-auto">
            <nav class="px-2">
              <a href="{{ route('films') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'films')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="film" class="w-6 h-6 mr-4 text-gray-300 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"/></svg>
                Films
              </a>
              <a href="{{ route('series') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'series')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="tv" class="w-6 h-6 mr-4 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M592 0H48A48 48 0 000 48v320a48 48 0 0048 48h240v32H112a16 16 0 00-16 16v32a16 16 0 0016 16h416a16 16 0 0016-16v-32a16 16 0 00-16-16H352v-32h240a48 48 0 0048-48V48a48 48 0 00-48-48zm-16 352H64V64h512z"/></svg>
                Séries TV
              </a>
              </a>
              <a href="{{ route('artistes') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md transition ease-in-out duration-150 
              @if (\Route::current()->getName() == 'artistes')  
                 text-white bg-gray-900 focus:outline-none focus:bg-gray-700
              @else
                text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700
              @endif">
                <svg aria-hidden="true" data-prefix="far" data-icon="user" class="w-6 h-6 mr-4 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M314 304c-29 0-43 16-90 16s-61-16-90-16C60 304 0 364 0 438v26c0 27 22 48 48 48h352c27 0 48-21 48-48v-26c0-74-60-134-134-134zm86 160H48v-26c0-47 39-86 86-86 15 0 39 16 90 16 52 0 75-16 90-16 47 0 86 39 86 86v26zM224 288a144 144 0 100-288 144 144 0 000 288zm0-240a96 96 0 110 192 96 96 0 010-192z"/></svg>
                Artistes
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
        <a href="{{ route('films') }}">
          <div class="flex items-center justify-center h-16 px-4 bg-gray-900 text-gray-50">
              <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467"><g fill="#f9fafb"><path d="M7.434.266L6.758 1.39l.915-.243zM7.07.359l-.533.14-.672 1.127.526-.14zM6.171.596l-.525.14-.678 1.127.532-.14zM5.279.833l-.527.14-.68 1.128.53-.14zM4.385 1.07l-.527.14-.68 1.127.527-.14zM3.49 1.307l-.528.14-.68 1.127.528-.14zM2.595 1.544l-.528.14-.679 1.127.527-.14zM1.7 1.78l-1.17.31.24.885.25-.067zM.793 3.173v.794h.418l.792-.794zM2.377 3.173l-.792.794h.551l.793-.794zM3.303 3.173l-.793.794h.552l.793-.794zM4.23 3.173l-.793.794h.552l.792-.794zM5.155 3.173l-.792.794h.551l.794-.794zM6.082 3.173l-.794.794h.552l.793-.794zM7.008 3.173l-.794.794h.552l.793-.794zM7.934 3.173l-.794.794h.797v-.794zM.793 4.231v3.44c0 .293.237.53.53.53h6.085a.53.53 0 00.53-.53v-3.44zm.929.53h5.287a.132.132 0 110 .264H5.424v1.19h1.585a.132.132 0 110 .265H1.722a.132.132 0 110-.264h1.585V5.025H1.722a.132.132 0 110-.265zm1.85.264v1.19h1.587v-1.19zm-1.85 2.117h5.287a.132.132 0 110 .264H1.722a.132.132 0 110-.264z"/></g></svg>
              <h1 class="ml-2 text-2xl font-semibold tracking-widest text-gray-50">{{ config('app.name') }}</h1>
          </div>
        </a>
        <div class="flex flex-col flex-1 h-0 overflow-y-auto">
          <!-- Sidebar component, swap this element with another sidebar if you like -->
          <nav class="flex-1 px-2 py-4 bg-gray-800">
            <a href="{{ route('films') }}" class="group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'films')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="film" class="w-6 h-6 mr-3 text-gray-300 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"/></svg>
                Films
            </a>
            <a href="{{ route('series') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'series')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="fas" data-icon="tv" class="w-6 h-6 mr-3 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M592 0H48A48 48 0 000 48v320a48 48 0 0048 48h240v32H112a16 16 0 00-16 16v32a16 16 0 0016 16h416a16 16 0 0016-16v-32a16 16 0 00-16-16H352v-32h240a48 48 0 0048-48V48a48 48 0 00-48-48zm-16 352H64V64h512z"/></svg>
                Séries TV
            </a>
            </a>
            <a href="{{ route('artistes') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium focus:bg-gray-700 transition ease-in-out duration-150
              @if (\Route::current()->getName() == 'artistes')  
                text-white rounded-md bg-gray-900 focus:outline-none
              @else
                text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white
              @endif">
                <svg aria-hidden="true" data-prefix="far" data-icon="user" class="w-6 h-6 mr-3 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-300 group-focus:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M314 304c-29 0-43 16-90 16s-61-16-90-16C60 304 0 364 0 438v26c0 27 22 48 48 48h352c27 0 48-21 48-48v-26c0-74-60-134-134-134zm86 160H48v-26c0-47 39-86 86-86 15 0 39 16 90 16 52 0 75-16 90-16 47 0 86 39 86 86v26zM224 288a144 144 0 100-288 144 144 0 000 288zm0-240a96 96 0 110 192 96 96 0 010-192z"/></svg>
                Artistes
            </a>
          </nav>
        </div>
      </div>
    </div>
    <div class="flex flex-col flex-1 w-0 overflow-hidden">
      <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
        <button @click.stop="sidebarOpen = true" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden" aria-label="Open sidebar">
          <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
          </svg>
        </button>
        @livewire('search-dropdown')
      </div>

      <main class="relative z-0 flex-1 py-6 overflow-y-auto focus:outline-none" tabindex="0" x-data="" x-init="$el.focus()">
        <div class="px-4 mx-auto max-w-7xl sm:px-6">
            @yield('content')
        </div>
      </main>
      @include('layouts.footer')
    </div>
  </div>
@endsection
