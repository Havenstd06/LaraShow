@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold tracking-wider text-gray-900">Séries</h2>
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div class="my-5">
            <a href="#">
                <img src="http://fr.web.img2.acsta.net/c_216_288/medias/nmedia/18/78/35/82/20303823.jpg" alt="Affiche" class="w-full duration-150 ease-in transform hover:opacity-75">
            </a>
            <div class="mt-2">
                <a href="#" class="mr-2 text-lg font-semibold text-gray-800 uppercase truncate hover:text-gray-700" title="THE WALKING DEAD">
                    THE WALKING DEAD
                </a>
                <div class="flex items-center">
                    <img src="https://limg.app/i/HomelyHoopoe-AustralianVegetarianSchool-4UDdt8.png" alt="Étoile" class="mr-2">
                    <span class="mr-2 text-sm font-medium text-gray-800">4,4</span>
                    <span class="pl-2 text-sm font-medium text-gray-800 border-l-2 border-gray-900">Depuis 2010</span>
                </div>
                <div class="flex items-center">
                    <span class="text-sm font-medium text-gray-600 truncate" title="Glen Mazzara, Frank Darabont, Scott M. Gimple">De Glen Mazzara, Frank Darabont, Scott M. Gimple</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
