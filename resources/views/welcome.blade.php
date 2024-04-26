<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <title>Laravel</title>
</head>

<body>
    <header class=" flex items-center    gap-2 py-10 lg:grid-cols-3 bg-stone-700 w-[100%] h-[10vh]  px-8">
        <h1 class="text-3xl text-amber-500">RentAliens</h1>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-center text-black">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-blue-200 text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-blue-200  text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-blue-200  text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
            @if (Auth::user())
                @if (Auth::user()->role == 'Admin')
                    <a href="{{ route('Admin') }}"
                        class="rounded-md px-3 py-2 outline bg-slate-800 text-blue-200  text-xl ring-1 ring-transparent hover:text-blue-400/70 hover:shadow hover:border hover:shadow-sky-600 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Post your rentals
                    </a>
                @elseif (Auth::user()->role == 'User')
                    <a href="{{ route('User') }}"
                        class="rounded-md px-3 py-2 text-blue-200  text-xl hover:scale-105 transition-all ring-1 ring-transparent hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Rent a proprety
                    </a>
                @endif

            @endif
            {{-- @if (Auth::user()->role == 'Admin')
                <a href="{{ route('Admin') }}"
                    class="rounded-md px-3 py-2 my-4 w-[20%] bg-slate-800 text-blue-200 hover:text-blue-50 hover:scale-105  outline ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Post your rentals here
                </a>
            @else
                <a href="{{ route('User') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Rent a proprety
                </a>
            @endif --}}
        @endif
    </header>
    <main class="bg-yellow-50">
        <div class="container w-full h-screen mx-auto px-8 rounded-lg ">
            <div class="w-full h-[80vh] rounded-lg flex justify-center items-center">

                <img src="{{ asset('imgs/rentalHero.jpg') }}" class="w-[100%] h-[100%] pt-1 rounded-lg" alt="">
                <div
                    class="absolute pb-16 pl-10 text-center bg-amber-50 w-[90%] h-[70%] flex flex-col justify-center items-center bg-opacity-20 rounded-full gap-5">
                    <h1 class="text-5xl z-20  font-bold text-slate-800">Rent<span class="text-amber-700">Aliens</span>
                    </h1>
                    <p class="text-xl text-slate-800 font-bold">Looking for the perfect vacation rental?</p>
                    @if (Auth::user())
                        <a href="{{ route('dashboard') }}"
                            class="outline p-3 rounded-lg bg-slate-800 text-blue-200 hover:text-blue-200/70 hover:scale-105 transition-all focus:outline-none focus-visible:ring-[#FF2D20] ">Check
                            our plathform</a>
                    @else
                        <a href="{{ route('register') }}">
                            You Don't Have an Account
                        </a>
                        <a href="{{ route("login") }}">
                            Or sign up
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="w-full h-[20vh] bg-stone-900">
            <div class="p-5 flex flex-col w-[40%] h-[100%] justify-center gap-12">
                <p class="text-white">RentAliens </p>
                <h1 class="text-white">&#169; All rights reserved</h1>
            </div>
            <div>

            </div>
        </div>
    </footer>
</body>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</html>
