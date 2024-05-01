

<x-app-layout>
   
    <!-- component -->
<div class="h-[70vh] bg-gray-300 flex items-center">
	<div class="w-full bg-cover bg-center py-32" style="background-image: url('https://source.unsplash.com/random/c');">
		<div class="container mx-auto text-center text-white">
			<h1 class="text-5xl  mb-6 text-gray-800 text-opacity-80 font-extrabold">Find The Best location For Your Vaccation</h1>
			{{-- <p class="text-xl mb-12">Take a Look</p> --}}
			<a href="{{ URL::to('/rental') }}#container" class="bg-indigo-500 transition-all scroll-smooth text-white py-4 px-12 rounded-full hover:bg-indigo-600">Take a Look</a>
		</div>
	</div>
</div>
    
    
</x-app-layout>


