<x-app-layout>


    <div class="py-12  gap-4 flex flex-col ">

        <div class="max-w-7xl w-[65%] h-[20vh] mx-auto sm:px-6 lg:px-8  p-3 rounded-xl bg-slate-700 flex flex-col ">
            <h1 class="text-slate-300 font-serif font-extrabold text-3xl mb-4">Welcome to Rentaliens</h1>
            @if (Auth::user()->role == 'Admin')
                <a href="{{ route('Admin') }}"
                    class="rounded-md px-3 py-2 my-4 w-[20%] bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Post your rentals here
                </a>
            @else
                <a href="{{ route('User') }}"
                    class="rounded-md px-3 py-2 my-4 w-[20%] bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent text-center transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Rent a proprety
                </a>
            @endif
        </div>

        <div
            class="max-w-7xl  mx-auto sm:px-6 w-[90%] flex flex-wrap gap-4 lg:px-8 h-fit p-3 rounded-xl bg-slate-300 pt-3 ">
            {{-- Genious Huh :D --}}
            @if ($rentals->count() == 0)
                <h1 class="text">No rentals to show for the moment </h1>
            @endif
            {{--  --}}
            <div class="text-center pb-12 w-full flex flex-col justify-center items-center">
                <h2 class="text-base font-bold text-indigo-600">
                    The Best Vacation Rents
                </h2>
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                    Check out all the rents
                </h1>
            </div>
            <div
                class="w-full h-fit bg-white rounded-lg sahdow-lg py-5 overflow-hidden gap-3  flex flex-col justify-center items-center">
            @foreach ($rentals as $rental)
                <div class="max-w-4xl mx-auto px-4 sm:px-6 border-b-2 shadow-lg shadow-slate-400 rounded-lg hover:scale-105 transition-all lg:px-4 py-12">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <div>
                                <img class="object-center object-cover h-auto w-full"
                                    src="{{ asset('storage/img/' . $rental->imgs) }}" alt="photo">
                            </div>
                            <div class="text-center py-8 sm:py-6">
                                <p class="text-xl text-gray-700 font-bold mb-2">{{ $rental->title }}</p>
                                <br>
                                <p class="text-xl text-gray-700 font-bold mb-2">{{ $rental->property_type }}</p>
                                <br>
                                <p class="text-base text-gray-400 font-normal">{{ $rental->description }}</p>
                                <br>
                                <p class="text-xl text-gray-700 font-bold mb-2">{{ $rental->price }}$</p>
                            </div>
                            <div class="flex h-full bottom-0">
                                @if (Auth::user()->role == 'Admin' && Auth::user()->id == $rental->user_id)
                                <a href="/editRental">
                                    <button
                                            class="rounded-md px-3 py-2 my-4  text-center bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Edit
                                        </button>

                                </a>
                                    <!-- component -->
                                    <form action="{{ route('PostRentals.destroy', $rental) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="outline  px-3 py-1.5 my-4 mx-3 hover:scale-105 transition-all      rounded outline-blue-400 bg-slate-800 text-blue-200  hover:bg-slate-600 hover:outline-red-700 hover:text-red-700">Delete</button>
                                    </form>
                                @elseif (Auth::user()->role == 'User' )
                                    <a href="/rental" id="{{ $rental->id }}"
                                        class="inline-flex  cursor-pointer h-[20%] items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                    @else
                                    <a href="/rental" id="{{ $rental->id }}"
                                        class="inline-flex  cursor-pointer h-[20%] items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    
                    @endforeach
                </div>
                <div>{{ $rentals->links("pagination::tailwind") }}</div>

            </div>
        </div>

        <!-- component -->

        <!-- ====== Cards Section Start -->
        <!-- ====== Cards Section End -->


    </div>

</x-app-layout>
