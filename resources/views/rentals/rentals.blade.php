<x-app-layout>

    <!-- component -->
    <div class="h-[70vh] bg-gray-300  flex items-center">
        <div class="w-full bg-cover bg-center h-[100%] py-32"
            style="background-image: url('https://source.unsplash.com/random');">
            <div class="container mx-auto text-center h-[100%] text-white">
                <h1 class="text-5xl  mb-6 text-gray-800 text-opacity-80 font-extrabold">Find The Best location For Your
                    Vaccation</h1>
                {{-- <p class="text-xl mb-12">Take a Look</p> --}}
                <a href="{{ URL::to('/rental') }}#container"
                    class="bg-indigo-500 transition-all scroll-smooth text-white py-4 px-12 rounded-full hover:bg-indigo-600">Take
                    a Look</a>
            </div>
        </div>
    </div>
    <div id="container" class="container mx-auto px-4 py-8 w-full h-fit  bg-slate-200">
        @foreach ($rentals as $rental)
            <div class="flex flex-wrap md:flex-row justify-between items-center mb-4">
                <a href="{{ route('dashboard') }}" class="text-blue-700 hover:underline text-4xl"> <- Back to Rentals</a>
            </div>

            
            <div class="max-w-screen-xl mx-auto">

                <div class="mt-10">

                    <div class="mb-4 md:mb-0 w-full  max-w-screen-md mx-auto relative" style="height: 24em;">
                        <div class="absolute left-0 bottom-0 w-full h-full z-10"
                            style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                        <img src="{{ asset('storage/img/' . $rental->imgs) }}"
                            class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                        <div class="p-4 absolute bottom-0 left-0 z-20">
                            <a href="#"
                                class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">Nutrition</a>
                            <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                                {{ $rental->title }}


                                <div class="font-semibold text-gray-200 text-sm">
                                    <div class="flex items-center mb-2">

                                        <span class="text-gray-100 ml-2 ">Price : {{ $rental->price }} $ per week</span>
                                    </div>
                                </div>
                                <p class="font-semibold text-gray-400 text-xs">{{ $rental->location }}</p>
                                <p class="font-semibold text-gray-400 text-xs">{{ $rental->description }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="/session" method="get">
                        <button class="outline p-3 rounded-full hover:px-5 bg-gray-400 hover:bg-green-500 transition-all">Pay</button>
                    </form>
                </div>
            </div>

    </div>
    @endforeach
    </div>

    <!-- component -->

    
    </div>
</x-app-layout>
