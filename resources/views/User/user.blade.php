<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <title>Document</title>
</head>

<body class="bg-slate-600 ">


    @role('User')
    <div>
        <img src="{{ asset("imgs/rentalHero.jpg") }}" alt="">
    </div>
        <form action="{{ route('rentals.search') }}" class="flex flex-col gap-3" method="GET">
            <label for=""></label>
            <div>
                <input type="text" name="search" placeholder="Search Products">
                <label for=""></label>
            </div>
            <div>
                <input type="text" name="search" placeholder="Maximum Budget">
                <label for=""></label>
            </div>
            <div>
                <input type="text" name="search" placeholder="">
                <button type="submit">Search</button>
            </div>
        </form>
        <div class="flex flex-wrap gap-3 h-fit w-[100%] justify-center items-center">
            @foreach ($rentals as $rental)
                <div class="bg-slate-500 ">

                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="">
                            <img src="{{ asset('storage/img/' . $rental->imgs) }}"
                                class="w-[30vw] rounded-t-lg h-[40vh] pb-3" alt="{{ $rental->name }}">
                        </div>
                        <div class="p-5 ">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $rental->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-slate-900">{{ $rental->description }}</p>
                            <div class="flex gap-4  h-fit">
                                @if (Auth::user()->role == 'Admin')
                                    <a href="{{ route('Admin') }}"
                                        class="rounded-md px-3 py-2 my-4 w-[15%] text-center bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Edit
                                    </a>
                                    <a href="{{ route('Admin') }}"
                                        class="rounded-md px-3 py-2  my-4 w-[15%] bg-slate-800 text-center text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Delete
                                    </a>
                                @else
                                <a href="{{ route('rental.show', $rental->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                            {{-- <a href="#"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endrole
</body>

</html>
