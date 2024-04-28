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
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Rent a proprety
                </a>
            @endif
        </div>
        <div
            class="max-w-7xl  mx-auto sm:px-6 w-[90%] flex flex-wrap gap-4 lg:px-8 h-fit p-3 rounded-xl bg-slate-300 pt-3 ">
            @foreach ($rentals as $rental)
                <div class="flex flex-col justify-center items-center">
                    {{-- <form action="" class="flex flex-col items-center justify-center " method="post"> --}}
                    {{-- <div>
                            <img src="{{ asset('storage/img/' . $rental->imgs) }}" class="w-[80%] h-[40vh] pb-3"
                                alt="{{ $rental->name }}">

                            <div class="flex flex-col gap-3">
                                <h1 class=" bg-slate-300 w-[80%] rounded-lg py-1">{{ $rental->title }}</h1>
                                <p class=" bg-slate-300 w-[80%] rounded-lg py-3">{{ $rental->description }}</p>
                            </div>
                        </div> --}}
                    {{-- </form> --}}
                    {{-- <div class="flex gap-5 ">
                        <form action="" method="post">
                            <button>Edit</button>
                        </form>
                        <form action="" method="post">
                            <button>Delete</button>
                        </form>
                    </div> --}}
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="w-[]">
                            <img src="{{ asset('storage/img/' . $rental->imgs) }}"
                                class="w-[30vw] rounded-t-lg h-[40vh] pb-3" alt="{{ $rental->name }}">
                        </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $rental->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-slate-900">{{ $rental->description }}</p>
                            <div class="flex gap-4 w-[150%] h-fit">
                                @if (Auth::user()->role == 'Admin')
                                    <a href="{{ route('Admin') }}"
                                        class="rounded-md px-3 py-2 my-4 w-[15%] text-center bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Edit
                                    </a>
                                    <a href="{{ route('Admin') }}"
                                        class="rounded-md px-3 py-2  my-4 w-[15%] bg-slate-800 text-center text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Delete
                                    </a>
                                @elseif (Auth::user()->role == 'User')
                                    <a href="/rental"
                                        class="inline-flex cursor-pointer items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 ">
                        <div class="container">
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-full md:w-1/2 xl:w-1/3 px-4">

                                </div>

                                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                                        <img src="{{ asset('storage/img/' . $rental->imgs) }}" alt="{{ $rental->name }}"
                                            class="w-full" />
                                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                            <h3>
                                                <a href="javascript:void(0)"
                                                    class="
                                    font-semibold
                                    text-dark text-xl
                                    sm:text-[22px]
                                    md:text-xl
                                    lg:text-[22px]
                                    xl:text-xl
                                    2xl:text-[22px]
                                    mb-4
                                    block
                                    hover:text-primary
                                    ">
                                                    {{ $rental->title }}</h5>
                                                </a>
                                            </h3>
                                            <p class="text-base text-body-color leading-relaxed mb-7">
                                                {{ $rental->description }}
                                            </p>
                                            BIF
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- component -->

        <!-- ====== Cards Section Start -->
        <!-- ====== Cards Section End -->


    </div>

</x-app-layout>
