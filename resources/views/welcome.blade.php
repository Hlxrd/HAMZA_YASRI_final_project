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
    <section class="bg-yellow-50">
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
                        <a href="{{ route('login') }}">
                            Or sign up
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="px-3 md:lg:xl:px-40   border-t border-b py-20 bg-opacity-10"
            style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png') ;">
            <div class="grid grid-cols-1 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border ">


                <div
                    class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-red-500 text-white shadow-lg shadow-red-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Most Experienced Team</p>
                    <p class="mt-2 text-sm text-slate-500">Team BrainEdge education is a bunch of highly focused,
                        energetic
                        set of people.</p>
                </div>

                <div
                    class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-orange-500 text-white shadow-lg shadow-orange-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Best Offers based on your preferences</p>
                    <p class="mt-2 text-sm text-slate-500">Know where you stand and what next to </p>
                </div>

                <div
                    class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-yellow-500 text-white shadow-lg shadow-yellow-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Admission process Guidance</p>
                    <p class="mt-2 text-sm text-slate-500">Professional Advice for higher education abroad and select
                        the
                        top institutions worldwide.</p>
                </div>


                <div
                    class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-r hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-lime-500 text-white shadow-lg shadow-lime-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Best
                        Track Record</p>
                    <p class="mt-2 text-sm text-slate-500">Yet another year ! Yet another jewel in our crown!</p>
                </div>

                <div
                    class="p-10 flex flex-col items-center text-center group    md:lg:xl:border-r hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-teal-500 text-white shadow-lg shadow-teal-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Free
                        Mock Exams</p>
                    <p class="mt-2 text-sm text-slate-500">Get Topic-Wise Tests, Section- Wise and mock tests for your
                        preparation.</p>
                </div>

                <div class="p-10 flex flex-col items-center text-center group     hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-indigo-500 text-white shadow-lg shadow-indigo-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Genuine
                        Visa Advice</p>
                    <p class="mt-2 text-sm text-slate-500">Visa process by helping you create the necessary
                        documentation
                    </p>
                </div>




            </div>

            <div
                class="w-full   bg-indigo-600 shadow-xl shadow-indigo-200 py-10 px-20 flex justify-between items-center">
                <p class=" text-white"> <span class="text-4xl font-medium">Still Confused ?</span> <br> <span
                        class="text-lg">Book For Free Career Consultation Today ! </span></p>
                <button
                    class="px-5 py-3  font-medium text-slate-700 shadow-xl  hover:bg-white duration-150  bg-yellow-400">BOOK
                    AN APPOINTMENT </button>
            </div>

        </div>
    </section>

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
