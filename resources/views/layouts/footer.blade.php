<div class="bg-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
  <div class="px-4 py-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-base font-medium leading-6 text-center text-gray-600">
        Fait avec <i :class="{ 'fas': hover === true }" class="far fa-heart"></i> par <a href="https://thomas.drumont.dev" target="_nofollow" class="hover:text-gray-700">Havens</a> - {{ date('Y') }}
    </p>
  </div>
</div>