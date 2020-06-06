<div class="bg-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
  <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <p class="text-center text-base leading-6 text-gray-600 font-medium">
        Made with <i :class="{ 'fas': hover === true }" class="far fa-heart"></i> by <a href="https://github.com/havenstd06" target="_nofollow" class="hover:text-gray-700">Havens</a> - {{ date('Y') }}
    </p>
  </div>
</div>